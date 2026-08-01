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

## Stale layout, label or branding

Purge Moodle caches and browser/CDN caches after verifying the saved value. Run the design-system build check if deployed CSS differs from source. Confirm the active Moodle theme is not overriding commerce styles.

## reCAPTCHA failure

Confirm both Moodle core keys, permitted production domain, outbound verification access and `g-recaptcha-response`. Privacy extensions or content security policy can prevent the browser script from loading.

## Escalation package

Provide redacted ledger rows, scheduled-task output, exact route/action, expected/actual result and reproduction steps. Never include secret keys, webhook signing secrets, full raw payload personal data, passwords or card information.
