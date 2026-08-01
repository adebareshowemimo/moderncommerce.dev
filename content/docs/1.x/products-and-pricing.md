# Modern Commerce — Products & Pricing

---

- [Products in Modern Commerce](#products)
- [Pricing a course](#pricing)
- [Inventory & seats](#inventory)
- [Bundles vs programs](#bundles)
- [Advanced bundle/program settings](#advanced)
- [Course merchandising metadata](#metadata)

<a name="products"></a>
## Products in Modern Commerce

Anything sellable is a **product**. Product types include **courses**, **bundles**, **programs**, and **subscription plans**. Products wrap your existing Moodle courses — you don't rebuild content, you attach commerce to it.

Key admin pages:

- `/local/moderncommerce/admin/pricing.php` — product and course pricing.
- `/local/moderncommerce/admin/categories.php` — catalog categories.
- `/local/moderncommerce/admin/bundles.php` — bundle and program admin.

A typical product lifecycle: create or pick a Moodle course → create the Modern Commerce product → set price, visibility, status → attach categories/tags → configure display metadata → preview the public catalog and detail page.

<a name="pricing"></a>
## Pricing a course

Set prices from `/local/moderncommerce/admin/pricing.php`. Common fields:

| Field | Meaning |
|---|---|
| Price (`amount`) | The active selling price. |
| Compare-at (`compareamount`) | Optional crossed-out "was" price for showing a discount. |
| Price type | Regular, sale, tier, or a subscription-related price type. |
| Active window | Optional start/end dates during which a price row applies. |
| Enabled | Whether the price row can be used. |

> {primary} Prices are always shown and charged in the single active **store currency** (default NGN). Modern Commerce is single-currency — set the currency in Settings **before** creating production prices. See [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings).

<a name="inventory"></a>
## Inventory & seats

Inventory is optional. Use **stock management** when access should be limited by seats, licences, or cohort capacity. Leave stock **unmanaged** for normal, always-available course products — the common case.

<a name="bundles"></a>
## Bundles vs programs

Bundles and programs are both multi-course products, but they carry a different **buyer promise** — choose the type by what you're selling, not by mechanics.

| Question | Bundle | Program |
|---|---|---|
| Buyer expectation | A convenient package or discount | A guided path to an outcome |
| Course order | Usually flexible | Usually intentional / sequential |
| Marketing emphasis | Value, collection, theme, package | Outcome, pathway, curriculum, certificate |
| Examples | "Excel Skills Bundle" | "Data Analyst Career Program" |

Under the hood both share the same pricing, cart, checkout, order, key, subscription-access, and learner-access mechanics. Changing the type only changes how the product is positioned (labels, badges, filters, reporting) — it does not create a separate enrolment engine; the included Moodle courses remain the access source.

Manage the core record (included courses, image, status, base and sale price) at `/local/moderncommerce/admin/bundles.php`.

<a name="advanced"></a>
## Advanced bundle/program settings

After a bundle/program exists, open `/local/moderncommerce/admin/advanced_bundle_features.php?bundleid=ID` (requires `local/moderncommerce:managecourses`) to control how it's merchandised and understood:

- **Catalog visibility** — skill level, language, visibility mode (`Public`, `Hidden`, `Scheduled`), and optional availability dates.
- **Duration & assessments** — auto-detected from included courses, or entered manually.
- **Completion** — pass policy (`all_must_pass`, `weighted_avg`, `any_pass`), pass grade, certificate flag, and must-pass courses.
- **Course outline** — a short, learner-facing curriculum summary (not a substitute for Moodle course sections).
- **Tags** and **merchandising badges** (Featured, Bestseller, Trending).

> {warning} Use badges sparingly. If every product is "Featured" and "Bestseller", the badges stop meaning anything.

<a name="metadata"></a>
## Course merchandising metadata

Use the advanced course features page to enrich a course's public detail page — level, duration, language, outcomes, outline, tags, and trust signals — without editing Moodle course internals.

## Where to go next

- [Storefront](/{{route}}/{{version}}/modern-commerce/storefront)
- [Coupons & Keys](/{{route}}/{{version}}/modern-commerce/coupons-and-keys)
- [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
