@props(['title' => 'ModernCommerce', 'description' => 'The best open-source plugin for selling courses through Moodle.'])
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $description }}">
  <title>{{ $title }}</title>
  <link rel="icon" type="image/png" href="{{ asset('images/brand/moderncommerce-logo-dark.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@500;600;700;800&amp;display=swap" rel="stylesheet">
  @vite('resources/js/app.js')
</head>
<body>
  <a class="visually-hidden-focusable skip-link" href="#main-content">Skip to main content</a>
  <nav class="navbar navbar-expand-lg fixed-top mc-navbar" aria-label="Primary navigation">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}" aria-label="Modern Commerce home"><img class="mc-moderncommerce-logo mc-moderncommerce-logo-dark" src="{{ asset('images/brand/moderncommerce-logo-dark.png') }}" alt="" width="44" height="30"><span>Modern<span class="fw-normal">Commerce</span><small>by Agunfon Interactivity LLC, USA</small></span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#siteNav" aria-controls="siteNav" aria-label="Open navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="siteNav" aria-labelledby="siteNavLabel">
        <div class="offcanvas-header"><h2 class="offcanvas-title h5" id="siteNavLabel">Modern Commerce</h2><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close navigation"></button></div>
        <div class="offcanvas-body align-items-lg-center">
          <ul class="navbar-nav mx-lg-auto gap-lg-1"><li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Product</a></li><li class="nav-item"><a class="nav-link" href="{{ route('features') }}">Features</a></li><li class="nav-item"><a class="nav-link" href="{{ route('compare') }}">Compare</a></li><li class="nav-item"><a class="nav-link" href="{{ route('open-source') }}">Open source</a></li><li class="nav-item"><a class="nav-link" href="{{ route('developers') }}">Developers</a></li><li class="nav-item"><a class="nav-link" href="{{ route('docs') }}">Docs</a></li></ul>
          <div class="d-grid d-lg-flex gap-2 mt-4 mt-lg-0"><a class="btn btn-link text-decoration-none" href="{{ route('open-source') }}">Source &amp; licence</a><a class="btn btn-primary" href="{{ config('app.demo_url') }}">Explore the demo</a></div>
        </div>
      </div>
    </div>
  </nav>
  {{ $slot }}
  <footer class="mc-footer py-5">
    <div class="container">
      <div class="row gy-4 align-items-center">
        <div class="col-lg-5">
          <div class="mc-footer-product d-flex align-items-center gap-3">
            <img class="mc-moderncommerce-logo mc-moderncommerce-logo-white" src="{{ asset('images/brand/moderncommerce-logo-white.png') }}" alt="" width="54" height="37">
            <strong class="mc-footer-product-name">Modern<span>Commerce</span></strong>
          </div>
          <p class="mb-0 mt-3">Every feature required to sell, fulfil, and operate a modern ecommerce business for training, eLearning courses, and digital products.</p>
          <div class="mc-footer-maintainer d-flex align-items-center gap-3 mt-4"><span>Maintained by</span><img class="mc-agunfon-footer-logo" src="{{ asset('images/brand/agunfon-logo-white.svg') }}" alt="Agunfon Interactivity LLC, USA"></div>
        </div>
        <div class="col-lg-7">
          <nav class="d-flex flex-wrap gap-3 gap-md-4 justify-content-lg-end" aria-label="Footer navigation"><a href="{{ route('product') }}">Product</a><a href="{{ route('features') }}">Features</a><a href="{{ route('compare') }}">Compare</a><a href="{{ route('docs') }}">Documentation</a><a href="{{ route('open-source') }}">Open source</a><a href="{{ route('roadmap') }}">Roadmap</a><a href="{{ route('support') }}">Support</a><a href="{{ route('support-development') }}">Support development</a></nav>
        </div>
      </div>
      <div class="mt-5 pt-4 border-top border-secondary">
        <p class="small mb-2">Moodle™ is a trademark or registered trademark of Moodle Pty Ltd or its associated entities. ModernCommerce is an independent plugin developed by Agunfon Interactivity LLC, USA and is not affiliated with, endorsed, sponsored, or certified by Moodle Pty Ltd or Moodle HQ. References to Moodle describe software compatibility only.</p>
        <p class="small mb-0"><a class="text-decoration-underline" href="https://moodle.com/trademarks/" rel="external">Review the official Moodle trademark guidelines</a>.</p>
      </div>
    </div>
  </footer>
</body>
</html>
