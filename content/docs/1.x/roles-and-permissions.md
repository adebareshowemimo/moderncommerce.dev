# ModernCommerce custom roles & permissions

ModernCommerce uses Moodle's native role and capability system. The plugin seeds **nine custom system roles** as least-privilege starting points. It does not assign users to them automatically and it does not maintain a separate permission database.

This reference is derived from `classes/services/role_preset_service.php`, `db/access.php`, the administration page capability checks, and the centralized admin navigation definition in the audited 2.1.6 source.

## Assign a custom role

1. Open **Site administration → Users → Permissions → Assign system roles**.
2. Select the required ModernCommerce role.
3. Assign the staff member.
4. Ask the user to sign out and back in.
5. Test the sidebar and direct page URLs with that account.

All nine presets are system-context roles because the store, orders, gateways, reports and catalogue operate across the Moodle site. Do not assign them only inside an individual course and expect the administration to appear.

## Role selection summary

| Custom role | Shortname | Primary responsibility | Preset capabilities |
| --- | --- | --- | ---: |
| Modern Commerce Administrator | `moderncommerceadmin` | Complete ModernCommerce administration | 27 |
| Modern Commerce Finance | `moderncommercefinance` | Revenue, orders, invoices, refunds and audit evidence | 7 |
| Modern Commerce Product Manager | `moderncommerceproduct` | Products, pricing, bundles, promotions, keys and reviews | 5 |
| Modern Commerce Reporting Manager | `moderncommercereporting` | Read-only operational oversight | 6 |
| Modern Commerce Storefront Manager | `moderncommercestorefront` | Store presentation, products and public review signals | 3 |
| Modern Commerce Marketing Manager | `moderncommercemarketing` | Promotions, email content, leads and newsletter records | 7 |
| Modern Commerce Support | `moderncommercesupport` | Customer order lookup and contact conversations | 4 |
| Modern Commerce Subscription Manager | `moderncommercesubscription` | Plans, features, subscribers, lifecycle and reports | 5 |
| Modern Commerce Payment Operations | `moderncommercepaymentops` | Gateways, payment evidence, orders and refunds | 7 |

## Access matrices

“View” means the preset has the relevant read capability. “Manage” means it has the corresponding write capability. A blank cell means the preset does not receive that access from the source-defined role preset.

### Commerce operations

| Area | Administrator | Finance | Product Manager | Reporting Manager |
| --- | --- | --- | --- | --- |
| Dashboard/general reports | View | View | View | View |
| Orders and customers | Manage | Manage |  | View |
| Invoices | Manage | Manage |  |  |
| Refunds | Manage | Manage |  |  |
| Products, prices and bundles | Manage |  | Manage |  |
| Catalogue categories | Manage |  |  |  |
| Coupons | Manage |  | Manage |  |
| Course/bundle keys | Manage |  | Manage |  |
| Reviews | Manage |  | Manage |  |
| Audit ledger | View | View |  | View |
| Subscribers | Manage | View |  | View |
| Subscription reports | View | View |  | View |

### Storefront and customer engagement

| Area | Administrator | Storefront Manager | Marketing Manager | Support |
| --- | --- | --- | --- | --- |
| Products, prices and bundles | Manage | Manage |  |  |
| Storefront pages/widgets | Manage | Manage |  |  |
| Reviews | Manage | Manage |  |  |
| Coupons | Manage |  | Manage |  |
| Email templates | Manage |  | Manage |  |
| Contacts | Manage |  | Manage | Manage |
| Newsletter records | Manage |  | Manage | View |
| Orders and customers | Manage |  |  | View |

### Platform specialists

| Area | Administrator | Subscription Manager | Payment Operations |
| --- | --- | --- | --- |
| Subscription plans/features | Manage | Manage |  |
| Subscribers/subscriptions | Manage | Manage |  |
| Subscription reports | View | View |  |
| Orders, invoices and customers | Manage |  | Manage |
| Refunds | Manage |  | Manage |
| Gateways/webhooks | Manage |  | Manage |
| Audit ledger | View |  | View |
| Notification delivery evidence | View |  | View |
| Store settings/branding | Manage |  |  |
| Notification channel configuration | Manage |  |  |

