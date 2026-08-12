## Open the advanced editor

From **Modern Commerce > Bundles**, locate the Bundle or Program you want to configure. Open its **Actions** menu and select **Advanced**. Bundles and Programs share the merchandising controls on this page. Programs also include completion, grading, prerequisite, progress and certificate settings.

## Review Bundle Overview

**Bundle Overview** brings the product's key information together in one place. Administrators update this information through the main bundle editor and the advanced settings. The overview refreshes as values change, making it a useful review point before saving.

## Configure catalogue visibility

Use **Skill level** to describe the intended learner experience, and select the primary teaching **Language**. **Visibility** supports Public, Hidden and Scheduled states. Scheduled visibility uses the optional start and end dates. The product status and the main Visible setting also affect storefront availability.

## Set duration

**Duration Autodetect** looks for a Moodle course custom field with the exact shortname `learninghours`. When enabled, ModernCommerce reads numeric hours from each included course, converts them to minutes and totals the result. The status reports complete, partial or missing values.

Turn Autodetect off to enter **Hours** and **Minutes** manually. Minutes must be between zero and fifty-nine. The manual duration updates Bundle Overview and appears in catalogue output after saving.

## Configure assessments

**Assessment Autodetect** counts Moodle quiz activities across the included courses. Turn it off when you need to enter a stable planned total that also represents offline, external or non-quiz assessments.

## Build the course outline

Use **Course Outline** to present the learning journey without replacing Moodle course sections. Add rows, enter concise stage titles and use the arrows to change their order. The remove button deletes a row, and blank rows are not saved.

## Add tags and promotional signals

**Tags** help organize, discover, filter and merchandise the product. Add tags with Enter or **Add Tag**. Empty entries are ignored, and duplicates are removed without regard to capitalization when the form is saved.

Use **Featured**, **Bestseller** and **Trending** only when the product should receive the corresponding promotional treatment. Save the Bundle and reopen its Advanced page to verify that the values persisted.

## Configure Program completion

Programs add a **Completion Settings** section. **Pass Policy** supports three outcomes:

- **All Courses Must Pass** requires every included course to be completed and passed.
- **Weighted Average** requires every course to be complete and the equally weighted average of available final grades to reach the Pass Grade.
- **Any Course Pass** requires every course to be complete and at least one course to pass.

**Pass Grade** accepts values from zero to one hundred, including decimals. Moodle supplies course completion and available course-total grades. Configure course-total grades whenever grades must determine the outcome.

With Weighted Average or Any Course Pass, **Must Pass Courses** can require selected courses to meet the threshold individually. All Courses Must Pass hides and clears this list because every course is already required.

## Configure certificates and prerequisites

Turn on **Enable Certificate** when the Program should issue a final certificate after completion, prerequisites and the pass policy succeed. **Certificate Template** can follow the global store template or use a Program-specific override. The required certificate integration and an available template must be configured before certificate issuance can be saved.

**Program prerequisites** searches visible Moodle courses outside the Program. A selected prerequisite must be completed before the Program can complete or issue its certificate, but it does not prevent access to the Program's included courses.

## Save and verify

Select **Save changes**, wait for confirmation, return to Bundles and reopen the Program's Advanced page. Confirm that the pass policy, grade, must-pass courses, certificate template and prerequisites all persisted.
