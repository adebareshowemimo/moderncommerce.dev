# First run, demo data & CLI maintenance

ModernCommerce has one primary CLI for installing defaults, seeding demo data, auditing table coverage, refreshing demo data, and resetting to empty.

Run commands from the Moodle web root, the directory containing `admin/`, `course/`, and `local/`. In a split checkout where the web root is named `public`, either change into `public` first or include `public/` in the script path.

```bash
# From the Moodle web root.
php local/moderncommerce/cli/demo_data.php --help

# From the checkout root when Moodle is under public/.
php public/local/moderncommerce/cli/demo_data.php --help
```

## Install safe defaults

Use this on a new site before real configuration:

```bash
php local/moderncommerce/cli/demo_data.php --install-defaults
```

This creates or synchronizes built-in gateway records, ModernCommerce role presets, email templates, subscription email templates, the email shell, and storefront widgets. It does not create fake Moodle courses, products, customers, or orders, so it is the appropriate mode for a production installation.

## Seed a full demonstration site

Use this only on development, staging, sales-demo, or disposable test sites:

```bash
php local/moderncommerce/cli/demo_data.php --seed
```

With no count options, the command requests 12 Moodle categories, 25 Moodle courses, one product per course, 120 orders, 12 coupons, 24 enrolment keys, and four reviews per course. It also creates bundles, prices, product metadata, subscription plans and features, lifecycle records, storefront content, reports, and demo role accounts.

### Bash, Linux, macOS, and Git Bash

Use a backslash (`\`) as the final character on each continued line:

```bash
php local/moderncommerce/cli/demo_data.php --seed \
  --categories=12 \
  --courses=25 \
  --orders=120 \
  --coupons=12 \
  --keys=24 \
  --reviews=4
```

Do not use PowerShell backticks in Bash. If Bash prints `--categories=12: command not found`, the first command may still have completed with default values, but the option lines were executed as separate commands.

### Windows PowerShell

Use a backtick (`` ` ``) as the final character on each continued line:

```powershell
php local/moderncommerce/cli/demo_data.php --seed `
  --categories=12 `
  --courses=25 `
  --orders=120 `
  --coupons=12 `
  --keys=24 `
  --reviews=4
```

Do not place spaces after a Bash backslash or PowerShell backtick. Alternatively, place the entire command on one line.

### Seed options

| Option | Default | Purpose |
| --- | ---: | --- |
| `--userid=N` | First site administrator | Owner for user-scoped sample records. |
| `--categories=N` | `12` | Number of `MCDEMO-CAT-*` Moodle course categories. |
| `--courses=N` | `25` | Number of `MCDEMO-COURSE-*` Moodle courses. |
| `--products=N` | `0` | Product count; `0` creates one product per demo course. |
| `--orders=N` | `120` | Number of orders with varied lifecycle states. |
| `--coupons=N` | `12` | Number of sample coupon definitions. |
| `--keys=N` | `24` | Number of sample enrolment keys. |
| `--reviews=N` | `4` | Requested reviews per course; `0` disables reviews. Actual reviews are limited by the number of usable Moodle users. |

The full seed also creates ten marked role-preview users. Their usernames and shared demo password are maintained in the plugin repository's `docs/demo-role-logins.md`. Never expose those accounts on a public production site.

### Read the result

A successful run prints these groups:

- **Install defaults**: gateways, role presets, email templates, and storefront widgets.
- **Catalog/order sample**: Moodle categories and courses, products, bundles, coupons, keys, reviews, and orders.
- **Subscription matrix**: plans, features, and enabled mappings.
- **Supplemental lifecycle groups**: checkout, marketing, contact, notification, subscription, and report records.
- **Demo role accounts**: created or updated role-preview users.
- **Table coverage audit**: row counts for every ModernCommerce table and a list of empty tables.

An empty optional table does not by itself mean the seed failed. For example, the review-reaction table can remain empty when there are not enough distinct reviewers to generate reactions. Treat a non-zero process exit code, PHP exception, or explicit `cli_error` message as a failure.

## Audit data coverage

```bash
php local/moderncommerce/cli/demo_data.php --audit
```

Use this after installation or demo seeding to see which ModernCommerce tables contain data.

## Refresh demo data

This deletes existing ModernCommerce table data and `MCDEMO-*` Moodle courses and categories, then seeds again:

```bash
php local/moderncommerce/cli/demo_data.php --refresh --yes
```

You can pass the same count options used by `--seed`. Use `--refresh` when you need the requested counts applied to a clean demo dataset. Use it only on development or staging sites.

> {danger} Never run `--refresh` on production unless removal of the scoped commerce and demo data is explicitly intended and backed up.

## Reset to empty

This clears ModernCommerce table data and seeded Moodle demo courses:

```bash
php local/moderncommerce/cli/demo_data.php --reset-empty --yes
```

> {danger} This is destructive. Do not run it against production unless you deliberately intend to remove all ModernCommerce table data. It does not delete the Moodle role definitions.

## Manage demo role accounts only

Create or update the marked role-preview users without seeding the full catalogue:

```bash
php local/moderncommerce/cli/demo_data.php --seed-role-users
```

Remove only those marked users:

```bash
php local/moderncommerce/cli/demo_data.php --remove-role-users --yes
```

## Targeted seed commands

The unified command is preferred. These scripts remain useful for targeted development work:

```bash
php local/moderncommerce/cli/seed_storefront.php
php local/moderncommerce/cli/seed_storefront.php --reset
php local/moderncommerce/cli/seed_subscription_features.php
php local/moderncommerce/cli/test_emails.php --userid=ID
```

Prefer `demo_data.php --install-defaults` for normal initial defaults and create real production data through the administration UI.

## Role preset maintenance

```bash
php local/moderncommerce/cli/seed_role_presets.php --dry-run
php local/moderncommerce/cli/seed_role_presets.php
php local/moderncommerce/cli/seed_role_presets.php --role=moderncommercefinance
php local/moderncommerce/cli/seed_role_presets.php --json
```

The seeder does not assign production users automatically.

## Diagnostics

- `inspect_bundles.php` reports bundle/program fields and certificate metadata.
- `inspect_bundle_files.php` inspects stored bundle image files.
- `set_bundle_template.php` changes bundle template metadata through an API-oriented helper; treat it as a developer tool.
- `test_emails.php [--userid=ID]` sends configured test commerce emails.

## Validation commands

Inside the plugin directory:

```bash
composer run mc:docs-check
composer run mc:string-audit
composer run mc:check-fast
node styles/tools/build-design-system.mjs --check
```

Run Moodle upgrade, cron, and cache commands from the Moodle root:

```bash
php admin/cli/upgrade.php
php admin/cli/cron.php
php admin/cli/purge_caches.php
```

Capture the command, plugin version, environment, and output when escalating a failure. Redact credentials, webhook payload personal data, and live buyer information.

## Related guides

- [Installation](/{{route}}/{{version}}/modern-commerce/installation)
- [Quick start](/{{route}}/{{version}}/modern-commerce/quick-start)
- [Roles and permissions](/{{route}}/{{version}}/modern-commerce/roles-and-permissions)
- [Troubleshooting](/{{route}}/{{version}}/modern-commerce/troubleshooting)
