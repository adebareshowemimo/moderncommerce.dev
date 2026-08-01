# Modern Commerce — Quick Start

---

This guide takes you from a fresh install to a working test purchase, the fastest way. It assumes the plugin is installed, cron is running, and defaults are seeded (see [Installation](/{{route}}/{{version}}/modern-commerce/installation)).

- [Connect a payment gateway](#gateway)
- [Price a course](#price)
- [Arrange the storefront](#storefront)
- [Take a test purchase](#test)
- [Confirm it worked](#confirm)

<a name="gateway"></a>
## 1. Connect a payment gateway

Open **`/local/moderncommerce/admin/gateways.php`** and configure **at least one** of Stripe, PayPal, Paystack, or Flutterwave with the API keys/secrets from that provider's dashboard. Start in the gateway's **test/sandbox** mode.

> {warning} There is **no sale until a gateway is configured**. Also confirm your store **currency** is set (Settings → Currency) before creating prices — the default is NGN. See [Payments](/{{route}}/{{version}}/modern-commerce/payments).

<a name="price"></a>
## 2. Price a course

Open **`/local/moderncommerce/admin/pricing.php`** and give an existing Moodle course a price:

- Set the **price**, an optional **compare-at** (crossed-out) price, **visibility**, and **status**.
- Selling several courses together? Create a **bundle** or **program** at `/local/moderncommerce/admin/bundles.php`. See [Products & Pricing](/{{route}}/{{version}}/modern-commerce/products-and-pricing).

<a name="storefront"></a>
## 3. Arrange the storefront

Open the storefront at **`/local/moderncommerce/index.php`** and turn on **edit mode** to arrange widgets — hero, featured products, catalog, and content sections. The catalog itself is a widget, so you decide where it appears. See [Storefront](/{{route}}/{{version}}/modern-commerce/storefront).

<a name="test"></a>
## 4. Take a test purchase

As a normal (non-admin) user:

1. Open the storefront and add the priced course to the **cart**.
2. Go to **checkout** and choose your gateway.
3. Complete the payment using the gateway's **test card / sandbox** details.
4. You'll be returned to the success page.

> {primary} Test the full set of outcomes before going live: a successful payment, a failed payment, a cancelled checkout, a refund, and a duplicate webhook delivery.

<a name="confirm"></a>
## 5. Confirm it worked

After the payment (and the next cron cycle for any async follow-up), check:

- **Orders** at `/local/moderncommerce/admin/orders.php` — the order shows as paid.
- The buyer is **enrolled** in the course and sees it in the learner dashboard (`/local/moderncommerce/learner/index.php`).
- An **invoice/receipt** was generated and the confirmation **emails** were sent (run `php local/moderncommerce/cli/test_emails.php` if you want to verify branding first).

## Where to go next

- [Products & Pricing](/{{route}}/{{version}}/modern-commerce/products-and-pricing)
- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
- [Orders, Invoices & Refunds](/{{route}}/{{version}}/modern-commerce/orders-invoices-refunds)
- [Notifications](/{{route}}/{{version}}/modern-commerce/notifications)
