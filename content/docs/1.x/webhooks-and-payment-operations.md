# Webhooks & payment operations

ModernCommerce supports Stripe, PayPal, Paystack and Flutterwave. Each integration implements initialization, return verification, webhook processing, readiness checks and supported-currency reporting through the common gateway interface.

## Configure the registry

Use `/local/moderncommerce/admin/gateways.php` with `local/moderncommerce:configuregateways`. Gateway records can hold an enabled flag, test mode, public/publishable key, merchant or client ID, secret key, webhook secret, webhook support and supported currencies. Secret fields are write-only in the save workflow: submitting them blank preserves the stored value.

Enable a gateway only after its required credentials are present. PayPal requires client ID and secret; Stripe, Paystack and Flutterwave require the appropriate secret key. Use test mode until a complete sandbox purchase succeeds.

## Readiness checks

At checkout, ModernCommerce evaluates gateway existence, enabled state, credential readiness, store currency support, order currency support, order/store currency equality and valid amount. A gateway that is enabled in the admin can still be unavailable for a particular order.

## Webhook endpoints

Each gateway has a dedicated endpoint under `/local/moderncommerce/payment/`, for example `stripe_webhook.php`, as well as the normalized payment entry points. Configure the exact HTTPS URL shown for the active Moodle base URL in the provider dashboard.

Gateway implementations verify provider-specific signatures/secrets. Stripe requires a signing secret and validates its signature header and timestamped payload. Flutterwave validates the configured secret hash/header. PayPal verifies its webhook signature using provider data. IP allow-listing, when enabled and supported, is an additional control—not a substitute for signatures.

## Ledgers

Use these pages for different evidence:

| Page | Evidence |
| --- | --- |
| `/admin/payment_events.php` | Payment lifecycle events tied to orders/attempts |
| `/admin/webhook_events.php` | Received webhook ledger and processing result |
| `/admin/audit_log.php` | Administrative and business audit activity |
| `/admin/order_view.php?id=ID` | One order's commercial state and actions |

The tables `payment_attempts`, `payment_events`, `webhook_events` and `payment_log` serve different diagnostic purposes. Do not delete duplicate or failed events merely to make the list look clean; they are operational evidence.

## Idempotency and reconciliation

Returns and webhooks can arrive in either order and providers can retry events. Processing must locate the existing order/payment attempt by stable order or gateway references and avoid fulfilling twice. When investigating:

1. compare provider event ID/reference;
2. confirm the order number and internal order ID;
3. compare amount and currency snapshots;
4. inspect attempt and event status/error;
5. inspect entitlement/fulfilment records;
6. compare the provider dashboard before taking a manual action.

## Production cutover

Move credentials, mode and webhook URL together. Send a provider test event where available, then complete a low-risk live transaction and refund. Never place secret values in screenshots, chat, source control or public documentation.
