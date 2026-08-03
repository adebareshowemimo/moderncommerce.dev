<?php

namespace Tests\Feature;

use Tests\TestCase;

class SupportPagesTest extends TestCase
{
    public function test_support_page_leads_with_professional_services_and_contact_options(): void
    {
        $this->get('/support')
            ->assertOk()
            ->assertSee('Bring ModernCommerce into production with expert support.')
            ->assertSee('Start a project')
            ->assertSee('Implementation and launch')
            ->assertSee('Migration and data transition')
            ->assertSee('Payment gateways and integrations')
            ->assertSee('Storefront and theme customization')
            ->assertSee('Custom features and development')
            ->assertSee('Upgrades and troubleshooting')
            ->assertSee('Training and operational guidance')
            ->assertSee('Ongoing and managed support')
            ->assertSee('Looking for community help instead?')
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
            ->assertSee('Explore professional services')
            ->assertSee('/support#commercial-support', false)
            ->assertSee('/support', false);
    }

    public function test_development_support_is_promoted_in_the_global_navigation_and_open_source_hero(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('mc-support-project-action', false)
            ->assertSee('Support development');

        $this->get('/open-source')
            ->assertOk()
            ->assertSee('<a class="btn btn-outline-primary btn-lg" href="'.route('support-development').'">Support development</a>', false);
    }

    public function test_contextual_development_support_messages_appear_across_the_site(): void
    {
        $messages = [
            '/' => 'Keep open-source Moodle commerce moving.',
            '/product' => 'Fund the infrastructure behind every transaction.',
            '/features' => 'Help maintain the features your Moodle store depends on.',
            '/compare' => 'Back an open alternative with no platform tax.',
            '/developers' => 'Give maintainers time to test, document, and ship.',
            '/roadmap' => 'Help turn priorities into maintained releases.',
            '/docs/1.x/overview' => 'Keep the documentation aligned with every release.',
        ];

        foreach ($messages as $path => $message) {
            $this->get($path)
                ->assertOk()
                ->assertSee($message)
                ->assertSee('Support development');
        }
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
