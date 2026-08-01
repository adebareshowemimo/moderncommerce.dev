# Privacy & security

ModernCommerce implements a Moodle privacy provider and declares its external data transfers. Security still depends on correct Moodle, web server, gateway and staff configuration.

## Personal data

The plugin can store buyer identity and billing profiles, carts, orders, addresses, invoices, refunds, entitlements, key usage, reviews/reactions, wishlist items, contact messages/replies, newsletter subscriptions, notification identities/suppression, and subscription records.

Use Moodle's standard privacy tools for metadata, user export, deletion and user-list requests. The `user_deleted` observer performs additional cleanup according to the plugin's data rules. Subscription history retention and deleted-user-history behavior are configurable; align them with the organisation's legal/accounting obligations.

## Declared external locations

The privacy provider declares transfers to Stripe, PayPal, Paystack and Flutterwave for payment processing; outbound HTTP webhooks for configured notifications; and Google reCAPTCHA when enabled. Data fields can include identity/contact, billing/order, amount/currency and network identifiers required by the integration.

## Payment security

- Require HTTPS for production checkout, callbacks and webhooks.
- Store credentials only through authorised Moodle administration.
- Use test and live credentials in matching environments.
- Configure and verify provider webhook signatures/secrets.
- Treat IP allow-listing as defence in depth.
- Redact payment diagnostic data before sharing it.
- Never collect card numbers directly in a ModernCommerce form; card capture occurs on the payment provider flow.

## Authorization

Server-side Moodle capability checks protect pages and services. Menu visibility is not the security boundary. Assign custom roles at system context, use least privilege and test direct URLs with non-admin accounts.

## Content and communications

Email template editing and Custom CSS are trusted-administrator functions. Public contact/newsletter forms should use Moodle reCAPTCHA in production. Marketing notifications must respect suppression and unsubscribe records; transactional and operational categories have different purposes.

## Operational controls

- Back up the database and `moodledata` together.
- Restrict database and web-server log access.
- Monitor payment/webhook failures and unusual refund/key activity.
- Retain immutable audit, entitlement-event and notification-attempt evidence according to policy.
- Apply Moodle/plugin/PHP security updates through a tested release process.
- Do not install unverified add-ons merely because the navigation can integrate them.
