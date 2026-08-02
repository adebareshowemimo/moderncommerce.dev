<?php

namespace Tests\Feature;

use Tests\TestCase;

class OpenSourcePageTest extends TestCase
{
    public function test_open_source_page_publishes_audited_project_information(): void
    {
        $this->get('/open-source')
            ->assertOk()
            ->assertSee('Open-source commerce infrastructure for Moodle, under your control.')
            ->assertSee('GPL-3.0-or-later')
            ->assertSee('Release 2.1.7')
            ->assertSee('156')
            ->assertSee('81')
            ->assertSee('36')
            ->assertSee('17')
            ->assertSee('https://github.com/adebareshowemimo/moderncommerce.dev', false)
            ->assertSee('https://github.com/adebareshowemimo/moderncommerce.dev/issues', false)
            ->assertDontSee('A public repository URL is not yet configured')
            ->assertSee('independent Moodle plugin by Agunfon Interactivity LLC, USA')
            ->assertDontSee('Page foundation ready')
            ->assertDontSee('Modern Commerce Commercial License');
    }
}
