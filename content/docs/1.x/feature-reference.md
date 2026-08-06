# Modern Commerce: Complete Feature Reference

---

- [How to use this reference](#use)
- [Catalogue, products and pricing](#catalogue)
- [Storefront and widgets](#storefront)
- [Cart, checkout and tax](#checkout)
- [Payments and webhooks](#payments)
- [Orders, documents and refunds](#orders)
- [Fulfilment and access](#access)
- [Coupons, keys and corporate distribution](#distribution)
- [Subscriptions](#subscriptions)
- [Learner and customer experience](#experience)
- [Communications and recovery](#communications)
- [Analytics and reports](#analytics)
- [Roles, privacy and security](#governance)
- [Developer and operational features](#platform)
- [Product boundaries](#boundaries)

<a name="use"></a>
## How to use this reference

This is the consolidated feature inventory for **ModernCommerce 2.1.8**. It explains what each feature owns, where an administrator normally manages it, the primary Moodle capability protecting it, and the operational behavior that matters in production.

The public product catalogue is at [moderncommerce.dev/features](/features). This document is the technical companion. Follow the linked task guide when you need field-level setup or a production checklist.

> {primary} All administration is system-wide. Assign ModernCommerce roles at **Site administration → Users → Permissions → Assign system roles**. A course-context assignment does not provide access to the cross-store administration pages.

<a name="catalogue"></a>
## Catalogue, products and pricing

| Feature | Administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| Course products | `/local/moderncommerce/admin/pricing.php` | `managecourses` | Wraps an existing Moodle course in a sellable product; the Moodle course remains the learning record. |
| Bundles | `/local/moderncommerce/admin/bundles.php` | `managecourses` | Packages multiple courses as one value-led offer with shared pricing, checkout, fulfilment and access mechanics. |
| Programs | `/local/moderncommerce/admin/bundles.php` | `managecourses` | Uses the multi-course engine while presenting an outcome/pathway promise and intentional course order. |
| Subscription plans | `/local/moderncommerce/admin/subscriptions.php` | `managesubscriptionplans` | Defines recurring offers separately from one-time course, bundle and program products. |
| Price records | `/local/moderncommerce/admin/pricing.php` | `managecourses` | Supports regular, sale, tier and subscription-related prices, compare-at display, enablement and date windows. |
| Product status and visibility | Pricing and advanced feature pages | `managecourses` | Product state, catalogue visibility, availability dates and Moodle course visibility all affect whether an offer is discoverable or purchasable. |
| Inventory | Product editor | `managecourses` | Optional stock management for limited seats, cohorts or licences; normal evergreen courses can remain unmanaged. |
| Reservations | Checkout/order services | `purchase` for buyer action | Protects limited inventory during checkout and releases stale or invalid reservations through cleanup rules. |
| Categories | `/local/moderncommerce/admin/categories.php` | `managecategories` | Maintains the store taxonomy used by catalogue navigation and filtering. |
| Tags and attributes | Product merchandising records | `managecourses` | Adds cross-cutting discovery and presentation metadata without changing Moodle course internals. |
| Course merchandising | `/local/moderncommerce/admin/course_advanced_features.php?courseid=ID` | `managecourses` | Adds level, duration, language, outcomes, outline, tags and trust information to public course presentation. |
| Bundle/program merchandising | `/local/moderncommerce/admin/advanced_bundle_features.php?bundleid=ID` | `managecourses` | Controls visibility, dates, completion policy, certificate flag, must-pass courses, outline, tags and badges. |
| Reviews | `/local/moderncommerce/admin/course_reviews.php` | `managereviews` | Collects ratings and review text, identifies verified purchasers and supports moderation. |

See [Products & Pricing](/{{route}}/{{version}}/modern-commerce/products-and-pricing), [Course Merchandising](/{{route}}/{{version}}/modern-commerce/course-merchandising), [Bundles & Programs](/{{route}}/{{version}}/modern-commerce/bundles-and-programs), and [Categories, Tags & Discovery](/{{route}}/{{version}}/modern-commerce/catalog-organization).

<a name="storefront"></a>
## Storefront and widgets

ModernCommerce provides **22 storefront widget types**: 21 admin-addable types plus the system-managed catalogue widget. This is separate from the 22 admin-dashboard widgets.

| Widget | Purpose |
|---|---|
| Slider | Multi-slide campaign or hero presentation with managed slide content. |
| Video hero | Split hero with copy, actions, click-to-play media and an information/stat card. |
| Breadcrumb | Page-title and navigation context banner. |
| Featured products | Selected product carousel or grid. |
| Related products | Contextual product recommendations using the product-card presentation. |
| Categories | Visual category discovery tiles. |
| Trust badges | Compact proof, assurance or payment/security statements. |
| Countdown | Time-bound campaign or availability message. |
| Testimonials | Structured customer proof. |
| Instructors | Instructor spotlight cards. |
| Newsletter | Lead capture connected to the ModernCommerce subscriber records. |
| Content | General editable public-page content section. |
| Media story carousel | Side-by-side visual and narrative panels for programs and outcomes. |
| Learning promise | Centered statement of learner value or commitment. |
| Belief | Full-width organization or About-page belief statement. |
| Policy | Structured terms, privacy or refund-policy sections. |
| FAQ | Public question-and-answer list/accordion. |
| CTA | Focused call-to-action band. |
| Support form | Commerce support enquiry form. |
| Contact cards | Structured contact and help routes. |
| Footer | Multi-column store footer with brand, contact, links, applications and social destinations. |
| Catalogue | System-managed searchable product grid; it can be positioned and styled but is not created as a duplicate widget. |

| Storefront feature | Administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| Page records | `/local/moderncommerce/admin/pages.php` | `managestorefront` | Controls the public store pages and their enabled state. |
| Widget gallery | `/local/moderncommerce/admin/gallery.php` | `managestorefront` | Presents widget types, variants and reusable presets. |
| Storefront edit mode | Public page while authorized | `managestorefront` | Adds, arranges, configures and removes page-scoped widget instances. |
| Reusable presets | Widget gallery/editor | `managestorefront` | Reuses style configuration while instance content and page placement remain independent. |
| Course detail page | `/local/moderncommerce/course_details.php?id=ID` | Public `viewcatalog`; purchase actions use `purchase` | Combines hero, merchandising, reviews and a responsive purchase card. |
| Bundle/program detail | `/local/moderncommerce/bundle_details.php?id=ID` | Public `viewcatalog`; purchase actions use `purchase` | Shows included courses, offer metadata, pricing and purchase controls. |
| Branding | `/local/moderncommerce/admin/branding.php` | `managesettings` | Applies design tokens and brand assets across storefront, admin, learner and public surfaces. |
| Moodle homepage integration | Moodle default-home-page setting | Moodle site configuration | Opens the storefront from the Moodle site root without editing core files. |
| Public reCAPTCHA | Moodle core reCAPTCHA settings | Moodle site configuration | Protects support and newsletter forms when Moodle keys are configured. |

See [Storefront & Widgets](/{{route}}/{{version}}/modern-commerce/storefront) and [Branding & Moodle Navigation](/{{route}}/{{version}}/modern-commerce/branding-and-navigation).

<a name="checkout"></a>
## Cart, checkout and tax

| Feature | Surface | Primary capability | Behavior and purpose |
|---|---|---|---|
| Persistent cart | `/local/moderncommerce/cart.php` | `purchase` | Stores cart and item state server-side for the authenticated Moodle buyer. |
| Cart navigation summary | Moodle navigation/cart dropdown | `purchase` | Exposes current cart state without creating a second client-side source of truth. |
| Product revalidation | Cart and checkout services | `purchase` | Re-checks status, visibility, current price, dates, inventory and Moodle course state. |
| Checkout preparation | `/local/moderncommerce/checkout.php` | `purchase` | Resolves products, totals, coupon, buyer data, currency and available gateways. |
| Order placement | Checkout service | `purchase` | Validates the request and creates/continues a durable order before gateway redirection. |
| Configurable contact fields | Settings → checkout | `managesettings` | Hides, requests or requires phone, address, city, state, country and postal code. |
| Coupon totals | Cart/checkout | `purchase` | Validates code state, dates, usage limits, targets and context before preserving adjustments. |
| Single active currency | Settings → currency | `managesettings` | Selects one of 21 supported currencies plus symbol position and decimals; not simultaneous multi-currency. |
| Tax | Settings → tax/documents | `managesettings` | Supports inclusive or exclusive treatment and records the calculated tax with the order. |
| Stale cart cleanup | Moodle cron | Scheduled task | Cleans old carts and releases applicable stale state. |

See [Cart & Checkout](/{{route}}/{{version}}/modern-commerce/cart-and-checkout) and [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings).

<a name="payments"></a>
## Payments and webhooks

| Feature | Administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| Stripe | `/local/moderncommerce/admin/gateways.php` | `local/moderncommerce:configuregateways` | Connects the organization’s Stripe account in test or live mode. |
| PayPal | Gateway administration | `local/moderncommerce:configuregateways` | Connects the organization’s PayPal account and server SDK credentials. |
| Paystack | Gateway administration | `local/moderncommerce:configuregateways` | Connects a Paystack merchant account for supported store currencies. |
| Flutterwave | Gateway administration | `local/moderncommerce:configuregateways` | Connects a Flutterwave merchant account for supported store currencies. |
| Gateway readiness | Gateway administration and checkout | `local/moderncommerce:configuregateways` | Identifies missing credentials, mode, currency, amount or webhook blockers. |
| Hosted card capture | Provider-hosted or provider-controlled UI | Gateway account | Keeps raw card capture out of ModernCommerce records. |
| Payment attempts | Order/payment records | `viewallorders` or payment-operations role | Records attempt, provider reference, amount, currency and result independently of order status. |
| Gateway callbacks | `/local/moderncommerce/payment/*_callback.php` | Verified provider return | Reconciles the browser return without trusting it as the only payment evidence. |
| Signed webhooks | `/local/moderncommerce/payment/*_webhook.php` | Provider signature/secret | Validates asynchronous events and handles retries/idempotency. |
| Payment-event ledger | `/local/moderncommerce/admin/payment_events.php` | `local/moderncommerce:configuregateways` | Provides normalized payment evidence for investigation. |
| Webhook-event ledger | `/local/moderncommerce/admin/webhook_events.php` | `local/moderncommerce:configuregateways` | Shows provider event, processing result and reconciliation evidence. |
| Refund initiation | Order administration | `processrefunds` | Controls refund actions and preserves their relation to order and payment history. |

ModernCommerce does not take a percentage of sales. Settlement goes to the configured merchant account, subject to the gateway’s own fees and terms.

See [Payments & Gateways](/{{route}}/{{version}}/modern-commerce/payments) and [Webhooks & Payment Operations](/{{route}}/{{version}}/modern-commerce/webhooks-and-payment-operations).

<a name="orders"></a>
## Orders, documents and refunds

| Feature | Administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| Orders console | `/local/moderncommerce/admin/orders.php` | `viewallorders`; writes require `manageorders` | Searches and filters cross-store orders. |
| Order detail | `/local/moderncommerce/admin/order_view.php?id=ID` | `viewallorders` | Brings item, customer, payment, status and fulfilment context together. |
| Status history | Order detail | `viewallorders` | Records allowed lifecycle transitions and their actor/time. |
| Invoices | `/local/moderncommerce/admin/invoices.php` | `manageorders` | Creates and manages documents from preserved transaction data. |
| Learner invoice download | Learner order/account | `viewownorders` | Allows the authenticated owner to download their document. |
| Manual invoices | Invoice administration | `manageorders` | Supports approved invoice-led sales and finance workflows. |
| Refunds | Order detail | `processrefunds` | Records controlled refund activity without erasing original payment evidence. |
| Customers | `/local/moderncommerce/admin/customers.php` | `viewallorders` | Aggregates commerce history around the Moodle user identity. |
| Audit log | `/local/moderncommerce/admin/audit_log.php` | `viewauditlog` | Provides traceability for sensitive administrative and lifecycle actions. |

See [Order Lifecycle & Fulfilment](/{{route}}/{{version}}/modern-commerce/order-lifecycle) and [Orders, Invoices & Refunds](/{{route}}/{{version}}/modern-commerce/orders-invoices-refunds).

<a name="access"></a>
## Fulfilment and access

| Feature | Source/administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| Fulfilment records | Order services | `manageorders` for manual operations | Represents processing of paid order items separately from the payment attempt. |
| Fulfilment items | Order item targets | Service-controlled | Records which purchased target was processed and its outcome. |
| Entitlements | Access services | Service-controlled | Represents the learner’s right to a course, bundle, program or plan target. |
| Entitlement events | Access services/audit | `viewauditlog` for evidence | Preserves access changes instead of exposing only current state. |
| Automatic course enrolment | Enrolment service | Verified purchase/key/subscription | Converts valid rights into Moodle course enrolment. |
| Bundle/program enrolment | Enrolment service | Verified parent entitlement | Grants the included course access while retaining the parent purchase. |
| Subscription access sync | Moodle cron | Subscription lifecycle rules | Reconciles active plan access with Moodle enrolment. |
| Access removal/expiry | Order, key or subscription lifecycle | Service-controlled | Changes access according to validated cancellation, expiry or plan rules. |

When access is missing, trace order → payment event → item → fulfilment → entitlement → Moodle enrolment. Do not charge the buyer again simply because fulfilment failed.

<a name="distribution"></a>
## Coupons, keys and corporate distribution

| Feature | Administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| Coupons | `/local/moderncommerce/admin/coupons.php` | `managecoupons` | Fixed or percentage discounts with state, dates, limits and targets. |
| Course keys | `/local/moderncommerce/admin/course_keys.php` | `generatekeys` | Issues prepaid access codes for a course. |
| Bundle/program keys | `/local/moderncommerce/admin/bundle_keys.php` | `generatekeys` | Issues prepaid access from a multi-course offer. |
| General key oversight | `/local/moderncommerce/admin/keys.php` | `generatekeys` | Lists state, expiry and usage across supported key workflows. |
| Learner redemption | `/local/moderncommerce/redeem.php` and related routes | `redeemkey` | Validates ownership/state and grants the applicable access. |
| Subscription keys | `/local/moderncommerce/admin/subscription_keys.php` | `managesubscriptions` | Activates a plan without normal online checkout. |
| Seat/key pools | Key and subscription records | Relevant key/subscription capability | Tracks capacity used and remaining for organization-led distribution. |
| Low-pool alert | Notification workflow | Scheduled delivery | Prompts the buyer to reorder before managed capacity is exhausted. |
| Invoice-led B2B sale | Invoice and key workflows | `manageorders` plus key/subscription capability | Combines finance approval with controlled learner distribution. |

See [Coupons & Enrolment Keys](/{{route}}/{{version}}/modern-commerce/coupons-and-keys) and [Corporate & B2B Sales](/{{route}}/{{version}}/modern-commerce/corporate-sales).

<a name="subscriptions"></a>
## Subscriptions

| Feature | Administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| Plans | `/local/moderncommerce/admin/subscriptions.php` | `managesubscriptionplans` | Defines cycle, price, trial, grace, status and public plan information. |
| Feature matrix | `/local/moderncommerce/admin/subscription_features.php` | `managesubscriptionfeatures` | Describes and compares plan inclusions. |
| Plan access rules | `/local/moderncommerce/admin/subscription_plan_access.php?id=ID` | `managesubscriptionplans` | Grants courses, categories or bundles through the plan. |
| Subscribers | `/local/moderncommerce/admin/subscription_subscribers.php` | `viewsubscribers` | Reviews subscriber and lifecycle state. |
| Trials | Plan plus global settings | `managesubscriptionplans` | Supports trial days and optional auto-convert behavior. |
| Recurring payments | Moodle cron | Subscription payment workflow | Attempts scheduled renewal charges. |
| Grace and expiry | Global settings plus cron | `managesubscriptions` | Applies reminders, grace, suspension and expiry policy. |
| Plan changes | Subscription service | `managesubscriptions` | Controls upgrades, downgrades, cooldowns, credits and cancellation timing. |
| Access synchronization | Moodle cron | Subscription access rules | Reconciles billing lifecycle with Moodle course access. |
| Lifecycle email mapping | `/local/moderncommerce/admin/subscription_emails.php` | `managesubscriptionplans` | Configures activation, renewal, expiry, cancellation and failure communication. |
| Subscription reports | Subscription/report pages | `viewsubscriptionreports` | Provides subscription-specific performance and operational evidence. |
| Learner self-service | Learner dashboard | `viewownsubscription` | Shows the authenticated learner’s plan, status, access and allowed actions. |

See [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions).

<a name="experience"></a>
## Learner and customer experience

| Feature | Learner/admin surface | Primary capability | Behavior and purpose |
|---|---|---|---|
| Learner account shell | `/local/moderncommerce/learner/index.php` | Authenticated user | Hosts the learner commerce experience. |
| Course library | Learner courses/library | Authenticated owner | Shows entitled courses and routes into Moodle learning. |
| Order history | Learner orders | `viewownorders` | Restricts purchase records to the authenticated owner. |
| Certificates | Learner certificates | Authenticated owner | Surfaces the learner’s Moodle certificate evidence. |
| Grades | Learner grades | Authenticated owner | Surfaces learning results beside access and purchases. |
| Subscription view | Learner subscription | `viewownsubscription` | Shows current plan, lifecycle and access. |
| Wishlist | Learner wishlist | Authenticated owner | Saves products for later and contributes to aggregate demand reporting. |
| Profile and picture | Learner profile | Authenticated owner | Maintains permitted commerce-facing profile information. |
| Reviews | Product/course detail | `submitreview` | Lets eligible buyers submit feedback; moderation remains separate. |
| Customer administration | Customer pages | `viewallorders` | Supports staff investigation without exposing other buyers to the learner. |

See [Learner Account & Access](/{{route}}/{{version}}/modern-commerce/learner-account) and [Customers, Reviews & Wishlists](/{{route}}/{{version}}/modern-commerce/customers-reviews-wishlists).

<a name="communications"></a>
## Communications and recovery

| Feature | Administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| Email templates | `/local/moderncommerce/admin/email_templates.php` | `manageemailtemplates` | Manages reusable subject/body content and placeholders. |
| Email branding | Branding/email settings | `manageemailtemplates` or `managesettings` by surface | Applies a consistent sender shell. |
| Notification channels | `/local/moderncommerce/admin/notifications.php` | `managenotifications` | Configures category/channel behavior. |
| Queued delivery | Notification queue | Cron | Keeps outbound transport outside the purchase transaction. |
| Delivery log | Notification administration | `viewnotificationlog` | Shows queue, attempt, result and suppression evidence. |
| Slack | Notification channel settings | `managenotifications` | Optional outbound operational channel. |
| Microsoft Teams | Notification channel settings | `managenotifications` | Optional outbound operational channel. |
| Abandoned-cart recovery | Cron plus templates | `managenotifications` | Evaluates eligible carts and respects marketing suppression. |
| Payment reminders | Cron plus templates | `managenotifications` | Evaluates eligible unpaid orders at scheduled times. |
| Digests | Notification settings/cron | `managenotifications` | Groups applicable messages for scheduled delivery. |
| Contacts | `/local/moderncommerce/admin/contacts.php` | `managecontacts` | Stores and manages public commerce support enquiries. |
| Newsletter | `/local/moderncommerce/admin/newsletter_subscribers.php` | `managenewsletter` | Stores subscribers with privacy and suppression implications. |

See [Notifications](/{{route}}/{{version}}/modern-commerce/notifications) and [Contacts & Newsletter](/{{route}}/{{version}}/modern-commerce/contacts-and-newsletter).

<a name="analytics"></a>
## Analytics and reports

The admin dashboard contains **22 configurable widgets**: four KPI tiles and 18 analytics/table widgets. The full calculation and purpose of each is documented in [Reports & Analytics](/{{route}}/{{version}}/modern-commerce/reports-and-analytics#dashboard-widgets).

| Feature | Administration | Primary capability | Behavior and purpose |
|---|---|---|---|
| KPI tiles | `/local/moderncommerce/admin/index.php` | `viewreports` | Total revenue, total orders, pending orders and active products. |
| 18 insight widgets | Dashboard | `viewreports` | Revenue, conversion, products, gateways, leakage, funnel, customers, heatmap, tax, coupons, keys, payment speed, wishlist and geography. |
| Personal layout | Dashboard → Customize | `viewreports` | Shows, hides, orders and sizes widgets for one administrator. |
| Site-default layout | Dashboard → Customize | Authorized settings scope | Supplies the inherited layout when no personal preference exists. |
| Date ranges | Dashboard | `viewreports` | Supports 7d, 30d, 90d, 12m and YTD. |
| Reports page | `/local/moderncommerce/admin/reports.php` | `viewreports` | Provides detailed sales, product and gateway reporting. |
| Daily snapshots | `local_moderncommerce_report_daily` | Generated by cron | Stores time-series commerce summaries. |
| Product snapshots | `local_moderncommerce_report_products` | Generated by cron | Stores product reporting evidence. |
| Gateway snapshots | `local_moderncommerce_report_gateways` | Generated by cron | Stores gateway reporting evidence. |
| Wishlist report | `/local/moderncommerce/admin/wishlists.php` | `viewreports` | Exposes aggregate saved-product demand. |
| Setup alerts | Dashboard | `viewreports` | Identifies actionable configuration/health conditions; not counted as dashboard widgets. |

<a name="governance"></a>
## Roles, privacy and security

ModernCommerce defines **36 Moodle capabilities** and seeds **nine system-role presets**: Administrator, Finance, Product Manager, Reporting Manager, Storefront Manager, Marketing Manager, Support, Subscription Manager and Payment Operations.

| Feature | Administration | Governing control | Behavior and purpose |
|---|---|---|---|
| Role presets | `php local/moderncommerce/cli/seed_role_presets.php` | Moodle role management | Creates or refreshes starting roles; never assigns users automatically. |
| Capability checks | Every protected route/service | Moodle capabilities | Separates read, write, refund, gateway, storefront, notification and subscription responsibilities. |
| System-context assignment | Moodle assign-system-roles page | Moodle role assignment | Makes cross-store administration available to the assigned user. |
| Privacy metadata | Moodle Privacy API | Core privacy tooling | Declares stored personal data and external locations. |
| Data export | Moodle privacy request workflow | Core privacy authorization | Includes ModernCommerce data in supported subject exports. |
| Deletion | Moodle privacy request workflow | Core privacy authorization | Deletes/anonymizes supported personal records according to provider rules and legal/relational boundaries. |
| Payment boundary | Gateway integration | Provider-hosted capture | Avoids storing raw card details in ModernCommerce. |
| Webhook verification | Gateway settings and endpoints | Secret/signature validation | Rejects unverified provider claims. |
| Audit evidence | Audit/payment/webhook ledgers | `viewauditlog` and gateway/report capabilities | Preserves independent operational evidence. |
| Localization | Moodle language system | Language packs/overrides | Supports administrator overrides and translation files. |

See [Roles & Permissions](/{{route}}/{{version}}/modern-commerce/roles-and-permissions), [Privacy & Security](/{{route}}/{{version}}/modern-commerce/privacy-and-security), and [Language & Localization](/{{route}}/{{version}}/modern-commerce/localization).

<a name="platform"></a>
## Developer and operational features

| Feature | Source/command | Access/contract | Behavior and purpose |
|---|---|---|---|
| GPL licence | `LICENSE` | GPL-3.0-or-later | Permits use, inspection, modification and redistribution under the licence terms. |
| Moodle-native component | `local_moderncommerce` | Moodle plugin lifecycle | Uses Moodle users, roles, enrolment, messaging, privacy and cron. |
| 81 commerce tables | `db/install.xml` | Moodle DML/XMLDB | Separates catalogue, transaction, access, engagement, reporting, notification and subscription records. |
| 156 service declarations | `db/services.php` | Login/capability rules per service | Powers the shipped AJAX applications; not an unauthenticated general-purpose REST API. |
| Domain events | `classes/event/*` and `db/events.php` | Moodle event contract | Supports observable order and subscription lifecycle changes. |
| 17 scheduled workflows | `db/tasks.php` | Moodle cron | Runs notifications, cleanup, recovery, reporting, keys and subscription lifecycle work. |
| Add-on gating | Admin shell and plugin manager checks | Installed component plus capability | Prevents optional add-on pages from calling missing classes or services. |
| Demo/default seeding | `cli/demo_data.php` | CLI administrator | Seeds safe defaults or explicit demo data according to the selected command. |
| Role seeding | `cli/seed_role_presets.php` | CLI administrator | Refreshes role definitions without assigning people. |
| Documentation audit | `composer run mc:docs-check` | Maintainer workflow | Verifies documentation navigation and files. |
| String audit | `composer run mc:string-audit` | Maintainer workflow | Detects missing language keys used by TypeScript/React sources. |
| Release workflow | `PUBLISHING.txt` and `MAINTAINING.md` | Maintainer workflow | Defines versioning, validation, packaging, tagging and ongoing maintenance. |

See [Web Services & Events](/{{route}}/{{version}}/modern-commerce/web-services-and-events), [Cron & Scheduled Tasks](/{{route}}/{{version}}/modern-commerce/scheduled-tasks), [CLI & Maintenance](/{{route}}/{{version}}/modern-commerce/cli-and-maintenance), and [Add-ons & Extension Points](/{{route}}/{{version}}/modern-commerce/addons-and-extension).

<a name="boundaries"></a>
## Product boundaries

| Boundary | What it means for evaluation |
|---|---|
| Moodle 5.2 and PHP 8.3+ | The documented release targets this platform floor; verify the installed release before upgrading Moodle or PHP. |
| One active store currency | Choose from 21 supported currencies, but do not promise simultaneous multi-currency checkout/reporting. |
| Merchant-owned gateway accounts | The organization supplies credentials and accepts provider fees, settlement rules and account obligations. |
| HTTPS for live payment operations | Production callbacks, webhooks and buyer trust require a correctly secured site. |
| Cron every minute | Renewal, expiry, notifications, recovery, cleanup and reporting depend on working Moodle cron. |
| Optional add-ons remain separate | Course Reminder and Enrolment Notifier integrations are gated; the separate component must be installed and upgraded for its feature set. |
| GPL is not managed hosting | Open-source ownership does not remove backups, monitoring, upgrades, security, privacy and staff responsibility. |

## Where to go next

- [Quick Start](/{{route}}/{{version}}/modern-commerce/quick-start)
- [Admin Page Reference](/{{route}}/{{version}}/modern-commerce/admin-page-reference)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
- [Compare ModernCommerce](/compare)
- [Implementation and commercial support](/support)
