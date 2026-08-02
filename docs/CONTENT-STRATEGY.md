# ModernCommerce.dev: Product and Content Strategy

Status: launch content brief
Product basis: `local_moderncommerce` 2.17, Moodle 5.2, GPL-3.0-or-later
Primary category: the best open-source plugin for selling courses through Moodle

Business-model authority: [`BUSINESS-MODEL.md`](BUSINESS-MODEL.md). Its later dated ownership, brand, domain, support, service, and decision records supersede older planning language in this brief.

## 1. Executive direction

ModernCommerce.dev should establish a category, not present a long plugin feature list.

**Recommended position**

> The best open-source plugin for selling courses through Moodle.

**Practical promise**

> Build a complete learning storefront inside Moodle, including catalog, checkout, enrolment, subscriptions, and operations, without running a second commerce platform.

**Brand idea**

> Learning and commerce, finally in one system.

The site should make three ideas clear in its first screen:

1. Modern Commerce is made specifically for Moodle.
2. It covers the full path from discovery to paid access, not payment alone.
3. It is GPL open source: users control the code, infrastructure, data, and roadmap choices.

Lead with the course-selling outcome, then prove the “best” position through ModernCommerce's complete commerce operation, Moodle-native fulfilment, B2B distribution, subscription access, governance, operational evidence, and open-source control. Use “commerce platform” to explain the product depth after the category claim is established.

## 2. Product truth and launch blocker

The repository `LICENSE` and file headers declare GPL v3 or later. The current `README.md` still describes Modern Commerce as proprietary commercial software and refers to Marketplace site entitlements. This contradiction must be resolved before the public open-source launch.

Recommended open-source model:

- Free, GPL-licensed core with no learner, order, or revenue tax.
- Public source repository, issue tracker, release notes, and roadmap.
- Paid optional services: implementation, migration, priority support, managed hosting, and selected add-ons.
- A written core/add-on policy so the community knows what will remain open.

Never use “free” as the whole value proposition. Lead with ownership, integration, extensibility, and reduced operational complexity.

## 3. Audience priorities

### Primary: Moodle operators and training businesses

They want to sell courses without maintaining WordPress/WooCommerce plus a connector. Their questions are: Can it sell my offer? Will access be automatic? Can my team run it? Can I trust payments and reporting?

Primary CTA: **Explore the live demo**
Secondary CTA: **Install Modern Commerce**

### Secondary: Moodle developers and service providers

They care about GPL licensing, Moodle-native architecture, APIs, hooks, web services, extension boundaries, contribution workflow, and maintainability.

Primary CTA: **View on GitHub**
Secondary CTA: **Read developer docs**

### Tertiary: institutions and enterprise buyers

They need data ownership, infrastructure choice, procurement clarity, support, security reporting, deployment assistance, and a credible sustainability model.

Primary CTA: **Talk to the team**
Secondary CTA: **Review deployment options**

## 4. Message architecture

| Layer | Message |
|---|---|
| Category | Open-source commerce for Moodle |
| Problem | Selling learning often means stitching an LMS, a separate store, a connector, and several operational tools together. |
| Promise | Run the storefront, checkout, access, and learner account experience where the learning already lives. |
| Functional proof | Courses, bundles, programs, subscriptions, coupons, invoices, enrolment keys, refunds, reporting, webhooks, and lifecycle messaging. |
| Technical proof | Moodle-local plugin, GPL-3.0-or-later, Moodle 5.2 support, PHP 8.3+, documented web services, role capabilities, scheduled tasks, and extension points. |
| Emotional result | Fewer moving parts. Clear ownership. A store your team can shape. |

### Messaging pillars

**One platform from sale to learning**
Products, checkout, payment, enrolment, and learner access share one Moodle identity and operating environment.

**Own the system you depend on**
Run it on your infrastructure, inspect the code, adapt workflows, and retain control of commerce and learner data.

