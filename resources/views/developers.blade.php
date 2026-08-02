<x-marketing-layout title="ModernCommerce Developer Guide: Moodle APIs & Extensions" description="Build ModernCommerce extensions with source-backed Moodle architecture, events, external functions, scheduled tasks, add-on contracts, and development guidance.">
  <main id="main-content">
    <section class="mc-page-hero mc-developer-hero">
      <div class="container">
        <div class="row gy-5 align-items-center">
          <div class="col-lg-6">
            <p class="mc-section-label">Developer platform</p>
            <h1 class="display-2">Build on the commerce layer already inside Moodle.</h1>
            <p class="lead mt-4">Extend catalogue, order, enrolment, subscription, and storefront workflows without operating a separate bridge. ModernCommerce follows Moodle's native component, capability, event, task, privacy, and external-function conventions.</p>
            <div class="d-grid d-sm-flex gap-3 mt-4">
              <a class="btn btn-primary btn-lg" href="{{ route('docs.show', 'quick-start') }}">Start locally</a>
              <a class="btn btn-outline-primary btn-lg" href="{{ route('docs.show', 'architecture') }}">Read the architecture</a>
            </div>
            <p class="mc-developer-version mt-4 mb-0">Current source contract: ModernCommerce 2.17 · Moodle 5.2 · PHP 8.3+</p>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="mc-developer-code" aria-label="Example Moodle event observer declaration">
              <div class="d-flex justify-content-between align-items-center gap-3"><span>db/events.php</span><small>your add-on</small></div>
              <pre><code><span>&lt;?php</span>

