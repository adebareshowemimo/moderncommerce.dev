# Troubleshooting

Diagnose from the transaction/access chain instead of changing data until the symptom disappears. Record the plugin release, Moodle/PHP version, user/order/product IDs, timestamp and environment first.

## Start with health checks

```bash
php local/moderncommerce/cli/demo_data.php --audit
php admin/cli/cron.php
composer --working-dir=local/moderncommerce run mc:check-fast
```

Use the audit only as an inventory signal; empty tables can be normal on a new store.

## Payment succeeded, order pending

1. Check the provider transaction/event.
2. Check `payment_attempts` for the order/reference.
3. Check payment and webhook event ledgers, including error text.
4. Compare amount and currency with the order snapshot.
5. Confirm the correct environment credentials and webhook endpoint.
6. Do not initiate a second payment while the first is unreconciled.

## Paid learner has no course access

Trace order → item → successful payment event → fulfilment → fulfilment item → entitlement → Moodle enrolment. For bundles, confirm every product-course link. For subscriptions, also inspect plan rule, user subscription, access cache and the `sync_access` task. For keys, inspect target and usage.

## Gateway missing from checkout

Check gateway enabled state, required credentials, test/live mode, active store currency, order currency and the gateway's supported currencies. The readiness service can exclude an enabled gateway for a specific order.

## Emails or notifications not delivered

Check Moodle outgoing mail, event/template enabled state, template status, queue row, next-attempt time, immutable delivery log, suppression category and cron. Use `test_emails.php` with a test account. For Slack/Teams, verify endpoint, secret and channel enabled state without exposing them.

## Product missing from catalogue

Check Moodle course visibility, product status/visibility, active price window, inventory, merchandising dates, category mapping, widget filters and viewer capability. Do not create a duplicate product before locating the failed condition.

## Site root does not open the storefront

Two settings are required, both on **Site administration → Appearance → Navigation**: **Enable Home** (`enablemyhome`) ticked, and **Start page for users** (`defaulthomepage`) set to **Modern Commerce storefront**. `enablemyhome` is off by default on a fresh Moodle 5.x site, and while it is off Moodle core redirects anonymous visitors away from the site root before the storefront redirect runs. The signature of that missed step is a store that opens correctly for logged-in users but shows the login page to everyone else. If the storefront option is absent from the dropdown, purge caches: the hook that contributes it is cached. See [Storefront & widgets](/{{route}}/{{version}}/modern-commerce/storefront#homepage).

## Stale layout, label or branding

Purge Moodle caches and browser/CDN caches after verifying the saved value. Run the design-system build check if deployed CSS differs from source. Confirm the active Moodle theme is not overriding commerce styles.

## reCAPTCHA failure

Confirm both Moodle core keys, permitted production domain, outbound verification access and `g-recaptcha-response`. Privacy extensions or content security policy can prevent the browser script from loading.

## Webhook rejected or repeated

Confirm the public HTTPS endpoint, gateway mode, configured signing secret, signature algorithm, provider event identifier, and optional IP allow-list. Inspect both the webhook intake ledger and normalized payment-event ledger. Provider retries are normal: processing must be idempotent and must not create a second fulfilment. Do not delete failed or duplicate events merely to make the ledger look clean.

After changing webhook settings, purge Moodle caches and send a provider test event where available. Redact secrets and buyer data before sharing evidence.

## Cron task not progressing

Run Moodle cron from the Moodle root and inspect individual scheduled-task results:

```bash
php admin/cli/cron.php
```

A successful cron process can still contain one failed task. Check the task's last/next run, failure output, lock state, queue eligibility time, retry/backoff state, and PHP memory/runtime limits. Use the scheduled-task administration page for a controlled manual run; do not run payment or subscription tasks concurrently against production without understanding their locking and idempotency behavior.

## Frontend or generated assets are stale

Verify the saved value first, then check source and generated assets:

```bash
node local/moderncommerce/styles/tools/build-design-system.mjs --check
php admin/cli/purge_caches.php
```

Also clear browser/CDN caches and confirm the active Moodle theme is not overriding ModernCommerce CSS. If TypeScript/React or AMD source changed, rebuild the corresponding Moodle assets before concluding that the PHP change failed.

## Demo data or documentation checks fail

Use `demo_data.php --audit` as an inventory signal. Empty tables can be normal on a new store. Seed, refresh, and reset commands are development/staging tools and may remove scoped commerce data; do not use destructive modes on production.

Run the documentation and focused source checks from the plugin directory:

```bash
composer run mc:docs-check
composer run mc:check-fast
```

Capture the exact command, current plugin release/build, Moodle/PHP versions, environment, and redacted output when escalating.

## Escalation package

Provide redacted ledger rows, scheduled-task output, exact route/action, expected/actual result and reproduction steps. Never include secret keys, webhook signing secrets, full raw payload personal data, passwords or card information.