**Sell more than single courses**
Package learning as courses, bundles, programs, subscriptions, or distributed enrolment keys.

**Operate with confidence**
Manage orders, invoices, refunds, customers, notifications, payment events, webhooks, and reports from a unified admin experience.

## 5. Recommended sitemap

### Launch navigation

- Product
  - Overview
  - Storefront and checkout
  - Products and subscriptions
  - Commerce operations
  - Learner experience
- Solutions
  - Training businesses
  - Associations and academies
  - Moodle service providers
- Developers
  - Documentation
  - Architecture
  - Extensions
  - Contributing
  - Changelog
- Open source
- Pricing
- Resources
  - Guides
  - Roadmap
  - Security
  - Support
- GitHub

Persistent CTAs: **View demo** and **Get Modern Commerce**.

### Launch scope

Publish these first: Home, Product, Open Source, Developers, Documentation, Pricing/Services, Roadmap, About, and Support. Add solution pages and a comparison hub once real customer evidence is available.

## 6. Page content

## Home

**SEO title:** Modern Commerce: Open-source ecommerce for Moodle
**Meta description:** Turn Moodle into a complete learning storefront. Sell courses, bundles, programs, and subscriptions with native checkout, enrolment, learner accounts, and commerce operations.

**Hero eyebrow:** Open-source commerce for Moodle

**H1:** Sell learning where learning happens.

**Hero body:** Modern Commerce turns Moodle into a complete learning storefront. Create offers, take payments, enrol buyers, manage recurring access, and support customers, without operating a separate ecommerce stack.

**Primary CTA:** Explore the demo
**Secondary CTA:** View on GitHub
**Technical note:** GPL-3.0-or-later · Built for Moodle 5.2 · Self-hosted

**Section: One connected journey**

H2: From discovery to enrolled learner, in one system.

Body: A buyer finds a course, checks out, receives access, and manages their learning account without crossing an integration boundary. Your team manages the commercial journey from the same Moodle environment.

Journey labels: Discover → Buy → Enrol → Learn → Renew

**Section: Build offers around how you teach**

- **Courses:** Put a price on an individual Moodle course and publish it to your catalog.
- **Bundles and programs:** Package related courses into a higher-value learning journey.
- **Subscriptions:** Grant recurring access by course, bundle, or category, with lifecycle controls.
- **Enrolment keys:** Sell or distribute access in batches for organisations and cohorts.

CTA: Explore products and subscriptions

**Section: Your storefront, not a template trap**

Body: Build storefront pages from reusable Moodle-native content sections, apply your brand, feature products, and shape the path to checkout. Keep the experience connected to your LMS and under your control.

Proof labels: Page builder · Brand controls · Catalog search · Product pages · Cart · Secure checkout

**Section: Commerce operations included**

Body: Orders are only the beginning. Give operators a practical workspace for customers, invoices, refunds, coupons, payment activity, webhooks, reporting, and notifications.

CTA: See commerce operations

**Section: Open by design**

H2: Own your learning business stack.

Body: Modern Commerce is licensed under GPL v3 or later. Run it where you choose, review how it works, extend it for your organisation, and contribute improvements back to the project.

Proof labels: No per-learner fee · No platform revenue share · Source available · Extensible · Community roadmap

CTA pair: Why open source / Read the architecture

**Section: Payment choice**

Body: Connect Stripe, PayPal, Paystack, or Flutterwave and keep processor configuration inside Modern Commerce. Payment-provider fees and regional availability still apply.

Avoid claiming every gateway supports every recurring workflow until a public compatibility matrix is verified.

**Final CTA**

H2: Make Moodle your storefront.

Body: Start with the code, explore a working demo, or talk with us about implementation and support.

CTAs: Get Modern Commerce · Explore the demo · Talk to the team

## Product overview

**SEO title:** Product: A complete Moodle commerce system | Modern Commerce

