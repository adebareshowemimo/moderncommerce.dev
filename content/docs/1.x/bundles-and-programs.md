# Bundles & programs

Bundles and programs are both multi-course products managed from `/local/moderncommerce/admin/bundles.php`. They share the same product, pricing, cart, order, fulfilment, key and access machinery, but communicate different buyer promises.

| | Bundle | Program |
| --- | --- | --- |
| Primary promise | Buy a useful collection together | Follow a structured path to an outcome |
| Typical order | Flexible | Intentional or sequential |
| Merchandising emphasis | Package value, theme or discount | Curriculum, prerequisites, milestones or certificate |
| Stored type | `bundle` | `program` |

Changing the type changes positioning and labels; it does not create a different enrolment engine. Included courses remain product-course links and successful fulfilment expands them into learner access.

## Core editor

Use the bundle editor for the name, description, type, image, included Moodle courses, status, base price and sale price. It requires `local/moderncommerce:managecourses`.

Before saving, confirm every included course is the intended live Moodle record. Removing a course from a sold offer may affect future fulfilment and how historic orders are interpreted; use a new product/version when the commercial promise changes materially.

## Advanced settings

Open `/local/moderncommerce/admin/advanced_bundle_features.php?bundleid=ID` for:

- level, language, public/hidden/scheduled merchandising and dates;
- automatic or manual duration;
- automatic Moodle quiz count or manual assessment count;
- pass policy and pass-grade metadata;
- certificate-enabled metadata;
- must-pass course selection;
- buyer-facing curriculum outline;
- tags and featured/bestseller/trending badges.

Automatic duration aggregates available metadata from included courses. Automatic assessments count Moodle quiz modules. Use manual values when the offer includes offline work, external exams or incomplete course metadata.

## Completion metadata

Supported pass-policy values are `all_must_pass`, `weighted_avg`, and `any_pass`. Pass grade is normalized to 0–100. Must-pass selections are limited to courses already included in the bundle/program.

These settings describe the commerce-level pathway. Confirm any certificate or completion experience used in production is backed by the installed course-completion/certificate implementation; a merchandising flag alone is not a complete certificate workflow.

## Prerequisites limitation

The database and service layer contain bundle prerequisite records. In the audited build, the Advanced Bundle Settings React page reads and preserves existing prerequisite metadata but does not expose controls to add or edit it. Do not promise an administrator prerequisite-editing workflow until the active UI implements one.

## Enrolment keys

Bundle keys can target a multi-course product. Redemption records the use and grants the corresponding access through the key-redemption and enrolment services. Manage them separately from course keys at `/local/moderncommerce/admin/bundle_keys.php` so the target and remaining usage are unambiguous.

## Production test

Test a bundle/program with a fresh learner account. Verify catalogue presentation, price, every included order item or entitlement, enrolment in each course, learner-account display, and key redemption if used. A product page that looks correct is not enough evidence that the multi-course fulfilment path is correct.
