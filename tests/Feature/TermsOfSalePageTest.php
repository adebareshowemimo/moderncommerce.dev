<?php

namespace Tests\Feature;

use Tests\TestCase;

class TermsOfSalePageTest extends TestCase
{
    public function test_terms_of_sale_explains_free_software_and_optional_paid_services(): void
    {
        $this->get('/terms-of-sale')
            ->assertOk()
            ->assertSee('Terms of Sale')
            ->assertSee('Payment does not unlock software features')
            ->assertSee('every software feature is available without payment')
            ->assertSee('Optional paid support and maintenance')
            ->assertSee('Professional — US$999 per year')
            ->assertSee('one production Moodle site')
            ->assertSee('An initial response target of one business day')
            ->assertSee('Support is subject to reasonable-use limits')
            ->assertSee('Up to two consultation calls during each annual subscription period')
            ->assertSee('Professional support does not include custom development')
            ->assertSee('Voluntary sponsorship')
            ->assertSee('Cancellation stops future renewal and does not remove the plugin')
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