**H1:** Everything between “I want this course” and “start learning.”

**Intro:** Modern Commerce connects merchandising, transactions, access, and learner service in a single Moodle-native product.

Organise the page by workflow rather than backend module:

1. **Merchandise**: course pricing, bundles, programs, subscription plans, categories, featured offers, reviews, and wishlists.
2. **Convert**: catalog, product detail pages, cart, coupons, checkout, payment gateways, and abandoned-order recovery.
3. **Deliver access**: automatic enrolment, bundle enrolment, subscription access rules, enrolment keys, and redemption flows.
4. **Serve learners**: library, courses, orders, invoices, subscription management, wishlist, profile, grades, certificates, and calendar.
5. **Operate**: customers, orders, refunds, invoices, reports, email templates, notifications, payment events, webhooks, and audit history.
6. **Extend**: Moodle web services, capabilities, scheduled tasks, events, optional add-ons, and custom gateway support.

CTA: Explore the demo

## Open Source

**SEO title:** Open-source Moodle commerce | Modern Commerce
**H1:** Commerce infrastructure you can own.

**Intro:** Your ability to sell learning should not depend on a closed platform or an opaque connector. Modern Commerce gives Moodle teams the code and the operating freedom to build for their own context.

**What open means here**

- The core source code is publicly available under GPL-3.0-or-later.
- You may inspect, run, modify, and redistribute it under the licence terms.
- You choose hosting, payment providers, implementation partners, and support.
- Product decisions and releases are visible through a public roadmap and changelog.
- Contributions follow a documented review and governance process.

**Sustainability copy**

H2: Free software still needs durable stewardship.

Body: The core product is free to use. Development is sustained through implementation, managed services, priority support, sponsorship, and optional extensions. Publish exact boundaries and prices as those programs launch.

CTAs: View source · Read the licence · Contribute · Support the project

## Developers

**SEO title:** Developer platform and Moodle commerce APIs | Modern Commerce
**H1:** Extend commerce with Moodle-native building blocks.

**Intro:** Build integrations and specialised workflows on a commerce layer that follows Moodle conventions for capabilities, events, scheduled tasks, privacy, and web services.

**Developer paths**

- **Install:** requirements, Composer dependencies, install/upgrade, cron, HTTPS, and configuration.
- **Understand:** architecture map, data model, checkout lifecycle, payment/webhook lifecycle, and access model.
- **Integrate:** external web services, events, webhooks, custom gateways, and notification channels.
- **Extend:** add-on contract, admin UI integration, capabilities, settings, and tests.
- **Contribute:** local setup, coding standards, test commands, issue templates, pull requests, release process, and code of conduct.

**Quick start code block**

```bash
composer install --no-dev --optimize-autoloader
php admin/cli/upgrade.php --non-interactive
php local/moderncommerce/cli/demo_data.php --install-defaults
```

Note: state clearly that commands run from the Moodle root where applicable.

CTAs: Read the docs · Browse source · Report an issue

## Pricing and services

Do not create artificial product tiers for GPL code. Separate software price from service price.

**H1:** The software is open. Choose the help you need.

**Core card: Community**

- Modern Commerce core
- Self-hosted
- Community documentation
- Public issues and releases
- Price: Free
- CTA: Download from GitHub

**Service card: Implementation**

- Installation and configuration
- Storefront setup and migration
- Payment and webhook configuration
- Team onboarding
- Price: Project-based
- CTA: Plan an implementation

**Service card: Priority support**

- Defined response times
- Upgrade guidance
- Production troubleshooting
- Release and compatibility advice
- Price: Publish when SLA is defined
- CTA: Contact sales

**Service card: Managed**

- Hosting, monitoring, updates, backups, and operational support
- Price: Publish only after service scope is operationally ready
- CTA: Join the managed-service waitlist

Required FAQ: Is the core really free? Are there transaction fees? What payment fees remain? Can I modify it? Can an agency deploy it? What is included in support? Which Moodle versions are supported?

