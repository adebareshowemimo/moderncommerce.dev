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
            ->assertSee('Version 2.1.7')
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

    public function test_store_pages_admin_workflow_is_documented(): void
    {
        $this->get('/docs/1.x/storefront')
            ->assertOk()
            ->assertSee('/local/moderncommerce/admin/pages.php')
            ->assertSee('local/moderncommerce:managestorefront')
            ->assertSee('Required; cannot be disabled')
            ->assertSee('Manage widgets')
            ->assertSee('Manage global widgets')
            ->assertSee('/local/moderncommerce/admin/global.php')
            ->assertSee('page-not-found response')
            ->assertSee('Recommended publishing workflow');
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

    public function test_documentation_uses_current_release_and_currency_facts(): void
    {
        $this->get('/docs/1.x/upgrading')
            ->assertOk()
            ->assertSee('2.1.7')
            ->assertSee('2026080100')
            ->assertDontSee('2026072301');

        $this->get('/docs/1.x/admin-settings')
            ->assertOk()
            ->assertSee('Default <strong>USD</strong>', false)
            ->assertSee('21 supported currencies')
            ->assertSee('BRL, CHF, SGD');
    }

    public function test_missing_help_center_references_are_published(): void
    {
        $this->get('/docs/1.x/email-templates-and-placeholders')
            ->assertOk()
            ->assertSee('Shared placeholder palette')
            ->assertSee('{unsubscribe_url}')
            ->assertSee('test_emails.php');

        $this->get('/docs/1.x/storefront-widget-reference')
            ->assertOk()
            ->assertSee('Widget lifecycle')
            ->assertSee('widget_resolver.php')
            ->assertSee('mediastorycarousel');

        $this->get('/docs/1.x/release-packaging')
            ->assertOk()
            ->assertSee('composer run mc:package')
            ->assertSee('moderncommerce-v2.1.7.zip');

        $this->get('/docs/1.x/moodle-plugin-directory')
            ->assertOk()
            ->assertSee('thirdpartylibs.xml')
            ->assertSee('privacy provider');

        $this->get('/docs/1.x/certificate-integration')
            ->assertOk()
            ->assertSee('mod_coursecertificate')
            ->assertSee('certificate enabled')
            ->assertSee('course completion');
    }

    public function test_demo_role_credentials_are_explicitly_non_production(): void
    {
        $this->get('/docs/1.x/roles-and-permissions')
            ->assertOk()
            ->assertSee('mcdemo_commerceadmin')
            ->assertSee('ModernCommerceDemo#2026!')
            ->assertSee('Never create these accounts on an Internet-accessible production site');
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
