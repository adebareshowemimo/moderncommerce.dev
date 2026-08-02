# ModernCommerce competitive research

Reviewed: 31 July 2026

## Objective

This research compares ModernCommerce with Moodle Enrolment on Payment / PayPal, WooCommerce, LearnDash with WooCommerce, Edwiser Bridge with WooCommerce, and LearnWorlds. The products are not identical categories, so the analysis separates learning delivery, commerce, integration, hosting, governance, and ongoing operations.

## Method

ModernCommerce capabilities were verified against the current plugin source in `local_moderncommerce`, including its schema, registered external services, scheduled tasks, capabilities, role presets, admin routes, payment implementations, privacy provider, and versioned documentation. Competitor behavior was checked against official vendor documentation and current product pages. Marketplace claims were not treated as independent proof.

Pricing was reviewed in USD on 31 July 2026 and is presented with dated published figures plus cost-to-match scenarios. Tax, payment-processor fees, custom implementation, and existing Moodle operating costs are excluded. Vendor pricing, plan inclusion, and extension bundles change frequently and must be reconfirmed before procurement.

## Verified ModernCommerce baseline

The current plugin contains:

- 81 commerce-specific database tables.
- 156 registered service functions.
- 36 Moodle capabilities.
- 17 scheduled workflows.
- 12 domain event classes.
- 22 storefront widget types, including the system catalogue.
- Four gateway implementations: Stripe, PayPal, Paystack, and Flutterwave.
- Nine operational role presets.

### 1. Catalogue and merchandising

ModernCommerce models courses, bundles, programs, and subscription-related offers as sellable products. It includes regular, sale, tier, and subscription pricing; inventory and reservations; categories; tags; typed attributes; product relationships; course objectives and outlines; bundle curriculum; prerequisites; must-pass rules; merchandising metadata; and image management.

### 2. Storefront and branding

The storefront is editable inside Moodle and includes slider, video hero, breadcrumb, featured and related products, categories, trust badges, countdown, testimonials, instructors, newsletter, content, media story, learning promise, belief, policy, FAQ, CTA, support form, contact cards, footer, and catalogue widgets. Widgets have page zones, reusable presets, galleries, slides, and configuration data. Public support, policy, newsletter, catalogue, product, and learner-facing experiences do not require WordPress.

### 3. Cart, checkout, pricing, and tax

The data model separates carts, items, billing profiles, address snapshots, orders, operational order state, order items, inventory reservations, discounts, tax, fees, and other adjustments. That separation supports multi-item checkout and preserves transaction-time evidence instead of relying on mutable course metadata.

### 4. Payments and webhooks

ModernCommerce includes gateway configuration, payment attempts, payment lifecycle events, webhook intake records, redacted payment diagnostics, refund records, and item-level refund allocations. It therefore distinguishes an order from an attempt to pay, a gateway callback, an authoritative webhook, and a refund.

### 5. Fulfilment and entitlements

Successful payment can create Moodle course access while also recording item-level fulfilment, commercial ownership, and append-only entitlement lifecycle events. This is a larger operational model than simply changing a user's enrolment state.

### 6. Subscriptions

Subscription capabilities cover plan definitions, plan features, feature matrices, course-access rules, user subscriptions, lifecycle history, reminders, access reconciliation, email templates, prepaid subscription keys, key usage, and action logs. Scheduled workflows handle trials, recurring charges, expiring plans, expiry, pending changes, cleanup, and Moodle access synchronization.

### 7. Organizational distribution

Course keys, bundle keys, and subscription keys provide prepaid distribution paths. Usage ledgers and pool balances support corporate seats, cohorts, resellers, and buyers that need to distribute access after procurement. Manual invoices and billing profiles support finance-led purchasing paths.

### 8. Finance and operational support

Orders, status transitions, invoices, line items, taxes, adjustments, refunds, payment attempts, gateway events, webhooks, fulfilment, entitlements, and immutable audit entries can be inspected as separate evidence. This reduces the time required to answer whether a buyer paid, whether the webhook arrived, what was granted, and what was later refunded or revoked.

### 9. Notifications and recovery

The notification subsystem includes an outbox, delivery-attempt log, digests, Slack and Teams identities, suppression records, email templates, contact conversations, and newsletter leads. Channels include email, Moodle messages, Slack, Teams, and outbound HTTP. Scheduled work includes abandoned-cart recovery, payment reminders, digest processing, stale-job recovery, and queued delivery.

### 10. Learner self-service

Learners can access purchased courses, grades, certificates, orders, invoices, subscriptions, entitlement status, wishlists, profiles, and access keys in the Moodle experience. Course reviews and reactions are also part of the commerce experience.

### 11. Reporting

ModernCommerce maintains daily, product, and gateway reporting snapshots and exposes revenue, conversion, order, product, customer, subscription, and gateway information through configurable dashboard and reporting services.

### 12. Governance, privacy, and extension

