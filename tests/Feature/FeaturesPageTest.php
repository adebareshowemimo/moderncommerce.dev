<?php

namespace Tests\Feature;

use Tests\TestCase;

class FeaturesPageTest extends TestCase
{
    public function test_complete_feature_catalogue_is_public_and_source_backed(): void
    {
        $this->get('/features')
            ->assertOk()
            ->assertSee('Every feature required to sell, fulfil, and operate a modern ecommerce business for training, eLearning courses, and digital products.')
            ->assertSee('Catalogue, products and pricing')
            ->assertSee('Storefront, content and discovery')
            ->assertSee('Payments, gateways and webhooks')
            ->assertSee('Fulfilment, enrolment and entitlements')
            ->assertSee('Subscriptions and memberships')
            ->assertSee('Analytics, reports and operational oversight')
            ->assertSee('Open-source platform and extension points')
            ->assertSee('22 storefront widget types')
            ->assertSee('22 dashboard widgets')
            ->assertSee('36 Moodle capabilities')
            ->assertSee('17 scheduled workflows')
            ->assertSee('One active store currency');
    }

    public function test_feature_page_links_to_the_technical_reference(): void
    {
        $this->get('/features')
            ->assertOk()
            ->assertSee('/docs/1.x/feature-reference', false)
            ->assertSee('Open the technical reference');
    }

    public function test_feature_reference_documents_routes_capabilities_and_boundaries(): void
    {
        $this->get('/docs/1.x/feature-reference')
            ->assertOk()
            ->assertSee('Complete Feature Reference')
            ->assertSee('local/moderncommerce:configuregateways')
            ->assertSee('/local/moderncommerce/admin/pricing.php')
            ->assertSee('22 storefront widget types')
            ->assertSee('81 commerce tables')
            ->assertSee('156 service declarations')
            ->assertSee('Product boundaries');
    }

    public function test_sitemap_contains_the_feature_catalogue(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee('/features');
    }
}
