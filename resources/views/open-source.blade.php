<x-marketing-layout title="Open-source Moodle commerce | ModernCommerce" description="ModernCommerce is GPL-3.0-or-later course-commerce software for Moodle. Inspect, self-host, modify, and operate your storefront without a platform revenue share.">
  <main id="main-content">
    <section class="mc-page-hero mc-open-source-hero">
      <div class="container">
        <div class="row gy-5 align-items-center">
          <div class="col-lg-7">
            <p class="mc-section-label">GPL open-source commerce for Moodle</p>
            <h1 class="display-2">Open-source commerce infrastructure for Moodle, under your control.</h1>
            <p class="lead mt-4">ModernCommerce gives individuals and organizations a complete Moodle course-selling system they can inspect, self-host, modify, and operate on their own terms, without a closed connector or ModernCommerce platform revenue share.</p>
            <div class="d-grid d-sm-flex flex-wrap gap-3 mt-4">
              <a class="btn btn-primary btn-lg" href="{{ route('docs.show', 'installation') }}">Install ModernCommerce</a>
              <a class="btn btn-outline-primary btn-lg" href="https://www.gnu.org/licenses/gpl-3.0.html">Read the GPL licence</a>
            </div>
            <p class="mc-research-date mt-4 mb-0">Release 2.1.6 · Moodle 5.2 · PHP 8.3+ · GPL-3.0-or-later</p>
          </div>
          <div class="col-lg-5">
            <aside class="mc-open-license-card" aria-label="Open-source project facts">
              <span>ModernCommerce Core</span>
              <strong>GPL-3.0-or-later</strong>
              <p>The licence is included in the plugin package and declared consistently in Composer metadata and source-file headers.</p>
              <dl class="mb-0">
                <div><dt>Software licence</dt><dd>$0</dd></div>
                <div><dt>Revenue share</dt><dd>None</dd></div>
                <div><dt>Hosting model</dt><dd>Self-hosted Moodle</dd></div>
                <div><dt>Payment accounts</dt><dd>Your own</dd></div>
              </dl>
            </aside>
          </div>
        </div>
      </div>
    </section>

    <section class="mc-section pt-0" aria-label="Source audit evidence">
      <div class="container">
        <div class="mc-open-proof-grid">
          <div><strong>156</strong><span>registered web services</span></div>
          <div><strong>81</strong><span>documented database tables</span></div>
          <div><strong>36</strong><span>Moodle capabilities</span></div>
          <div><strong>17</strong><span>scheduled workflows</span></div>
        </div>
      </div>
    </section>

    <section class="mc-section mc-native-case">
      <div class="container">
        <div class="row gy-4 justify-content-between align-items-end mb-5">
          <div class="col-lg-7"><p class="mc-section-label">What open means here</p><h2 class="display-4 mb-0">Operating freedom, backed by a specific licence.</h2></div>
          <div class="col-lg-4"><p class="text-secondary mb-0">Open source is more than seeing code. It changes who controls deployment, adaptation, provider choice, and continuity.</p></div>
        </div>
        <div class="row g-4">
          <div class="col-md-6 col-xl-3"><article class="mc-capability"><span>01</span><h3>Run it</h3><p>Install ModernCommerce in a compatible Moodle environment and operate the course store on infrastructure you choose.</p></article></div>
          <div class="col-md-6 col-xl-3"><article class="mc-capability"><span>02</span><h3>Inspect it</h3><p>Review the PHP, JavaScript, schema, services, scheduled tasks, permissions, privacy provider, and gateway implementations.</p></article></div>
          <div class="col-md-6 col-xl-3"><article class="mc-capability"><span>03</span><h3>Modify it</h3><p>Adapt storefronts, workflows, integrations, roles, notifications, and business rules under the GPL licence terms.</p></article></div>
          <div class="col-md-6 col-xl-3"><article class="mc-capability"><span>04</span><h3>Redistribute it</h3><p>Share original or modified covered work while preserving the applicable GPL notices, source obligations, and licence terms.</p></article></div>
        </div>
      </div>
    </section>

    <section class="mc-section">
      <div class="container">
        <div class="row gy-5 align-items-start">
          <div class="col-lg-5">
            <p class="mc-section-label">Built in Moodle's extension model</p>
            <h2 class="display-4">The learning system remains the system of record.</h2>
            <p class="lead">ModernCommerce is a Moodle local plugin, not an external storefront connected by a synchronization bridge.</p>
            <p class="text-secondary">Moodle continues to own users, courses, enrolments, completion, grades, roles, language, privacy, events, files, and cron. ModernCommerce adds products, checkout, payment evidence, fulfilment, entitlements, subscriptions, customer operations, and reporting in the same application.</p>
            <a class="btn btn-outline-primary" href="{{ route('docs.show', 'architecture') }}">Read the architecture</a>
          </div>
          <div class="col-lg-7">
            <div class="mc-code-proof mc-open-code-proof">
              <div><span></span><span></span><span></span><small>local_moderncommerce / version.php</small></div>
              <pre><code><b>component</b>  local_moderncommerce
