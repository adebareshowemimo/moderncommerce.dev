# Modern Commerce: FAQ

---

- [Do I need WordPress or WooCommerce?](#wordpress)
- [Can I sell my existing Moodle courses?](#existing)
- [Can I sell seats to a company or team?](#seats)
- [Which Moodle and PHP versions are supported?](#versions)
- [Do you take a revenue share or transaction fee?](#revshare)
- [Do I need my own payment gateway account?](#gateway)
- [Do I need any other plugin?](#dependency)
- [Does it do subscriptions / memberships?](#subs)
- [How is personal data / GDPR handled?](#gdpr)
- [Is it GPL? Can we modify it?](#gpl)
- [Where can I get support?](#support)

<a name="wordpress"></a>
## Do I need WordPress or WooCommerce?

No. Modern Commerce runs the whole store **inside Moodle**: catalog, cart, checkout, payments, invoices, and enrolment. There is no separate WordPress, WooCommerce, or Shopify front end to host or sync.

<a name="existing"></a>
## Can I sell my existing Moodle courses?

Yes. You attach commerce to courses you already have: set a price, and buyers are auto-enrolled on payment. You can also group courses into **bundles** and **programs**. See [Products & Pricing](/{{route}}/{{version}}/modern-commerce/products-and-pricing).

<a name="seats"></a>
## Can I sell seats to a company or team?

Yes. Use **enrolment-key pools** for prepaid, bulk, or corporate sales. A pool can limit total uses and per-user uses, target a course or bundle/program, carry an expiry, and record each redemption. Subscription keys provide the equivalent plan-access path. See [Corporate & B2B Sales](/{{route}}/{{version}}/modern-commerce/corporate-sales).

<a name="versions"></a>
## Which Moodle and PHP versions are supported?

Moodle **5.2 only**, and **PHP 8.3 or later**. The current release is **2.1.6 (Stable)**. See [Requirements](/{{route}}/{{version}}/modern-commerce/requirements).

<a name="revshare"></a>
## Do you take a revenue share or transaction fee?

No. Modern Commerce takes **no revenue share and no transaction fee**. Payments go straight to your own merchant account; the only fees are your payment provider's standard processing fees.

<a name="gateway"></a>
## Do I need my own payment gateway account?

Yes. You connect **your own** account for one or more of **Stripe, PayPal, Paystack, or Flutterwave** using each provider's API keys. Card capture happens on the gateway, not in Moodle. There's **no sale until at least one gateway is configured**. See [Payments](/{{route}}/{{version}}/modern-commerce/payments).

<a name="dependency"></a>
## Do I need any other plugin?

No companion Moodle plugin is required. The package does require its Composer dependencies to be installed, including the PayPal server SDK declared in `composer.json`. Optional sibling add-ons and integrations enhance specialist workflows but are not required by core commerce.

<a name="subs"></a>
## Does it do subscriptions / memberships?

Yes. Modern Commerce includes a full subscription subsystem with plans, trials, renewals, grace periods, plan changes, access sync, subscription keys, and lifecycle emails. See [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions).

<a name="gdpr"></a>
## How is personal data / GDPR handled?

Modern Commerce processes personal data and ships a **Moodle Privacy API provider**, so metadata, export and erasure requests run through Moodle's standard privacy tools subject to the configured retention rules. See [Privacy & Security](/{{route}}/{{version}}/modern-commerce/privacy-and-security).

<a name="gpl"></a>
## Is it GPL? Can we modify it?

**Yes.** Modern Commerce is open-source software licensed under **GPL-3.0-or-later**. You can inspect, use, modify, and redistribute it under the terms of that licence.

<a name="support"></a>
## Where can I get support?

Use the project documentation and community issue tracker for self-service help and reproducible software defects. Agunfon Interactivity LLC, USA provides optional implementation, migration, integration, and enterprise support for organizations that need accountable delivery and operational assistance.

## Where to go next

- [Overview](/{{route}}/{{version}}/modern-commerce/overview)
- [Requirements](/{{route}}/{{version}}/modern-commerce/requirements)
- [Quick Start](/{{route}}/{{version}}/modern-commerce/quick-start)