## Modern Commerce Administrator

**Shortname:** `moderncommerceadmin`

Use for the accountable commerce-platform owner who needs every ModernCommerce-owned administrative capability.

The preset receives all 27 ModernCommerce administration capabilities:

```text
managestorefront, managesettings, viewallorders, manageorders,
managecourses, managecategories, managecoupons, generatekeys,
viewreports, viewauditlog, configuregateways, viewemailtemplates,
manageemailtemplates, managereviews, processrefunds,
receivenotificationops, managenotifications, viewnotificationlog,
viewcontacts, managecontacts, viewnewsletter, managenewsletter,
managesubscriptionplans, viewsubscribers, managesubscriptions,
viewsubscriptionreports, managesubscriptionfeatures
```

This role can manage the dashboard, orders, customers, invoices, products, prices, categories, bundles/programs, coupons, course/bundle keys, storefront, reviews, contacts, newsletter, email templates, settings, branding, gateways, webhooks, refunds, audit evidence, notifications and the subscription subsystem.

It does **not** automatically receive Moodle's core `moodle/site:config` capability. Therefore, pages explicitly reserved for site configuration, such as the Add-ons or Components inventory, still require a site administrator or an additional carefully granted Moodle capability. Optional add-ons can also require their own component capabilities.

The preset intentionally excludes buyer/learner capabilities. A staff user normally receives those through Moodle's authenticated-user role.

## Modern Commerce Finance

**Shortname:** `moderncommercefinance`

Use for finance staff responsible for commercial records, reconciliation and controlled refunds.

Exact capabilities:

```text
viewreports
viewsubscriptionreports
viewallorders
manageorders
processrefunds
viewauditlog
viewsubscribers
```

This permits the dashboard and reports, order/customer views, order management, invoice workflows, refund processing, audit-log review, subscription reports and subscriber visibility. Because `manageorders` is a write capability, this is not a read-only accountant role.

It does not include products, prices, categories, coupons, keys, storefront design, email templates, settings, gateway credentials, notification configuration, subscription-plan configuration or subscription lifecycle actions.

Assign it only to staff authorised to change order/invoice state and process refunds. For audit-only finance users, clone the role and omit `manageorders` and `processrefunds`.

## Modern Commerce Product Manager

**Shortname:** `moderncommerceproduct`

Use for staff who own the commercial catalogue and promotional product setup.

Exact capabilities:

```text
managecourses
managecoupons
generatekeys
managereviews
viewreports
```

This permits course products and prices, bundles/programs, advanced course and bundle merchandising, coupons and targets, course/bundle enrolment keys, review moderation, the dashboard, reports and wishlist reporting.

The role does not receive `managecategories`; the audited preset intentionally separates global catalogue-taxonomy control from day-to-day product work. It also excludes orders, customers, refunds, invoices, gateways, settings, branding, contacts, newsletter, email templates and subscription administration.

If the product team must own the global category tree, add `local/moderncommerce:managecategories` deliberately after reviewing its `RISK_CONFIG` classification.

## Modern Commerce Reporting Manager

**Shortname:** `moderncommercereporting`

Use for analysts, auditors or leaders who need operational visibility without commerce write permissions.

Exact capabilities:

```text
viewreports
viewsubscriptionreports
viewallorders
viewauditlog
viewsubscribers
viewnotificationlog
```

This permits dashboard/report access, read access to orders and customers, audit evidence, subscriber visibility, subscription reports and notification-delivery evidence wherever the active interface honors `viewnotificationlog`.

The main Notifications configuration page requires `managenotifications`; `viewnotificationlog` alone does not grant channel/endpoint configuration. This preset cannot change products, orders, invoices, refunds, coupons, keys, subscriptions, gateways, settings or communications content.

