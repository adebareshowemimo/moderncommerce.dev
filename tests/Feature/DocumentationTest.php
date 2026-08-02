<?php

namespace Tests\Feature;

use Tests\TestCase;

class DocumentationTest extends TestCase
{
    public function test_documentation_overview_is_available(): void
    {
        $this->get('/docs/1.x/overview')
            ->assertOk()
            ->assertSee('Modern Commerce: Overview')
            ->assertSee('GPL-3.0-or-later')
            ->assertDontSee('Modern Commerce Commercial License')
            ->assertDontSee('{{route}}')
            ->assertDontSee('{{version}}');
    }

    public function test_documentation_exposes_the_complete_feature_reference(): void
    {
        $this->get('/docs/1.x/feature-reference')
            ->assertOk()
            ->assertSee('Complete Feature Reference')
            ->assertSee('Catalogue, products and pricing')
            ->assertSee('Payments and webhooks')
            ->assertSee('Roles, privacy and security');
    }

    public function test_documentation_navigation_is_grouped_and_marks_the_current_page(): void
    {
        $this->get('/docs/1.x/quick-start')
            ->assertOk()
            ->assertSee('Get started')
            ->assertSee('Build the catalogue')
            ->assertSee('Sell and fulfil')
            ->assertSee('Operate the platform')
            ->assertSee('Version 2.1.6')
            ->assertSee('aria-current="page"', false)
            ->assertSee('Quick start');
    }

    public function test_every_published_documentation_section_is_available(): void
    {
        foreach (array_keys(config('moderncommerce-docs.sections')) as $section) {
            $this->get("/docs/1.x/{$section}")->assertOk();
        }
    }

    public function test_reference_tables_render_as_html_tables(): void
    {
        $this->get('/docs/1.x/database-reference')
            ->assertOk()
            ->assertSee('<table>', false)
            ->assertSee('local_moderncommerce_products')
            ->assertDontSee('| Table | Purpose |');
    }

    public function test_dashboard_widget_catalogue_documents_the_source_counts(): void
    {
        $this->get('/docs/1.x/reports-and-analytics')
            ->assertOk()
            ->assertSee('22 configurable admin-dashboard widgets')
            ->assertSee('4 KPI tiles')
            ->assertSee('18 analytics or table widgets')
            ->assertSee('Revenue trend')
            ->assertSee('Wishlist demand')
            ->assertSee('Setup and health alerts are also displayed on the dashboard, but are not counted as widgets.');
    }

    public function test_every_seeded_custom_role_is_documented(): void
    {
        $response = $this->get('/docs/1.x/roles-and-permissions')->assertOk();

        foreach ([
            'moderncommerceadmin',
            'moderncommercefinance',
            'moderncommerceproduct',
            'moderncommercereporting',
            'moderncommercestorefront',
            'moderncommercemarketing',
            'moderncommercesupport',
            'moderncommercesubscription',
            'moderncommercepaymentops',
        ] as $roleShortname) {
            $response->assertSee($roleShortname);
        }
    }

    public function test_documentation_home_redirects_to_current_overview(): void
    {
        $this->get('/docs')
            ->assertStatus(301)
            ->assertRedirect('/docs/1.x/overview');
    }

    public function test_unknown_documentation_section_returns_not_found(): void
    {
        $this->get('/docs/1.x/not-a-real-section')->assertNotFound();
    }
}
