# CLI & maintenance

Run plugin commands from the Moodle root unless stated otherwise. Demo/reset commands are for development or staging and can remove commerce data.

## Unified demo command

```bash
php local/moderncommerce/cli/demo_data.php [mode] [options]
```

| Mode | Effect |
| --- | --- |
| `--install-defaults` | Seed safe defaults such as roles, gateway definitions, emails and storefront widgets |
| `--seed` | Create the full demonstration dataset |
| `--seed-role-users` | Create/refresh marked role-preview accounts |
| `--remove-role-users --yes` | Delete only marked preview users |
| `--audit` | Print commerce table counts and empty tables |
| `--refresh --yes` | Reset then seed the demo dataset |
| `--reset-empty --yes` | Remove ModernCommerce data and seeded demo courses |

Never run `--refresh` or `--reset-empty` against production unless destruction of the scoped data is explicitly intended and backed up.

Seed sizing options include `--userid`, `--categories`, `--courses`, `--products`, `--orders`, `--coupons`, `--keys`, and `--reviews`.

## Roles

```bash
php local/moderncommerce/cli/seed_role_presets.php --dry-run
php local/moderncommerce/cli/seed_role_presets.php
php local/moderncommerce/cli/seed_role_presets.php --role=moderncommercefinance
php local/moderncommerce/cli/seed_role_presets.php --json
```

The seeder does not assign production users automatically.

## Targeted seeders

`seed_storefront.php`, `seed_subscription_features.php`, and `seed_sample_data.php` are focused development/setup helpers. Prefer `demo_data.php --install-defaults` for normal initial defaults and create real production data through the administration UI.

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

Run Moodle upgrade, cron and cache commands from the Moodle root:

```bash
php admin/cli/upgrade.php
php admin/cli/cron.php
php admin/cli/purge_caches.php
```

Capture command, version, environment and output when escalating a failure, but redact credentials, webhook payload personal data and live buyer information.
