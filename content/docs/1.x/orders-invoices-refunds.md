# Modern Commerce — Orders, Invoices & Refunds

---

- [The order flow](#flow)
- [Orders console](#orders)
- [Invoices & receipts](#invoices)
- [Refunds](#refunds)
- [Customers](#customers)
- [Audit log](#audit)

<a name="flow"></a>
## The order flow

Modern Commerce keeps cart, order, invoice, payment, refund, fulfilment, and entitlement records separate so each stage is auditable. A purchase moves through:

1. Buyer adds a product to the **cart**.
2. **Checkout** creates or continues an order.
3. A **payment attempt** starts with the selected gateway.
4. The gateway **callback or webhook** updates the payment lifecycle.
5. **Fulfilment** grants course, bundle, program, key, or subscription access.
6. **Entitlements** and order history appear in the learner dashboard.

Buyer-facing routes: `/local/moderncommerce/cart.php`, `checkout.php`, `order.php`, `success.php`, and `learner/index.php`.

<a name="orders"></a>
## Orders console

Manage orders from the admin:

- `/local/moderncommerce/admin/orders.php` — all orders.
- `/local/moderncommerce/admin/order_view.php?id=ID` — a single order.

Viewing all orders requires `local/moderncommerce:viewallorders`; managing them requires `local/moderncommerce:manageorders`.

> {warning} If a buyer paid but can't access their course: confirm the order status, the payment attempt status, that order items and entitlement rows exist, and any key usage rows — then run cron to process delayed fulfilment or subscription access sync.

<a name="invoices"></a>
## Invoices & receipts

Invoices are managed at `/local/moderncommerce/admin/invoices.php`. Invoice and receipt numbering uses configurable prefixes (defaults `INV` and `RCPT`) — set these **before** your first production transaction if you need a specific accounting format. See [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings). Invoice emails carry tokens such as `{invoice_number}`, `{invoice_total}`, `{invoice_url}`, and `{invoice_pdf_url}`.

<a name="refunds"></a>
## Refunds

Process refunds from the order/admin workflows; the action requires `local/moderncommerce:processrefunds`. A refund needs a payment attempt with a provider transaction ID, and the gateway must support refunds for that payment — actual behavior depends on the gateway integration and its configuration. See [Payments](/{{route}}/{{version}}/modern-commerce/payments).

<a name="customers"></a>
## Customers

Review buyers and their history at `/local/moderncommerce/admin/customers.php` and `/local/moderncommerce/admin/customer.php?id=ID`.

<a name="audit"></a>
## Audit log

`/local/moderncommerce/admin/audit_log.php` records immutable commerce events for support, security review, and compliance-style traceability (requires `local/moderncommerce:viewauditlog`).

> {danger} Audit and payment logs can contain customer and gateway data. Redact sensitive fields before sharing anything outside the operations team.

## Where to go next

- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
- [Reports & Analytics](/{{route}}/{{version}}/modern-commerce/reports-and-analytics)
- [Notifications](/{{route}}/{{version}}/modern-commerce/notifications)
