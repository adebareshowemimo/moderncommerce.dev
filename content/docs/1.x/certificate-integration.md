# Certificate integration

ModernCommerce can surface certificate-related merchandising and learner links, but Moodle course completion and an installed certificate activity remain the source of truth. A ModernCommerce “certificate enabled” flag does not create a certificate by itself.

## Ownership boundary

| Concern | Owner |
| --- | --- |
| Course activities, completion criteria, grades, and completion state | Moodle course configuration |
| Certificate activity, template, issue rules, and issued certificate | Optional `mod_coursecertificate` integration |
| Bundle/program certificate and completion messaging | ModernCommerce merchandising metadata |
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

For a course product, use the course merchandising/advanced-feature administration to describe buyer-facing outcomes without duplicating Moodle course logic. For a bundle or program, configure completion policy, pass threshold, must-pass courses, outline, badges, and certificate messaging in the advanced bundle editor.

Keep these claims aligned with the actual Moodle rules. If the sales page promises a certificate after all included courses pass, the Moodle completion and certificate restrictions must enforce the same requirement.

## Verification checklist

Use a fresh learner account and verify:

1. Purchase or redemption grants the expected course access.
2. The learner cannot obtain the certificate before satisfying completion rules.
3. Required grades and must-pass courses behave as advertised.
4. The certificate activity becomes available after completion.
5. The issued certificate opens from Moodle and appears where the ModernCommerce learner certificate interface expects it.
6. Revoked, expired, or unavailable certificates do not produce broken links.
7. The experience remains understandable when the optional certificate plugin is absent.

## Troubleshooting

- **Certificate never becomes available:** inspect course completion, activity restrictions, required grades, cron, and the learner's effective completion record.
- **Certificate appears too early:** fix Moodle completion/restriction rules; do not rely on a storefront flag.
- **Learner page is empty:** confirm the certificate plugin is installed, the activity/template is configured, a certificate was issued, and the current user owns the evidence.
- **Bundle claim does not match issuance:** reconcile bundle completion metadata, must-pass courses, included course mappings, and actual Moodle completion rules.
- **Integration errors after uninstalling the certificate plugin:** confirm optional-component gating and purge Moodle caches.

See [Bundles & programs](/{{route}}/{{version}}/modern-commerce/bundles-and-programs), [Course merchandising](/{{route}}/{{version}}/modern-commerce/course-merchandising), [Learner account & access](/{{route}}/{{version}}/modern-commerce/learner-account), and [Add-ons & extension points](/{{route}}/{{version}}/modern-commerce/addons-and-extension).