This is the safest preset for leadership dashboards and independent operational review.

## Modern Commerce Storefront Manager

**Shortname:** `moderncommercestorefront`

Use for designers/content managers responsible for the public shop experience.

Exact capabilities:

```text
managestorefront
managecourses
managereviews
```

This permits storefront pages, widget gallery/layout, products, prices, bundles/programs, course/bundle merchandising and review moderation. `managestorefront` carries Moodle's `RISK_XSS | RISK_CONFIG` classification because storefront content can affect public rendering.

The preset does not include reports, orders, customer data, categories, coupons, keys, global settings/branding, gateways, contacts, newsletter, email templates or subscriptions. Although the role can edit product presentation, it cannot change the global category structure.

Assign only to trusted users who are allowed to publish public-facing content.

## Modern Commerce Marketing Manager

**Shortname:** `moderncommercemarketing`

Use for promotional campaigns, commerce email content and lead/customer communications.

Exact capabilities:

```text
managecoupons
viewemailtemplates
manageemailtemplates
viewcontacts
managecontacts
viewnewsletter
managenewsletter
```

This permits coupon management, shared email-template viewing/editing/cloning, contact-inbox viewing/replies/status management and newsletter subscriber viewing/management/export actions supported by the page.

It does not include product pricing, storefront layout, reviews, orders, reports, customers, refunds, settings, gateway configuration, notification channels or subscriptions. Email-template management can publish HTML and links received by buyers, so this is a trusted content role rather than a harmless read-only marketing role.

Newsletter access does not itself establish legal marketing consent; the organisation remains responsible for consent, suppression and retention policy.

## Modern Commerce Support

**Shortname:** `moderncommercesupport`

Use for first-line customer-service staff who investigate orders and handle contact conversations.

Exact capabilities:

```text
viewallorders
viewcontacts
managecontacts
viewnewsletter
```

This permits read access to all orders and customer commerce details, viewing and replying to contact submissions, changing contact status and viewing newsletter records.

It does not receive `manageorders`, so it cannot change order/invoice state through protected write operations. It cannot process refunds, view audit reports, edit products/coupons/keys, configure gateways/settings, manage newsletter records, edit email templates or administer subscriptions.

Escalate payment reconciliation and refunds to Finance or Payment Operations rather than expanding every support user's permissions.

## Modern Commerce Subscription Manager

**Shortname:** `moderncommercesubscription`

Use for staff who own membership plans and subscriber lifecycle operations.

Exact capabilities:

```text
managesubscriptionplans
managesubscriptionfeatures
viewsubscribers
managesubscriptions
viewsubscriptionreports
```

This permits creating/editing/deleting plans, maintaining the feature matrix, configuring plan access rules, viewing subscribers, activating/suspending/cancelling subscriptions, subscription keys/emails where the page uses the plan-management capability, and viewing subscription reports.

It does not include general product pricing, course/bundle keys, orders, invoices, refunds, payment gateway configuration, global settings, audit logs, contacts or marketing templates. If a subscription payment incident requires order or gateway investigation, work with Finance or Payment Operations.

Because plan rules can grant or remove learner access, treat this as a high-impact write role.

## Modern Commerce Payment Operations

**Shortname:** `moderncommercepaymentops`

Use for staff responsible for gateway configuration, webhook diagnosis, payment reconciliation and refunds.

Exact capabilities:

```text
configuregateways
viewallorders
manageorders
processrefunds
viewreports
viewauditlog
viewnotificationlog
```

This permits the dashboard/reports, orders and customers, invoice/order management, refunds, gateway configuration, webhook configuration, payment/webhook ledgers, audit evidence and notification-delivery evidence supported by the relevant interface.

It does not include global commerce settings, branding, products, categories, coupons, keys, storefront design, contact/newsletter management, email-template editing or subscription-plan administration.

Gateway credentials and webhook secrets are highly sensitive. Keep this role limited to the smallest operational team and review assignments regularly.

