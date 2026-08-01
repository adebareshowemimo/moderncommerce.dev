# ModernCommerce source documentation audit

Audit date: 2026-08-01

## Authoritative build

- Component: `local_moderncommerce`
- Release: 2.1.6 (`version.php`)
- Moodle: 5.2 only (`supported = [502, 502]`)
- PHP: 8.3+ (`composer.json`)
- Licence: GPL-3.0-or-later (`LICENSE`, Composer metadata and source headers)

## Reviewed source surfaces

- 779 plugin files excluding dependency/build directories
- 28 root/public PHP pages
- 60 administration PHP pages
- 12 learner PHP pages
- 14 payment entry-point PHP pages
- 282 PHP classes
- 156 Moodle external-function declarations
- 81 XMLDB tables
- 36 ModernCommerce capabilities
- 17 scheduled tasks
- 12 plugin event classes and 5 registered observer bindings
- 77 Mustache templates
- 87 JavaScript/TypeScript source files
- 4,010 English language keys
- 9 CLI commands/helpers

## Documentation coverage decision

The public manual is organized by product workflow for operators and by contract for developers. The Admin Page Reference covers page routes/capabilities; Database Reference covers every table; Web Services & Events covers all external-function domains and registered event flows; Language & Localization covers the complete language source and audit process; CLI and Scheduled Tasks cover every shipped command/task category.

## Source discrepancies found

1. `version.php` declares 2.1.6 while the root README and internal docs mention earlier releases.
2. The root README contains a proprietary-commercial licence paragraph, but `LICENSE`, `composer.json`, source headers and user-facing open-source language declare GPL-3.0-or-later.
3. The schema contains product attributes/relations and bundle prerequisite records whose existence is broader than the current administrator UI. Documentation labels these as data/service support and does not invent a complete UI workflow.
4. Optional notifier/reminder/page-designer/certificate pages are integrations. Documentation keeps their business logic under the owning add-on.

## Final review requirements

- Every configured website section must have a Markdown file and return HTTP 200.
- Every internal documentation link must resolve.
- The navigation must expose each configured section exactly once.
- No page may claim proprietary licensing or an unsupported release/Moodle/PHP version.
- Capability, route, table, service and task counts must be checked against current source before release.
- A browser review must cover desktop and mobile documentation layouts with no inner sidebar scroll bar.
