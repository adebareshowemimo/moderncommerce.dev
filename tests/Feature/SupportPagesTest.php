<?php

namespace Tests\Feature;

use Tests\TestCase;

class SupportPagesTest extends TestCase
{
    public function test_support_page_routes_each_request_to_the_right_channel(): void
    {
        $this->get('/support')
            ->assertOk()
            ->assertSee('Get the right help without guessing where to go.')
            ->assertSee('Self-service documentation')
            ->assertSee('Report a reproducible defect')
            ->assertSee('Report security concerns privately')
            ->assertSee('Implementation and managed services')
            ->assertSee('/support-development', false)
            ->assertSee('support@agunfoninteractivity.com');
    }

    public function test_development_support_page_explains_the_funding_boundary(): void
    {
        config()->set('app.kofi_url', null);

        $this->get('/support-development')
            ->assertOk()
            ->assertSee('Keep ModernCommerce open, maintained, and moving forward.')
            ->assertSee('Ko-fi setup in progress')
            ->assertSee('not a tax-deductible charitable contribution')
            ->assertSee('does not purchase technical support')
            ->assertSee('GPL-3.0-or-later')
            ->assertSee('/support', false);
    }

    public function test_configured_kofi_url_becomes_the_funding_action(): void
    {
        config()->set('app.kofi_url', 'https://ko-fi.com/moderncommerce');

        $this->get('/support-development')
            ->assertOk()
            ->assertSee('https://ko-fi.com/moderncommerce', false)
            ->assertSee('Support on Ko-fi')
            ->assertDontSee('Ko-fi setup in progress');
    }

    public function test_sitemap_contains_both_support_routes(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee('/support')
            ->assertSee('/support-development');
    }
}