<b>release</b>    2.1.6
<b>moodle</b>     5.2
<b>php</b>        8.3+
<b>license</b>    GPL-3.0-or-later

<span>✓ Moodle roles and capabilities</span>
<span>✓ Moodle Privacy API provider</span>
<span>✓ Moodle events and scheduled tasks</span>
<span>✓ Moodle external-service contracts</span></code></pre>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mc-section mc-open-control-section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-5"><p class="mc-section-label">Control without rebuilding everything</p><h2 class="display-4">Shape the parts that make your course business different.</h2><p class="lead">Use the supported administration first. Extend the source when your operating model needs more.</p></div>
          <div class="col-lg-7"><div class="mc-product-pillars mc-open-pillars">
            <article><h3>Customer experience</h3><p>Brand the storefront, arrange widgets, publish courses and bundles, configure checkout fields, and control learner-account navigation.</p></article>
            <article><h3>Commercial model</h3><p>Sell individual courses, programs, recurring plans, prepaid keys, corporate access, coupons, invoices, and region-appropriate gateway choices.</p></article>
            <article><h3>Operations</h3><p>Define custom Moodle roles, notification channels, email templates, reporting workflows, audit access, and retention settings.</p></article>
            <article><h3>Extensions</h3><p>Build against 156 registered services, domain events, scheduled tasks, gateway interfaces, and gated add-on integration points.</p></article>
          </div></div>
        </div>
      </div>
    </section>

    <section class="mc-section mc-open-economics">
      <div class="container">
        <div class="row gy-5 align-items-start">
          <div class="col-lg-6"><p class="mc-section-label">Open software, honest economics</p><h2 class="display-4">No software licence fee does not mean no operating cost.</h2><p class="lead">ModernCommerce Core has a $0 software licence and no ModernCommerce revenue share. Your organization still budgets for the infrastructure and expertise required to run a production commerce system.</p></div>
          <div class="col-lg-6"><div class="mc-open-cost-list">
            <div><strong>Included in core</strong><span>Source code, storefront, checkout, four gateway integrations, subscriptions, keys, invoices, refunds, reporting, roles, privacy, and automation.</span></div>
            <div><strong>Costs you still own</strong><span>Moodle hosting, backups, monitoring, payment-processor fees, tax/compliance work, upgrades, configuration, and internal operations.</span></div>
            <div><strong>Optional professional help</strong><span>Implementation, migration, customization, integration, training, production support, and managed operations from Agunfon Interactivity LLC, USA or a provider you choose.</span></div>
          </div></div>
        </div>
      </div>
    </section>

    <section class="mc-section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-5"><p class="mc-section-label">Project transparency</p><h2 class="display-4">Evaluate the product before depending on it.</h2><p class="text-secondary">Mature open-source projects make licence, installation, architecture, security boundaries, releases, and contribution paths easy to verify. ModernCommerce publishes what exists and does not substitute marketing claims for missing project infrastructure.</p></div>
          <div class="col-lg-7"><div class="mc-open-status-list">
            <div><span class="mc-status yes">Available</span><strong>GPL licence in every package</strong><p>GPL-3.0-or-later is declared in `LICENSE`, Composer metadata, versioned source headers, and product documentation.</p></div>
            <div><span class="mc-status yes">Available</span><strong>Source-led documentation</strong><p>Installation, architecture, roles, every admin area, 81 tables, services, events, cron, privacy, localization, and extension boundaries are documented.</p></div>
            <div><span class="mc-status yes">Available</span><strong>Versioned release packages</strong><p>The audited project contains packaged 2.x releases and declares current compatibility in `version.php` and `composer.json`.</p></div>
            <div><span class="mc-status partial">Not linked yet</span><strong>Public repository and contribution channel</strong><p>A public repository URL, issue tracker, security policy, contribution guide, and code of conduct are not currently configured on this website. They must be published before the site invites public code contributions.</p></div>
          </div></div>
        </div>
      </div>
    </section>

    <section class="mc-section mc-faq-section">
      <div class="container"><div class="row gy-5">
        <div class="col-lg-4"><div class="mc-faq-intro"><p class="mc-section-label">Open-source FAQ</p><h2 class="display-4">Know what you control, and what you operate.</h2></div></div>
        <div class="col-lg-8"><div class="accordion mc-faq" id="openSourceFaq">
          <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#osFaqOne" aria-expanded="true" aria-controls="osFaqOne">Is ModernCommerce Core really free?</button></h3><div id="osFaqOne" class="accordion-collapse collapse show" data-bs-parent="#openSourceFaq"><div class="accordion-body">Yes. The software licence price is $0 under GPL-3.0-or-later, and ModernCommerce does not take a platform percentage of sales. Hosting, payment-provider fees, implementation, support, and operating costs remain your responsibility.</div></div></div>
          <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#osFaqTwo" aria-expanded="false" aria-controls="osFaqTwo">Can an individual, institution, or agency modify it?</button></h3><div id="osFaqTwo" class="accordion-collapse collapse" data-bs-parent="#openSourceFaq"><div class="accordion-body">Yes, subject to the GPL terms. Individuals and organizations can run and modify it, and service providers can deploy or adapt it for clients. Anyone redistributing covered work must meet the applicable GPL source and licence obligations.</div></div></div>
          <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#osFaqThree" aria-expanded="false" aria-controls="osFaqThree">Does open source mean the store maintains itself?</button></h3><div id="osFaqThree" class="accordion-collapse collapse" data-bs-parent="#openSourceFaq"><div class="accordion-body">No. Production Moodle commerce still needs secure hosting, HTTPS, backups, monitoring, cron, gateway configuration, upgrades, testing, privacy operations, and staff ownership. Open source gives you control and provider choice; it does not remove operational responsibility.</div></div></div>
          <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#osFaqFour" aria-expanded="false" aria-controls="osFaqFour">Is ModernCommerce part of Moodle HQ?</button></h3><div id="osFaqFour" class="accordion-collapse collapse" data-bs-parent="#openSourceFaq"><div class="accordion-body">No. ModernCommerce is an independent Moodle plugin by Agunfon Interactivity LLC, USA. It uses Moodle's plugin APIs and GPL-compatible development model but does not claim endorsement, certification, or ownership by Moodle HQ.</div></div></div>
          <div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#osFaqFive" aria-expanded="false" aria-controls="osFaqFive">Where is the public source repository?</button></h3><div id="osFaqFive" class="accordion-collapse collapse" data-bs-parent="#openSourceFaq"><div class="accordion-body">The complete source is included in the GPL release package. A public repository URL is not yet configured on ModernCommerce.dev, so this page does not send visitors to a placeholder or invent an issue tracker. The repository and governance links should be added together when the public contribution channel launches.</div></div></div>
        </div></div>
      </div></div>
    </section>

    <section class="pb-5"><div class="container"><div class="mc-final-cta text-center"><p class="mc-section-label">Start with evidence</p><h2 class="display-3">Inspect the architecture. Install the release. Keep control.</h2><p class="lead mx-auto">Use the complete documentation to evaluate compatibility, deployment, data ownership, permissions, payments, and operations before launch.</p><div class="d-grid d-sm-flex justify-content-center gap-3 mt-4"><a class="btn btn-light btn-lg" href="{{ route('docs.show', 'quick-start') }}">Start the quick guide</a><a class="btn btn-outline-light btn-lg" href="{{ route('support-development') }}">Support development</a></div></div></div></section>

    <section class="pb-5"><div class="container"><div class="mc-source-panel"><p class="mc-section-label">Research and source basis</p><p class="mb-2">Page reviewed 1 August 2026 against ModernCommerce 2.1.6 source and official open-source project guidance.</p><ul class="mb-0"><li><a href="https://www.gnu.org/licenses/gpl-3.0.html">GNU General Public License v3</a></li><li><a href="https://download.moodle.org/">Moodle's official open-source distribution model</a></li><li><a href="https://moodle.org/">Moodle community and contribution model</a></li><li><a href="{{ route('docs.show', 'architecture') }}">ModernCommerce audited architecture</a></li><li><a href="{{ route('docs.show', 'web-services-and-events') }}">ModernCommerce web services and events</a></li></ul></div></div></section>
  </main>
</x-marketing-layout>
