<x-marketing-layout :title="$title . ' | ModernCommerce docs'" :description="$description" schema-type="TechArticle">
  <main id="main-content">
    <header class="mc-doc-header border-bottom">
      <div class="container py-4 py-lg-5">
        <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-3">
          <div>
            <p class="mc-eyebrow mb-2">Official documentation</p>
            <p class="h2 mb-2">ModernCommerce documentation</p>
            <p class="text-secondary mb-0">Install, configure, operate, and extend the Moodle-native commerce platform.</p>
          </div>
          <span class="mc-version-badge align-self-start align-self-lg-auto">Version {{ config('moderncommerce-docs.version') }}</span>
        </div>
      </div>
    </header>

    <section class="mc-doc-shell py-4 py-lg-5">
      <div class="container">
        <div class="d-lg-none mb-4">
          <button class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#docsNavigation" aria-expanded="false" aria-controls="docsNavigation">
            <span><small class="d-block text-start opacity-75">Documentation menu</small>{{ $sections[$activeSection] }}</span><span aria-hidden="true">＋</span>
          </button>
        </div>
        <div class="row g-4 g-lg-5">
          <aside class="col-lg-4 col-xl-3">
            @php
              $documentationGroups = [
                'Get started' => ['overview', 'feature-reference', 'architecture', 'requirements', 'installation', 'upgrading', 'quick-start', 'roles-and-permissions'],
                'Build the catalogue' => ['products-and-pricing', 'course-merchandising', 'bundles-and-programs', 'catalog-organization', 'storefront', 'branding-and-navigation'],
                'Sell and fulfil' => ['cart-and-checkout', 'payments', 'webhooks-and-payment-operations', 'order-lifecycle', 'orders-invoices-refunds', 'coupons-and-keys', 'subscriptions', 'corporate-sales'],
                'Serve customers' => ['learner-account', 'customers-reviews-wishlists', 'contacts-and-newsletter', 'notifications', 'email-templates-and-placeholders'],
                'Operate the platform' => ['reports-and-analytics', 'admin-settings', 'scheduled-tasks', 'privacy-and-security', 'troubleshooting'],
                'Developer reference' => ['admin-page-reference', 'database-reference', 'web-services-and-events', 'storefront-widget-reference', 'cli-and-maintenance', 'localization', 'addons-and-extension', 'certificate-integration', 'faq'],
                'Maintain and release' => ['release-packaging', 'moodle-plugin-directory'],
              ];
              $activeDocumentationGroup = collect($documentationGroups)
                ->first(fn ($slugs) => in_array($activeSection, $slugs, true));
            @endphp
            <nav class="mc-doc-nav collapse d-lg-flex" id="docsNavigation" aria-label="Documentation sections">
              <div class="mc-doc-nav-brand">
                <span>Documentation</span>
                <strong>ModernCommerce {{ config('moderncommerce-docs.version') }}</strong>
              </div>
              @foreach ($documentationGroups as $group => $slugs)
                <details class="mc-doc-nav-group" @if ($activeDocumentationGroup === $slugs) open @endif>
                  <summary>{{ $group }}</summary>
                  <div>
                    @foreach ($slugs as $slug)
                      <a @class(['active' => $activeSection === $slug]) href="{{ route('docs.show', $slug) }}" @if ($activeSection === $slug) aria-current="page" @endif>{{ $sections[$slug] }}</a>
                    @endforeach
                  </div>
                </details>
              @endforeach
              <div class="mc-doc-nav-meta">
                <a href="{{ route('developers') }}">Developer resources</a>
                <a href="{{ route('open-source') }}">Open-source project</a>
                <a href="{{ route('support') }}">Get support</a>
              </div>
            </nav>
          </aside>

          <article class="col-lg-8 col-xl-8 offset-xl-1 mc-doc-content">
            {!! $content !!}
            <nav class="mc-doc-pager mt-5 pt-4 border-top" aria-label="Documentation pagination">
              <div>
                @if ($previousSection)
                  <span>Previous</span>
                  <a href="{{ route('docs.show', $previousSection) }}">← {{ $sections[$previousSection] }}</a>
                @endif
              </div>
              <div class="text-end">
                @if ($nextSection)
                  <span>Next</span>
                  <a href="{{ route('docs.show', $nextSection) }}">{{ $sections[$nextSection] }} →</a>
                @endif
              </div>
            </nav>
          </article>
        </div>
      </div>
    </section>
    <x-support-development-callout heading="Keep the documentation aligned with every release." copy="Support the source review, examples, compatibility checks, and editing required to keep implementation guidance accurate as Moodle evolves." />
  </main>
</x-marketing-layout>
