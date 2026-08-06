# Modern Commerce: Storefront

---

- [What the storefront is](#what)
- [Public pages](#pages)
- [Manage Store Pages](#manage-pages)
- [Widgets & edit mode](#widgets)
- [Course & bundle detail pages](#detail)
- [Branding](#branding)
- [Use the storefront as the Moodle home page](#homepage)
- [Spam protection](#spam)

<a name="what"></a>
## What the storefront is

The storefront is the public-facing Modern Commerce experience: landing pages, the catalog, product/detail pages, public content pages, and a set of configurable **widgets**. It is **widget-driven** and **admin-arrangeable**: you compose pages visually rather than editing templates.

Open it at **`/local/moderncommerce/index.php`**.

<a name="pages"></a>
## Public pages

Modern Commerce ships a multi-page public store. The main routes:

- `/local/moderncommerce/index.php`: storefront / catalog entry.
- `/local/moderncommerce/course_details.php?id=ID`: course detail.
- `/local/moderncommerce/bundle_details.php?id=ID`: bundle/program detail.
- `/local/moderncommerce/pricing.php`: value/pricing page.
- `/local/moderncommerce/about.php`, `support.php`, `privacy.php`, `terms.php`, `refund-policy.php`: content pages.

Manage page records and the widget gallery from the admin side:

- `/local/moderncommerce/admin/pages.php`: storefront page records.
- `/local/moderncommerce/admin/gallery.php`: widget gallery and presets.

<a name="manage-pages"></a>
## Manage Store Pages

Open **Modern Commerce → Store pages** or go directly to:

```text
/local/moderncommerce/admin/pages.php
```

This administration page is the control centre for buyer-facing storefront pages. It lists each page, its public URL, current availability, and page-level actions.

### Access requirements

The route requires a signed-in user with the system capability:

```text
local/moderncommerce:managestorefront
```

Site administrators, Modern Commerce administrators, and appropriately configured storefront managers normally receive this capability. See [Roles & Permissions](/{{route}}/{{version}}/modern-commerce/roles-and-permissions).

### Managed pages

| Page | Public route | Availability |
| --- | --- | --- |
| Catalogue | `/local/moderncommerce/index.php` | Required; cannot be disabled |
| About | `/local/moderncommerce/about.php` | Optional |
| Support | `/local/moderncommerce/support.php` | Optional |
| Terms | `/local/moderncommerce/terms.php` | Optional |
| Privacy | `/local/moderncommerce/privacy.php` | Optional |
| Refund policy | `/local/moderncommerce/refund-policy.php` | Optional |

New installations treat every optional page as enabled until a manager explicitly disables it. Disabling an optional page hides it from ordinary visitors and returns Moodle's page-not-found response. Users with storefront-management permission can still open the disabled page for review.

> {warning} Disabling a legal or support page does not replace your organization's compliance obligations. Confirm which policy pages your jurisdiction, payment provider, and business model require before hiding them.

### Available actions

- **Visibility switch**: enable or disable an optional page. The catalogue is marked **Required page** and has no visibility switch.
- **Manage widgets**: open the page-layout drawer.
- **Preview**: open the buyer-facing URL to review the rendered page.
- **Manage global widgets**: open `/local/moderncommerce/admin/global.php` for elements that appear across the storefront.

The page table displays the configured page title and summary, but this screen does not directly edit those text values. Page content and presentation come from the widgets assigned to that page and from the page defaults or stored page settings.

### Manage the widget layout

Choose **Actions → Manage widgets** for a page. The drawer groups assigned widgets by render zone and lets you:

1. Move a widget up or down within its current zone.
2. Show or hide an individual widget without deleting it.
3. Review both page-scoped and applicable global widgets.
4. Save the revised ordering and visibility.

The save operation re-sequences widget order inside each zone. It does not create widgets or edit their content. Use storefront edit mode or the [Widget gallery](/{{route}}/{{version}}/modern-commerce/storefront#widgets) to add, configure, or reuse widgets.

### Global versus page-scoped widgets

Page-scoped widgets belong to one storefront page. Global widgets belong to the `global` scope and render in the global top or bottom bands across applicable storefront pages. Manage cross-page elements such as a shared announcement, breadcrumb, or footer from **Manage global widgets** instead of copying the same widget to every page.

### Recommended publishing workflow

1. Keep the page enabled while building it only if public visitors may see unfinished content; otherwise disable the optional page first.
2. Add and configure the required widgets in storefront edit mode or the widget gallery.
3. Use **Manage widgets** to confirm ordering and visibility.
4. Select **Preview** and test desktop and mobile layouts.
5. Verify links, forms, policy text, contact details, and global elements.
6. Enable the page and test again as a user without storefront-management permission.

If a page has no assigned widgets, the layout drawer reports that no widgets are assigned. Seed the standard storefront set with `php local/moderncommerce/cli/demo_data.php --install-defaults`, or create the required widgets through the gallery.

<a name="widgets"></a>
## Widgets & edit mode

Pages are built from **widgets** (hero, featured products, catalog, content sections, support form, newsletter, and more). Turn on **edit mode** on any storefront page to add, arrange, and configure widgets from a side panel.

- **Presets** hold reusable styling; **widget instances** hold the content and placement for a specific page.
- The **catalog is itself a widget**, so you control exactly where and how listings appear.
- Widget instances are **page-scoped**: a widget type can be reused on any page, but each instance belongs to a particular page and zone.

> {primary} Seed a full set of default storefront widgets with `php local/moderncommerce/cli/demo_data.php --install-defaults`. To reset and reseed only the storefront widgets, use `php local/moderncommerce/cli/seed_storefront.php --reset`.

<a name="detail"></a>
## Course & bundle detail pages

The course detail page uses a dedicated layout: a hero (badges, title, summary, image, quick metrics), a main content column (overview, objectives, outline, reviews), and a **sticky purchase sidebar** (price, add-to-cart / buy-now, secure-payment and instant-access indicators).

The sidebar side is configurable: set **Course detail sidebar position** to `Right` or `Left` in Settings. On mobile the purchase card always stacks **before** long content so the buy action isn't pushed below reviews.

<a name="branding"></a>
## Branding

Branding is driven by design tokens configured at `/local/moderncommerce/admin/branding.php` and in the native plugin settings. Set primary/secondary/accent/surface/text/link/muted colors and a base radius; these generate runtime CSS variables applied across admin, storefront, learner, and public pages. A **Custom CSS** field is available for small site-specific overrides. See [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings).

> {warning} Design changes not showing? Purge Moodle caches. Storefront CSS is loaded centrally: don't add page-level `$PAGE->requires->css()` calls.

<a name="homepage"></a>
## Use the storefront as the Moodle home page

Modern Commerce registers its storefront as a selectable Moodle start page, so your site root opens the store instead of Moodle's front page. **Two** settings are required, and both live on **Site administration → Appearance → Navigation** (`/admin/settings.php?section=navigation`):

1. Tick **Enable Home** (`enablemyhome`). This is **off by default** on a fresh Moodle 5.x site.
2. Set **Start page for users** (`defaulthomepage`, labelled *Default home page for users* on earlier Moodle releases) to **Modern Commerce storefront**.

Save, then test the site root both logged out and logged in. If the storefront option isn't listed after install or upgrade, purge caches and reload the page: the hook that contributes it is cached.

From the command line:

```bash
php admin/cli/cfg.php --name=enablemyhome --set=1
php admin/cli/cfg.php --name=defaulthomepage --set=/local/moderncommerce/index.php
php admin/cli/purge_caches.php
```

> {warning} **Store opens for logged-in users but shows the login page to everyone else?** **Enable Home** is unticked. Moodle core redirects anonymous visitors away from the site root before it reaches the branch that forwards to a URL start page, so the storefront redirect never runs. Logged-in users are unaffected, which is what makes the symptom look one-sided.

Once the setting is applied, Moodle core routes logged-in users to the storefront, and Modern Commerce redirects anonymous front-page requests that core leaves on the site home.

For anonymous visitors to actually see the store, three site-level conditions also have to hold:

| Requirement | Where | Notes |
| --- | --- | --- |
| **Force users to log in** off (`forcelogin`) | Site administration → General → Security → Site security settings | When enabled, every page requires a session and no public storefront is possible. |
| Visitor role holds `local/moderncommerce:viewcatalog` | **Role for visitors** in Site administration → Users → Permissions → User policies, then that role's definition | The `guest` archetype receives this capability at install. |
| Widget **audience** is `all` or `guest` | Storefront edit mode, per widget | A widget restricted to logged-in users stays hidden from anonymous visitors even when the page loads. |

Optionally enable **Open to search engines** (`opentowebcrawlers`) so the storefront can be indexed. Do **not** edit Moodle core `index.php` or add a theme-level redirect for this.

<a name="spam"></a>
## Spam protection

Public support and newsletter forms use **Moodle core reCAPTCHA v2**. Modern Commerce reads Moodle's global reCAPTCHA public/private keys: it stores none of its own. When both keys are set, the challenge renders and is verified server-side; when they're absent, the forms still work (handy for local/staging). Configure the keys centrally in Moodle administration before opening public forms on production.

## Where to go next

- [Products & Pricing](/{{route}}/{{version}}/modern-commerce/products-and-pricing)
- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
- [Storefront widget reference](/{{route}}/{{version}}/modern-commerce/storefront-widget-reference)
