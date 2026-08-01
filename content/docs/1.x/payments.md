# Modern Commerce — Payments

---

- [How payments work](#how)
- [The four gateways](#gateways)
- [Keys, secrets & test vs live](#keys)
- [Webhooks & IP whitelist](#webhooks)
- [Currency](#currency)
- [Tax](#tax)
- [Refunds](#refunds)
- [Go-live checklist](#checklist)
- [Diagnostics](#diagnostics)

<a name="how"></a>
## How payments work

At checkout, Modern Commerce creates an order and sends the buyer to their chosen payment gateway. **Card details are captured on the gateway, never in Moodle.** The gateway returns a callback and — asynchronously — a signed **webhook** that confirms the payment; that confirmation triggers fulfilment (enrolment, key redemption, or subscription activation).

> {warning} There is **no sale until at least one gateway is configured.** Configure gateways in Moodle admin, never in source files.

<a name="gateways"></a>
## The four gateways

Modern Commerce supports four gateways, each using **your own merchant account**:

- **Stripe**
- **PayPal**
- **Paystack**
- **Flutterwave**

Configure them at **`/local/moderncommerce/admin/gateways.php`**. Each gateway has matching payment entry points:

- `/local/moderncommerce/payment/{gateway}_init.php`
- `/local/moderncommerce/payment/{gateway}_callback.php`
- `/local/moderncommerce/payment/{gateway}_webhook.php`

<a name="keys"></a>
## Keys, secrets & test vs live

For each gateway you supply the API keys/secrets from that provider's dashboard. Start every integration in the gateway's **test/sandbox** mode, verify the full flow, then switch to **live** keys.

> {danger} Never place live gateway secrets in documentation, commits, screenshots, or support tickets. Store them only through the gateway admin and Moodle's configuration storage.

<a name="webhooks"></a>
## Webhooks & IP whitelist

Webhooks confirm payments reliably even if the buyer closes the browser. Set the webhook URL for each gateway in **its provider dashboard**, pointing at the matching `{gateway}_webhook.php` on your **HTTPS** site, and use the gateway's **signing secret** where supported.

Modern Commerce adds an optional **webhook IP whitelist** (enabled by default) and a **payment max-retries** setting — configured under the native plugin settings, see [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings). IP allow-listing is an extra control, not a replacement for signature verification.

Monitor webhook and gateway lifecycle events from:

- `/local/moderncommerce/admin/webhooks.php` — webhook status.
- `/local/moderncommerce/admin/webhook_events.php` — webhook event log.
- `/local/moderncommerce/admin/payment_events.php` — gateway lifecycle events.

> {warning} A common webhook failure is an **environment mismatch** — the production gateway pointing at a staging URL (or vice versa), or a mismatched secret. Confirm each environment's gateway points at the matching Moodle URL.

<a name="currency"></a>
## Currency

Modern Commerce is **single-currency**: one active store currency at a time, chosen from **21 supported currencies** (default **NGN**). It is not simultaneous multi-currency. Set the currency, symbol position, and decimal formatting in Settings **before** creating production prices — changing it after orders exist makes old and new reports harder to compare.

<a name="tax"></a>
## Tax

Tax is a simple site-wide setting: **Tax mode** (`disabled` or `exclusive`) plus a **default tax rate** (0–100%). `exclusive` adds tax on top of the configured price. Region-specific tax rules are out of scope for this flat field. Set tax before opening checkout.

<a name="refunds"></a>
## Refunds

Refunds are managed from the order/admin workflows (see [Orders, Invoices & Refunds](/{{route}}/{{version}}/modern-commerce/orders-invoices-refunds)). Actual gateway behavior depends on the gateway and its configuration — a refund needs a payment attempt with a provider transaction ID, and the gateway must support refunds for that payment.

<a name="checklist"></a>
## Go-live checklist

- Use **HTTPS**.
- Configure gateway credentials in Moodle admin (not in source).
- Configure webhook URLs in each gateway dashboard and set signing secrets.
- Test **successful payment, failed payment, cancelled checkout, refund, and duplicate webhook delivery**.
- Confirm **Moodle cron** is running so asynchronous follow-up tasks process.

<a name="diagnostics"></a>
## Diagnostics

If payment status isn't updating: confirm HTTPS and the callback/webhook URLs, check `payment_events.php` and `webhook_events.php`, confirm cron is running, and verify gateway credentials and signing secrets. For sensitive logs, redact customer and gateway data before sharing outside operations. The `/local/moderncommerce/admin/audit_log.php` records the underlying commerce events.

## Where to go next

- [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions)
- [Orders, Invoices & Refunds](/{{route}}/{{version}}/modern-commerce/orders-invoices-refunds)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
