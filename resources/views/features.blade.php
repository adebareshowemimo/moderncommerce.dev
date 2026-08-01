@php
  $domains = [
    [
      'id' => 'catalogue', 'number' => '01', 'title' => 'Catalogue, products and pricing',
      'summary' => 'Turn existing Moodle learning into structured offers without duplicating course content.',
      'docs' => 'products-and-pricing',
      'features' => [
        ['Course products', 'Attach commerce records to existing Moodle courses; no course migration or duplicate learning record is required.'],
        ['Bundles and programs', 'Package multiple courses as a value-led bundle or an outcome-led program while preserving the included Moodle courses as the access source.'],
        ['Subscription plans', 'Publish recurring-access offers with billing cycles, trials, grace rules, feature matrices and course, category or bundle access rules.'],
        ['Flexible price records', 'Use regular, sale, tier and subscription-related prices with compare-at values, enabled states and optional start/end windows.'],
        ['Inventory and seat limits', 'Leave normal courses unlimited or manage stock, reservations and capacity for limited cohorts and licence-based offers.'],
        ['Catalogue organization', 'Organize discovery with categories, tags, attributes, product types, visibility, availability dates, language and skill level.'],
        ['Course merchandising', 'Publish outcomes, duration, outline, badges, trust information, assessments and learner-facing course metadata without changing course internals.'],
        ['Reviews and ratings', 'Collect buyer reviews, distinguish verified purchasers and give trusted staff moderation controls.'],
      ],
    ],
    [
      'id' => 'storefront', 'number' => '02', 'title' => 'Storefront, content and discovery',
      'summary' => 'Build a branded public store inside Moodle instead of operating a second CMS or WordPress site.',
      'docs' => 'storefront',
      'features' => [
        ['22 storefront widget types', 'Compose pages with slider, video hero, breadcrumb, featured and related products, catalogue, categories, trust badges, countdown, testimonials, instructors, newsletter, content, media stories, learning promise, belief, policy, FAQ, CTA, support, contact cards and footer widgets.'],
        ['Visual edit mode', 'Add, configure, arrange and remove page-scoped widget instances from the storefront side panel.'],
        ['Reusable presets', 'Reuse style configurations without forcing different widget instances to share content or placement.'],
        ['Public page system', 'Publish the catalogue, pricing, about, support, privacy, terms and refund-policy experiences from the Moodle installation.'],
        ['Course and bundle detail pages', 'Present merchandising content, reviews, price and a responsive purchase card designed around course access.'],
        ['Brand controls', 'Apply colors, typography-related tokens, radius, logo and small custom-CSS overrides across storefront, admin, learner and public surfaces.'],
        ['Moodle homepage option', 'Use the ModernCommerce storefront as Moodle’s configured default home page without editing Moodle core.'],
        ['Lead and support forms', 'Collect newsletter subscriptions and support enquiries with Moodle core reCAPTCHA when configured.'],
      ],
    ],
    [
      'id' => 'checkout', 'number' => '03', 'title' => 'Cart, checkout and tax',
      'summary' => 'Validate the commercial terms on the server before creating a durable order.',
      'docs' => 'cart-and-checkout',
      'features' => [
        ['Server-side cart', 'Persist carts and items for authenticated buyers, including additions, removals, quantities and coupon application.'],
        ['One connected checkout', 'Resolve product availability, current price, discounts, stock, buyer permissions and gateway readiness before payment.'],
        ['Configurable buyer fields', 'Hide, request or require phone and billing-address fields according to invoicing, tax and support needs.'],
        ['Coupon-aware totals', 'Preserve discount and tax adjustments with the order so historical documents do not depend on later coupon edits.'],
        ['Single active currency', 'Choose one of 21 supported store currencies with configured symbol position and decimal formatting.'],
        ['Inclusive or exclusive tax', 'Configure tax treatment and carry calculated tax into order and document records.'],
        ['Inventory reservations', 'Protect limited offers during checkout and release stale reservations through cleanup workflows.'],
        ['Abandoned-cart state', 'Retain the evidence needed for cleanup and consent-aware recovery communication.'],
      ],
    ],
    [
      'id' => 'payments', 'number' => '04', 'title' => 'Payments, gateways and webhooks',
      'summary' => 'Connect merchant accounts you own and retain the operational evidence behind each payment.',
      'docs' => 'payments',
      'features' => [
        ['Four native gateways', 'Connect Stripe, PayPal, Paystack and Flutterwave using test or live credentials supplied by the merchant.'],
        ['No ModernCommerce revenue share', 'Gateway settlement goes to the organization’s own merchant account; ModernCommerce does not take a percentage.'],
        ['Hosted card capture', 'Sensitive card entry remains with the selected gateway rather than being stored by the Moodle plugin.'],
        ['Signed webhook processing', 'Validate provider callbacks and webhooks before transitioning payment and order state.'],
        ['Payment attempts and events', 'Keep gateway reference, amount, currency, result and event evidence separate from the order record.'],
        ['Idempotent reconciliation', 'Handle duplicate returns and webhook deliveries without intentionally fulfilling the same purchase twice.'],
        ['Gateway readiness checks', 'Expose missing credentials, incompatible currency, webhook state and other configuration blockers.'],
        ['Payment and webhook ledgers', 'Give payment operators searchable evidence for investigation, reconciliation and support.'],
      ],
    ],
    [
      'id' => 'orders', 'number' => '05', 'title' => 'Orders, invoices, refunds and audit',
      'summary' => 'Operate the financial lifecycle after checkout with durable records and controlled state changes.',
      'docs' => 'orders-invoices-refunds',
      'features' => [
        ['Durable order records', 'Snapshot items, totals, currency, addresses, adjustments and status history at purchase time.'],
        ['Order administration', 'Search and inspect orders, customers, status, items, payment evidence and fulfilment from a unified operator workflow.'],
        ['Invoices and receipts', 'Generate downloadable commerce documents from transaction snapshots rather than current product data.'],
        ['Manual invoices', 'Support approved invoice-led sales and finance-team workflows when card checkout is not the right route.'],
        ['Refund workflow', 'Record and control refunds while retaining their relationship to payment, order, access and audit history.'],
        ['Customer records', 'Bring purchase history and operational customer context together without creating a separate customer identity system.'],
        ['Status history', 'Preserve who or what changed an order instead of relying on an overwritten status field.'],
        ['Audit log', 'Retain immutable-style operational evidence for sensitive commerce actions and investigations.'],
      ],
    ],
    [
      'id' => 'access', 'number' => '06', 'title' => 'Fulfilment, enrolment and entitlements',
      'summary' => 'Translate verified purchases into traceable rights and Moodle course access.',
      'docs' => 'order-lifecycle',
      'features' => [
        ['Automatic enrolment', 'Grant Moodle course access when the payment and order reach the valid fulfilment boundary.'],
        ['Bundle and program fulfilment', 'Process the included courses behind a multi-course offer while retaining the purchased parent product.'],
        ['Fulfilment records', 'Track processing separately from payment so failed access can be repaired without charging the buyer again.'],
        ['Entitlement ledger', 'Represent the learner’s right to a target independently of current enrolment state.'],
        ['Entitlement events', 'Preserve access changes for support, reconciliation and lifecycle analysis.'],
        ['Access synchronization', 'Reconcile subscription rights and Moodle enrolment through scheduled workflows.'],
        ['Cancellation and expiry', 'Remove or change access according to validated order, key or subscription lifecycle rules.'],
        ['Diagnostic chain', 'Trace payment, items, fulfilment, entitlement and enrolment when a paid learner reports missing access.'],
      ],
    ],
    [
      'id' => 'promotions', 'number' => '07', 'title' => 'Coupons, keys and corporate distribution',
      'summary' => 'Support promotions, prepaid access and organization-led course distribution.',
      'docs' => 'corporate-sales',
      'features' => [
        ['Targeted coupons', 'Create fixed or percentage discounts with dates, usage constraints and product or bundle targets.'],
        ['Course enrolment keys', 'Issue prepaid keys that learners redeem for course access without repeating checkout.'],
        ['Bundle and program keys', 'Distribute a multi-course purchase through a controlled key pool.'],
        ['Subscription keys', 'Activate a subscription plan from a prepaid or corporate code.'],
        ['Seat pools', 'Track keys or subscription capacity used and remaining for organization buyers.'],
        ['Low-pool notification', 'Warn the buyer when a managed access pool approaches depletion so procurement can reorder.'],
        ['Manual invoice route', 'Combine finance-approved invoicing with key-based or managed access distribution.'],
        ['Redemption evidence', 'Track key state and usage for support, expiry and allocation review.'],
      ],
    ],
    [
      'id' => 'subscriptions', 'number' => '08', 'title' => 'Subscriptions and memberships',
      'summary' => 'Sell recurring access while keeping billing state and Moodle access synchronized.',
      'docs' => 'subscriptions',
      'features' => [
        ['Plan builder', 'Configure cycle, price, status, trial days, grace period and learner-facing plan information.'],
        ['Feature matrix', 'Explain and compare what each subscription level includes.'],
        ['Access rules', 'Grant plan access to courses, categories or bundles.'],
        ['Free trials', 'Offer plan-level trials with optional global auto-conversion behavior.'],
        ['Recurring payments', 'Process renewals through scheduled gateway workflows.'],
        ['Grace and expiry', 'Apply reminders, grace, suspension and expiry according to configured policy.'],
        ['Plan changes', 'Control upgrades, downgrades, lateral moves, cooldowns, credits and immediate or end-of-period cancellation.'],
        ['Lifecycle emails', 'Configure activation, renewal, expiring, grace, expired, cancelled and payment-failed messages.'],
      ],
    ],
    [
      'id' => 'experience', 'number' => '09', 'title' => 'Learner and customer experience',
      'summary' => 'Keep purchases, learning access and self-service in the same Moodle identity.',
      'docs' => 'learner-account',
      'features' => [
        ['Learner dashboard', 'Give learners one account shell for purchases, learning access and commerce self-service.'],
        ['Course library', 'Show entitled courses and provide direct routes back into learning.'],
        ['Orders and invoices', 'Let learners review purchase history, open orders and download documents they own.'],
        ['Certificates and grades', 'Surface Moodle learning evidence beside commercial access.'],
        ['Subscription controls', 'Show plan, status, access and permitted cancellation or plan actions.'],
        ['Wishlist', 'Let learners save products while giving operators an aggregate demand signal.'],
        ['Profile and billing details', 'Maintain the commerce-facing profile fields required for checkout and support.'],
        ['Ownership checks', 'Authorize every learner record by the authenticated Moodle user rather than trusting a requested ID.'],
      ],
    ],
    [
      'id' => 'communications', 'number' => '10', 'title' => 'Email, notifications and recovery',
      'summary' => 'Communicate transaction and lifecycle events through a queued, observable delivery system.',
      'docs' => 'notifications',
      'features' => [
        ['Reusable email templates', 'Manage branded subjects and bodies with validated placeholders.'],
        ['Queued delivery', 'Separate the transaction from outbound delivery so payment and enrolment do not wait on email.'],
        ['Transactional messages', 'Notify buyers about orders, payments, invoices, enrolment and subscription lifecycle events.'],
        ['Abandoned-cart recovery', 'Send scheduled, suppression-aware recovery messages for eligible carts.'],
        ['Payment reminders', 'Evaluate unpaid orders twice daily and queue applicable reminders.'],
        ['Digest processing', 'Group applicable operational notifications into scheduled digest delivery.'],
        ['Slack and Teams channels', 'Optionally deliver selected operational notices to configured collaboration endpoints.'],
        ['Delivery evidence', 'Inspect queue state, attempts, logs, suppression and stale-item recovery.'],
      ],
    ],
    [
      'id' => 'analytics', 'number' => '11', 'title' => 'Analytics, reports and operational oversight',
      'summary' => 'See commercial performance and investigate the operational state behind it.',
      'docs' => 'reports-and-analytics',
      'features' => [
        ['22 dashboard widgets', 'Configure four KPI tiles and 18 analytics or table widgets independently from the storefront widgets.'],
        ['Flexible dashboard layout', 'Show, hide, reorder and size widgets personally or through an authorized site default.'],
        ['Date-range analysis', 'Review 7 days, 30 days, 90 days, 12 months or year-to-date with appropriate time buckets.'],
        ['Revenue and conversion', 'Track net/gross revenue, paid conversion, average order value, product mix and cart funnel.'],
        ['Customer and demand insight', 'Review new versus returning buyers, purchase timing, geography and wishlist demand.'],
        ['Payment and leakage insight', 'Compare gateway success, tax, coupons, refunds, discounts and time to payment.'],
        ['Snapshot reporting', 'Use daily, product and gateway reporting records generated by Moodle cron.'],
        ['Setup alerts', 'Highlight actionable store conditions such as active course products without an enabled regular price.'],
      ],
    ],
    [
      'id' => 'governance', 'number' => '12', 'title' => 'Administration, roles, privacy and security',
      'summary' => 'Delegate commerce work through Moodle controls and retain ownership of operational data.',
      'docs' => 'roles-and-permissions',
      'features' => [
        ['36 Moodle capabilities', 'Separate viewing and management across orders, products, storefront, payments, reporting, subscriptions and communications.'],
        ['Nine role presets', 'Seed administrator, finance, product, reporting, storefront, marketing, support, subscription and payment-operations starting points.'],
        ['System-context administration', 'Assign cross-store responsibilities through Moodle’s native role and capability model.'],
        ['Moodle Privacy API', 'Declare metadata and external locations and participate in Moodle export, deletion and user-list requests.'],
        ['Data minimization controls', 'Hide optional checkout fields and use suppression-aware communication workflows.'],
        ['Credential boundaries', 'Store gateway configuration under protected capabilities and keep card capture at the provider.'],
        ['Webhook and audit evidence', 'Retain independent payment, webhook and audit records for investigation.'],
        ['Localization', 'Use Moodle language strings, administrator overrides and a string-audit guard for translated interfaces.'],
      ],
    ],
    [
      'id' => 'platform', 'number' => '13', 'title' => 'Open-source platform and extension points',
      'summary' => 'Operate, inspect and extend the commerce layer as part of the Moodle ecosystem.',
      'docs' => 'web-services-and-events',
      'features' => [
        ['GPL-3.0-or-later', 'Use, inspect, modify and redistribute the plugin under its open-source licence.'],
        ['Moodle-native architecture', 'Run commerce in the Moodle application, database, user, enrolment, role, messaging and cron environment.'],
        ['156 declared services', 'Power the shipped AJAX applications through validated, capability-checked external functions; these are not presented as an unauthenticated public REST API.'],
        ['Domain events', 'Observe order and subscription lifecycle events instead of bypassing business rules with direct table writes.'],
        ['17 scheduled workflows', 'Run notification, recovery, cleanup, reporting, key and subscription lifecycle work through Moodle cron.'],
        ['Optional add-on contract', 'Keep add-on data and business rules independent while ModernCommerce provides gated navigation and React administration surfaces.'],
        ['CLI maintenance tools', 'Seed defaults and demo data, refresh roles, inspect bundles, test email and package releases.'],
        ['Source-backed documentation', 'Use database, capability, service, task and page references reviewed against the installed source.'],
      ],
    ],
  ];