Thirty-six capabilities allow responsibility to be divided between commerce administration, finance, products, storefront, marketing, support, subscriptions, reporting, and payment operations. Nine presets package those capabilities into usable roles. The plugin implements the Moodle Privacy API and exposes 156 registered services. Optional add-ons can own their own tables, capabilities, tasks, and services while ModernCommerce safely gates navigation and UI calls when an add-on is absent.

## Competitor analysis

### Moodle Enrolment on Payment / PayPal

Moodle's payment enrolment is the closest zero-additional-platform baseline. It is effective when the requirement is simply “pay a fee and enter this course.” Moodle documents payment accounts, gateways, and course-level enrolment instances. It is not documented as a catalogue, cart, bundle, subscription, invoice, refund, promotion, B2B-seat, or commerce-operations system. Moodle recommends Enrolment on Payment over the older PayPal enrolment method because it can support multiple payment gateways.

Sources:

- https://docs.moodle.org/502/en/Enrolments
- https://docs.moodle.org/401/en/Enrolment_on_payment
- https://docs.moodle.org/401/en/Payment_gateways

### WooCommerce

WooCommerce is the strongest general ecommerce engine in the comparison. Its advantages include open-source core, a large gateway and extension ecosystem, mature product/order/coupon/tax/refund concepts, themes, blocks, accounts, and analytics. Its limitation in this decision is categorical: WooCommerce does not deliver Moodle learning or understand Moodle enrolments without a connector. Recurring billing is provided by the separate WooCommerce Subscriptions product. Invoices, recovery, memberships, learning access, and other requirements may involve more extensions.

Sources:

- https://developer.woocommerce.com/docs
- https://woocommerce.com/document/woocommerce-analytics/
- https://woocommerce.com/products/woocommerce-subscriptions/

### LearnDash with WooCommerce

LearnDash is a WordPress LMS, so this stack keeps learning and commerce in one WordPress application. The official WooCommerce integration maps products to courses and groups and can regulate access when subscriptions expire if WooCommerce Subscriptions is installed. LearnDash also has native Buy Now and Recurring access modes, groups, reporting, coupons, and payment integrations. Organizations can sell seats through additional Groups Plus / Group Registration tooling. This is a strong option when WordPress is the selected LMS, but it does not preserve Moodle as the learning system of record.

Important qualifications from official documentation:

- LearnDash's native payment flow does not yet provide multi-course cart behavior; its payments documentation describes future support for buying multiple courses/groups.
- Native LearnDash refunds are issued in the gateway and do not automatically remove course access.
- LearnDash coupons apply to Buy Now courses/groups, not recurring access.
- Woo-based subscriptions require WooCommerce Subscriptions.
- Organizational seat selling requires additional group tooling.

Sources:

- https://learndash.com/support/kb/non-knowledgebase/woocommerce-add-on/woocommerce-integration/
- https://learndash.com/support/kb/core/courses/course-enrollment-mode/
- https://learndash.com/support/kb/core/uncategorized/payments/
- https://learndash.com/support/kb/core/uncategorized/groups/
- https://learndash.com/support/kb/core/uncategorized/group-registration/
- https://learndash.com/support/kb/core/uncategorized/coupons/

### Edwiser Bridge with WooCommerce

Edwiser is the closest architectural alternative for organizations that must retain Moodle but want WordPress as the public storefront. Its Pro stack includes WooCommerce integration, SSO, bulk purchase, custom fields, and selective synchronization. It can create WooCommerce products from Moodle courses and synchronize users and enrolment status.

Its central trade-off is the boundary it introduces: WordPress owns products, checkout, and orders while Moodle owns courses and learning. Accounts must be linked, course/product records synchronized, and enrolment status moved between systems. Finance, support, privacy, security, upgrades, backups, monitoring, and incident diagnosis therefore span two applications and the bridge.

Sources:

- https://edwiser.org/documentation/edwiser-bridge-pro/
- https://edwiser.org/bridge-wordpress-moodle-integration/extensions/woocommerce-integration/
- https://edwiser.org/documentation/edwiser-bridge/synchronization-options/
- https://edwiser.org/documentation/edwiser-bridge-woocommerce-integration/woocommerce-integration-user-guide/

### LearnWorlds

LearnWorlds is the strongest hosted all-in-one alternative. It combines a hosted LMS, site builder, courses, checkout, multiple gateways, subscriptions, programs, analytics, automations, SCORM support, and enterprise options. It removes infrastructure administration and cross-application integration within its own platform.

The trade-off is a change of system of record and operating model. Moodle courses, extensions, roles, reports, and custom workflows would need migration or replacement. Source code and database operations remain vendor-controlled. Feature access varies by plan: the current pricing page places subscriptions and memberships on Pro Trainer or above; unlimited SCORM, bulk licences, API/webhooks, advanced reporting, custom roles, and expanded SSO appear on higher tiers. Starter currently lists a per-course-enrolment fee, while higher published plans state no platform transaction fee.

Sources:

- https://www.learnworlds.com/pricing/
- https://www.learnworlds.com/plans/
- https://support.learnworlds.com/support/solutions/articles/12000027238

## Cost analysis

