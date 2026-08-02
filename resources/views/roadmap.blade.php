<x-marketing-layout title="ModernCommerce Roadmap | Open-Source Moodle Ecommerce" description="Follow ModernCommerce Moodle ecommerce releases, current priorities, planned capabilities, contribution opportunities, and the rules guiding the open-source roadmap.">
  <main id="main-content">
    <section class="mc-page-hero">
      <div class="container">
        <div class="row gy-5 align-items-end">
          <div class="col-lg-8">
            <p class="mc-section-label">Open-source roadmap</p>
            <h1 class="display-2">Build the roadmap with us.</h1>
            <p class="lead mt-4">ModernCommerce evolves through source-backed product needs, Moodle compatibility work, reproducible issues, and community contribution. The roadmap describes direction, not a paid entitlement or guaranteed delivery schedule.</p>
          </div>
          <div class="col-lg-4"><div class="mc-roadmap-release"><span>Current release</span><strong>ModernCommerce {{ config('moderncommerce-docs.version') }}</strong><small>Moodle 5.2 · PHP 8.3+ · GPL-3.0-or-later</small></div></div>
        </div>
      </div>
    </section>

    <section class="mc-section"><div class="container">
      <div class="row justify-content-between gy-4 mb-5"><div class="col-lg-7"><p class="mc-section-label">How priorities are set</p><h2 class="display-4">Evidence before promises.</h2></div><div class="col-lg-4"><p class="text-secondary mb-0">A roadmap item becomes credible when the user problem, Moodle boundary, operational impact, security implications, and maintainable implementation are understood.</p></div></div>
      <div class="row g-4">
        <div class="col-md-6 col-xl-3"><article class="mc-roadmap-principle h-100"><span>01</span><h3>Compatibility</h3><p>Keep supported Moodle, PHP, payment gateway, privacy, cron, and browser behavior dependable across releases.</p></article></div>
        <div class="col-md-6 col-xl-3"><article class="mc-roadmap-principle h-100"><span>02</span><h3>Operational depth</h3><p>Improve the workflows staff use to investigate payments, fulfil access, serve customers, and reconcile commerce records.</p></article></div>
        <div class="col-md-6 col-xl-3"><article class="mc-roadmap-principle h-100"><span>03</span><h3>Extension quality</h3><p>Strengthen documented events, services, add-on contracts, test coverage, and stable boundaries for Moodle developers.</p></article></div>
        <div class="col-md-6 col-xl-3"><article class="mc-roadmap-principle h-100"><span>04</span><h3>Open-source value</h3><p>Prioritize capabilities that make Moodle a stronger place to sell learning without imposing a closed platform dependency.</p></article></div>
      </div>
    </div></section>

    <section class="mc-section mc-roadmap-track"><div class="container"><div class="row gy-5">
      <div class="col-lg-4"><p class="mc-section-label">Active direction</p><h2 class="display-4">What the project is working to improve.</h2><p class="text-secondary">Sequence changes as source review, testing, contributor capacity, and release readiness allow.</p></div>
      <div class="col-lg-7 offset-lg-1"><div class="mc-roadmap-list">
        <article><span>Maintain</span><div><h3>Release quality and Moodle compatibility</h3><p>Regression coverage, upgrade safety, documentation accuracy, dependency hygiene, accessibility, performance, and supported-environment verification.</p></div></article>
        <article><span>Operate</span><div><h3>Payment and fulfilment resilience</h3><p>Clearer webhook evidence, reconciliation, failure recovery, order-state visibility, subscription operations, and administrator diagnostics.</p></div></article>
        <article><span>Extend</span><div><h3>Add-ons and integration contracts</h3><p>Stable patterns for optional gateways, tax services, communications, reporting, fulfilment, and organization-specific workflows.</p></div></article>
        <article><span>Explain</span><div><h3>Documentation and implementation guidance</h3><p>More task-led examples, production checklists, architecture explanations, troubleshooting paths, and contributor onboarding.</p></div></article>
      </div></div>
    </div></div></section>

    <section class="mc-section"><div class="container"><div class="row gy-5 align-items-start">
      <div class="col-lg-6"><p class="mc-section-label">Influence the roadmap</p><h2 class="display-4">Bring evidence that maintainers can act on.</h2><p class="lead">Describe the Moodle context, user outcome, current behavior, reproduction steps, affected version, operational impact, and a safe definition of done.</p><div class="d-flex flex-wrap gap-3 mt-4"><a class="btn btn-primary" href="https://github.com/adebareshowemimo/moodle-local_moderncommerce/issues" rel="external">Review GitHub issues</a><a class="btn btn-outline-primary" href="{{ route('developers') }}">Developer guidance</a></div></div>
      <div class="col-lg-5 offset-lg-1"><div class="mc-roadmap-boundary"><strong>A roadmap is not a contract</strong><p>Items may change when source constraints, Moodle APIs, security findings, compatibility requirements, contributor availability, or stronger evidence changes the right solution.</p><a href="{{ route('support-development') }}">Learn how to support development</a></div></div>
    </div></div></section>
    <x-support-development-callout heading="Help turn priorities into maintained releases." copy="Funding expands the time available for compatibility, payment resilience, documentation, and careful delivery—not promises or private control of the roadmap." />
  </main>
</x-marketing-layout>
