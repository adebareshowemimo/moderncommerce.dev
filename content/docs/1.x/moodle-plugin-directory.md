# Moodle Plugins Directory checklist

Use this checklist before submitting or updating ModernCommerce in the Moodle Plugins Directory. It complements the normal release checks with Moodle-specific metadata, packaging, security, privacy, and user-experience review.

## Metadata

- Component remains `local_moderncommerce` and the installed directory remains `local/moderncommerce`.
- `$plugin->requires`, `$plugin->supported`, `$plugin->maturity`, `$plugin->release`, and `$plugin->version` are correct.
- `composer.json` declares GPL-3.0-or-later and all runtime dependencies.
- `README.md` explains requirements, installation, first run, licensing, and the public documentation entry point.
- `thirdpartylibs.xml` lists bundled third-party libraries, including bundled frontend assets and production Composer dependencies where required.
- Release notes describe administrator-visible, API, schema, task, capability, and compatibility changes.

## Package contents

- Exactly one top-level `moderncommerce/` directory.
- No `.git/`, `.github/`, `releases/`, `node_modules/`, local environment files, caches, test output, or nested release archives.
- Production Composer dependencies included with `--no-dev` and optimized autoloading.
- AMD, React, and CSS artifacts current.
- No credentials, provider payloads, test customer information, or personal data.

Build and inspect the archive using [Release packaging](/{{route}}/{{version}}/modern-commerce/release-packaging).

## Code quality

```bash
git diff --check
composer run mc:docs-check
composer run mc:check-fast
composer run mc:check
```

Reviewers commonly verify Moodle GPL headers, Moodle coding standards, prefixed global functions, guarded script access, complete language strings, no development debug output, and correct use of Moodle output, navigation, database, file, task, privacy, and external-service APIs.

## Security and privacy

- External functions validate declared parameters and repeat context/capability validation in their implementation.
- Administrative writes require the least-privilege capability from `db/access.php`.
- Public services expose only intentional catalogue, form, or review data.
- Payment returns and webhooks verify signatures and provider payloads before state changes.
- Inputs use specific Moodle parameter types; raw payloads are limited to intentional provider or rich-content boundaries.
- File uploads validate context, component, file area, item, capability, type, and size.
- The privacy provider declares every stored user-data area and every relevant external transfer.
- Logs and diagnostics redact secrets and personal/payment data.

## Database, tasks, and APIs

- Fresh installation works from `db/install.xml`.
- Each released schema change upgrades safely through `db/upgrade.php`.
- Scheduled tasks in `db/tasks.php` have documented schedules, bounded work, meaningful failure behavior, and no interactive assumptions.
- Capabilities in `db/access.php` are documented and assigned at the correct context.
- Functions in `db/services.php` are treated as supported API surface and tested for authorization and parameter validation.
- Optional add-on integrations remain hidden or render an add-on-required state when the component is unavailable.

## User experience

- Catalogue, detail, cart, checkout, learner, and administration pages work on mobile and keyboard navigation.
- Empty states work without seeded demo data.
- Storefront widgets are previewable before publication.
- Destructive CLI/demo operations are explicitly marked and confirmation-protected.
- Errors tell an administrator what to check next without exposing internals or secrets.
- Installation, cron, payment, notification, and enrolment verification steps are reproducible.

## Submission evidence

Prepare the release archive, release notes, requirements and installation links, privacy/security notes, and screenshots of the catalogue, course detail, checkout, admin dashboard, widget gallery, learner account, payments, and subscriptions. Include concise test notes covering Moodle upgrade, cron, payment sandbox flow, webhook reconciliation, notification delivery, entitlement/enrolment, and uninstall/privacy behavior.
