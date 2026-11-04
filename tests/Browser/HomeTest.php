<?php

use Laravel\Dusk\Browser;

test('home page renders the starter content', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertPathIs('/')
            ->waitFor('@home-heading')
            ->assertSeeIn('@home-heading', 'Hello World')
            ->assertSeeIn('@home-counter', 'Pressed 0 times');
    });
});
