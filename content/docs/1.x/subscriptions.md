# Modern Commerce — Subscriptions

---

- [What subscriptions do](#what)
- [Create a plan](#plan)
- [Trials](#trials)
- [Renewals, grace & expiry](#renewals)
- [Plan changes](#changes)
- [Access sync](#access)
- [Subscription keys](#keys)
- [Lifecycle emails](#emails)

<a name="what"></a>
## What subscriptions do

Modern Commerce includes a full subscription subsystem for recurring access: plans, a plan feature matrix, plan access rules, subscription keys, lifecycle emails, and subscription reports. Buyers subscribe at `/local/moderncommerce/subscribe.php` and manage their subscription from the learner dashboard (`/local/moderncommerce/learner/index.php#/subscriptions`).

Admin pages:

- `/local/moderncommerce/admin/subscriptions.php` — plans and subscriptions.
- `/local/moderncommerce/admin/subscription_features.php` — feature matrix.
- `/local/moderncommerce/admin/subscription_plan_access.php?id=ID` — access rules for a plan.
- `/local/moderncommerce/admin/subscription_subscribers.php` — subscribers.
- `/local/moderncommerce/admin/subscription_keys.php` — subscription keys.
- `/local/moderncommerce/admin/subscription_emails.php` — lifecycle emails.

<a name="plan"></a>
## Create a plan

1. Create a plan.
2. Set **billing cycle**, **price**, **trial days**, **grace period**, and **status**.
3. Configure **feature matrix** entries.
4. Add **access rules** for courses, categories, or bundles.
5. Preview the public subscribe flow.
6. Test activation and access sync with a real account.

> {warning} Configure subscription **lifecycle emails** and **subscription settings** before selling subscription products — see [Notifications](/{{route}}/{{version}}/modern-commerce/notifications) and [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings).

<a name="trials"></a>
## Trials

Trials are controlled globally (enable trials, optional trial auto-convert) and per plan (trial days). A scheduled task processes trial expirations daily. When auto-convert is off, a trial does not automatically become a paid subscription.

<a name="renewals"></a>
## Renewals, grace & expiry

Recurring payments, expiry reminders, grace periods, and expiry are all handled on cron:

- **Expiry reminders** go out on the configured reminder days (default `7,3,1`).
- On expiry, a subscription moves to **grace** or **suspended** per your settings.
- **Recurring payments** are processed by a daily task.

> {warning} All of this runs on **Moodle cron**. If cron isn't running every minute in production, renewals, reminders, and expiries won't fire. See [Requirements](/{{route}}/{{version}}/modern-commerce/requirements).

<a name="changes"></a>
## Plan changes

Plan changes respect a **cooldown** (default 30 days), optional **lateral moves** between same-level plans, and **downgrade credit**. A **cancel mode** controls whether cancellation is `immediate` or `end_of_period` (default), and whether learners may cancel their own subscription. Scheduled plan changes are applied by a daily task. Configure these under **Subscription Settings** in the native plugin settings.

<a name="access"></a>
## Access sync

Access granted by a subscription is reconciled against Moodle enrolment by a **sync-access** task (every 6 hours) plus the expiry/renewal tasks. If a subscriber can't reach expected courses, check the user subscription status, the plan access rules, subscription key usage, and let the sync/expiry tasks run. See [Reports & Analytics](/{{route}}/{{version}}/modern-commerce/reports-and-analytics) for the full task list.

<a name="keys"></a>
## Subscription keys

Use **subscription keys** when a learner should activate a plan without going through online checkout — for example prepaid or corporate activation. Manage them at `/local/moderncommerce/admin/subscription_keys.php`. See [Coupons & Keys](/{{route}}/{{version}}/modern-commerce/coupons-and-keys).

<a name="emails"></a>
## Lifecycle emails

Subscription lifecycle emails cover activation, renewal, expiring, grace period, expired, cancelled, and payment failed. Each can be enabled/disabled, mapped to a reusable template, or given a custom subject/body at `/local/moderncommerce/admin/subscription_emails.php`. See [Notifications](/{{route}}/{{version}}/modern-commerce/notifications).

## Where to go next

- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
- [Coupons & Keys](/{{route}}/{{version}}/modern-commerce/coupons-and-keys)
- [Notifications](/{{route}}/{{version}}/modern-commerce/notifications)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