$observers = [
    [
        <b>'eventname'</b> =&gt;
            '\local_moderncommerce\event\order_paid',
        <b>'callback'</b> =&gt;
            '\local_yourplugin\observer::order_paid',
    ],
];</code></pre>
              <p class="mb-0">React to a domain event. Keep order and entitlement writes inside ModernCommerce services.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pb-5" aria-label="Audited platform inventory">
      <div class="container">
        <div class="mc-developer-evidence">
          <div><strong>156</strong><span>external functions</span></div>
          <div><strong>12</strong><span>domain event classes</span></div>
          <div><strong>17</strong><span>scheduled tasks</span></div>
          <div><strong>36</strong><span>Moodle capabilities</span></div>
          <div><strong>81</strong><span>database tables</span></div>
        </div>
        <p class="small text-secondary mt-3 mb-0">Audited directly from <code>db/services.php</code>, <code>classes/event</code>, <code>db/tasks.php</code>, <code>db/access.php</code>, and <code>db/install.xml</code> in release 2.17.</p>
      </div>
    </section>

    <section class="mc-section pt-4">
      <div class="container">
        <div class="row gy-4 align-items-end mb-5">
          <div class="col-lg-7"><p class="mc-section-label">Choose a starting point</p><h2 class="display-4">Go from evaluation to a tested extension.</h2></div>
          <div class="col-lg-4 offset-lg-1"><p class="text-secondary mb-0">Each path leads to the detailed, source-audited documentation rather than duplicating contracts on a marketing page.</p></div>
        </div>
        <div class="row g-4">
          <div class="col-md-6 col-xl-3"><a class="mc-developer-path" href="{{ route('docs.show', 'installation') }}"><span>01</span><h3>Install safely</h3><p>Confirm Moodle and PHP requirements, install Composer dependencies, upgrade Moodle, and verify cron.</p><strong>Installation guide →</strong></a></div>
          <div class="col-md-6 col-xl-3"><a class="mc-developer-path" href="{{ route('docs.show', 'architecture') }}"><span>02</span><h3>Understand ownership</h3><p>Learn which records belong to Moodle and which belong to catalogue, transaction, access, and engagement services.</p><strong>Architecture guide →</strong></a></div>
          <div class="col-md-6 col-xl-3"><a class="mc-developer-path" href="{{ route('docs.show', 'web-services-and-events') }}"><span>03</span><h3>Integrate by contract</h3><p>Use capability-checked external functions and domain events instead of bypassing business rules with table writes.</p><strong>Services and events →</strong></a></div>
          <div class="col-md-6 col-xl-3"><a class="mc-developer-path" href="{{ route('docs.show', 'cli-and-maintenance') }}"><span>04</span><h3>First run and CLI</h3><p>Install safe defaults, seed or refresh demo data, audit coverage, manage preview users, and validate the plugin.</p><strong>First-run guide →</strong></a></div>
        </div>
      </div>
    </section>

    <section class="mc-section mc-developer-architecture">
      <div class="container">
        <div class="row gy-5 align-items-start">
          <div class="col-lg-4">
            <p class="mc-section-label">System boundary</p>
            <h2 class="display-5">One Moodle application. Clear ownership.</h2>
            <p class="lead">ModernCommerce adds commercial state without duplicating Moodle's learning records or identity system.</p>
            <a class="btn btn-outline-primary mt-3" href="{{ route('docs.show', 'database-reference') }}">Explore the data model</a>
          </div>
          <div class="col-lg-7 offset-lg-1">
            <div class="mc-developer-stack">
              <article><span>Learning system</span><h3>Moodle core</h3><p>Users, courses, roles, contexts, enrolments, completion, grades, files, messaging, privacy, and cron.</p></article>
              <article class="featured"><span>Commerce domain</span><h3>ModernCommerce</h3><p>Products, prices, carts, orders, payments, invoices, entitlements, keys, subscriptions, storefront, and reporting.</p></article>
              <article><span>External boundary</span><h3>Merchant-owned providers</h3><p>Stripe, PayPal, Paystack, and Flutterwave receive payment data and return callbacks or signed webhooks.</p></article>
            </div>
            <div class="mc-developer-invariant mt-4"><strong>Transaction invariant</strong><p>A gateway success screen is not fulfilment. Verified payment state, order transition, entitlement creation, and Moodle enrolment must agree.</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="mc-section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-5">
            <p class="mc-section-label">Extension contracts</p>
            <h2 class="display-4">Extend the platform at stable boundaries.</h2>
            <p class="lead text-secondary">Moodle recommends events for inter-plugin communication. ModernCommerce also exposes external functions, scheduled tasks, capability contracts, and optional add-on detection.</p>
          </div>
          <div class="col-lg-6 offset-lg-1">
            <div class="mc-developer-contracts">
              <article><span>EVENTS</span><div><h3>React to domain changes</h3><p>Observe <code>order_paid</code>, <code>order_status_changed</code>, and subscription lifecycle events. Treat the installed release's event class as the payload authority and regression-test every upgrade.</p><a href="{{ route('docs.show', 'web-services-and-events') }}">Review all 12 events</a></div></article>
              <article><span>FUNCTIONS</span><div><h3>Use validated application services</h3><p>The 156 declarations in <code>db/services.php</code> power shipped AJAX applications. They define read/write intent, login policy, and capability requirements; they are not an unauthenticated, general-purpose public REST API.</p><a href="{{ route('docs.show', 'web-services-and-events') }}">Review function groups</a></div></article>
              <article><span>ADD-ONS</span><div><h3>Keep optional components independent</h3><p>An add-on should own its tables, configuration, services, tasks, privacy declarations, and business rules. Gate integrations when the component or required capability is absent.</p><a href="{{ route('docs.show', 'addons-and-extension') }}">Read the add-on contract</a></div></article>
              <article><span>TASKS</span><div><h3>Design for asynchronous work</h3><p>Renewals, expiry, access synchronization, notifications, abandoned-cart recovery, and reports depend on Moodle cron. Production cron should run every minute.</p><a href="{{ route('docs.show', 'scheduled-tasks') }}">Review scheduled work</a></div></article>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mc-section mc-developer-workflow">
      <div class="container">
        <div class="row gy-5 align-items-start">
          <div class="col-lg-5">
            <p class="mc-section-label">Local workflow</p>
            <h2 class="display-5">Install, seed, exercise, verify.</h2>
            <p class="lead">Use a disposable Moodle environment and sandbox gateway accounts. Never seed or reset demonstration commerce data in production.</p>
            <div class="mc-developer-checklist mt-4">
              <div><span>1</span><p><strong>Install</strong>Moodle 5.2, PHP 8.3+, HTTPS for live gateway work, and Composer dependencies.</p></div>
              <div><span>2</span><p><strong>Initialize</strong>Run Moodle upgrade, install safe defaults, and keep cron active.</p></div>
              <div><span>3</span><p><strong>Exercise</strong>Create a product, complete a sandbox purchase, and confirm order, payment, entitlement, enrolment, and invoice state.</p></div>
              <div><span>4</span><p><strong>Validate</strong>Run project checks and test both the presence and absence of optional add-ons.</p></div>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-1">
            <div class="mc-developer-terminal">
              <div><span></span><span></span><span></span><b>Moodle root</b></div>
              <pre><code><span># Install the plugin dependencies</span>
composer install --working-dir=local/moderncommerce

<span># Register the plugin and run background work</span>
php admin/cli/upgrade.php --non-interactive
php admin/cli/cron.php

<span># Development or staging only</span>
php local/moderncommerce/cli/demo_data.php --install-defaults
php local/moderncommerce/cli/demo_data.php --audit

