# Branding & Moodle navigation

ModernCommerce branding is a design-system configuration, not a separate theme. It generates `--mc-*` CSS variables used across the administration, storefront, learner account and public commerce pages while Moodle remains responsible for the surrounding site theme.

## Branding administration

Open `/local/moderncommerce/admin/branding.php` with `local/moderncommerce:managesettings`. The branding service exposes grouped fields, their current value, design-system default and any derived color expressions.

The primary seeds are Primary, Secondary, Accent, Surface, Text, Link and Muted, plus a base radius. Empty values inherit the shipped design-system default. Use these seeds before adding Custom CSS; derived variables keep hover, border and subtle surfaces coordinated.

## Email shell

The Branding page also loads, saves, previews and resets the shared email shell. The shell surrounds event and template content with consistent brand treatment. Preview uses sample data. Test an actual email through Moodle after previewing because mail clients apply stricter HTML/CSS rules than a browser.

## Custom CSS

Custom CSS is appended to runtime brand CSS and is restricted to trusted settings administrators. Keep it small and documented. A broad selector can affect admin, learner and public pages simultaneously. Purge Moodle caches and test responsive layouts after changing it.

## Moodle navigation

The Settings page exposes:

| Setting | Behavior |
| --- | --- |
| Admin navigation label | Label for the manager-facing commerce entry |
| Learner navigation label | Label for learner commerce access |
| Hidden primary items | Optional Moodle nodes: Home, Dashboard, My courses, Site administration |
| Cart position | First or last in Moodle's top-right user navigation; default `first` |

Hiding a navigation item does not remove its route or capability. Use Moodle permissions for security and navigation settings only for information architecture.

## Course detail layout

The Product settings tab can place the desktop course-detail purchase sidebar on the right or left; the default is right. The mobile layout stacks the purchase/sidebar content. Test long course titles, sale pricing and gateway messages in both positions.

## Change checklist

1. Record the previous branding values.
2. Update seed colors and radius.
3. Preview the administration, catalogue, course detail, cart, checkout and learner account.
4. Preview and send a transactional email.
5. Check focus visibility and text contrast.
6. Purge Moodle caches if old variables or labels remain.
7. Add Custom CSS only for a requirement the seed system cannot express.
