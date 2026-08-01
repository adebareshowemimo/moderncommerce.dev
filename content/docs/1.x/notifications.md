# Modern Commerce — Notifications

---

- [How notifications work](#how)
- [The notification queue](#queue)
- [Email templates & outgoing events](#email)
- [Placeholders](#placeholders)
- [Slack & Teams](#channels)
- [Digests, recovery & reminders](#automation)
- [Contact & newsletter](#contact)
- [Testing & go-live](#test)

<a name="how"></a>
## How notifications work

Modern Commerce sends transactional, reminder, dunning, celebratory, marketing, and operational messages. Buyer emails go by email; operational alerts can also go to Slack and Teams. Everything is queued and drained on cron, so sending never blocks a page load.

Admin pages:

- `/local/moderncommerce/admin/email_templates.php` — template library and outgoing email controls.
- `/local/moderncommerce/admin/notifications.php` — queue, operational settings, delivery checks.
- `/local/moderncommerce/admin/contact_emails.php` — contact autoreply and staff notification.
- `/local/moderncommerce/admin/subscription_emails.php` — subscription lifecycle emails.

<a name="queue"></a>
## The notification queue

Notifications are written to a **queue** and processed by scheduled tasks that drain the queue every minute, requeue stale rows, process digests, and scan daily for reminders. Because it's cron-driven, keep Moodle cron running every minute in production.

<a name="email"></a>
## Email templates & outgoing events

Two related surfaces work together inside `email_templates.php`:

- **Template library** — reusable branded content. Each template has a name, stable key, type (`transactional`, `reminder`, `dunning`, `celebratory`, `marketing`, `operational`), status, subject, and body. Bundled templates are protected — **clone** one before customizing.
- **Outgoing email events** — the actual commerce events (order confirmation, receipt, enrolment, refund, etc.). For each event you enable/disable it, pick a reusable template, and optionally override subject/body.

> {primary} Only `marketing` templates are marketing-suppressible; keep transactional emails active. Marketing emails should include `{unsubscribe_url}`.

Editing templates requires `local/moderncommerce:manageemailtemplates`; keep this limited to trusted admins since templates contain HTML and links buyers receive.

<a name="placeholders"></a>
## Placeholders

Use single-brace tokens, e.g. `Hi {firstname}, your order {order_number} is confirmed.` (Legacy `{{double-brace}}` tokens are normalized automatically.) Values are HTML-escaped; unknown tokens are left visible so gaps show during preview. Global tokens include `{sitename}`, `{siteurl}`, `{supportemail}`, `{logo}`, and `{logo_compact}`; there are dedicated palettes for user, course, order, coupon, refund, access, subscription, invoice, keys, marketing, and operations data. Use the placeholder chips shown by each event editor as the safe source for that event.

<a name="channels"></a>
## Slack & Teams

Operational alerts can also be delivered to **Slack** and **Microsoft Teams** via incoming webhooks. Enable each channel and paste its webhook URL (and signing secret where applicable) in the native plugin settings under **Notification Delivery**. See [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings).

> {danger} Keep webhook URLs and secrets private, and rotate them if exposed.

<a name="automation"></a>
## Digests, recovery & reminders

Several automated flows run on cron:

- **Abandoned-cart recovery** — an hourly task sends recovery notifications for carts left at checkout.
- **Payment reminders** — sent twice daily for unpaid orders.
- **Notification digests** — batched daily.
- **Daily scan** — dispatches invoice/admin notification scans.

<a name="contact"></a>
## Contact & newsletter

Public contact submissions and newsletter signups are stored and manageable from the admin (`contacts.php`, `newsletter_subscribers.php`). Contact emails support an **autoreply** to the sender and an **admin notification** to staff, each with its own template or custom override. Note that newsletter signup storage is separate from marketing suppression — marketing templates should still carry `{unsubscribe_url}`.

<a name="test"></a>
## Testing & go-live

Send test emails to check branding, shell, and global placeholders:

```bash
php local/moderncommerce/cli/test_emails.php
php local/moderncommerce/cli/test_emails.php --userid=ID
```

Go-live essentials: confirm Moodle SMTP works; set business name and support email; review/clone bundled templates; keep transactional emails on and marketing off until consent and unsubscribe behavior are verified; configure contact and subscription emails; then complete a sandbox purchase and verify each message.

## Where to go next

- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
- [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions)
- [Reports & Analytics](/{{route}}/{{version}}/modern-commerce/reports-and-analytics)
