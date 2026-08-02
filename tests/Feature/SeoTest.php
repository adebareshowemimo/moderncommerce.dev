<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_primary_pages_have_complete_search_and_social_metadata(): void
    {
        $routes = [
            '/', '/product', '/features', '/compare', '/open-source', '/developers',
            '/roadmap', '/support', '/support-development', '/terms-of-sale',
        ];

        foreach ($routes as $route) {
            $content = $this->get($route)->assertOk()->getContent();

            $this->assertSame(1, substr_count($content, '<title>'), "{$route} must have one title.");
            $this->assertMatchesRegularExpression('/<meta name="description" content="[^\"]+">/', $content);
            $this->assertMatchesRegularExpression('/<link rel="canonical" href="[^\"]+">/', $content);
            $this->assertStringContainsString('max-image-preview:large', $content);
            $this->assertStringContainsString('property="og:title"', $content);
            $this->assertStringContainsString('name="twitter:card"', $content);
            $this->assertStringContainsString('"@type":"SoftwareApplication"', $content);
        }
    }

    public function test_documentation_has_unique_descriptions_and_article_schema(): void
    {
        $descriptions = config('moderncommerce-docs.descriptions');

        $this->assertSame(array_keys(config('moderncommerce-docs.sections')), array_keys($descriptions));
        $this->assertCount(count($descriptions), array_unique($descriptions));

        foreach (array_keys(config('moderncommerce-docs.sections')) as $section) {
            $content = $this->get("/docs/1.x/{$section}")->assertOk()->getContent();

            $this->assertStringContainsString(e($descriptions[$section]), $content);
            $this->assertStringContainsString('"@type":"TechArticle"', $content);
            $this->assertStringContainsString('"@type":"BreadcrumbList"', $content);
        }
    }

    public function test_json_ld_is_valid_json(): void
    {
        $content = $this->get('/docs/1.x/overview')->assertOk()->getContent();
        preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $content, $matches);

        $this->assertNotEmpty($matches[1]);
        foreach ($matches[1] as $json) {
            $this->assertIsArray(json_decode($json, true, flags: JSON_THROW_ON_ERROR));
        }
    }

    public function test_sitemap_robots_and_ai_summary_are_available(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee('<lastmod>', false)
            ->assertSee('/docs/1.x/overview', false);

        $this->assertStringContainsString('Sitemap: https://moderncommerce.dev/sitemap.xml', file_get_contents(public_path('robots.txt')));
        $this->assertStringContainsString('ModernCommerce is a free, open-source ecommerce plugin for selling courses', file_get_contents(public_path('llms.txt')));
    }
}
