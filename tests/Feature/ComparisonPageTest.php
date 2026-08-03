<?php

namespace Tests\Feature;

use Tests\TestCase;

class ComparisonPageTest extends TestCase
{
    public function test_product_page_establishes_the_course_selling_position(): void
    {
        $this->get('/product')
            ->assertOk()
            ->assertSee('Everything required to sell a Moodle course')
            ->assertSee('The best open-source course-selling plugin for Moodle');
    }

    public function test_comparison_page_presents_all_researched_platforms(): void
    {
        $this->get('/compare')
            ->assertOk()
            ->assertSee('ModernCommerce')
            ->assertSee('Moodle payment / PayPal')
            ->assertSee('IOMAD')
            ->assertSee('WooCommerce')
            ->assertSee('LearnDash + WooCommerce')
            ->assertSee('Edwiser Bridge + WooCommerce')
            ->assertSee('LearnWorlds')
            ->assertSee('Why ModernCommerce')
            ->assertSee('Five ways to sell a Moodle course')
            ->assertSee('ModernCommerce vs IOMAD')
            ->assertSee('Adjacent products with different centers of gravity.')
            ->assertSee('Multi-tenant Moodle distribution')
            ->assertSee('Tenant-specific brands, catalogues and payment accounts')
            ->assertSee('Moodle remains the learning system')
            ->assertSee('$0 GPL core')
            ->assertSee('Twelve connected capability domains')
            ->assertSee('81')
            ->assertSee('156')
            ->assertSee('Entitlement lifecycle ledger')
            ->assertSee('$0 software licence')
            ->assertSee('$199/year')
            ->assertSee('$279/year')
            ->assertSee('$948/year')
            ->assertSee('$2,988/year')
            ->assertSee('Three-year view')
            ->assertSee('Research sources and methodology');
    }
}
