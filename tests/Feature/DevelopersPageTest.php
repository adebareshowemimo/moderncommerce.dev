<?php

namespace Tests\Feature;

use Tests\TestCase;

class DevelopersPageTest extends TestCase
{
    public function test_developers_page_publishes_source_backed_extension_guidance(): void
    {
        $this->get('/developers')
            ->assertOk()
            ->assertSee('Build on the commerce layer already inside Moodle.')
            ->assertSee('ModernCommerce 2.1.8')
            ->assertSee('Moodle 5.2')
            ->assertSee('PHP 8.3+')
            ->assertSee('156')
            ->assertSee('12')
            ->assertSee('17')
            ->assertSee('36')
            ->assertSee('81')
            ->assertSee('not an unauthenticated, general-purpose public REST API')
            ->assertSee('do not update order, payment, entitlement, or subscription tables directly')
            ->assertSee('https://moodledev.io/docs/5.2/apis', false)
            ->assertDontSee('Page foundation ready');
    }

    public function test_first_run_and_demo_data_guide_is_published(): void
    {
        $this->get('/docs/1.x/cli-and-maintenance')
            ->assertOk()
            ->assertSee('First run, demo data &amp; CLI maintenance', false)
            ->assertSee('--install-defaults')
            ->assertSee('--seed')
            ->assertSee('--refresh --yes')
            ->assertSee('--reset-empty --yes')
            ->assertSee('Windows PowerShell')
            ->assertSee('Table coverage audit');

        $this->get('/developers')
            ->assertOk()
            ->assertSee('First run and CLI')
            ->assertSee('First-run guide');
    }
}
