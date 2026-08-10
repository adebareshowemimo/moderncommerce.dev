@props([
  'title' => 'ModernCommerce | Open-source Moodle ecommerce platform',
  'description' => 'Sell Moodle courses, bundles, subscriptions, and corporate training with an open-source storefront, checkout, payment, enrolment, and commerce platform.',
  'canonical' => null,
  'robots' => 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1',
  'schemaType' => null,
  'socialImage' => null,
  'ogType' => 'website',
  'extraSchema' => [],
])
@php
  $canonicalUrl = $canonical ?: url()->current();
  $resolvedSocialImage = $socialImage ?: asset('images/product/dashboard.png');
  $siteUrl = rtrim(url('/'), '/');
  $resolvedSchemaType = $schemaType ?: (request()->routeIs('docs.show') ? 'TechArticle' : 'WebPage');
  $schemaGraph = [
    [
      '@type' => 'Organization',
      '@id' => $siteUrl . '/#/schema/organization',
      'name' => 'Agunfon Interactivity LLC',
      'url' => 'https://agunfoninteractivity.com',
      'logo' => asset('images/brand/agunfon-logo.svg'),
      'email' => 'support@agunfoninteractivity.com',
      'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => '8735 Dunwoody Place #11785',
        'addressLocality' => 'Atlanta',
        'addressRegion' => 'GA',
        'postalCode' => '30350',
        'addressCountry' => 'US',
      ],
    ],
    [
      '@type' => 'WebSite',
      '@id' => $siteUrl . '/#/schema/website',
      'url' => $siteUrl,
      'name' => 'ModernCommerce',
      'description' => 'Open-source ecommerce and course-selling platform for Moodle.',
      'publisher' => ['@id' => $siteUrl . '/#/schema/organization'],
      'inLanguage' => 'en',
    ],
    [
      '@type' => $resolvedSchemaType,
      '@id' => $canonicalUrl . '#/schema/page',
      'url' => $canonicalUrl,
      'name' => $title,
      'headline' => $title,
      'description' => $description,
      'isPartOf' => ['@id' => $siteUrl . '/#/schema/website'],
      'about' => ['@id' => $siteUrl . '/#/schema/software'],
      'publisher' => ['@id' => $siteUrl . '/#/schema/organization'],
      'inLanguage' => 'en',
      'dateModified' => '2026-08-02',
    ],
  ];
  if ($resolvedSchemaType === 'TechArticle') {
    $schemaGraph[2]['author'] = ['@id' => $siteUrl . '/#/schema/organization'];
    $schemaGraph[2]['proficiencyLevel'] = 'Beginner to advanced';
    $schemaGraph[2]['dependencies'] = 'ModernCommerce 2.1.8, Moodle 5.2, PHP 8.3 or later';
  }
  $schemaGraph[] = [
      '@type' => 'SoftwareApplication',
      '@id' => $siteUrl . '/#/schema/software',
      'name' => 'ModernCommerce',
      'alternateName' => 'Modern Commerce for Moodle',
      'url' => $siteUrl,
      'description' => 'Free, open-source Moodle ecommerce software for storefronts, checkout, payments, automatic course enrolment, subscriptions, corporate sales, invoicing, refunds, and reporting.',
      'applicationCategory' => 'BusinessApplication',
      'applicationSubCategory' => 'Moodle ecommerce and course commerce',
      'operatingSystem' => 'Moodle 5.2 with PHP 8.3 or later',
      'softwareVersion' => config('moderncommerce-docs.version'),
      'license' => 'https://www.gnu.org/licenses/gpl-3.0.html',
      'isAccessibleForFree' => true,
      'offers' => [
        '@type' => 'Offer',
        'price' => '0',
        'priceCurrency' => 'USD',
        'availability' => 'https://schema.org/InStock',
        'url' => 'https://github.com/adebareshowemimo/moodle-local_moderncommerce',
      ],
      'featureList' => [
        'Moodle-native product catalogue and storefront',
        'Cart, checkout, payments, and automatic course enrolment',
        'Bundles, programs, subscriptions, coupons, and corporate seats',
        'Orders, invoices, refunds, notifications, and commerce reporting',
        'GPL-3.0-or-later source code with no platform revenue share',
      ],
      'author' => ['@id' => $siteUrl . '/#/schema/organization'],
  ];
  if (request()->routeIs('docs.show')) {
    $schemaGraph[] = [
      '@type' => 'BreadcrumbList',
      '@id' => $canonicalUrl . '#/schema/breadcrumbs',
      'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Documentation', 'item' => route('docs.show', 'overview')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $title, 'item' => $canonicalUrl],
      ],
    ];
  }
  foreach ($extraSchema as $schemaItem) {
    $schemaGraph[] = $schemaItem;
  }