## Roadmap

**H1:** Build the roadmap with us.

**Intro:** See what is shipping, what is being explored, and where community help can move the project forward.

Use four statuses only: Now, Next, Exploring, Released. Each item needs a problem statement, scope note, linked issue/discussion, owner or “help wanted,” and last-updated date. Never publish delivery dates unless there is a committed release plan.

CTAs: View roadmap · Request a feature · Contribute

## About

**H1:** Open commerce for open learning.

**Body:** Moodle gave educators control over how learning is delivered. Modern Commerce extends that freedom to how learning is packaged, sold, and sustained. We are building an open commerce layer for organisations that want one adaptable system for their storefront and their learning experience.

**Mission:** Help Moodle teams build sustainable learning businesses without surrendering control of their technology, data, or customer journey.

Include maintainer biographies, governance, acknowledgements, project history, and a plain-language statement of the relationship to Moodle. Do not imply official Moodle endorsement or affiliation.

## Support

**H1:** Get the right kind of help.

Route visitors before showing a generic form:

- Product question → documentation
- Bug with reproducible steps → GitHub issues
- Security concern → private security reporting policy
- Community question → discussion forum
- Implementation or priority support → contact form

Publish supported versions, response expectations, diagnostic information to include, and what community support does not guarantee.

## 7. Documentation information architecture

The existing documentation is a strong product asset. Move from an administrator-only table of contents to audience and task entry points.

### Start

- What Modern Commerce is
- Requirements and compatibility
- Install and upgrade
- Five-minute demo setup
- Production readiness checklist

### Run your store

- Products and pricing
- Bundles and programs
- Subscriptions and access rules
- Storefront and branding
- Checkout and payments
- Orders, invoices, refunds, coupons, and keys
- Customers and learner accounts
- Notifications and reports

### Develop

- Architecture overview
- Local development
- Data model
- Web services
- Events and webhooks
- Payment gateway contract
- Add-on integration contract
- Privacy and security
- Testing and contribution guide

### Operate

- Cron and scheduled tasks
- Monitoring and logs
- Backup and recovery
- Upgrade notes
- Troubleshooting
- Release and compatibility matrix

Every page should show target product version, last reviewed date, previous/next links, edit-on-GitHub link, and a short “Was this useful?” feedback route.

## 8. SEO content plan

### Core commercial-intent pages

- Moodle ecommerce plugin
- Sell Moodle courses online
- Moodle shopping cart and checkout
- Moodle subscriptions plugin
- Moodle course bundles
- WooCommerce alternative for Moodle
- Stripe, PayPal, Paystack, and Flutterwave for Moodle

Use competitor terms only on factual comparison pages. Bound “best” claims to the researched category: selling courses through Moodle while Moodle remains the learning system of record. Do not claim highest adoption, market share, performance, or universal superiority without independent evidence.

### High-value guide topics

1. How to sell Moodle courses without WordPress or WooCommerce
2. Moodle course payments: simple enrolment gateway vs full commerce stack
3. How to sell course bundles and learning programs in Moodle
4. How recurring course subscriptions work in Moodle
5. A production checklist for Moodle payment webhooks
6. Choosing a payment gateway for an international Moodle store
7. Automating access after a Moodle course purchase
8. Designing a conversion-ready Moodle course catalog
9. Open-source ecommerce for training providers: ownership and tradeoffs
10. Migrating a Moodle store from a separate ecommerce platform

Every guide should answer the question fully, show the Modern Commerce path without turning into an advert, link to relevant documentation, and state versions and limitations.

## 9. Voice and editorial rules

Voice: capable, direct, open, and operationally honest.

