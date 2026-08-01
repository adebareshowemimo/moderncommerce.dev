<?php

namespace Tests\Feature;

use Tests\TestCase;

class OpenSourcePageTest extends TestCase
{
    public function test_open_source_page_publishes_audited_project_information(): void
    {
        $this->get('/open-source')
            ->assertOk()
            ->assertSee('Own the commerce layer your learning business depends on.')
            ->assertSee('GPL-3.0-or-later')
            ->assertSee('Release 2.1.6')
            ->assertSee('156')
            ->assertSee('81')
            ->assertSee('36')
            ->assertSee('17')
            ->assertSee('A public repository URL is not yet configured')
            ->assertSee('independent Moodle plugin by Agunfon Interactivity LLC, USA')
            ->assertDontSee('Page foundation ready')
            ->assertDontSee('Modern Commerce Commercial License');
    }
}
