# Bundles & programs

Bundles and programs are multi-course ModernCommerce products, but they create different learner experiences. A bundle is a flexible commercial collection. A program adds an intended curriculum order, live completion and grade rules, certificate prerequisites, progress tracking, and an optional final Course Certificate award. Purchasing either type grants access to every included course.

## Bundle and program comparison

| Behavior | Bundle | Program |
| --- | --- | --- |
| Stored product type | `bundle` | `program` |
| Included courses | `local_moderncommerce_product_courses` | `local_moderncommerce_product_courses` |
| Course order | Display preference | Intended curriculum order for presentation and reporting |
| Initial enrollment | Every included course | Every included course |
| External prerequisites | Stored metadata | Final completion and certificate requirement; never an access lock |
| Completion policy | Configuration and merchandising metadata | Evaluated against live Moodle completion and grades |
| Persistent progress | None | `local_moderncommerce_program_progress` |
| Automatic final certificate | No | Yes, when configured and earned |

Both types use the same product, pricing, catalogue, cart, checkout, order, key, ownership, and enrollment foundation. A paid bundle or program grants every included course. Programs additionally maintain live progress and apply their configured prerequisite, grade, pass-policy, must-pass, and certificate rules to the final program outcome.

## Components and ownership

- `local_moderncommerce` owns program configuration, orders, enrollment, progress, learner presentation, and certificate orchestration.
- Moodle course completion supplies the authoritative completed/not-completed state.
- Moodle gradebook supplies normalized final course grades when available.
- The ModernCommerce enrollment service creates Moodle enrollments and entitlements.
- `mod_coursecertificate` makes the Course Certificate integration available.
- `tool_certificate` owns templates, issues, PDFs, and award notifications.

Automatic program certificates require installed and upgraded `mod_coursecertificate` and `tool_certificate` components and at least one visible template.

## Prepare Moodle courses

Before selling a program:

1. Enable Moodle course completion.
2. Configure meaningful course-completion criteria for every included and prerequisite course.
3. Configure course total grades when the selected policy depends on grades.
4. Optionally create the numeric course custom field `learninghours` and assign values.
5. Add Moodle quiz activities when assessments should be counted automatically.

Program outcome calculation reads Moodle **course completion**. Completing one activity does not complete the program unless it causes Moodle to mark the relevant course complete.

## Create and order a program

Open `/local/moderncommerce/admin/bundles.php`.

1. Create or edit the multi-course product.
2. Set the type to **Program**.
3. Add its Moodle courses.
4. Arrange them in the intended learning order.
5. Configure the name, description, image, status, visibility, and prices.

`local_moderncommerce_product_courses.sortorder` defines the intended curriculum order used in presentation and reporting; it does not lock later courses. The editor requires `local/moderncommerce:managecourses`.

## Advanced program settings

Open `/local/moderncommerce/admin/advanced_bundle_features.php?bundleid=PROGRAM_ID` to configure:

- skill level, language, visibility, and availability dates;
- automatic or manual duration;
- automatic or manual assessment count;
- external prerequisite courses;
- pass policy and pass grade;
- must-pass included courses;
- Course Certificate enablement and template;
- buyer-facing outline, tags, and merchandising badges.

## Duration and assessments

### Automatic duration

Automatic duration finds the Moodle course custom field with the exact shortname `learninghours`. It reads each included course's numeric hour value, converts it to minutes, and sums the total.

| State | Meaning |
| --- | --- |
| No included courses | Nothing is available to calculate. |
| Field missing | Moodle has no `learninghours` course custom field. |
| Field exists with no values | No included course has a configured value. |
| Partial configuration | Configured values are summed and missing courses are listed. |
| Complete configuration | Every included course contributes to the total. |

A missing value is not silently treated as zero. Disable automatic duration to enter non-negative hours and `0` through `59` minutes manually.

### Automatic assessments

Automatic assessments count non-deleted Moodle `quiz` modules across all included courses. The live value is not editable while automatic mode is enabled.

Disable automatic assessments to enter a non-negative whole number for offline, external, or non-quiz assessments.

## Prerequisites and course access

### External prerequisites

The certificate section provides a search-ahead multi-select of visible Moodle courses that are not included in the program. Selecting a result closes the dropdown, clears its query and stale options, and leaves the search ready to reopen for another selection. Selected prerequisites remain in a removable list.

Every selected prerequisite must be complete before the program can become complete or issue its final certificate. An incomplete prerequisite does not prevent enrollment in or access to any included course. The learner page explains that certificate prerequisites remain outstanding.

Completing an external prerequisite triggers the same synchronization used for included courses.

### Included-course access

Purchasing or redeeming a program enrolls every included course immediately. Learners can open courses in any order. The configured sort order still communicates the intended learning path and determines the order shown in program progress views.

