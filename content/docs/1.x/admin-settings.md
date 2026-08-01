# Modern Commerce — Admin Settings Reference

---

Modern Commerce settings live in two places that write to the same config store:

- **Modern Commerce → Settings** (`/local/moderncommerce/admin/settings.php`) — day-to-day store configuration.
- **Site administration → Plugins → Local plugins → Modern Commerce** — Moodle's native pages for deeper configuration (webhook security, delivery channels, branding seeds, subscription defaults).

Changing a shared setting in either place updates the same value. Settings require Moodle site-config access (`moodle/site:config`) or the equivalent Modern Commerce capability.

- [Store identity](#identity)
- [Currency](#currency)
- [Tax & documents](#tax)
- [Checkout fields](#checkout)
- [Reviews & product form](#reviews)
- [Navigation](#navigation)
- [Notification display](#notify-display)
- [Payment gateways & webhook security](#gateways)
- [Notification delivery (Slack/Teams)](#delivery)
- [Branding](#branding)
- [Subscription settings](#subscriptions)
- [Recommended setup order](#order)

<a name="identity"></a>
## Store identity

| Setting | Controls |
|---|---|
| Business name | Store name in receipts, support messaging, and summaries. Falls back to the site name. |
| Support email | Support mailbox shown in commerce messages. |
| Support URL | Optional buyer-facing help URL. |

<a name="currency"></a>
## Currency

Set this **before** creating production prices; it affects product cards, checkout, invoices, receipts, and reports.

| Setting | Controls |
|---|---|
| Primary currency | The single active store currency. Default **NGN**. Chosen from **21 supported currencies** (NGN, USD, EUR, GBP, ZAR, GHS, KES, UGX, TZS, XOF, XAF, EGP, MAD, CAD, AUD, INR, CNY, JPY, BRL, CHF, SGD). |
| Currency position | Symbol/code before or after the amount. Default `before`. |
| Decimal places | 0–6. Default `2`. |
| Thousand separator | Default comma. |
| Decimal separator | Default period; cannot equal the thousand separator. |

> {warning} Modern Commerce is **single-currency** — one active currency at a time, not simultaneous multi-currency. Changing it after orders exist makes reports harder to compare.

<a name="tax"></a>
## Tax & documents

| Setting | Controls |
|---|---|
| Tax mode | `disabled` (no site tax) or `exclusive` (tax added on top of price). |
| Default tax rate | Site-wide percentage, 0–100. |
| Invoice prefix | Invoice number prefix. Default `INV`. |
| Receipt prefix | Receipt number prefix. Default `RCPT`. |

Set document prefixes before your first production transaction.

<a name="checkout"></a>
## Checkout fields

A master **Collect contact information** toggle (off by default) enables extra checkout fields — phone, address, city, state/province, country, ZIP/postal code. Each field is `hidden`, `optional`, or `required`. Keep fields hidden unless you have a real fulfilment, invoice, tax, or support reason to collect them.

<a name="reviews"></a>
## Reviews & product form

| Setting | Controls |
|---|---|
| Enable reviews | Product/course review display and submission. Default on. |
| Show SKU field | Show SKU on product forms. Default off (SKUs auto-managed). |
| Show slug field | Show slug on product forms. Default off (slugs auto-generated). |
| Course detail sidebar position | Purchase sidebar on `right` (default) or `left` on desktop. |

<a name="navigation"></a>
## Navigation

| Setting | Controls |
|---|---|
| Admin navigation label | Label for the manager/admin entry. |
| Learner navigation label | Label for learner-facing commerce navigation. |
| Hidden primary navigation items | Optionally hide Home, Dashboard, My courses, Site administration. |
| Cart position | Cart icon `first` (default) or `last` in the top-right user nav. |

> {warning} Navigation and branding changes can be masked by theme caching. Purge Moodle caches if a change doesn't appear.

<a name="notify-display"></a>
## Notification display

| Setting | Controls |
|---|---|
| Notification position | Screen corner for toast messages. Default `top-right`. |
| Auto-dismiss delay | Milliseconds before a toast closes. Default `4000`; `0` = stay until dismissed. |

This is on-screen toast behavior only — delivery channels are configured below.

<a name="gateways"></a>
## Payment gateways & webhook security

Gateway credentials and gateway-specific webhook setup are managed at `/local/moderncommerce/admin/gateways.php` and `/local/moderncommerce/admin/webhooks.php`, not in a settings text field. Webhook security settings:

| Setting | Controls |
|---|---|
| Enable webhook IP whitelist | Webhook IP allow-listing where the gateway supports it. Default on. |
| Payment max retries | Retry attempts for payment workflows. Default `3` (0–10). |

> {danger} Never place live gateway secrets in documentation, screenshots, or tickets. IP allow-listing supplements, but does not replace, signature verification. See [Payments](/{{route}}/{{version}}/modern-commerce/payments).

<a name="delivery"></a>
## Notification delivery (Slack/Teams)

| Setting | Controls |
|---|---|
| Notification batch size | Queued records processed per batch. Default `100`. |
| Slack enabled / webhook URL / signing secret | Slack delivery for operational notifications. |
| Teams enabled / webhook URL / signing secret | Microsoft Teams delivery for operational notifications. |

Keep webhook URLs and secrets private; rotate if exposed.

<a name="branding"></a>
## Branding

Branding seeds generate runtime CSS variables across admin, storefront, learner, and public pages: **Primary**, **Secondary**, **Accent**, **Surface**, **Text**, **Link**, **Muted** colors, base **Radius**, and an advanced **Custom CSS** field for small overrides. See [Storefront](/{{route}}/{{version}}/modern-commerce/storefront).

<a name="subscriptions"></a>
## Subscription settings

Under **Site administration → Plugins → Local plugins → Modern Commerce → Subscriptions**:

| Setting | Controls |
|---|---|
| Activation summary email | Send on activation. Default on. |
| Renewal digest email | Send renewal digests. Default on. |
| Reminder days | Days before expiry to remind. Default `7,3,1`. |
| History retention days | Keep subscription history. Default `730`. |
| Cleanup old subscriptions | Prune old records per retention. Default off. |
| Keep deleted user history | Keep history when a user is deleted. Default on. |
| Plan change cooldown | Days before another change. Default `30`. |
| Allow lateral moves | Same-level plan moves. Default on. |
| Store downgrade credit | Credit on downgrade. Default on. |
| Cancel mode | `immediate` or `end_of_period` (default). |
| Allow user cancel | Self-service cancellation. Default on. |
| Enable trials | Trial behavior. Default on. |
| Trial auto convert | Auto-convert trials. Default off. |

Configure these before selling subscription products. See [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions).

<a name="order"></a>
## Recommended setup order

1. Store identity.
2. Currency (before creating prices).
3. Tax (before opening checkout).
4. Gateway credentials and webhooks.
5. Checkout fields (only if needed).
6. Document prefixes (before the first invoice/receipt).
7. Navigation labels and cart position.
8. Contact autoreply (test buyer + admin messages).
9. Moodle core reCAPTCHA keys (if public forms are exposed).
10. Course detail sidebar position.
11. Notification delivery (Slack/Teams) if used.
12. Subscription settings (before selling plans).

## Where to go next

- [Installation](/{{route}}/{{version}}/modern-commerce/installation)
- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
- [Notifications](/{{route}}/{{version}}/modern-commerce/notifications)