@endphp
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $description }}">
  <meta name="robots" content="{{ $robots }}">
  <title>{{ $title }}</title>
  <link rel="canonical" href="{{ $canonicalUrl }}">
  <link rel="alternate" hreflang="en" href="{{ $canonicalUrl }}">
  <meta property="og:site_name" content="ModernCommerce">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="{{ $ogType }}">
  <meta property="og:title" content="{{ $title }}">
  <meta property="og:description" content="{{ $description }}">
  <meta property="og:url" content="{{ $canonicalUrl }}">
  <meta property="og:image" content="{{ $resolvedSocialImage }}">
  <meta property="og:image:alt" content="ModernCommerce Moodle ecommerce administration dashboard">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $title }}">
  <meta name="twitter:description" content="{{ $description }}">
  <meta name="twitter:image" content="{{ $resolvedSocialImage }}">
  <meta name="twitter:image:alt" content="ModernCommerce Moodle ecommerce administration dashboard">
  <script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@graph' => $schemaGraph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <link rel="icon" type="image/png" href="{{ asset('images/brand/moderncommerce-logo-dark.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@500;600;700;800&amp;display=swap" rel="stylesheet">
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8451632020194477"
          crossorigin="anonymous"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-8HB4ZM4FQ1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-8HB4ZM4FQ1');
  </script>
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
          <ul class="navbar-nav mx-lg-auto gap-lg-1"><li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('product')]) href="{{ route('product') }}" @if(request()->routeIs('product')) aria-current="page" @endif>Product</a></li><li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('features')]) href="{{ route('features') }}" @if(request()->routeIs('features')) aria-current="page" @endif>Features</a></li><li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('compare')]) href="{{ route('compare') }}" @if(request()->routeIs('compare')) aria-current="page" @endif>Compare</a></li><li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('open-source')]) href="{{ route('open-source') }}" @if(request()->routeIs('open-source')) aria-current="page" @endif>Open source</a></li><li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('developers')]) href="{{ route('developers') }}" @if(request()->routeIs('developers')) aria-current="page" @endif>Developers</a></li><li class="nav-item dropdown"><button @class(['nav-link dropdown-toggle border-0 bg-transparent', 'active' => request()->routeIs('docs*') || request()->routeIs('tutorials.*')]) type="button" data-bs-toggle="dropdown" aria-expanded="false">Learn</button><ul class="dropdown-menu"><li><a class="dropdown-item" href="{{ route('docs') }}">Documentation</a></li><li><a class="dropdown-item" href="{{ route('tutorials.index') }}">Video tutorials</a></li></ul></li><li class="nav-item"><a class="nav-link" href="https://github.com/adebareshowemimo/moodle-local_moderncommerce" rel="external">GitHub</a></li></ul>
          <div class="d-grid d-lg-flex gap-2 mt-4 mt-lg-0"><a @class(['btn', 'btn-outline-primary', 'mc-support-project-action', 'active' => request()->routeIs('support-development')]) href="{{ route('support-development') }}" @if(request()->routeIs('support-development')) aria-current="page" @endif>Support development</a><a class="btn btn-primary" href="{{ config('app.demo_url') }}">Explore the demo</a></div>
        </div>
      </div>
    </div>
  </nav>
  {{ $slot }}
  <footer class="mc-footer py-5">
    <div class="container">
      <div class="row gy-5 gx-lg-5 align-items-start">
        <div class="col-lg-5">
          <div class="mc-footer-product d-flex align-items-center gap-3">
            <img class="mc-moderncommerce-logo mc-moderncommerce-logo-white" src="{{ asset('images/brand/moderncommerce-logo-white.png') }}" alt="" width="54" height="37">
            <strong class="mc-footer-product-name">Modern<span>Commerce</span></strong>
          </div>
          <p class="mb-0 mt-3">Every feature required to sell, fulfil, and operate a modern ecommerce business for training, eLearning courses, and digital products.</p>
          <div class="mc-footer-maintainer d-flex align-items-center gap-3 mt-4"><span>Maintained by</span><img class="mc-agunfon-footer-logo" src="{{ asset('images/brand/agunfon-logo-white.svg') }}" alt="Agunfon Interactivity LLC, USA"></div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <nav aria-labelledby="footer-product-heading">
            <h2 class="mc-footer-heading" id="footer-product-heading">Product</h2>
            <ul class="mc-footer-links list-unstyled mb-0">
              <li><a href="{{ route('product') }}">Moodle ecommerce platform</a></li>
              <li><a href="{{ route('features') }}">Ecommerce features</a></li>
              <li><a href="{{ route('compare') }}">Compare alternatives</a></li>
              <li><a href="{{ config('app.demo_url') }}">Live demo</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-sm-6 col-lg-4">
          <nav aria-labelledby="footer-resources-heading">
            <h2 class="mc-footer-heading" id="footer-resources-heading">Project &amp; resources</h2>
            <ul class="mc-footer-links list-unstyled mb-0">
              <li><a href="{{ route('docs') }}">Documentation</a></li>
              <li><a href="{{ route('tutorials.index') }}">Video tutorials</a></li>
              <li><a href="{{ route('open-source') }}">Open source</a></li>
              <li><a href="{{ route('roadmap') }}">Roadmap</a></li>
              <li><a href="{{ route('support') }}">Support</a></li>
              <li><a href="{{ route('support-development') }}">Support development</a></li>
              <li><a href="{{ route('terms-of-sale') }}">Terms of sale</a></li>
            </ul>
          </nav>
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
