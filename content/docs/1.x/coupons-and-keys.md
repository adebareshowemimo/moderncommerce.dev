# Modern Commerce — Coupons & Keys

---

- [Coupons](#coupons)
- [Enrolment keys](#keys)
- [Subscription keys](#subkeys)
- [Redeeming](#redeem)
- [Maintenance](#maintenance)

<a name="coupons"></a>
## Coupons

Coupons drive promotions and discounts at checkout. Manage them at **`/local/moderncommerce/admin/coupons.php`**.

- Use **targets** to limit a coupon to a specific product, bundle, category, or supported target type.
- Use **usage records** to audit who redeemed a coupon and when.

Coupon behavior (codes, minimum spend, expiry, discount percent) surfaces in emails through tokens such as `{coupon_code}`, `{coupon_expiry}`, `{coupon_min_spend}`, and `{discount_percent}` — see [Notifications](/{{route}}/{{version}}/modern-commerce/notifications).

<a name="keys"></a>
## Enrolment keys

**Enrolment keys** grant access without an online payment. They're ideal for:

- prepaid course access,
- bulk corporate/team sales,
- offline payment workflows,
- support-assisted enrolment.

Manage them at:

- `/local/moderncommerce/admin/keys.php` — keys overview.
- `/local/moderncommerce/admin/course_keys.php` — course keys.
- `/local/moderncommerce/admin/bundle_keys.php` — bundle/program keys.

Generating keys requires the `local/moderncommerce:generatekeys` capability. Key-related email tokens include `{key_code}`, `{key_count}`, `{seats_total}`, `{seats_used}`, and `{seats_remaining}`.

<a name="subkeys"></a>
## Subscription keys

**Subscription keys** activate a subscription plan without going through online checkout — the recurring-access equivalent of enrolment keys. Manage them at `/local/moderncommerce/admin/subscription_keys.php`. See [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions).

<a name="redeem"></a>
## Redeeming

Buyers redeem keys from public routes:

- `/local/moderncommerce/redeem.php` — redeem a single key.
- `/local/moderncommerce/redeem_bundle.php` — redeem a bundle/program key.
- `/local/moderncommerce/redeem_multiple.php` — redeem multiple keys.

> {primary} Corporate/team scenario: sell a block of enrolment keys, hand them to the customer, and let their learners self-redeem. Seat counts and usage are tracked automatically.

<a name="maintenance"></a>
## Maintenance

Expired keys are cleaned up automatically — the `expire_keys` scheduled task runs every six hours (at minute 30). This runs on Moodle cron, so keep cron running in production.

## Where to go next

- [Products & Pricing](/{{route}}/{{version}}/modern-commerce/products-and-pricing)
- [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions)
- [Orders, Invoices & Refunds](/{{route}}/{{version}}/modern-commerce/orders-invoices-refunds)
