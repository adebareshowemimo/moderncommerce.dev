# Certificate integration

ModernCommerce supports two certificate paths. Course products use an installed Moodle certificate activity and its course restrictions. Programs can automatically issue one native `tool_certificate` award from the template selected in Advanced Bundle Settings after the live program completion policy is satisfied.

The program **certificate enabled** setting activates this final-award workflow when either the store-wide default template or a valid program-specific override is available.

## Ownership boundary

| Concern | Owner |
| --- | --- |
| Course activities, completion criteria, grades, and completion state | Moodle course configuration |
| Certificate activity, template, issue rules, and issued certificate | Optional `mod_coursecertificate` integration |
| Program completion calculation and final award orchestration | ModernCommerce program progress service |
| Learner certificate discovery page | ModernCommerce learner interface, gated by available certificate evidence |

The certificate integration must remain optional. ModernCommerce pages should not call certificate classes, strings, or services unless `mod_coursecertificate` is installed and upgraded.

## Configure the Moodle course

1. Enable completion tracking at site level and in the course.
2. Define meaningful activity and/or course completion criteria.
3. Install and configure the Course Certificate activity if certificates will be issued.
4. Create or select the certificate template required by that activity.
5. Restrict certificate access using completion conditions rather than presentation-only metadata.
6. Test completion and issuance with a non-administrator learner account.

Administrators can open the course and use **More → Course completion** to review the completion model. The exact activity configuration depends on the installed certificate plugin version.

## Configure ModernCommerce presentation

For a course product, use the course merchandising/advanced-feature administration to describe buyer-facing outcomes without duplicating Moodle course logic. For programs, select the global fallback under **Modern Commerce > Settings > Certificates**, then configure the completion policy, pass threshold, certificate enablement, template override, and certificate prerequisites in the advanced program editor.

The global Certificates tab and bundle/program Advanced Features pages provide **Manage Certificate Templates** for authorised administrators. It opens Moodle's native manager in a new tab so templates can be created or edited without losing unsaved ModernCommerce changes. The link and selectors are hidden safely when Course Certificate is unavailable or the user lacks template-manager access.

**Must Pass Courses** is a program-only child of **Pass Policy**. It appears for `weighted_avg` and `any_pass`, with one course per styled checkbox row and an internally scrollable list for large curricula. It is hidden and cleared for `all_must_pass`, because that policy already requires every course to pass. The server rejects unknown policies and discards must-pass IDs that are not included in the program.

Certificate prerequisites are searchable external Moodle courses. Selecting a result closes and resets the dropdown for the next search. Prerequisites never lock included program courses; they prevent final completion and certificate issuance until Moodle reports every selected prerequisite complete.

Program issuance is automatic and duplicate-safe. ModernCommerce resolves the program override before the global default, issues through `tool_certificate`, and stores the native issue ID on `program_progress`. Course-product certificates remain controlled by their Moodle activity and restrictions.

The first completed transition also emits `program_completed` and queues the editable `moderncommerce_program_completed` learner communication. Recalculation does not send it twice.

## Verification checklist

Use a fresh learner account and verify:

1. Purchase or redemption grants the expected course access.
2. The learner cannot obtain the certificate before satisfying completion rules.
3. Required grades and must-pass courses behave as advertised.
4. The applicable course certificate becomes available, or the program award is automatically issued after completion.
5. The issued certificate opens from Moodle and appears where the ModernCommerce learner certificate interface expects it.
6. Revoked, expired, or unavailable certificates do not produce broken links.
7. The experience remains understandable when the optional certificate plugin is absent.

## Troubleshooting

- **Certificate never becomes available:** inspect course completion, activity restrictions, required grades, cron, and the learner's effective completion record.
- **Certificate appears too early:** fix Moodle completion/restriction rules; do not rely on a storefront flag.
- **Learner page is empty:** confirm the certificate plugin is installed, the activity/template is configured, a certificate was issued, and the current user owns the evidence.
- **Program award is missing:** reconcile program status, prerequisites, policy, pass grade, must-pass courses, template visibility, `tool_certificate_issues`, and progress `certificateissueid`.
- **Integration errors after uninstalling the certificate plugin:** confirm optional-component gating and purge Moodle caches.

See [Bundles & programs](/{{route}}/{{version}}/modern-commerce/bundles-and-programs), [Course merchandising](/{{route}}/{{version}}/modern-commerce/course-merchandising), [Learner account & access](/{{route}}/{{version}}/modern-commerce/learner-account), and [Add-ons & extension points](/{{route}}/{{version}}/modern-commerce/addons-and-extension).
