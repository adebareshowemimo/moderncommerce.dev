# Learner account & access

The learner account is an authenticated ModernCommerce application under `/local/moderncommerce/learner/`. It brings commercial and learning records together without copying Moodle's learning data.

## Learner pages

| Route | Purpose |
| --- | --- |
| `learner/index.php` | Account shell/dashboard |
| `learner/courses.php` | Courses and access state |
| `learner/library.php` | Searchable access library |
| `learner/calendar.php` | Moodle learning calendar view |
| `learner/certificates.php` | Available certificate records/links |
| `learner/grades.php` | Moodle grade summaries |
| `learner/orders.php` | Buyer's orders |
| `learner/order.php?id=ID` | One owned order |
| `learner/wishlist.php` | Saved products |
| `learner/profile.php` | Profile and billing details |
| `learner/subscription.php` | Current subscription |
| `learner/subscription_access.php` | Access granted by subscription |

The React application also exposes equivalent AJAX functions for dashboard, courses, certificates, grades, orders, wishlist, subscription, product access and profile.

## Ownership and authorization

Own-order and own-subscription services must scope records to the logged-in user. Knowing another record ID must not grant access. Administrative pages use separate all-order/subscriber capabilities.

Profile editing respects Moodle's authentication/profile rules. If the active authentication plugin supplies an external profile-edit URL, ModernCommerce directs the user there rather than bypassing it. Profile-picture updates require Moodle's own-profile capability.

## How access appears

Course access may originate from a paid order entitlement, redeemed course/bundle key, active subscription rule or an independent Moodle enrolment. The learner views should describe the effective access while the diagnostic path preserves its source.

## Order cancellation

The learner API includes an own-order cancellation action, but eligibility depends on the order state and validation service. Do not promise that every buyer can cancel every order. Paid orders, fulfilled access and gateway refunds require the administrative/refund workflow.

## Support checklist

When a learner reports missing access, collect their Moodle user ID/email and order/key/subscription reference. Verify ownership, then trace the entitlement source. Do not create a duplicate Moodle account or duplicate enrolment before checking whether the original transaction belongs to a different account.