- Say “you control” only when the following sentence explains what is controlled.
- Prefer outcomes (“enrol the buyer automatically”) over abstractions (“seamless automation”).
- Prefer “built for Moodle” or “Moodle-native plugin architecture” over the vague “native” by itself.
- Use “open source” only with a nearby licence or source link.
- State compatibility precisely: Moodle 5.2 and PHP 8.3+ for release 2.17.
- Distinguish available, beta, add-on, and roadmap capabilities visually and in copy.
- Never claim “secure” solely because the code is open source. Publish security practices and reporting paths.
- Never claim “no fees” without narrowing it to “no Modern Commerce platform transaction fee”; processors still charge fees.
- Use “enrolment,” matching Moodle terminology; include “enrollment” variants only where SEO requires them.
- Do not imply that Modern Commerce is produced, endorsed, or certified by Moodle unless formal status exists.

## 10. Evidence needed before launch

Replace generic social proof with verifiable product proof:

- Public repository and licence link
- Current release and compatibility badge
- Working demo with operator and learner paths
- Two-minute product tour
- Screenshots from an unmodified release build
- Public changelog and issue tracker
- Test and release-quality summary
- Security policy and private reporting route
- At least one named implementation story before publishing outcome claims
- Gateway compatibility matrix, including one-time payments, recurring payments, currencies, refunds, and webhook coverage

Do not publish invented customer counts, revenue handled, conversion lifts, uptime, security audit status, testimonials, or logos.

## 11. Conversion and measurement plan

Primary journey: Home → Demo → Installation/docs → successful setup.
Developer journey: Home/GitHub → architecture → local install → first issue or contribution.
Service journey: Home/Product → deployment options → qualified contact.

Measure:

- Demo starts and completion of buyer/admin scenarios
- GitHub clicks, stars, release downloads, and returning contributors
- Documentation search success and quick-start completion
- Installation-to-first-product activation, where privacy-safe telemetry is explicitly opted in
- Qualified implementation/support enquiries
- Search landing pages that lead to docs, demo, or download

Avoid making newsletter sign-up the dominant conversion. The product should be usable before a visitor gives up an email address.

## 12. Launch sequence

### Phase 0: trust foundation

Resolve licence messaging, publish repository, add contributing/code-of-conduct/security files, reconcile versions in docs, define support boundaries, and verify gateway claims.

### Phase 1: useful launch

Ship Home, Product, Open Source, Developers, Docs, Pricing/Services, Roadmap, About, Support, demo, GitHub links, analytics, and technical SEO.

### Phase 2: evidence and discovery

Publish workflow guides, comparison pages, implementation stories, gateway matrix, architecture diagrams, release notes, and community discussions.

### Phase 3: ecosystem

Add extension directory, partner/service-provider program, contributor recognition, sponsorship, translations, and maintained integration recipes.

## 13. Research basis

Research completed July 31, 2026. Sources used for category and information-architecture decisions:

- Moodle describes open source in terms of longevity, community, reliability, customisability, data control, and provider choice: https://moodle.com/about/open-source/
- Moodle 5.2 was released April 20, 2026 and requires PHP 8.3: https://moodledev.io/general/releases/5.2
- Moodle Marketplace is replacing the Plugins Directory as the official discovery channel for free and paid Moodle integrations: https://marketplace.moodle.com/
- WooCommerce leads with control of checkout, data, costs, payment choice, features, and hosting: https://woocommerce.com/
- WooCommerce separates free open-source software from hosting, processor, and extension costs: https://woocommerce.com/pricing/
- WooCommerce gives developers a distinct documentation journey for extensions and themes: https://developer.woocommerce.com/docs
- Existing Moodle alternatives tend to cover either direct paid enrolment, coupons, credits, or a connector to an external storefront, supporting Modern Commerce's broader workflow position: https://moodle.org/plugins/enrol_gwpayments, https://moodle.org/plugins/enrol_credit, and https://wordpress.org/plugins/moowoodle/

These references inform positioning patterns; they are not evidence for Modern Commerce performance or adoption claims.
