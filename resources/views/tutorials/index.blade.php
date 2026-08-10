<x-marketing-layout title="ModernCommerce Video Tutorials for Moodle" description="Watch practical ModernCommerce tutorials for creating products, configuring pricing, operating checkout, managing orders, and selling Moodle courses.">
  <main id="main-content">
    <section class="mc-page-hero mc-tutorial-hero"><div class="container"><div class="row align-items-end gy-4"><div class="col-lg-8"><p class="mc-section-label">Learn ModernCommerce</p><h1 class="display-3">Video tutorials built around real tasks.</h1><p class="lead mb-0">Follow concise, field-by-field demonstrations recorded in the deployed ModernCommerce interface.</p></div><div class="col-lg-4"><div class="mc-tutorial-count"><strong>{{ count($tutorials) }}</strong><span>{{ count($tutorials) === 1 ? 'published tutorial' : 'published tutorials' }}</span></div></div></div></div></section>
    <section class="mc-section"><div class="container">
      @if(count($tutorials))
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
          @foreach($tutorials as $tutorial)
            <div class="col"><article class="mc-tutorial-card h-100"><a href="{{ route('tutorials.show', $tutorial['slug']) }}" class="mc-tutorial-card-image"><img src="{{ asset(ltrim($tutorial['thumbnail'], '/')) }}" alt="{{ $tutorial['title'] }}" class="img-fluid"><span>{{ $tutorial['duration_label'] }}</span></a><div class="p-4 d-flex flex-column flex-grow-1"><div class="d-flex flex-wrap gap-2 mb-3"><span class="badge text-bg-light">{{ $tutorial['topic'] }}</span><span class="badge text-bg-light">Version {{ $tutorial['product_version'] }}</span></div><h2 class="h4"><a href="{{ route('tutorials.show', $tutorial['slug']) }}">{{ $tutorial['title'] }}</a></h2><p>{{ $tutorial['description'] }}</p><a class="mt-auto fw-bold" href="{{ route('tutorials.show', $tutorial['slug']) }}">Watch and read the tutorial →</a></div></article></div>
          @endforeach
        </div>
      @else
        <div class="mc-tutorial-empty"><p class="mc-section-label">Coming next</p><h2>Approved tutorials will appear here.</h2><p class="lead mb-0">Each release includes the complete video, chapters, written steps, related documentation, and product-version context.</p></div>
      @endif
    </div></section>
  </main>
</x-marketing-layout>
