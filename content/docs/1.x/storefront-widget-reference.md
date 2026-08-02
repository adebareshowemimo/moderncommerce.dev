# Storefront widget reference

This is the implementation and operations reference for the storefront widget system. Administrators create and preview widgets in `/local/moderncommerce/admin/gallery.php`; page layout is managed from `/local/moderncommerce/admin/pages.php` and global placement from `/local/moderncommerce/admin/global.php`.

## Widget lifecycle and scope

1. An administrator creates or edits a widget instance.
2. Settings are stored as JSON in `local_moderncommerce_widget`.
3. Slider slides are stored separately in `local_moderncommerce_widget_slide`.
4. `classes/storefront/page_builder.php` loads enabled widgets for the requested page and zone.
5. A type-specific resolver creates a sanitized payload.
6. The React storefront renders the common widget envelope and type-specific content.

Widgets may be constrained by page type, render zone, audience, start and end time, sort order, background, and vertical spacing. Reusable presets store style configuration separately from instance content and placement.

## Addable widgets

| Type | Purpose | Primary data source |
| --- | --- | --- |
| `slider` | Hero or campaign slider | Slide rows plus widget settings |
| `videohero` | Copy, actions, video, quote, and information panel | Settings and uploaded/direct media |
| `breadcrumb` | Page title and navigation-context banner | Settings and optional background media |
| `featured` | Featured product carousel or grid | Catalogue services and filters |
| `related` | Related product carousel or grid | Catalogue services and filters |
| `categories` | Category tiles or carousel | Moodle categories and selected items |
| `trustbadges` | Trust, security, or value strip | Settings list |
| `countdown` | Time-bound campaign message and optional action | Settings |
| `testimonials` | Customer proof cards | Settings list |
| `instructors` | Instructor spotlight cards | Settings list |
| `newsletter` | Lead-capture block | Subscriber service and settings |
| `content` | General public-page content section | Settings |
| `mediastorycarousel` | Side-by-side media and copy stories | Settings and media |
| `learningpromise` | Centered learning promise | Settings |
| `belief` | About-page mission or belief band | Settings |
| `policy` | Structured terms, privacy, or refund sections | Settings list |
| `faq` | FAQ accordion or list | Settings list |
| `cta` | Call-to-action band | Settings |
| `supportform` | Public commerce support form | Contact services and settings |
| `contactcards` | Contact and help option cards | Settings list |
| `footer` | Multi-column storefront footer | Settings, logos, links, apps, and social data |

The system-managed `catalog` widget renders the core product grid. It is resolver-backed and gallery-visible but is not normally added as an arbitrary content widget.

## Editing and publishing guidance

- Preview each widget style in the gallery before placement.
- Keep headings and action labels short enough to wrap safely on mobile.
- Prefer uploaded production media when ownership, caching, and availability must remain under site control.
- Filter product widgets by type, category, featured state, or limit; use fixed IDs only for intentionally fixed campaigns.
- Use global breadcrumb and footer widgets for a consistent public shell.
- Use policy, FAQ, support form, and contact cards instead of duplicating large static HTML blocks.
- Test scheduled and audience-scoped widgets as both anonymous and authenticated users.

## Developer extension contract

The canonical type list is `classes/storefront/widget_types.php`; editable field definitions are in `classes/storefront/field_schema.php`; runtime payloads come from `classes/storefront/resolver/`.

To add a type:

1. Add its constant and label to `widget_types.php`.
2. Add validated editor fields to `field_schema.php`.
3. Implement `classes/storefront/resolver/widget_resolver.php`.
4. Register the resolver in `page_builder.php`.
5. Add gallery variants in `gallery_builder.php`.
6. Add or update the React renderer.
7. Add SCSS to the storefront/global source bundle, not inline template CSS.
8. Test sanitization, missing optional data, scheduling, audience scope, mobile layout, and unavailable integrations.

Optional add-on widgets must be gated by the installed component. Do not reference missing add-on strings, classes, or web-service method names when the component is absent.

See [Storefront & widgets](/{{route}}/{{version}}/modern-commerce/storefront), [Feature reference](/{{route}}/{{version}}/modern-commerce/feature-reference), and [Add-ons & extension points](/{{route}}/{{version}}/modern-commerce/addons-and-extension).
