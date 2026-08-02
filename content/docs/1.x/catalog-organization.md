# Categories, tags & discovery

ModernCommerce has its own commerce catalogue structure. Moodle course categories organize teaching administration; ModernCommerce product categories organize the buyer's discovery journey. They can reflect one another, but they are separate records.

## Product categories

Manage categories at `/local/moderncommerce/admin/categories.php` with `local/moderncommerce:managecategories`. The category service supports listing, saving, deleting and reordering categories. Category-to-product membership is stored in `local_moderncommerce_product_category_map`.

Use a small, stable taxonomy based on how buyers search, for example role, outcome, industry or subject. Avoid recreating the entire Moodle administration hierarchy if it is not meaningful to a buyer.

Before deleting a category, inspect its mapped products and storefront filters. Reassign products first when removing the category would leave an important offer undiscoverable.

## Tags

Product and bundle tag records support cross-cutting labels that do not deserve a permanent navigation category. Use concise normalized terms. The bundle metadata service removes empty values and case-insensitive duplicates and limits stored tag length.

Recommended uses include skill, audience, delivery language, campaign, level or compliance theme. Avoid using badges such as “bestseller” as uncontrolled tags when the product has explicit badge metadata.

## Attributes, values and relations

The schema includes product attributes, attribute values and product relations. These are extension-ready catalogue structures. Document and expose an administrator workflow only when the active UI and services use that structure; the existence of a table alone is not proof of a complete user-facing feature.

## Discovery pipeline

Catalogue results are produced from the product record plus its linked Moodle course(s), active price, visibility, availability, category/tag mapping, inventory and the selected storefront widget/filter. Public detail and catalogue datasets are served through Moodle external functions.

If a product cannot be found:

1. confirm the product is enabled and not archived;
2. confirm the Moodle course exists and is visible as intended;
3. confirm an enabled price is active for the current date;
4. confirm inventory has not made it unavailable;
5. confirm category and widget filters include it;
6. confirm availability dates and viewer capability;
7. purge Moodle caches only after verifying the data conditions.

## Taxonomy governance

Assign one owner for category creation and naming. Review empty, duplicate and over-broad categories before each major catalogue release. Tags can remain flexible, but report on near-duplicates such as `e-learning`, `elearning`, and `eLearning` and consolidate them deliberately.
