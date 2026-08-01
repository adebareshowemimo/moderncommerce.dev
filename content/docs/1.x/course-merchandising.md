# Course merchandising

The course editor defines the sellable record and price. **Advanced course features** enrich how an existing Moodle course is presented before purchase. Open `/local/moderncommerce/admin/course_advanced_features.php?courseid=ID`; it requires `local/moderncommerce:managecourses`.

## What the feature owns

Course merchandising data is stored separately from Moodle's core course record in:

- `local_moderncommerce_course_meta`
- `local_moderncommerce_course_objectives`
- `local_moderncommerce_course_outline`
- product tag/category mapping tables where the catalogue uses shared organization

This lets commerce teams improve product presentation without rebuilding course content. Moodle's course name, summary, visibility, format, activities, teachers, completion, and grades remain Moodle-owned.

## Buyer-facing metadata

The source supports metadata for level, language, duration, availability, outcomes/objectives, outline, tags, learning signals, and other detail-page content. Use only values that describe the live course.

| Field group | Product-management guidance |
| --- | --- |
| Level and language | Set a clear learner expectation and support catalogue filtering |
| Duration | Use a defensible estimate; update it when the course changes materially |
| Objectives/outcomes | State observable results rather than module titles |
| Outline | Summarize the buying decision; Moodle sections remain the delivery outline |
| Availability | Coordinate scheduled merchandising with course and price availability |
| Tags | Use a controlled vocabulary rather than near-duplicate spelling variants |
| Badges/trust signals | Apply only when the claim is supportable |

## Product visibility is cumulative

One metadata switch does not guarantee a product is visible or purchasable. The public result can also depend on:

- Moodle course existence and visibility;
- ModernCommerce product status and visibility;
- an active enabled price in its date window;
- product inventory and reservations;
- storefront widget filters;
- course or product availability dates;
- the viewer's Moodle permissions.

When a product is missing, inspect all of these layers before recreating the product.

## Reviews

Reviews are controlled globally by `reviews_enabled`. Public review reading uses `viewreviews`; submission requires login and `submitreview`. The review service checks qualifying learner access before accepting a course review. Administrators moderate from the reviews pages using `managereviews`.

## Publishing checklist

1. Confirm the Moodle course is ready and uses the intended enrolment behavior.
2. Link it to one active ModernCommerce product.
3. Set the base/current price and any compare-at or scheduled price.
4. Add accurate level, language, duration, outcomes and outline.
5. Assign the approved categories and tags.
6. Confirm product, price and course availability windows agree.
7. Preview the catalogue card and full course detail page while logged out and logged in.
8. Add the item to cart and complete a sandbox purchase.
9. Verify enrolment into the same Moodle course record.

Do not copy marketing claims from another course merely to fill every field. Empty optional metadata is safer than inaccurate buyer-facing information.
