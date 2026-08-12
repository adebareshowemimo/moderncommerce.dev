# Database reference

The clean-install schema in `db/install.xml` defines **82 tables**. Moodle applies the configured `$CFG->prefix`; names below are the XMLDB logical names. Do not edit these tables directly in normal operations, use pages, external functions and owning services so validation, events and audit records remain consistent.

## Catalogue and merchandising

| Table | Purpose |
| --- | --- |
| `local_moderncommerce_products` | Sellable course, bundle and program records |
| `product_courses` | Product-to-Moodle-course membership |
| `product_prices` | Regular, sale, tier and subscription-related price rows |
| `product_inventory` | Stock and reservation state |
| `product_tags` | Searchable product tags |
| `product_categories` | Commerce catalogue category tree |
| `product_category_map` | Product/category assignments |
| `product_attributes` | Reusable attribute definitions |
| `product_attribute_values` | Typed attribute values |
| `product_relations` | Bundle, program, prerequisite and add-on relations |
| `course_meta` | Course catalogue metadata |
| `course_objectives` | Ordered learning objectives |
| `course_outline` | Ordered buyer-facing outline rows |
| `bundle_meta` | Advanced bundle/program merchandising and completion metadata |
| `bundle_outline` | Bundle/program curriculum outline |
| `bundle_mustpass` | Included courses marked must-pass |
| `bundle_prereq` | Stored prerequisite-course metadata |
| `bundle_tags` | Bundle/program merchandising tags |
| `program_progress` | Per-learner ordered progress, current course, completion outcome and native certificate issue ID |

For abbreviated rows in this and following tables, prepend `local_moderncommerce_`.

## Cart, orders and documents

| Table | Purpose |
| --- | --- |
| `billing_profiles` | Reusable buyer billing details |
| `carts` / `cart_items` | Cart header and line items |
| `orders` | Commercial order header and financial snapshots |
| `order_operational` | Internal workflow/operational state separated from buyer record |
| `order_items` | Purchased line snapshots |
| `inventory_reservations` | Stock reservation ledger |
| `order_addresses` | Billing/shipping snapshots |
| `order_adjustments` | Discount, tax, fee and manual adjustments |
| `order_status_history` | Append-style order transitions |
| `invoices` / `invoice_items` | Invoice header and lines |
| `fulfillments` / `fulfillment_items` | Order fulfilment header and item processing |
| `entitlements` | Commercial ownership/access state |
| `entitlement_events` | Append-only entitlement lifecycle |

## Payments, discounts, refunds and keys

| Table | Purpose |
| --- | --- |
| `gateways` | Gateway registry and protected configuration fields |
| `payment_attempts` | Each provider initialization/attempt |
| `payment_events` | Normalized payment lifecycle evidence |
| `webhook_events` | Raw/intake processing ledger |
| `payment_log` | Redacted diagnostics |
| `refunds` / `refund_items` | Refund header and item allocations |
| `coupons` | Coupon definition/state/limits |
| `coupon_targets` | Product/category/type applicability |
| `coupon_usage` | Redemption tracking |
| `enrollkeys` | Prepaid course/bundle key pools |
| `enrollkey_targets` | What a key grants |
| `key_usage` | Key redemption history |
| `tax_rates` | Region tax-rate structure; core settings currently use a flat default rate |

## Engagement, storefront and reporting

| Table | Purpose |
| --- | --- |
| `wishlist` | Learner saved products |
| `reviews` / `review_rxn` | Course reviews and user reactions |
| `contacts` / `contact_replies` | Support/contact conversation records |
| `subscriber` | Newsletter/lead subscribers |
| `emailtpl` | Shared core email templates |
| `widget` / `widget_slide` | Placed storefront widgets and slider content |
| `widget_preset` | Reusable style-only widget presets |
| `dashpref` | Per-admin dashboard preferences |
| `audit_log` | Structured immutable commerce audit ledger |
| `report_daily` | Daily order/revenue snapshots |
| `report_products` | Product performance snapshots |
| `report_gateways` | Gateway performance snapshots |

## Notification delivery

| Table | Purpose |
| --- | --- |
| `notify_queue` | Recipient-by-channel outbox with status/retry timing |
| `notify_log` | Immutable delivery-attempt log |
| `notify_digest` | Items waiting for daily/weekly rollup |
| `notify_identity` | Moodle-user link to Slack/Teams identity |
| `notify_suppression` | Marketing unsubscribe/suppression registry |

## Subscriptions

| Table | Purpose |
| --- | --- |
| `subscription_plans` | Plan definition, price/cycle/status/trial/grace metadata |
| `subscription_plan_features` | Plan-specific feature list items |
| `subscription_features` | Master feature catalogue |
| `subscription_feature_map` | Feature-to-plan matrix |
| `subscription_access_rules` | Course/category/bundle targets granted by plans |
| `user_subscriptions` | Current user subscription state and billing dates |
| `subscription_history` | Change history |
| `subscription_reminders` | Sent-reminder deduplication |
| `subscription_access` | Effective course-access cache |
| `subscription_emailtpl` | Subscription email overrides |
| `subscription_keys` | Prepaid subscription keys |
| `subscription_key_usage` | Subscription-key redemptions |
| `subscription_log` | Billing and lifecycle action log |

## Integrity rules

Use the XMLDB keys and indexes when building support queries. Historical order, item, adjustment, invoice, attempt and event rows are snapshots; do not recalculate old transactions from today's product or coupon settings. Audit/event/log tables are evidence and should follow retention policy rather than ad hoc cleanup.
