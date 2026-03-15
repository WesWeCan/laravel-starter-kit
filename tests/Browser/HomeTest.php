<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomeTest extends DuskTestCase
{
    public function test_home_page_renders_the_starter_content(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPathIs('/')
                ->waitFor('@home-heading')
                ->assertPresent('@home-heading')
                ->assertSeeIn('@home-heading', 'Hello World')
                ->assertSeeIn('@home-counter', 'Pressed 0 times');
        });
    }
}