## Completion and grades

Each synchronization calculates total, completed and passed courses; average normalized final grade; completion percentage; current course; prerequisite state; final status; and certificate state.

### Passed course definition

A course passes when Moodle reports it complete and its normalized final course grade meets the program pass grade. If a completed course has no final grade, completion counts as passing. Configure a course total grade for every included course when grades must always determine success.

Pass grade is a normalized percentage from `0` through `100`. Grades are normalized using the Moodle grade item's minimum and maximum.

### Completion policies

| Policy | Base completion condition | Must-pass override |
| --- | --- | --- |
| `all_must_pass` | Every included course is complete and passed | Not applicable; every course already has to pass |
| `weighted_avg` | Every course is complete and the average meets the threshold | Every selected course must pass |
| `any_pass` | At least one included course is complete and passed | Every selected course must pass |

External prerequisites must also be complete for every policy.

The `weighted_avg` key is historical. The current model has no per-course weight field, so every available course final grade contributes equally. Courses without final grades do not add grade points. With no final grades, the calculated average is zero.

Must-pass courses add an individual-course requirement to `weighted_avg` and `any_pass`. The selector appears immediately beneath **Pass Policy** for those policies and is hidden for `all_must_pass`, where it would be redundant. Switching to `all_must_pass` clears previous selections. The server rejects unknown policies, ignores course IDs outside the program, and never stores must-pass rules for bundles.

The UI renders one included course per full-width row with a styled checkbox. Long names wrap inside the row, while large course lists scroll inside a bounded panel with clear checked, hover, and keyboard-focus states.

## Learner experience

A purchased program opens at `#/access/program/PROGRAM_ID` in the learner application.

The page displays:

- program name and type;
- overall completion percentage and status counts;
- all included courses in order;
- per-course progress;
- prerequisite-pending information;
- launch actions for every included course.

The general learner course library also includes the enrolled program courses. Prerequisite status explains certificate eligibility and does not remove launch URLs.

## Purchase and enrollment flow

1. Checkout creates an order item for the program.
2. Successful payment triggers `\local_moderncommerce\event\order_paid`.
3. `enrollment_observer` identifies the program product.
4. `bundle_enrollment_api::enroll_user()` delegates to `program_progress_service::enrol()`.
5. The service evaluates prerequisites, completion, grades, and policy.
6. It enrolls every included course through `enrolment_service`.
7. It inserts or updates `local_moderncommerce_program_progress`.
8. The order item is marked enrolled.

Bundle purchases continue to enroll every included course.

## Course-completion event flow

Moodle emits `\core\event\course_completed` when a course becomes complete. `program_observer::course_completed()` finds purchased programs where that course is included or is an external prerequisite, then synchronizes each affected learner/program pair.

Opening the learner program page also synchronizes progress, providing recovery when grades or completion records changed after the original event.

Synchronization is idempotent: existing enrollments are reused, the single progress row is updated, and an existing certificate is not issued again.

## Course Certificate integration

Create native templates under `Site administration > General > Certificates > Manage certificate templates`.

Completion and certificate controls are program-only; bundles do not have a program-level completion outcome.

Set an optional store-wide template at **Modern Commerce > Settings > Certificates** (`/local/moderncommerce/admin/settings.php?tab=certificates`). When **Enable certificate** is selected, a program may use that global default or select its own template as an override. A program-specific selection always wins.

The global Certificates tab and every bundle/program Advanced Features page provide **Manage Certificate Templates** when the current administrator can access Moodle's native template manager. It appears beside a template selector where applicable and opens the manager in a new tab, preserving unsaved ModernCommerce changes. If Course Certificate is absent, partially installed, awaiting upgrade, or inaccessible, ModernCommerce hides the template actions, shows an explanatory notice where appropriate, and continues operating normally.

Saving fails if certificate issuance is enabled and the add-on is unavailable, neither source supplies a template, or an explicitly selected template is not visible.

Only the program override is stored in `local_moderncommerce_bundle_meta.certificate_template_id`. A null value resolves the current global default at issuance time.

After program completion, ModernCommerce calls the native `tool_certificate` template API. `tool_certificate_issues` stores the issue with:

- `component = local_moderncommerce`;
- the learner and selected template IDs;
- program ID and name in issue data;
- no Moodle course ID because the award represents the whole program.

`tool_certificate` creates the file and sends its normal notification. The award appears in the ModernCommerce learner certificate list.

### Duplicate protection

Issuance uses a learner-and-program lock. Before issuing, the service reloads progress and checks `certificateissueid`. After issuance, the native issue ID is stored on the progress row. Repeated events and page refreshes therefore return the existing issue.

### Completion communication