<span># Source-quality checks</span>
composer --working-dir=local/moderncommerce run mc:docs-check
composer --working-dir=local/moderncommerce run mc:string-audit
composer --working-dir=local/moderncommerce run mc:check-fast</code></pre>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mc-section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-4"><p class="mc-section-label">Source map</p><h2 class="display-5">Know which file answers the question.</h2><p class="text-secondary">Executable metadata outranks old README files or screenshots.</p></div>
          <div class="col-lg-7 offset-lg-1">
            <div class="table-responsive border" tabindex="0" aria-label="ModernCommerce source contract files">
              <table class="table table-hover align-middle mb-0 mc-developer-source-table">
                <thead><tr><th scope="col">Source</th><th scope="col">Authority</th></tr></thead>
                <tbody>
                  <tr><th scope="row"><code>version.php</code></th><td>Release, maturity, Moodle requirement, and supported Moodle branch.</td></tr>
                  <tr><th scope="row"><code>composer.json</code></th><td>PHP requirement, package dependencies, autoloading, and project checks.</td></tr>
                  <tr><th scope="row"><code>db/services.php</code></th><td>External-function classes, access intent, AJAX policy, and capabilities.</td></tr>
                  <tr><th scope="row"><code>db/access.php</code></th><td>Capability definitions and role archetype defaults.</td></tr>
                  <tr><th scope="row"><code>db/events.php</code></th><td>Internal event observers and their processing priority.</td></tr>
                  <tr><th scope="row"><code>db/tasks.php</code></th><td>Scheduled task classes and default schedules.</td></tr>
                  <tr><th scope="row"><code>db/install.xml</code></th><td>Install-time database schema, keys, indexes, and field types.</td></tr>
                  <tr><th scope="row"><code>lang/en/local_moderncommerce.php</code></th><td>User-facing terminology and configuration help text.</td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pb-5">
      <div class="container">
        <div class="mc-developer-guardrails">
          <div><p class="mc-section-label">Engineering guardrails</p><h2 class="display-5">Protect payment and learner state.</h2></div>
          <ul class="mb-0">
            <li>Validate parameters, context, login state, and Moodle capabilities on every callable boundary.</li>
            <li>Verify gateway signatures and record callbacks through the payment and webhook ledgers.</li>
            <li>Use services or events; do not update order, payment, entitlement, or subscription tables directly.</li>
            <li>Declare privacy metadata and external transfers for every add-on that stores personal data.</li>
            <li>Test install, upgrade, cron, retries, and optional-component absence before production release.</li>
          </ul>
          <div class="d-flex flex-wrap gap-3 mt-4"><a class="btn btn-light" href="{{ route('docs.show', 'privacy-and-security') }}">Privacy and security</a><a class="btn btn-outline-light" href="{{ route('docs.show', 'webhooks-and-payment-operations') }}">Payment operations</a></div>
        </div>
      </div>
    </section>

    <section class="mc-section pt-4">
      <div class="container">
        <div class="row gy-4 align-items-end">
          <div class="col-lg-6"><p class="mc-section-label">Platform references</p><h2 class="display-5">Built on Moodle's documented contracts.</h2><p class="text-secondary mb-0">Use ModernCommerce documentation for product-specific behavior and Moodle's versioned developer documentation for the underlying platform APIs.</p></div>
          <div class="col-lg-5 offset-lg-1"><div class="d-grid gap-2"><a class="mc-developer-reference" href="https://moodledev.io/docs/5.2/apis" rel="external"><strong>Moodle 5.2 API guides</strong><span>Access, events, privacy, tasks, enrolment, files, and more →</span></a><a class="mc-developer-reference" href="https://moodledev.io/docs/5.2/apis/subsystems/external/functions" rel="external"><strong>External function definitions</strong><span>Parameters, returns, validation, context, and capabilities →</span></a><a class="mc-developer-reference" href="https://moodledev.io/docs/5.2/apis/subsystems/task/scheduled" rel="external"><strong>Scheduled tasks</strong><span>Task classes, declarations, schedules, cron, and debugging →</span></a></div></div>
        </div>
      </div>
    </section>

    <section class="pb-5">
      <div class="container"><div class="mc-final-cta text-center"><p class="mc-section-label">Start with a working transaction</p><h2 class="display-3">Install it. Trace it. Then extend it.</h2><p class="lead mx-auto">Complete a sandbox purchase before designing an integration so you can see the order, payment, enrolment, invoice, and event lifecycle together.</p><div class="d-grid d-sm-flex justify-content-center gap-3 mt-4"><a class="btn btn-light btn-lg" href="{{ route('docs.show', 'quick-start') }}">Open the quick start</a><a class="btn btn-outline-light btn-lg" href="{{ route('docs.show', 'web-services-and-events') }}">Explore services and events</a></div></div></div>
    </section>
  </main>
</x-marketing-layout>
