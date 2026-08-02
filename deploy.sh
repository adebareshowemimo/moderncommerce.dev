#!/usr/bin/env bash

set -Eeuo pipefail

SCRIPT_DIR="$(cd -- "$(dirname -- "${BASH_SOURCE[0]}")" && pwd)"
DEPLOY_ROOT="${DEPLOY_ROOT:-/var/www/moderncommerce}"
DEPLOY_BRANCH="${DEPLOY_BRANCH:-main}"
DEPLOY_SKIP_GIT="${DEPLOY_SKIP_GIT:-0}"
DEPLOY_SKIP_BUILD="${DEPLOY_SKIP_BUILD:-0}"
DEPLOY_HEALTHCHECK_URL="${DEPLOY_HEALTHCHECK_URL:-}"
ALLOW_NON_PRODUCTION="${ALLOW_NON_PRODUCTION:-0}"
DEPLOY_RUNTIME_GROUP="${DEPLOY_RUNTIME_GROUP:-}"
MAINTENANCE_ACTIVE=0

[[ -d "$DEPLOY_ROOT" ]] || {
    printf 'Deployment root does not exist: %s\n' "$DEPLOY_ROOT" >&2
    exit 1
}

cd "$DEPLOY_ROOT"

if [[ "$SCRIPT_DIR" != "$DEPLOY_ROOT" ]]; then
    printf 'Run the deploy script from the production checkout at %s.\n' "$DEPLOY_ROOT" >&2
    printf 'For a deliberate staging deployment, set DEPLOY_ROOT to that checkout path.\n' >&2
    exit 1
fi

log() {
    printf '\n[%s] %s\n' "$(date '+%Y-%m-%d %H:%M:%S')" "$*"
}

fail() {
    printf '\nDeployment failed: %s\n' "$*" >&2
    exit 1
}

detect_runtime_group() {
    if [[ -n "$DEPLOY_RUNTIME_GROUP" ]]; then
        getent group "$DEPLOY_RUNTIME_GROUP" >/dev/null 2>&1 || fail "Runtime group does not exist: $DEPLOY_RUNTIME_GROUP"
        return
    fi

    local candidate
    for candidate in www-data nginx apache; do
        if getent group "$candidate" >/dev/null 2>&1; then
            DEPLOY_RUNTIME_GROUP="$candidate"
            return
        fi
    done

    DEPLOY_RUNTIME_GROUP="$(id -gn)"
}

prepare_runtime_directories() {
    local deploy_user
    deploy_user="$(id -un)"

    detect_runtime_group

    log "Preparing Laravel runtime directories for group $DEPLOY_RUNTIME_GROUP"
    mkdir -p \
        storage/app/private \
        storage/app/public \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache

    if [[ "$(id -gn)" != "$DEPLOY_RUNTIME_GROUP" ]]; then
        if [[ "$(id -u)" == "0" ]]; then
            chown -R "$deploy_user:$DEPLOY_RUNTIME_GROUP" storage bootstrap/cache
        elif ! chgrp -R "$DEPLOY_RUNTIME_GROUP" storage bootstrap/cache 2>/dev/null; then
            fail "Cannot assign runtime group $DEPLOY_RUNTIME_GROUP. Run the deployment with sufficient privileges or set DEPLOY_RUNTIME_GROUP to a shared group."
        fi
    fi

    find storage bootstrap/cache -type d -exec chmod 2775 {} +
    find storage bootstrap/cache -type f -exec chmod 0664 {} +

    [[ -w storage/framework/views ]] || fail "storage/framework/views is not writable by the deployment user."
    [[ -w bootstrap/cache ]] || fail "bootstrap/cache is not writable by the deployment user."
}

restore_application() {
    local status=$?

    if [[ "$MAINTENANCE_ACTIVE" == "1" ]]; then
        log "Restoring the application after an interrupted deployment"
        php artisan up || true
    fi

    exit "$status"
}

trap restore_application EXIT INT TERM

command -v php >/dev/null 2>&1 || fail "PHP is not installed or is not on PATH."
command -v composer >/dev/null 2>&1 || fail "Composer is not installed or is not on PATH."

[[ -f .env ]] || fail "The production .env file is missing."
grep -Eq '^APP_KEY=.+$' .env || fail "APP_KEY is empty. Generate a production application key first."

if [[ "$ALLOW_NON_PRODUCTION" != "1" ]] && ! grep -Eq '^APP_ENV=(production|"production"|'"'"'production'"'"')$' .env; then
    fail "APP_ENV must be production. Set ALLOW_NON_PRODUCTION=1 only for a deliberate staging deployment."
fi

if command -v flock >/dev/null 2>&1; then
    exec 9>"${DEPLOY_LOCK_FILE:-/tmp/moderncommerce-deploy.lock}"
    flock -n 9 || fail "Another ModernCommerce deployment is already running."
fi

if [[ "$DEPLOY_SKIP_GIT" != "1" ]]; then
    command -v git >/dev/null 2>&1 || fail "Git is required unless DEPLOY_SKIP_GIT=1."
    [[ -d .git ]] || fail "This directory is not a Git checkout."

    CURRENT_BRANCH="$(git branch --show-current)"
    [[ "$CURRENT_BRANCH" == "$DEPLOY_BRANCH" ]] || fail "Expected branch $DEPLOY_BRANCH, found $CURRENT_BRANCH."

    log "Updating $DEPLOY_BRANCH with a fast-forward-only pull"
    git fetch --prune origin "$DEPLOY_BRANCH"
    git pull --ff-only origin "$DEPLOY_BRANCH"
fi

prepare_runtime_directories

log "Installing production PHP dependencies"
composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

if [[ "$DEPLOY_SKIP_BUILD" != "1" ]]; then
    command -v npm >/dev/null 2>&1 || fail "npm is required unless DEPLOY_SKIP_BUILD=1."

    log "Installing locked frontend dependencies"
    npm ci --no-audit --no-fund

    log "Building production frontend assets"
    npm run build
fi

log "Enabling maintenance mode"
php artisan down --retry=60 --refresh=15
MAINTENANCE_ACTIVE=1

log "Clearing stale application caches"
php artisan optimize:clear

log "Running database migrations"
php artisan migrate --force

if [[ ! -e public/storage ]]; then
    log "Creating the public storage link"
    php artisan storage:link
fi

log "Caching production configuration, events, and views"
php artisan config:cache
php artisan event:cache
php artisan view:cache

log "Restarting queue workers"
php artisan queue:restart

log "Disabling maintenance mode"
php artisan up
MAINTENANCE_ACTIVE=0

if [[ -n "$DEPLOY_HEALTHCHECK_URL" ]]; then
    command -v curl >/dev/null 2>&1 || fail "curl is required when DEPLOY_HEALTHCHECK_URL is set."
    log "Running deployment health check"
    curl --fail --silent --show-error \
        --retry 5 \
        --retry-delay 2 \
        --max-time 20 \
        "$DEPLOY_HEALTHCHECK_URL" >/dev/null
fi

trap - EXIT INT TERM
log "Deployment completed successfully"
