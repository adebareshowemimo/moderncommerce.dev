# Admin page reference

All routes are relative to `/local/moderncommerce/`. A page's PHP capability check is authoritative; sidebar visibility follows the same permissions and also gates optional add-ons.

## Commerce and catalogue

| Route | Purpose | Required capability |
| --- | --- | --- |
| `admin/index.php` | Dashboard and commerce overview | `viewreports` |
| `admin/orders.php` | Order list and status workflow | `viewallorders` |
| `admin/order_view.php?id=ID` | Order detail and permitted refund/status actions | `viewallorders` plus action capability |
| `admin/customers.php` | Customer list | `viewallorders` |
| `admin/customer.php?id=ID` | Customer commerce detail | `viewallorders` |
| `admin/invoices.php` | Invoice list/editor/status | `manageorders` |
| `admin/pricing.php` | Course products and prices | `managecourses` |
| `admin/course_advanced_features.php?courseid=ID` | Course merchandising metadata | `managecourses` |
| `admin/categories.php` | Commerce category tree | `managecategories` |
| `admin/bundles.php` | Bundle/program list | `managecourses` |
| `admin/bundle_form.php` | Create/edit bundle or program | `managecourses` |
| `admin/advanced_bundle_features.php?bundleid=ID` | Advanced bundle/program metadata | `managecourses` |
| `admin/coupons.php` | Coupon and target rules | `managecoupons` |

## Keys and subscriptions

| Route | Purpose | Required capability |
| --- | --- | --- |
| `admin/keys.php` | Course enrolment-key pools | `generatekeys` |
| `admin/course_keys.php` | Course-key compatibility entry | `generatekeys` |
| `admin/bundle_keys.php` | Bundle/program keys | `generatekeys` |
| `admin/subscriptions.php` | Plan overview/editor or subscriber area by action | subscription plan/subscriber capability |
| `admin/subscription_features.php` | Feature catalogue/matrix | `managesubscriptionfeatures` |
| `admin/subscription_plan_access.php?id=ID` | Course/category/bundle access rules | `managesubscriptionplans` |
| `admin/subscription_subscribers.php` | Subscriber list | `viewsubscribers` |
| `admin/subscription_keys.php` | Prepaid subscription keys | `managesubscriptionplans` |
| `admin/subscription_emails.php` | Subscription lifecycle templates | `managesubscriptionplans` |

## Storefront and communication

| Route | Purpose | Required capability |
| --- | --- | --- |
| `admin/pages.php` | Store page definitions and state | `managestorefront` |
| `admin/gallery.php` | Storefront widget gallery | `managestorefront` |
| `admin/global.php` | Storefront/global compatibility entry | `managestorefront` |
| `admin/components.php` | Installed component/add-on overview | `moodle/site:config` |
| `admin/contacts.php` | Contact inbox | `viewcontacts` |
| `admin/contact_emails.php` | Contact email compatibility/settings entry | `managesettings` |
| `admin/newsletter_subscribers.php` | Subscriber list/export actions | `viewnewsletter` |
| `admin/email_templates.php` | Shared templates, outgoing emails and shell | `manageemailtemplates` |
| `admin/notifications.php` | Notification settings, queue/log operations | `managenotifications` |
| `admin/course_reviews.php` | Reviews overview | `managereviews` |
| `admin/course_review_courses.php` | Courses with review statistics | `managereviews` |
| `admin/course_review_moderation.php` | Review moderation | `managereviews` |

## Payments, settings and oversight

| Route | Purpose | Required capability |
| --- | --- | --- |
| `admin/gateways.php` | Payment gateway registry | `configuregateways` |
| `admin/webhooks.php` | Endpoint/readiness configuration | `configuregateways` |
| `admin/payment_events.php` | Payment event ledger | `configuregateways` |
| `admin/webhook_events.php` | Webhook intake ledger | `configuregateways` |
| `admin/reports.php` | Sales/product/gateway reporting | `viewreports` |
| `admin/wishlists.php` | Wishlist reporting | `viewreports` |
| `admin/audit_log.php` | Immutable audit ledger | `viewauditlog` |
| `admin/settings.php` | Store, currency, tax, checkout, navigation, reviews | `managesettings` |
| `admin/branding.php` | Runtime brand variables and email shell | `managesettings` |
| `admin/addons.php` | Add-on status and integration links | `moodle/site:config` |
| `admin/help/index.php` | In-product admin documentation | `viewreports` for admin context |

## Optional add-on compatibility pages

The `enrolment_notifier_*` and `course_reminders_*` PHP pages are compatibility/integration surfaces. They check ModernCommerce notification permission and the installed add-on/component capability before exposing the owning add-on workflow. The active navigation can point directly to `local_ccp_enrolmentnotifier`, `local_modernenrolnotifier`, `local_ccp_coursereminder` or supported aliases.

Do not describe these as core notification business logic. The installed add-on owns its database, services, tasks and rules. `mod_coursecertificate` and `local_ccp_pagedesigner` are likewise optional integrations surfaced only when installed.

## Direct-route rule

Never use a hidden menu item as proof that access is denied. Test the route: each page must call `require_login()` and the appropriate `require_capability()` or redirect into a page that does.
