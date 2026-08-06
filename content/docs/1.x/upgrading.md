# Upgrade & release compatibility

This documentation targets ModernCommerce **2.1.8**, the stable release declared in the audited `version.php` (`2026080500`). That release declares Moodle **5.2 only** in its supported range and requires the Moodle 5.2 build `2026042000` or later. Composer requires **PHP 8.3 or later**.

> Check the `version.php`, `composer.json`, and `LICENSE` shipped in the package you are actually installing. Those files are authoritative when a README or older document shows a different release number or licence statement.

## Before upgrading

1. Back up the Moodle database and `moodledata`.
2. Record the installed ModernCommerce version and active payment gateways.
3. Export or securely record gateway and webhook configuration without placing secrets in tickets or documentation.
4. Confirm the target Moodle and PHP versions satisfy the package metadata.
5. Confirm Moodle cron is healthy and no long-running payment, notification, or subscription task is failing.
6. Test the upgrade against a copy of production data when the store processes live revenue.

Do not delete the old plugin directory and leave the site running between steps. Moodle may execute callbacks, cron, or navigation hooks during that gap.

## Upgrade procedure

From the Moodle root:

```bash
php admin/cli/maintenance.php --enable
```

Replace `local/moderncommerce` with the new package, then install its PHP dependencies inside the plugin directory:

```bash
cd local/moderncommerce
composer install --no-dev --optimize-autoloader
cd ../..
php admin/cli/upgrade.php --non-interactive
php admin/cli/purge_caches.php
php admin/cli/maintenance.php --disable
```

If the deployment platform builds artefacts elsewhere, run Composer during that build and deploy the resulting `vendor` directory with the plugin. Do not run a development dependency install in production.

## Post-upgrade verification

Verify more than the administration page loading:

- open the public catalogue and one course and bundle detail page;
- add and remove cart items;
- complete a sandbox payment through each enabled gateway;
- confirm the order, payment attempt, event, invoice and entitlement;
- confirm the learner is enrolled in the correct Moodle course or bundle courses;
- deliver a test transactional email;
- run Moodle cron and inspect the scheduled-task history;
- test key redemption and one subscription lifecycle action if those features are used;
- confirm custom roles still expose only their intended menu items.

## Rollback boundary

Restoring old plugin files after Moodle has applied database upgrades is not a safe rollback by itself. Restore the matching database and code backup together. Gateway callbacks received during a rollback window may need reconciliation against the provider dashboard and ModernCommerce payment-event ledger.

## Current repository discrepancies

The audited source contains stale prose in its root README and some internal docs: they cite earlier releases, and the README includes a proprietary-licence paragraph. The package's actual `LICENSE`, Composer licence, file headers, and language text declare GPL-3.0-or-later. This website follows the executable/package metadata and does not reproduce the stale statements.
