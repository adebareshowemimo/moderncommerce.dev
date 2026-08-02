@props(['heading', 'copy'])

<section class="mc-support-development-callout" aria-labelledby="support-development-{{ crc32($heading) }}">
  <div class="container">
    <div class="mc-support-development-inner">
      <div>
        <h2 class="h3" id="support-development-{{ crc32($heading) }}">{{ $heading }}</h2>
        <p class="mb-0">{{ $copy }}</p>
      </div>
      <div class="mc-support-development-action">
        <a class="btn btn-light" href="{{ route('support-development') }}">Support development</a>
        <small>Voluntary support. The core stays GPL.</small>
      </div>
    </div>
  </div>
</section>
