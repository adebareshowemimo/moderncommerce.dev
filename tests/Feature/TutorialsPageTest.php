<?php

namespace Tests\Feature;

use Tests\TestCase;

class TutorialsPageTest extends TestCase
{
    public function test_tutorial_library_lists_the_published_advanced_pricing_tutorial(): void
    {
        $this->get('/tutorials')
            ->assertOk()
            ->assertSee('Video tutorials built around real tasks.')
            ->assertSee('How to Add Advanced Pricing to a Product in ModernCommerce');

        $this->get('/tutorials/add-advanced-pricing-to-a-product')->assertOk();
    }

    public function test_navigation_and_sitemap_include_the_tutorial_library(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Learn')
            ->assertSee('Video tutorials');

        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee('/tutorials', false)
            ->assertSee('/tutorials/add-advanced-pricing-to-a-product', false);
    }

    public function test_published_tutorial_has_video_article_metadata(): void
    {
        $path = base_path('content/tutorials/tutorials.json');
        $original = file_get_contents($path);
        $tutorials = json_decode($original, true, flags: JSON_THROW_ON_ERROR);
        $videoId = $tutorials[0]['youtube_id'];
        $tutorials[0]['published'] = true;
        $tutorials[0]['published_at'] = '2026-08-10';
        file_put_contents($path, json_encode($tutorials, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).PHP_EOL);

        try {
            $content = $this->get('/tutorials/add-advanced-pricing-to-a-product')->assertOk()->getContent();
            $this->assertStringContainsString("youtube-nocookie.com/embed/{$videoId}", $content);
            $this->assertStringContainsString('"@type":"VideoObject"', $content);
            $this->assertStringContainsString('"@type":"TechArticle"', $content);
        } finally {
            file_put_contents($path, $original);
        }
    }
}
