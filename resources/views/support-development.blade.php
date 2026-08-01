@php($kofiUrl = config('app.kofi_url'))
<x-marketing-layout title="Support ModernCommerce development | Sustain the open-source project" description="Support ongoing ModernCommerce maintenance, Moodle compatibility, documentation, testing, security work, accessibility, and new open-source capabilities.">
  <main id="main-content">
    <section class="mc-page-hero mc-funding-hero">
      <div class="container">
        <div class="row gy-5 align-items-center">
          <div class="col-lg-7">
            <p class="mc-section-label">Support the open-source project</p>
            <h1 class="display-2">Keep ModernCommerce open, maintained, and moving forward.</h1>
            <p class="lead mt-4">Voluntary support helps fund compatibility work, maintenance, documentation, testing, security improvements, accessibility, release engineering, and new capabilities in the GPL-licensed project.</p>
            <div class="d-grid d-sm-flex gap-3 mt-4">
              @if ($kofiUrl)
                <a class="btn btn-primary btn-lg" href="{{ $kofiUrl }}" rel="external">Support on Ko-fi</a>
              @else
                <span class="btn btn-primary btn-lg disabled" aria-disabled="true">Ko-fi setup in progress</span>
              @endif
              <a class="btn btn-outline-primary btn-lg" href="https://github.com/adebareshowemimo/moodle-local_moderncommerce" rel="external">View the source</a>
            </div>
            @unless ($kofiUrl)
              <p class="mc-funding-status mt-3 mb-0"><span aria-hidden="true"></span>The funding page is ready. The Ko-fi action will activate when <code>KOFI_URL</code> is configured.</p>
            @endunless
          </div>
          <div class="col-lg-5">
            <aside class="mc-funding-promise" aria-label="Open-source funding promise">
              <span>Funding promise</span>
              <strong>The core stays GPL-3.0-or-later.</strong>
              <p>Financial support sustains development; it does not convert the open-source core into a per-site licence or platform revenue share.</p>
              <dl class="mb-0">
                <div><dt>Software licence</dt><dd>$0</dd></div>
                <div><dt>Required contribution</dt><dd>None</dd></div>
                <div><dt>Revenue share</dt><dd>None</dd></div>
                <div><dt>Support channel</dt><dd>Ko-fi</dd></div>
              </dl>
            </aside>
          </div>
        </div>
      </div>
    </section>

    <section class="mc-section pt-0">
      <div class="container">
        <div class="row gy-4">
          <div class="col-md-6 col-xl-4"><article class="mc-funding-use h-100"><span>01</span><h2>Compatibility and maintenance</h2><p>Keep pace with supported Moodle and PHP releases, resolve defects, maintain dependencies, and protect upgrade paths.</p></article></div>
          <div class="col-md-6 col-xl-4"><article class="mc-funding-use h-100"><span>02</span><h2>Testing and release engineering</h2><p>Expand automated coverage, verify installation and upgrades, package releases, and improve reproducible quality checks.</p></article></div>
          <div class="col-md-6 col-xl-4"><article class="mc-funding-use h-100"><span>03</span><h2>Documentation</h2><p>Maintain detailed administrator, operator, developer, architecture, security, and troubleshooting references.</p></article></div>
          <div class="col-md-6 col-xl-4"><article class="mc-funding-use h-100"><span>04</span><h2>Security and privacy</h2><p>Strengthen validation, capability boundaries, payment evidence, privacy workflows, dependency hygiene, and responsible disclosure.</p></article></div>
          <div class="col-md-6 col-xl-4"><article class="mc-funding-use h-100"><span>05</span><h2>Accessibility and usability</h2><p>Improve keyboard operation, responsive behaviour, accessible structure, operator workflows, and learner-facing experiences.</p></article></div>
          <div class="col-md-6 col-xl-4"><article class="mc-funding-use h-100"><span>06</span><h2>Open-source capabilities</h2><p>Develop broadly useful commerce features and extension points while keeping implementation evidence visible to the community.</p></article></div>
        </div>
      </div>
    </section>

    <section class="mc-section mc-funding-boundary">
      <div class="container">
        <div class="row gy-5 align-items-start">
          <div class="col-lg-5"><p class="mc-section-label">A clear boundary</p><h2 class="display-4">Support is appreciated, never required.</h2><p class="lead">ModernCommerce can be installed and used under the GPL without making a financial contribution.</p></div>
          <div class="col-lg-7"><div class="mc-funding-terms">
            <article><strong>No purchased support entitlement</strong><p>Voluntary funding does not purchase technical support, implementation, managed services, an SLA, or a guaranteed response time.</p></article>
            <article><strong>No roadmap priority or governance right</strong><p>Support does not guarantee a requested feature, delivery date, voting right, product endorsement, or control over project decisions.</p></article>
            <article><strong>No charitable representation</strong><p>Support is voluntary and is not a tax-deductible charitable contribution. Supporters should obtain their own accounting or tax advice where necessary.</p></article>
            <article><strong>No change to the software licence</strong><p>The ModernCommerce core remains available under GPL-3.0-or-later regardless of whether an individual or organization contributes financially.</p></article>
          </div></div>
        </div>
      </div>
    </section>

    <section class="mc-section">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-5"><p class="mc-section-label">Other ways to contribute</p><h2 class="display-4">Funding is only one form of project support.</h2><p class="text-secondary">Useful reports, documentation improvements, testing, adoption feedback, and well-scoped code contributions can be just as valuable.</p></div>
          <div class="col-lg-7"><div class="mc-contribution-list">
            <a href="https://github.com/adebareshowemimo/moodle-local_moderncommerce/issues" rel="external"><span>Report</span><strong>Submit a reproducible issue</strong><small>Include version, environment, steps, expected result, actual result, and safe diagnostic evidence.</small></a>
            <a href="{{ route('docs.show', 'feature-reference') }}"><span>Review</span><strong>Improve technical documentation</strong><small>Identify unclear workflows, missing operational detail, or documentation that no longer matches source behaviour.</small></a>
            <a href="https://github.com/adebareshowemimo/moodle-local_moderncommerce" rel="external"><span>Build</span><strong>Contribute code and tests</strong><small>Start from the repository, preserve Moodle conventions, and accompany behavioural changes with verification.</small></a>
            <a href="{{ route('support') }}"><span>Engage</span><strong>Fund scoped professional work</strong><small>Use the commercial route when you need deliverables, response commitments, customization, or managed operations.</small></a>
          </div></div>
        </div>
      </div>
    </section>

    <section class="pb-5">
      <div class="container"><div class="mc-final-cta text-center"><p class="mc-section-label">Support ModernCommerce</p><h2 class="display-3">Help sustain commerce infrastructure for open learning.</h2><p class="lead mx-auto">Contribute voluntarily through Ko-fi when the channel opens, or support the project today through testing, documentation, issue reports, and code.</p><div class="d-grid d-sm-flex justify-content-center gap-3 mt-4">
        @if ($kofiUrl)
          <a class="btn btn-light btn-lg" href="{{ $kofiUrl }}" rel="external">Support on Ko-fi</a>
        @else
          <span class="btn btn-light btn-lg disabled" aria-disabled="true">Ko-fi setup in progress</span>
        @endif
        <a class="btn btn-outline-light btn-lg" href="{{ route('support') }}">Need professional support?</a>
      </div></div></div>
    </section>
  </main>
</x-marketing-layout>
