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
            ->assertSee('How to Create a Course Bundle in ModernCommerce')
            ->assertSee('How to Set Up Categories in Modern Commerce')
            ->assertSee('How to Add Advanced Pricing to a Product in ModernCommerce');

        $this->assertFileExists(public_path('images/tutorials/create-a-course-bundle-in-moderncommerce-v2.png'));
        $this->assertFileExists(public_path('images/tutorials/add-advanced-pricing-to-a-product.jpg'));
        $this->assertFileExists(public_path('images/tutorials/set-up-categories-in-modern-commerce-v2.png'));
        $this->assertFileExists(public_path('images/tutorials/set-up-advanced-bundle-features-in-moderncommerce-v2.png'));

        $tutorials = json_decode(
            file_get_contents(base_path('content/tutorials/tutorials.json')),
            true,
            flags: JSON_THROW_ON_ERROR,
        );
        foreach (array_filter($tutorials, fn (array $tutorial): bool => $tutorial['published']) as $tutorial) {
            $thumbnailPath = public_path(ltrim($tutorial['thumbnail'], '/'));
            $this->assertFileExists($thumbnailPath, "Missing thumbnail for {$tutorial['slug']}");
            $dimensions = getimagesize($thumbnailPath);
            $this->assertSame(1280, $dimensions[0], "Thumbnail width is invalid for {$tutorial['slug']}");
            $this->assertSame(720, $dimensions[1], "Thumbnail height is invalid for {$tutorial['slug']}");
        }
        $this->get('/tutorials/create-a-course-bundle-in-moderncommerce')
            ->assertOk()
            ->assertSee('SMxQxR0VSVA');
        $this->get('/tutorials/add-advanced-pricing-to-a-product')->assertOk();
        $this->get('/tutorials/set-up-categories-in-modern-commerce')
            ->assertOk()
            ->assertSee('aznQ5cHhYDE');
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
            ->assertSee('/tutorials/create-a-course-bundle-in-moderncommerce', false)
            ->assertSee('/tutorials/set-up-categories-in-modern-commerce', false)
            ->assertSee('/tutorials/add-advanced-pricing-to-a-product', false);
    }

    public function test_published_tutorial_has_video_article_metadata(): void
    {
        $path = base_path('content/tutorials/tutorials.json');
        $original = file_get_contents($path);
        $tutorials = json_decode($original, true, flags: JSON_THROW_ON_ERROR);
        $tutorialIndex = array_search(
            'add-advanced-pricing-to-a-product',
            array_column($tutorials, 'slug'),
            true,
        );
        $this->assertNotFalse($tutorialIndex);
        $videoId = $tutorials[$tutorialIndex]['youtube_id'];
        $tutorials[$tutorialIndex]['published'] = true;
        $tutorials[$tutorialIndex]['published_at'] = '2026-08-10';
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
