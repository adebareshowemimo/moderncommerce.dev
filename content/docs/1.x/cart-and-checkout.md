# Cart & checkout

Cart and checkout are authenticated buyer workflows. The browser uses Moodle AJAX services, while the server re-resolves products, prices, discounts and availability before an order is placed. A value displayed in the browser is not trusted as a final charge.

## Cart operations

The cart services support reading the cart, rendering the navigation dropdown and updating its state. The update action accepts course or bundle additions, item changes/removal and coupon application. Carts and cart items are stored server-side in `local_moderncommerce_carts` and `local_moderncommerce_cart_items`.

Only sellable product types with a valid current price should reach checkout. Inventory, date windows, product status and Moodle-course availability can still invalidate an item after it was added.

## Checkout validation

`local_moderncommerce_start_checkout` prepares the checkout dataset. `local_moderncommerce_place_order` creates or continues an order. Before gateway initialization, the workflow validates:

- authenticated buyer and `purchase` capability;
- product/course/bundle integrity;
- active price and store/order currency;
- coupon eligibility and target;
- requested quantities and inventory availability;
- required billing/contact fields;
- gateway readiness for credentials, amount and currency.

## Billing fields

The master **Collect contact information** setting is off by default. Phone defaults to optional; address, city, state, country and postal code default to hidden. Each can be hidden, optional or required when collection is enabled.

Collect only fields needed for tax, invoicing, fulfilment or support. Submitted billing details can be stored in billing profiles and order-address snapshots, so they are personal data covered by Moodle privacy workflows.

## Order creation boundary

The plugin creates the commerce order before redirecting to a hosted gateway. That gives callbacks and webhooks a stable order number and payment-attempt record to reconcile. The order initially remains unpaid/pending until the return or webhook is verified.

Do not manually mark an order paid solely because a buyer presents a gateway receipt. Reconcile the gateway reference, currency, amount, payment event and payment attempt.

## Coupons and totals

Coupon validation considers code state, date window, usage constraints, target rules and order context. Adjustments preserve discount/tax calculations with the order rather than relying on the current coupon definition later.

## Abandoned carts

Cron cleans old carts and runs recovery at minute 15 each hour. Recovery notifications are marketing-category messages and must respect suppression/unsubscribe behavior. Review the notification queue and log when recovery messages do not send.

## End-to-end test

Test add, remove, quantity where exposed, valid/invalid coupon, unavailable inventory, required fields, gateway cancellation, successful payment, duplicate return, duplicate webhook and a cart that becomes stale before checkout. Confirm one order is fulfilled once.
