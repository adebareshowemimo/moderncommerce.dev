# ModernCommerce.dev

Standalone Laravel 13 and Bootstrap 5.3 website for Modern Commerce, the open-source commerce platform for Moodle.

## Preview

Install and build the project:

```bash
composer install
npm install
npm run build
php artisan serve
```

Then open `http://127.0.0.1:8000`.

## Structure

- `resources/views/home.blade.php` — responsive homepage
- `resources/views/components/marketing-layout.blade.php` — shared site shell
- `resources/views/page.blade.php` — marketing-page foundation
- `resources/views/support.blade.php` — support routing and professional-services page
- `resources/views/support-development.blade.php` — voluntary open-source funding page
- `resources/views/docs/show.blade.php` — Markdown documentation layout
- `resources/css/app.css` — Agunfon-aligned Modern Commerce theme
- `resources/js/app.js` — Bootstrap and site behavior
- `content/docs/` — publishable Markdown documentation
- `routes/web.php` — page, documentation, and sitemap routes
- `docs/PRODUCT.md` — positioning, audiences, and conversion strategy
- `docs/BUSINESS-MODEL.md` — agreed ownership, brand architecture, business model, customer flows, support routing, and decision log
- `docs/DESIGN.md` — visual and Bootstrap design system
- `docs/CONTENT-STRATEGY.md` — sitemap, page copy, SEO plan, and launch sequence

## Funding channel

`/support-development` remains in a safe setup state until the Ko-fi account is ready. Add the final public URL to `.env`:

```dotenv
KOFI_URL=https://ko-fi.com/moderncommerce
```

Then clear Laravel's configuration cache:

```bash
php artisan config:clear
```

The page will replace both setup-state labels with the live **Support on Ko-fi** action. Commercial and technical support remain separate at `/support`.

## Recommended implementation sequence

1. Confirm the public GitHub repository, documentation, demo, roadmap, and support URLs.
2. Replace placeholder links in the homepage and shared layout.
3. Convert shared navigation and footer markup into reusable includes or templates when the production stack is selected.
4. Replace route foundations with the complete Product, Open Source, Developers, Pricing/Services, Roadmap, About, and Support content.
5. Publish versioned technical documentation from the plugin documentation source.
6. Add privacy-respecting analytics, metadata, sitemap, robots policy, social preview, and structured data.
7. Run accessibility, responsive, performance, and link checks before deployment.

## Installed accelerators

- Laravel 13 — routing, Blade templates, configuration, testing, and deployment tooling
- Bootstrap 5.3.8 + Sass — responsive design system bundled through Vite
- Spatie Laravel Markdown — cached Markdown rendering for documentation
- Spatie Laravel Sitemap — sitemap generation and SEO discovery

## Positioning rule

Use “the open-source commerce platform for Moodle” and “the new standard for selling learning in Moodle.” Do not publish “#1,” adoption, revenue, conversion, or security-superiority claims until evidence can substantiate them.