The financially useful comparison is not “free versus paid.” It is the cost of reaching the required selling capability while operating the resulting architecture. ModernCommerce has a $0 recurring software licence, but organizations must still budget for Moodle hosting, implementation, configuration, upgrades, security, backups, staff time, optional support, and payment processing.

### Published software prices reviewed 31 July 2026

| Option | Published price | Cost-to-match interpretation |
| --- | ---: | --- |
| ModernCommerce | $0 recurring software licence | The open-source product includes the storefront, cart, subscriptions, invoices, B2B keys, recovery, reporting, and four payment gateways. It uses the existing Moodle application. |
| Moodle payment / PayPal | $0 with Moodle | Suitable for a simple individual course-fee path. It does not match the full commerce requirement, so a $0 figure is not a like-for-like alternative. |
| WooCommerce | $0 open-source core | It is not a Moodle learning solution by itself. WooCommerce Subscriptions is $279/year; the Moodle connector, WordPress hosting, and other extensions remain additional. |
| LearnDash + WooCommerce | LearnDash from $199/year; WooCommerce core $0 | LearnDash can sell with its native payment flow. An illustrative fuller Woo stack is the $499/year Ultimate Course Creator bundle plus $279/year WooCommerce Subscriptions: $778/year before WordPress hosting, invoicing, recovery, and other extensions. This is a capability scenario, not the minimum price of LearnDash. |
| Edwiser Bridge + WooCommerce | Free core; current Pro price varies by plan and term | WooCommerce Subscriptions is not included and adds $279/year for the recurring path. Edwiser's optional $199 one-time setup service excludes licences, payment-gateway setup, and third-party plugin setup. Moodle and WordPress must both be operated. |
| LearnWorlds | Starter $288/year + $5 per enrolment; Pro Trainer $948/year; Learning Center $2,988/year | Pro Trainer is the relevant published starting tier for subscriptions. Learning Center is the relevant tier for bulk seat offerings and API/webhook-led operations. Hosting is included. |

### Volume and three-year examples

LearnWorlds Starter costs $788/year at 100 enrolments, $2,788/year at 500 enrolments, and $5,288/year at 1,000 enrolments. Each example is the $288 annual subscription plus $5 per enrolment and excludes payment processing.

If current prices remained unchanged for three years:

- ModernCommerce recurring licence: $0.
- LearnDash illustrative comparable stack: $2,334 (3 × $778), before WordPress hosting and other extensions.
- WooCommerce Subscriptions alone: $837 (3 × $279).
- LearnWorlds Pro Trainer: $2,844 (3 × $948).
- LearnWorlds Learning Center: $8,964 (3 × $2,988).

Edwiser is not assigned a three-year total because the current live plan selector does not expose one stable, reliably crawlable base price. Procurement should capture a dated quote. The defensible comparison is that the Edwiser route adds a second application, the selected Pro licence, any WooCommerce extensions, and synchronization operations to the Moodle cost already carried.

### Cost categories beyond licences

Every proposal should explicitly cost hosting and capacity, installation and configuration, course/product migration, theme and storefront work, gateway onboarding, tax and invoice compliance, upgrades and security, backups and monitoring, synchronization incident response, staff training, support, and processor fees. ModernCommerce's economic advantage is the removal of the recurring platform licence, separate WordPress estate, and bridge operations. It is not a claim that professional implementation and reliable operations are cost-free.

Pricing sources:

- https://www.learndash.com/pricing-hero-2-columns/
- https://woocommerce.com/products/woocommerce-subscriptions/
- https://www.learnworlds.com/pricing/
- https://www.learnworlds.com/product/features/checkout-and-payments/
- https://edwiser.org/bridge-wordpress-moodle-integration/extensions/woocommerce-integration/
- https://edwiser.org/edwiser-bundle-setup-service/

## Why an organization should choose ModernCommerce

ModernCommerce is the strongest fit when all of the following are true:

1. Moodle remains the learning system of record.
2. The organization needs a real storefront and multi-product commerce, not only course payment enrolment.
3. Buyers include both individuals and organizations purchasing or distributing seats.
4. Subscriptions must control Moodle access without an external synchronization bridge.
5. Finance and support teams need invoices, refunds, payment attempts, webhooks, fulfilment, entitlements, and audit evidence in one operating environment.
6. The organization values self-hosting, source access, extensibility, and optional professional support.
7. Regional payment coverage through Stripe, PayPal, Paystack, and Flutterwave is sufficient or can be extended.

The central value proposition is therefore:

> ModernCommerce turns Moodle from the destination after a sale into the system that governs the entire sale-to-access lifecycle.

It should not be positioned as universally superior. WooCommerce is stronger as a general-purpose retail ecosystem, LearnDash is appropriate for WordPress-first learning, Edwiser is appropriate when a WordPress storefront is mandatory, LearnWorlds is appropriate when managed SaaS is preferred, and Moodle payment enrolment is appropriate when requirements are deliberately simple. ModernCommerce wins when Moodle ownership and full commerce operations must coexist without another platform becoming the source of truth.
