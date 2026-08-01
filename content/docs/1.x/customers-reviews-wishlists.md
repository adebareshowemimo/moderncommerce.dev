# Customers, reviews & wishlists

These features help operators understand and serve buyers, but each has different permissions and evidence.

## Customers

`/admin/customers.php` and `/admin/customer.php?id=ID` require `local/moderncommerce:viewallorders`. Customer views aggregate commerce activity around a Moodle user; they do not create a second independent customer identity.

Use the customer detail page to investigate orders and commercial context. Edit identity/profile information through the proper Moodle user/profile workflow, especially when authentication is externally managed.

## Reviews

Reviews and reactions are stored in `local_moderncommerce_reviews` and `local_moderncommerce_review_rxn`.

- Public reading uses `viewreviews` and returns only visible reviews.
- Submission requires login and `submitreview` and is checked against qualifying access.
- Reactions require login.
- Admin overview, course list and moderation require `managereviews`.
- Moderation can hide, show or delete according to the service action.

The global `reviews_enabled` setting controls whether the feature is presented. Write a moderation policy before launch: define prohibited content, response targets and whether deletion or hiding is appropriate for disputes.

## Wishlists

Authenticated learners can list and update their wishlist. Administrators with reporting access can inspect wishlist reporting at `/admin/wishlists.php`. Wishlist records indicate interest, not consent to receive marketing and not a reserved price or inventory allocation.

Use aggregated wishlist data to prioritize merchandising or campaigns. Do not expose one user's saved products to another user, and respect notification suppression before sending marketing derived from wishlist behavior.

## Data-handling boundary

Customer, review and wishlist records are personal data. They are included in the plugin's Moodle privacy-provider responsibilities. Export screenshots or CSV data only to approved business systems and redact it in support tickets.