The first completed transition emits `\local_moderncommerce\event\program_completed`. A communication observer queues the editable `moderncommerce_program_completed` celebratory email and in-app notification to the learner. It includes program name, course count, average grade, completion date, program URL and certificate URL. A stable queue deduplication key prevents repeat messages during later recalculation.

## Bundle-to-program conversion

Conversion is an operational migration, not only a label change. It:

1. changes the product type to `program`;
2. finds paid/completed purchasers;
3. calculates progress from current Moodle completion and grades;
4. creates or updates progress rows;
5. identifies each current course;
6. issues an already-earned certificate when configured.

Existing Moodle enrollments are retained. New program purchasers also receive every included course; conversion adds program progress, grade, prerequisite, and certificate evaluation without narrowing access.

## Program progress record

`local_moderncommerce_program_progress` contains one row per program and learner.

| Field | Meaning |
| --- | --- |
| `programid`, `userid` | Unique program and learner identity |
| `orderid` | Purchase that initialized the path, when available |
| `status` | `active` or `completed`; unmet prerequisites leave it active |
| `totalcourses` | Included-course count at synchronization |
| `completedcourses` | Courses Moodle reports complete |
| `passedcourses` | Completed courses meeting the grade rule |
| `averagegrade` | Average normalized final grade from graded courses |
| `progresspercentage` | Completed courses divided by total courses |
| `currentcourseid` | First incomplete course in configured curriculum order |
| `certificateissueid` | Native `tool_certificate_issues.id` |
| `timecompleted` | First recorded program-completion time |
| `timecreated`, `timemodified` | Audit timestamps |

The unique `(programid, userid)` index prevents duplicate progress journeys.

## Service map

| Entry point | Responsibility |
| --- | --- |
| `bundle_api::convert_to_program()` | Changes type and initializes existing purchasers |
| `bundle_enrollment_api::enroll_user()` | Separates bundle and program fulfillment |
| `program_progress_service::enrol()` | Starts a purchased program |
| `program_progress_service::sync()` | Calculates, ensures course access, persists progress, and issues certificates |
| `program_progress_service::sync_for_course()` | Resolves programs affected by completion |
| `program_progress_service::initialize_existing()` | Migrates purchasers during conversion |
| `program_observer::course_completed()` | Connects Moodle completion to synchronization |
| `get_product_access` | Returns progress, order, prerequisite state, and learner course URLs |
| `get_bundle_features` | Returns configuration, searchable prerequisites, and certificate templates |
| `save_bundle_features` | Validates policy, included-course must-pass IDs, prerequisites, and certificate settings |

## Access and security

- Admin feature services require login, system context, and `local/moderncommerce:managecourses`.
- Learner access requires login, `local/moderncommerce:viewcatalog`, and product ownership.
- Owning a program grants its currently included courses through the normal enrollment service.
- Prerequisites affect completion and certificate eligibility, not course access.
- Admin changes use Moodle's authenticated AJAX service and session key.

## Enrolment keys

Bundle/program keys can target the multi-course product. Program redemption should initialize the same full included-course access and progress evaluation as payment. Manage keys at `/local/moderncommerce/admin/bundle_keys.php` and test with a fresh learner.

## Troubleshooting

### The first course is unavailable

Check the paid/completed order, included-course mapping, enrollment plugin, user enrollment records, and Moodle debugging output. External prerequisites do not block course access.

### A course is missing from learner access

Open the learner program page to force synchronization, then check the included-course mapping, active enrollment method, enrollment records, and order ownership. Do not treat prerequisite or preceding-course completion as an access requirement.

### The program will not complete

Compare the policy, pass grade, final grades, courses without grades, must-pass selection, prerequisites, and stored `completedcourses`, `passedcourses`, and `averagegrade`.

For `weighted_avg`, no final grades means an average of zero.

### The certificate was not issued

Check program status, certificate enablement, template ID and visibility, installed add-ons, `tool_certificate_issues`, progress `certificateissueid`, and Moodle logs for PDF or notification errors.

Do not clear `certificateissueid` without reviewing the native issue. Clearing it can permit a replacement award.

## Production verification

Use fresh learner accounts and verify:

- bundles still enroll every course;
- programs enroll every included course;
- prerequisites leave course access intact while blocking final completion and certificates;
- configured order is presented consistently without becoming an access lock;
- all policies succeed and fail with representative grades;
- must-pass courses override `weighted_avg` and `any_pass`;
- every owned included course has a learner-safe launch URL;
- one native certificate is issued and remains duplicate-safe;
- conversion initializes progress without revoking access.

See [Certificate integration](/{{route}}/{{version}}/modern-commerce/certificate-integration), [Learner account & access](/{{route}}/{{version}}/modern-commerce/learner-account), [Database reference](/{{route}}/{{version}}/modern-commerce/database-reference), and [Web services & events](/{{route}}/{{version}}/modern-commerce/web-services-and-events).