## Moodle Manager is not a custom preset

Moodle's built-in **Manager** archetype receives the ModernCommerce capabilities explicitly marked for `manager` in `db/access.php`. That gives it broad store operations, but it is not equivalent to Modern Commerce Administrator.

By default, Moodle Manager does not receive ModernCommerce settings, global categories, gateways, audit log, email-template management, notification-channel configuration, subscription-plan setup or feature-matrix management. Review the actual role definition on the site because administrators can customize Moodle archetypes.

## Buyer and learner capabilities

The nine custom administrative presets intentionally exclude buyer capabilities. Moodle's authenticated-user and guest archetypes receive the applicable access separately:

| Capability | Default archetype |
| --- | --- |
| `viewcatalog` | Authenticated user and guest |
| `viewdetails` | Authenticated user and guest, course context |
| `purchase` | Authenticated user |
| `viewownorders` | Authenticated user |
| `redeemkey` | Authenticated user |
| `viewreviews` | Authenticated user and guest, course context |
| `submitreview` | Authenticated user, course context |
| `viewownsubscription` | Authenticated user |
| `subscribetoplan` | Authenticated user |

An administrative user normally also has the authenticated-user role, but the custom preset itself does not grant these capabilities.

## Create a narrower custom role

When a preset is too broad:

1. Open **Site administration → Users → Permissions → Define roles**.
2. Add a role using no archetype or copy the nearest preset.
3. Allow the system context.
4. Grant only the required `local/moderncommerce:*` capabilities.
5. Document the business owner and approval reason.
6. Test direct URLs and write actions with a dedicated account.

Examples:

| Requirement | Suggested capabilities |
| --- | --- |
| Read-only finance/audit | `viewreports`, `viewsubscriptionreports`, `viewallorders`, `viewauditlog`, `viewsubscribers` |
| Refund approver | `viewallorders`, `manageorders`, `processrefunds`, `viewauditlog` |
| Category administrator | `managecategories`, optionally `viewreports` |
| Contact agent without newsletter visibility | `viewcontacts`, `managecontacts`, optionally `viewallorders` |
| Gateway auditor without configuration | No exact gateway-ledger-only preset exists; create and test a custom design rather than granting `configuregateways` casually |

## Seed, inspect and refresh presets

From the Moodle root:

```bash
php local/moderncommerce/cli/seed_role_presets.php --dry-run
php local/moderncommerce/cli/seed_role_presets.php
php local/moderncommerce/cli/seed_role_presets.php --role=moderncommercefinance
php local/moderncommerce/cli/seed_role_presets.php --json
```

The seeder follows conservative rules:

- it creates missing preset roles at system context;
- it marks plugin-owned roles in their descriptions;
- it adds a missing preset capability but does not remove extra administrator-added capabilities;
- it preserves an existing non-`CAP_ALLOW` permission rather than overwriting it;
- it skips an existing shortname that lacks the ModernCommerce ownership marker;
- it never assigns production users automatically.

Because the seeder only adds missing preset permissions, a previously customized role may be broader than this document. Review **Define roles** to determine the effective site configuration.

## Demo role verification

On a development or staging site, create marked preview accounts:

```bash
php local/moderncommerce/cli/demo_data.php --seed-role-users
```

Remove only the marked preview users afterward:

```bash
php local/moderncommerce/cli/demo_data.php --remove-role-users --yes
```

Do not seed demo accounts on production. For production verification, use controlled staff test accounts and remove their assignments after sign-off.

## Troubleshooting role access

If a page is missing:

1. Confirm the role is assigned at system context.
2. Confirm the account signed in again after assignment.
3. Check the exact page capability in the [Admin page reference](/docs/1.x/admin-page-reference).
4. Review overrides and prohibitions in Moodle's role report.
5. Test the direct URL; sidebar visibility is not the security boundary.
6. For an add-on page, check both the ModernCommerce permission and the add-on's own capability.
7. Purge Moodle caches only after confirming the effective permission data.
