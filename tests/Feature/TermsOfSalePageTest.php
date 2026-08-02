<?php

namespace Tests\Feature;

use Tests\TestCase;

class TermsOfSalePageTest extends TestCase
{
    public function test_terms_of_sale_explains_that_the_open_source_software_is_free(): void
    {
        $this->get('/terms-of-sale')
            ->assertOk()
            ->assertSee('Terms of Sale')
            ->assertSee('Nothing is being sold')
            ->assertSee('There is no sale, purchase contract, licence fee, subscription, or paid edition required')
            ->assertSee('This page does not replace, restrict, or expand the GPL.')
            ->assertSee('support@agunfoninteractivity.com');
    }

    public function test_terms_of_sale_is_linked_and_in_the_sitemap(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee(route('terms-of-sale'));

        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee(route('terms-of-sale'));
    }
}
