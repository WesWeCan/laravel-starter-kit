<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    public function test_basic_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPathIs('/')
                ->waitFor('@home-heading')
                ->assertPresent('@home-heading')
                ->assertSeeIn('@home-heading', 'Hello World');
        });
    }
}