@endphp

<x-marketing-layout title="ModernCommerce features | Complete Moodle course-commerce platform" description="Explore every ModernCommerce feature: products, storefront, checkout, payments, enrolment, subscriptions, corporate seats, analytics, roles, privacy, and extension points.">
  <main id="main-content">
    <section class="mc-page-hero mc-feature-hero">
      <div class="container"><div class="row gy-5 align-items-end">
        <div class="col-lg-8">
          <p class="mc-section-label">Complete capability reference</p>
          <h1 class="display-3">Every feature required to sell, fulfil, and operate a modern ecommerce business for training, eLearning courses, and digital products.</h1>
          <p class="lead mt-4">ModernCommerce covers the complete path from merchandising and checkout to verified payment, Moodle enrolment, recurring access, finance operations, customer service, analytics, and governance—inside one open-source Moodle plugin.</p>
          <div class="d-grid d-sm-flex gap-3 mt-4"><a class="btn btn-primary btn-lg" href="{{ config('app.demo_url') }}">Explore the live product</a><a class="btn btn-outline-primary btn-lg" href="{{ route('docs.show', 'feature-reference') }}">Open the technical reference</a></div>
        </div>
        <div class="col-lg-4"><div class="mc-feature-version"><span>Source reviewed</span><strong>ModernCommerce 2.1.6</strong><small>1 August 2026 · Moodle 5.2 · PHP 8.3+</small></div></div>
      </div></div>
    </section>

    <section class="mc-section pt-0"><div class="container"><div class="mc-evidence-bar">
      <span><strong>4</strong>native payment gateways</span><span><strong>22</strong>storefront widget types</span><span><strong>22</strong>dashboard widgets</span><span><strong>36</strong>Moodle capabilities</span><span><strong>17</strong>scheduled workflows</span>
    </div></div></section>

    <section class="mc-section pt-0"><div class="container"><div class="row g-4">
      <div class="col-md-4"><article class="mc-feature-principle h-100"><span>01</span><h2 class="h4">Native, not bridged</h2><p>Courses, users, transactions, enrolments and access remain in the Moodle environment you already govern.</p></article></div>
      <div class="col-md-4"><article class="mc-feature-principle h-100"><span>02</span><h2 class="h4">Traceable after checkout</h2><p>Payment, order, fulfilment, entitlement, enrolment and communication keep separate operational evidence.</p></article></div>
      <div class="col-md-4"><article class="mc-feature-principle h-100"><span>03</span><h2 class="h4">Open and extensible</h2><p>Inspect the source, run it on your infrastructure and extend validated Moodle services and events.</p></article></div>
    </div></div></section>

    <section class="mc-section mc-feature-catalogue"><div class="container"><div class="row gx-4 gy-5">
      <aside class="col-lg-3">
        <nav class="mc-feature-toc sticky-lg-top" aria-label="Feature domains">
          <span>Feature domains</span>
          @foreach ($domains as $domain)
            <a href="#{{ $domain['id'] }}"><small>{{ $domain['number'] }}</small>{{ $domain['title'] }}</a>
          @endforeach
        </nav>
      </aside>
      <div class="col-lg-9">
        @foreach ($domains as $domain)
          <section class="mc-feature-domain" id="{{ $domain['id'] }}" aria-labelledby="{{ $domain['id'] }}-title">
            <header class="row gy-3 align-items-start mb-4">
              <div class="col-md-8"><span>{{ $domain['number'] }}</span><h2 id="{{ $domain['id'] }}-title">{{ $domain['title'] }}</h2><p>{{ $domain['summary'] }}</p></div>
              <div class="col-md-4 text-md-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('docs.show', $domain['docs']) }}">Read configuration guide</a></div>
            </header>
            <div class="row g-3">
              @foreach ($domain['features'] as [$title, $copy])
                <div class="col-md-6"><article class="mc-feature-item h-100"><h3>{{ $title }}</h3><p>{{ $copy }}</p></article></div>
              @endforeach
            </div>
          </section>
        @endforeach
      </div>
    </div></div></section>

    <section class="mc-section mc-feature-boundaries"><div class="container"><div class="row gx-4 gy-5">
      <div class="col-lg-5"><p class="mc-section-label">Important operating boundaries</p><h2 class="display-5">A serious feature reference also explains what the product does not hide.</h2><p class="lead">These boundaries matter when evaluating production fit and total operating responsibility.</p></div>
      <div class="col-lg-7"><div class="mc-product-pillars">
        <article><h3>One active store currency</h3><p>ModernCommerce supports 21 currencies, but each store operates one active currency at a time; it is not simultaneous multi-currency.</p></article>
        <article><h3>Your gateway accounts</h3><p>Stripe, PayPal, Paystack and Flutterwave require merchant accounts and credentials owned by your organization.</p></article>
        <article><h3>Cron is operational infrastructure</h3><p>Renewals, expiry, notifications, recovery, cleanup and report snapshots require Moodle cron every minute in production.</p></article>
        <article><h3>Open source still needs ownership</h3><p>GPL access removes platform lock-in; it does not replace secure hosting, backups, monitoring, upgrades, testing and accountable staff.</p></article>
      </div></div>
    </div></div></section>

    <section class="pb-5"><div class="container"><div class="mc-final-cta text-center"><p class="mc-section-label">Evaluate the complete system</p><h2 class="display-3">Trace a real sale from catalogue to course access.</h2><p class="lead mx-auto">Use the demo for product evidence and the technical reference for configuration, permissions, routes, data and operational boundaries.</p><div class="d-grid d-sm-flex justify-content-center gap-3 mt-4"><a class="btn btn-light btn-lg" href="{{ config('app.demo_url') }}">Explore the demo</a><a class="btn btn-outline-light btn-lg" href="{{ route('docs.show', 'feature-reference') }}">Read the feature reference</a></div></div></div></section>
  </main>
</x-marketing-layout>
