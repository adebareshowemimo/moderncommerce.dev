# Modern Commerce — Storefront

---

- [What the storefront is](#what)
- [Public pages](#pages)
- [Widgets & edit mode](#widgets)
- [Course & bundle detail pages](#detail)
- [Branding](#branding)
- [Use the storefront as the Moodle home page](#homepage)
- [Spam protection](#spam)

<a name="what"></a>
## What the storefront is

The storefront is the public-facing Modern Commerce experience: landing pages, the catalog, product/detail pages, public content pages, and a set of configurable **widgets**. It is **widget-driven** and **admin-arrangeable** — you compose pages visually rather than editing templates.

Open it at **`/local/moderncommerce/index.php`**.

<a name="pages"></a>
## Public pages

Modern Commerce ships a multi-page public store. The main routes:

- `/local/moderncommerce/index.php` — storefront / catalog entry.
- `/local/moderncommerce/course_details.php?id=ID` — course detail.
- `/local/moderncommerce/bundle_details.php?id=ID` — bundle/program detail.
- `/local/moderncommerce/pricing.php` — value/pricing page.
- `/local/moderncommerce/about.php`, `support.php`, `privacy.php`, `terms.php`, `refund-policy.php` — content pages.

Manage page records and the widget gallery from the admin side:

- `/local/moderncommerce/admin/pages.php` — storefront page records.
- `/local/moderncommerce/admin/gallery.php` — widget gallery and presets.

<a name="widgets"></a>
## Widgets & edit mode

Pages are built from **widgets** (hero, featured products, catalog, content sections, support form, newsletter, and more). Turn on **edit mode** on any storefront page to add, arrange, and configure widgets from a side panel.

- **Presets** hold reusable styling; **widget instances** hold the content and placement for a specific page.
- The **catalog is itself a widget**, so you control exactly where and how listings appear.
- Widget instances are **page-scoped** — a widget type can be reused on any page, but each instance belongs to a particular page and zone.

> {primary} Seed a full set of default storefront widgets with `php local/moderncommerce/cli/demo_data.php --install-defaults`. To reset and reseed only the storefront widgets, use `php local/moderncommerce/cli/seed_storefront.php --reset`.

<a name="detail"></a>
## Course & bundle detail pages

The course detail page uses a dedicated layout: a hero (badges, title, summary, image, quick metrics), a main content column (overview, objectives, outline, reviews), and a **sticky purchase sidebar** (price, add-to-cart / buy-now, secure-payment and instant-access indicators).

The sidebar side is configurable — set **Course detail sidebar position** to `Right` or `Left` in Settings. On mobile the purchase card always stacks **before** long content so the buy action isn't pushed below reviews.

<a name="branding"></a>
## Branding

Branding is driven by design tokens configured at `/local/moderncommerce/admin/branding.php` and in the native plugin settings. Set primary/secondary/accent/surface/text/link/muted colors and a base radius; these generate runtime CSS variables applied across admin, storefront, learner, and public pages. A **Custom CSS** field is available for small site-specific overrides. See [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings).

> {warning} Design changes not showing? Purge Moodle caches. Storefront CSS is loaded centrally — don't add page-level `$PAGE->requires->css()` calls.

<a name="homepage"></a>
## Use the storefront as the Moodle home page

Modern Commerce registers its storefront as a selectable Moodle default homepage. To open your site directly into the store: **Site administration → search "Default home page" → select "Modern Commerce storefront" → save**, then test the site root logged out and logged in. If the option isn't visible after install, purge caches and reload. Do **not** edit Moodle core `index.php` for this.

<a name="spam"></a>
## Spam protection

Public support and newsletter forms use **Moodle core reCAPTCHA v2**. Modern Commerce reads Moodle's global reCAPTCHA public/private keys — it stores none of its own. When both keys are set, the challenge renders and is verified server-side; when they're absent, the forms still work (handy for local/staging). Configure the keys centrally in Moodle administration before opening public forms on production.

## Where to go next

- [Products & Pricing](/{{route}}/{{version}}/modern-commerce/products-and-pricing)
- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
