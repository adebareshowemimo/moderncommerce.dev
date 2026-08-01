<?php

use Illuminate\Support\Facades\Route;
use Spatie\LaravelMarkdown\MarkdownRenderer;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::get('/', function () {
    return view('home');
})->name('home');

$pages = [
    'open-source' => ['Open source', 'Commerce infrastructure you can own.', 'Run it where you choose, inspect the code, adapt workflows, and retain control under GPL-3.0-or-later.', 'open-source'],
    'developers' => ['Developers', 'Extend commerce with Moodle-native building blocks.', 'Start with installation, architecture, web services, events, webhooks, and the add-on integration contract.', 'developers'],
    'roadmap' => ['Roadmap', 'Build the roadmap with us.', 'See what is shipping, what comes next, and where community contributions can move the project forward.'],
    'support' => ['Support', 'Get the right kind of help.', 'Find documentation, report reproducible bugs, disclose security concerns privately, or plan implementation support.', 'support'],
    'support-development' => ['Support development', 'Help sustain the open-source project.', 'Fund maintenance, compatibility, documentation, testing, security work, and new open-source capabilities.', 'support-development'],
];

foreach ($pages as $slug => $page) {
    [$title, $heading, $summary] = $page;
    $view = $page[3] ?? 'page';
    Route::view("/{$slug}", $view, compact('title', 'heading', 'summary'))->name($slug);
}

Route::view('/product', 'product')->name('product');
Route::view('/features', 'features')->name('features');
Route::view('/compare', 'compare')->name('compare');

Route::redirect('/docs', '/docs/1.x/overview', 301)->name('docs');

Route::redirect('/docs/getting-started', '/docs/1.x/quick-start', 301)
    ->name('docs.getting-started');

Route::redirect('/docs/1.x', '/docs/1.x/overview', 301);

Route::get('/docs/1.x/{section}', function (string $section, MarkdownRenderer $markdown) {
    $sections = config('moderncommerce-docs.sections');
    abort_unless(array_key_exists($section, $sections), 404);

    $source = file_get_contents(base_path("content/docs/1.x/{$section}.md"));
    $source = str_replace(
        ['/{{route}}/{{version}}/modern-commerce/', '{{route}}', '{{version}}', '> {primary}', '> {success}', '> {warning}', '> {danger}'],
        ['/docs/1.x/', 'docs', '1.x', '>', '>', '>', '>'],
        $source,
    );

    $slugs = array_keys($sections);
    $position = array_search($section, $slugs, true);

    return view('docs.show', [
        'title' => $sections[$section],
        'content' => $markdown->toHtml($source),
        'sections' => $sections,
        'activeSection' => $section,
        'previousSection' => $position > 0 ? $slugs[$position - 1] : null,
        'nextSection' => $position < count($slugs) - 1 ? $slugs[$position + 1] : null,
    ]);
})->where('section', '[a-z0-9-]+')->name('docs.show');

Route::get('/sitemap.xml', function () use ($pages) {
    $sitemap = Sitemap::create()->add(Url::create(route('home'))->setPriority(1.0));

    $sitemap->add(Url::create(route('product'))->setPriority(0.9));
    $sitemap->add(Url::create(route('features'))->setPriority(0.9));
    $sitemap->add(Url::create(route('compare'))->setPriority(0.85));

    foreach (array_keys($pages) as $route) {
        $sitemap->add(Url::create(route($route))->setPriority(0.8));
    }

    foreach (array_keys(config('moderncommerce-docs.sections')) as $section) {
        $sitemap->add(Url::create(route('docs.show', $section))->setPriority(0.7));
    }

    return $sitemap->toResponse(request());
})->name('sitemap');
