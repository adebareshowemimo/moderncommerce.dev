<x-marketing-layout :title="$title . ' | Modern Commerce'" :description="$summary">
  <main id="main-content">
    <section class="mc-page-hero"><div class="container"><div class="row"><div class="col-lg-8">
      <p class="mc-section-label">Modern Commerce</p><h1 class="display-3">{{ $heading }}</h1><p class="lead mt-4">{{ $summary }}</p>
      <div class="d-flex flex-wrap gap-3 mt-4"><a class="btn btn-primary btn-lg" href="{{ config('app.demo_url') }}">Explore the demo</a><a class="btn btn-outline-primary btn-lg" href="{{ route('docs') }}">Read the docs</a></div>
    </div></div></div></section>
    <section class="mc-section pt-0"><div class="container"><div class="mc-coming-soon"><span>Page foundation ready</span><h2>Content is mapped and ready to publish.</h2><p>This route shares the production navigation, footer, metadata, Bootstrap build, and responsive design system. Its full copy is available in <code>docs/CONTENT-STRATEGY.md</code>.</p></div></div></section>
  </main>
</x-marketing-layout>
