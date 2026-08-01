# How ModernCommerce works

ModernCommerce is a Moodle local plugin (`local_moderncommerce`). Its catalogue, cart, checkout, administration, learner account, automation, and data model run in the same Moodle application as the courses being sold. It does not require WordPress, WooCommerce, a connector, or a second learner database.

## The transaction path

1. A Moodle course is linked to a ModernCommerce product.
2. One or more active price records make the product purchasable.
3. The product is published through the catalogue or a storefront widget.
4. An authenticated buyer adds a course, bundle, or program to a server-side cart.
5. Checkout validates the product, price, coupon, inventory, buyer fields, and gateway.
6. ModernCommerce creates an order and payment attempt before sending the buyer to the gateway.
7. The callback or verified webhook records the payment event and moves the order through its state transition.
8. Fulfilment creates entitlements and enrols the buyer into the Moodle course or courses represented by the order items.
9. Invoice, notification, reporting, and audit records are produced from the same transaction.

This separation matters: a successful gateway screen alone is not the source of truth. Payment verification, order state, fulfilment, and entitlement records must agree.

## Product and Moodle course ownership

Moodle remains responsible for learning delivery: course content, activities, completion, grades, users, enrolments, roles, messaging, and cron. ModernCommerce adds the commercial layer.

| Layer | Owns |
| --- | --- |
| Moodle | Users, courses, activities, grades, completion and enrolment infrastructure |
| ModernCommerce catalogue | Products, product-to-course links, prices, categories, merchandising metadata and inventory |
| ModernCommerce transaction engine | Carts, orders, adjustments, payment attempts, invoices, refunds and fulfilments |
| ModernCommerce access engine | Entitlements, enrolment keys, subscription access records and access synchronization |
| ModernCommerce engagement | Reviews, wishlists, email templates, contact messages, newsletter records and notifications |

The Moodle course is not duplicated. Removing or hiding a commercial product does not delete the course. Conversely, deleting or materially changing a linked course can make the commercial offer incomplete, so production changes should be tested end to end.

## Product types

The product table supports course products, bundles and programs. A course product normally points to one Moodle course. Bundles and programs point to several courses through product-course records. A subscription plan is managed by the subscription subsystem and grants access through plan access rules.

- **Course:** one directly sold learning product.
- **Bundle:** several courses sold as a commercial package.
- **Program:** several courses positioned as an intentional learning pathway.
- **Subscription:** recurring or time-bound access controlled by a plan, features, access rules and a user-subscription record.

## Public and authenticated surfaces

Catalogue and product-detail datasets may be read without login when Moodle role permissions permit public catalogue access. Cart, checkout, learner records, profile changes, key redemption, review submission, subscriptions, and order history require an authenticated user. Administrative services require their matching Moodle capability.

ModernCommerce uses Moodle's session, context, capability, privacy, file, task, event, language, and web-service APIs. There is no separate ModernCommerce authentication system.

## Asynchronous work

Moodle cron is part of the runtime architecture, not an optional maintenance tool. Seventeen scheduled tasks handle cart cleanup, abandoned orders, payment reminders, report snapshots, notification delivery, key expiry, subscription renewal and expiry, recurring payments, and access synchronization. Run production cron every minute.

## Core and optional add-ons

The core plugin contains the commerce engine and core administration. Optional add-ons may add specialist workflows such as enrolment notifications, course reminders, page design, or certificate support. Add-ons keep ownership of their own database tables, services, tasks and business rules. ModernCommerce may expose an installed add-on inside its navigation, but it must hide or gate that integration when the add-on is absent.

## Source-of-truth rules

For support and documentation, use these authorities in order:

1. `version.php` for the current release and Moodle compatibility.
2. `composer.json` for PHP and Composer dependencies.
3. `LICENSE` for licensing.
4. `db/install.xml`, `db/access.php`, `db/services.php`, `db/tasks.php`, and `db/events.php` for platform contracts.
5. The PHP page, external class, service, template, and JavaScript component for the active workflow.
6. `lang/en/local_moderncommerce.php` for user-facing terminology.

README files and older documentation are useful orientation, but they can become stale and do not override executable metadata.
