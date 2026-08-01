<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSee('https://demo.moderncommerce.dev', false)
            ->assertDontSee('https://demo.agunfoninteractivity.com', false)
            ->assertSee('Every feature required to sell, fulfil, and operate a modern ecommerce business for training, eLearning courses, and digital products.', false)
            ->assertSee('Sell directly to learners')
            ->assertSee('Sell seats to organizations')
            ->assertSee('Sell recurring access')
            ->assertSee('Low-balance alerts')
            ->assertSee('Do I need WordPress?')
            ->assertSee('ModernCommerce 2.1.6 currently supports Moodle 5.2')
            ->assertSee('GPL-3.0-or-later')
            ->assertSee('by Agunfon Interactivity LLC, USA')
            ->assertSee('/images/brand/moderncommerce-logo-dark.png', false)
            ->assertSee('/images/brand/moderncommerce-logo-white.png', false)
            ->assertSee('Maintained by')
            ->assertDontSee('mc-brand-mark', false)
            ->assertDontSee('by Agunfon</small>', false)
            ->assertSee('Moodle™ is a trademark or registered trademark of Moodle Pty Ltd or its associated entities.')
            ->assertSee('References to Moodle describe software compatibility only.')
            ->assertSee('https://moodle.com/trademarks/', false)
            ->assertSee('The payment provider’s normal processing fees still apply.');

        $headline = 'Every feature required to sell, fulfil, and operate a modern ecommerce business for training, eLearning courses, and digital products.';
        self::assertSame(2, substr_count($response->getContent(), $headline), 'The approved headline must appear in both the homepage hero and global footer.');
    }
}
