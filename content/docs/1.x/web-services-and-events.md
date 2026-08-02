# Web services & events

`db/services.php` defines **156 Moodle external functions** in the audited 2.17 source. They are AJAX functions used by the shipped browser applications, not an unauthenticated generic REST API. The function declaration supplies its class, method, read/write type, AJAX flag, capability and login policy; the external class performs parameter validation and repeats the applicable context/capability checks.

## Public catalogue and reviews

`get_catalog`, `get_course_details`, `get_bundle_details`, `get_course_reviews`, `reviews_get_overview`, `reviews_list_courses`, `reviews_list_reviews`, `reviews_moderate`, `submit_course_review`, and `set_course_review_reaction` cover public detail data, learner submissions and moderation. Public-read declarations set `loginrequired` false; write/moderation paths require login and their capability.

## Cart, checkout and learner account

Cart/checkout functions are `get_cart`, `get_cart_dropdown`, `update_cart`, `start_checkout`, and `place_order`.

Learner functions are `get_learner_dashboard`, `list_learner_courses`, `list_learner_certificates`, `list_learner_grades`, `list_learner_orders`, `get_learner_order`, `cancel_learner_order`, `list_learner_wishlist`, `update_learner_wishlist`, `get_learner_subscription`, `get_learner_subscription_access`, `get_learner_product_access`, `get_learner_profile`, `save_learner_profile`, and `save_learner_profile_picture`.

These functions must scope personal records to the current user. Administrative all-user functions are separate.

## Products, prices, categories and coupons

- Products: `search_courses`, `list_products`, `save_product`, `get_product`, `toggle_product`, `archive_product`.
- Prices: `list_product_prices`, `save_product_price`, `archive_product_price`.
- Categories: `list_categories`, `save_category`, `delete_category`, `reorder_categories`.
- Coupons: `list_coupons`, `save_coupon`, `check_coupon_code`, `archive_coupon`, `list_coupon_targets`, `save_coupon_target`, `delete_coupon_target`, `search_coupon_target_options`.
- Bundles: `admin_list_bundles`, `admin_get_bundle`, `admin_save_bundle`, `admin_archive_bundle`, `admin_save_bundle_image`.
- Advanced metadata: `admin_get_course_features`, `admin_save_course_features`, `admin_get_bundle_features`, `admin_save_bundle_features`.

All names above are prefixed `local_moderncommerce_` in Moodle.

## Orders, customers, documents, keys and oversight

- Orders/customers: `admin_list_orders`, `admin_get_order`, `admin_list_customers`, `admin_get_customer`, `admin_update_order_status`, `admin_create_refund`.
- Invoices: `admin_list_invoices`, `admin_get_invoice`, `admin_save_invoice`, `admin_set_invoice_status`, `admin_search_customers`.
- Keys: `validate_key`, `redeem_key`, `admin_list_keys`, `admin_generate_keys`, `admin_set_key_status`.
- Reporting: `admin_get_report`, `admin_get_dashboard`, `admin_get_dashboard_charts`, `admin_get_dashboard_layout`, `admin_save_dashboard_layout`, `admin_list_wishlists`.
- Ledgers: `admin_list_payment_events`, `admin_list_webhook_ledger`, `admin_list_audit_log`.

## Payments and storefront

- Payments: `admin_list_gateways`, `admin_save_gateway`, `admin_get_webhooks`, `admin_list_webhook_events`.
- Public/storefront: `get_storefront_page`, `get_storefront_gallery`, `get_demo_catalog`, `get_storefront_layout`, `get_storefront_widget`.
- Storefront writes: `save_storefront_layout`, `toggle_storefront_page`, `save_storefront_widget`, `add_storefront_widget`, `delete_storefront_widget`, `upload_slide_image`.
- Presets: `list_widget_presets`, `save_widget_preset`, `delete_widget_preset`.
- Newsletter: `newsletter_subscribe`, `newsletter_list_subscribers`, `newsletter_delete_subscriber`, `newsletter_export_subscribers`.

## Email, contacts, settings and branding

- Legacy/event emails: `admin_list_emails`, `admin_get_email`, `admin_save_email`.
- Shared templates: `email_get_metadata`, `email_list_templates`, `email_get_template`, `email_save_template`, `email_delete_template`, `email_clone_template`, `email_preview_template`.
- Email shell: `email_get_shell`, `email_save_shell`, `email_preview_shell`, `email_reset_shell`.
- Settings/notifications: `admin_get_settings`, `admin_save_settings`, `admin_get_notifications`, `admin_save_notification_settings`.
- Contacts: `submit_contact`, `get_contacts`, `get_contact`, `reply_to_contact`, `set_contact_status`, `get_contact_email_settings`, `save_contact_email_settings`.
- Branding: `admin_get_branding`, `admin_save_branding`.

## Subscriptions

Plan administration uses `subscription_get_overview`, `subscription_save_plan`, `subscription_delete_plan`, `subscription_get_feature_matrix`, `subscription_save_feature`, `subscription_delete_feature`, `subscription_save_feature_matrix`, `subscription_get_plan_access`, `subscription_add_plan_access`, `subscription_remove_plan_access`, and `subscription_save_plan_features`.

Subscriber/key/email administration uses `subscription_list_subscriptions`, `subscription_get_subscription`, `subscription_subscription_action`, `subscription_list_keys`, `subscription_generate_keys`, `subscription_key_action`, `subscription_list_email_templates`, and `subscription_save_email_template`.

Buyer functions are `subscription_get_plans`, `subscription_subscribe`, and `subscription_redeem_key`.

## Domain events

The plugin defines 12 event classes: `audit_event`, `order_created`, `order_paid`, `order_status_changed`, `plan_created`, `plan_updated`, `plan_deleted`, `subscription_created`, `subscription_cancelled`, `subscription_expired`, `subscription_extended`, and `subscription_renewed`.

`db/events.php` registers internal observers for:

- `order_paid` → core enrolment fulfilment;
- `order_status_changed` → order-side effects;
- `order_paid` → subscription activation/renewal;
- Moodle `course_completed` → subscription progress;
- Moodle `user_deleted` → privacy cleanup.

When extending the system, prefer a documented event/service contract over direct table writes. An event class existing in source does not mean every external integration is guaranteed a stable public API; version and test custom integrations.
