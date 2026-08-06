# Release packaging

ModernCommerce release archives are built from the plugin root and written to `releases/`. Build from a clean, reviewed source tree; never construct the production ZIP by manually compressing a development checkout.

## Preflight

From `local/moderncommerce`:

```bash
composer validate --no-check-publish
composer run mc:docs-check
composer run mc:check-fast
```

For a release candidate, run the complete suite:

```bash
composer run mc:check
```

Depending on installed tooling, the full suite runs PHP linting and standards checks, Composer validation/audit, optimized autoload generation, CSS checks, AMD and React builds, and PHPUnit diagnostics. Resolve failures; do not publish a package merely because a local page appears to work.

## Generated assets and dependencies

Keep source SCSS and readable generated CSS reviewable during development. If a minified production artifact is required, generate it only in the packaging flow after the design-system build.

Runtime Composer dependencies must be included in the release archive with development dependencies excluded and the autoloader optimized. Users installing a release ZIP should not have to run Composer. Users installing from a source clone still must install dependencies.

## Build the archive

```bash
composer run mc:package
```

The package workflow reads `$plugin->release` from `version.php`, runs documentation checks, creates a clean temporary package, installs production dependencies, writes `releases/moderncommerce-v<release>.zip`, and verifies the expected top-level directory and runtime autoloader.

The PowerShell entry point is:

```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File scripts/git-package.ps1 -Force
```

## Inspect before publishing

Confirm that:

- the ZIP has exactly one top-level `moderncommerce/` directory;
- `version.php`, `db/install.xml`, `db/upgrade.php`, `db/services.php`, and `db/access.php` are present;
- runtime `vendor/` dependencies and `vendor/autoload.php` are present;
- generated AMD, React, and CSS assets match their sources;
- `.git/`, `.github/`, `node_modules/`, local environment files, caches, and old release ZIPs are absent;
- no gateway secrets, webhook secrets, API keys, access tokens, payload dumps, or personal data are present;
- packaged documentation and release notes match the release metadata.

## Version and release rules

Every released file change must be represented by the appropriate `$plugin->version`, `$plugin->release`, release notes, Git tag, and release asset. For release 2.1.8, the archive name is:

```text
moderncommerce-v2.1.8.zip
```

Database upgrade steps must use a build number greater than the previously released build and remain safe when executed once during Moodle upgrade.

## Release automation

```bash
composer run mc:release
```

The release script can run checks, build the archive, and optionally commit, tag, or push according to its explicit PowerShell flags. Review the proposed version, archive contents, current branch, and remote target before enabling publishing actions.

See [Upgrade & release compatibility](/{{route}}/{{version}}/modern-commerce/upgrading), [Moodle Plugins Directory](/{{route}}/{{version}}/modern-commerce/moodle-plugin-directory), and [First run, demo data & CLI](/{{route}}/{{version}}/modern-commerce/cli-and-maintenance).
