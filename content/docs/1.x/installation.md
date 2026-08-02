# Modern Commerce: Installation

---

- [Before you start](#before)
- [Install the plugin](#install)
- [Install PHP dependencies (Composer)](#composer)
- [Run the Moodle upgrade](#upgrade)
- [Seed install defaults](#seed)
- [First-run configuration](#configure)
- [Verify the install](#verify)
- [Uninstalling](#uninstall)

<a name="before"></a>
## Before you start

Confirm your environment meets the [Requirements](/{{route}}/{{version}}/modern-commerce/requirements): **Moodle 5.2**, **PHP 8.3+**, **HTTPS** in production, **Composer** available, and **Moodle cron** running.

<a name="install"></a>
## Install the plugin

Copy the plugin so its path is:

```text
local/moderncommerce
```

> {warning} The folder must be named `moderncommerce`: Moodle derives the component `local_moderncommerce` from it.

<a name="composer"></a>
## Install PHP dependencies (Composer)

The repository ships a `composer.json`. From the plugin directory, install its PHP dependencies:

```bash
cd local/moderncommerce
composer install --no-dev --optimize-autoloader
```

<a name="upgrade"></a>
## Run the Moodle upgrade

Complete the database install by visiting **Site administration → Notifications**, or from the Moodle root:

```bash
php admin/cli/upgrade.php
```

Then confirm the plugin appears under:

`Site administration → Plugins → Local plugins → Modern Commerce`

<a name="seed"></a>
## Seed install defaults

On a **new** site, seed safe starting defaults, including gateway records, email templates, storefront widgets, and role presets, before you configure anything:

```bash
php local/moderncommerce/cli/demo_data.php --install-defaults
```

> {primary} This seeds a real starting configuration, not demo content. Full **demo data** (`--seed`) is for development/staging only and creates sample courses, orders, and buyers.

<a name="configure"></a>
## First-run configuration

Open the day-to-day store settings at **Modern Commerce → Settings** (`/local/moderncommerce/admin/settings.php`) and set at least:

1. **Store identity**: business name and support email.
2. **Currency**: pick the active store currency **before** creating any prices (default NGN).
3. **Tax**: mode and default rate, before opening checkout.
4. **Payment gateways**: connect at least one merchant account (see [Payments](/{{route}}/{{version}}/modern-commerce/payments)).
5. **Checkout fields**, **navigation labels**, and **notification** sender/support details.

Deeper configuration (webhook security, notification delivery channels, branding seeds, subscription defaults) lives in Moodle's native plugin settings under **Site administration → Plugins → Local plugins → Modern Commerce**. Both surfaces write to the same config store. See the [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings).

> {warning} **Confirm cron is running**: nothing in the notification, subscription, or reporting pipeline works without it.

<a name="verify"></a>
## Verify the install

1. Visit the storefront at `/local/moderncommerce/index.php`.
2. Visit the admin dashboard at `/local/moderncommerce/admin/index.php` as a manager.
3. Audit which tables have data:

   ```bash
   php local/moderncommerce/cli/demo_data.php --audit
   ```

<a name="uninstall"></a>
## Uninstalling

Uninstall from **Site administration → Plugins → Plugins overview → Modern Commerce → Uninstall**. This removes the plugin and its data. **Export any orders, invoices, or reports you need to keep first**: see [Orders, Invoices & Refunds](/{{route}}/{{version}}/modern-commerce/orders-invoices-refunds).

## Where to go next

- [Quick Start](/{{route}}/{{version}}/modern-commerce/quick-start)
- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
