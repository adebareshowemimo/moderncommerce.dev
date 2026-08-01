# Order lifecycle & fulfilment

An order is the durable commercial record of a checkout. It owns currency and total snapshots, items, addresses, adjustments and status history. Payment and fulfilment are related records, not interchangeable order fields.

## Lifecycle stages

1. **Cart validated:** products, prices, discounts, inventory and buyer data are checked.
2. **Order created:** order number, items, amounts, currency, operational data and status history are written.
3. **Payment attempted:** a gateway-specific attempt and reference are recorded.
4. **Payment verified:** callback or webhook evidence is validated and stored as events/logs.
5. **Order transitioned:** the order status service records the allowed state change.
6. **Fulfilled:** fulfilment items and entitlements are created; Moodle enrolment is granted.
7. **Communicated:** receipt/invoice and transactional notifications are issued.
8. **Reported/audited:** reporting snapshots and audit records reflect the transaction.

## Administration

`/local/moderncommerce/admin/orders.php` requires `viewallorders`; status changes require `manageorders`. `/admin/order_view.php?id=ID` displays one order and exposes permitted status/refund actions. Customer details are available through `/admin/customers.php` and `/admin/customer.php?id=ID`.

Use the status-history record to understand who or what changed an order. Avoid editing database status fields directly; service-level transitions preserve validation, side effects and audit history.

## Fulfilment and entitlements

Fulfilment records represent processing of an order. Entitlements represent the learner's right to the purchased target, and entitlement events preserve changes. The enrolment service converts valid course/bundle rights into Moodle enrolment.

For a paid learner without access, check in this order:

1. order and payment attempt status;
2. successful payment event and amount/currency;
3. order items and product-course links;
4. fulfilment and fulfilment items;
5. entitlement and entitlement events;
6. Moodle enrolment method/course state;
7. subscription access or key usage when applicable.

## Inventory reservations

Inventory reservations protect limited offers during checkout. Releasing abandoned or invalid reservations is part of order/cart cleanup. The inventory snapshot and reservation state are more reliable diagnostic evidence than the current product stock alone.

## Cancellation and reminders

The daily abandoned-order task cancels eligible stale orders. Payment reminders run at 09:00 and 15:00. These tasks depend on Moodle cron and the applicable state/time rules in their task classes; changing a schedule changes when evaluation runs, not the underlying eligibility rules.

## Manual recovery

Before manually changing an order, reconcile the gateway. If payment succeeded but fulfilment failed, preserve the successful payment evidence and repair/retry fulfilment rather than initiating a second payment. If no verified payment exists, do not grant paid access without an approved offline/manual process and audit note.
