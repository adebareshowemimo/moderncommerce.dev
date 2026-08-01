# Corporate & B2B sales

ModernCommerce can support organisation purchases by combining products or subscriptions, invoices, seat-limited key pools and usage records. The audited core does not expose a separate CRM account model; the organisation workflow is assembled from these commerce records.

## Course or bundle seat pools

Create enrolment keys for a course or bundle and set the allowed usage/quantity and expiry appropriate to the agreement. The key target identifies what access is granted; key usage records identify redemptions. Bundle keys grant the multi-course target represented by that product.

Use separate pools for separate customers, contracts or cohorts. Do not reuse one unrestricted key across organisations when the business needs customer-level usage and reconciliation.

## Subscription seats

Subscription plans and keys support plan access and usage tracking. The schema includes plan features, access rules, subscription keys and key usage, user subscriptions and access records. A seat limit is meaningful only when the configured plan/key workflow enforces and reports it; test the exact plan and key settings before promising a seat count contractually.

## Invoice-led sale

The invoice admin can list, view, create/update and set invoice status, with customer search. Invoice numbers, line items, due dates/status and optional organisation/billing information provide the finance record. Payment information and terms can be included through invoice configuration used by the invoice service.

An invoice status is not automatically proof of gateway settlement. Define who may mark an invoice paid, what external evidence is required and when enrolment/key delivery occurs.

## Recommended operational process

1. Create the course, bundle/program or subscription offer.
2. Confirm the commercial price, currency, tax and seat quantity.
3. Create/find the Moodle buyer contact and billing profile.
4. Raise the invoice with an organisation reference and due date.
5. After approved payment evidence, issue a dedicated key pool or activate the subscription.
6. Send distribution instructions to the organisation contact.
7. Monitor key/seat usage and remaining quantity.
8. Reconcile the invoice, order/access records and audit trail at renewal.

## Boundaries

Core ModernCommerce records do not replace procurement, contract-signing, tax determination or enterprise identity provisioning. Integrate those processes deliberately. Document any manual activation step so support staff do not confuse “invoice issued” with “access granted.”
