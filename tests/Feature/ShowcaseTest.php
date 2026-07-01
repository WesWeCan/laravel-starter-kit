<?php

test('showcase page loads successfully', function () {
    $response = $this->withoutVite()->get('/showcase');

    $response->assertStatus(200);
    $response->assertInertia(fn ($page) => $page
        ->component('Showcase')
        ->has('profileDefaults.display_name')
        ->has('profileDefaults.bio')
    );
});

test('contact form redirects on valid submission', function () {
    $response = $this->post('/showcase/contact', [
        'name' => 'Dominus',
        'email' => 'dominus@example.com',
        'message' => 'This is a valid test message for the showcase.',
    ]);

    $response->assertRedirect('/showcase');
    $response->assertSessionHas('success');
});

test('contact form returns validation errors on empty submission', function () {
    $response = $this->post('/showcase/contact', []);

    $response->assertSessionHasErrors(['name', 'email', 'message']);
});

test('registration form returns validation errors on empty submission', function () {
    $response = $this->post('/showcase/registration', []);

    $response->assertSessionHasErrors(['name', 'email', 'password']);
});

test('registration form returns error when passwords do not match', function () {
    $response = $this->post('/showcase/registration', [
        'name' => 'Dominus',
        'email' => 'dominus@example.com',
        'password' => 'secret123',
        'password_confirmation' => 'different123',
    ]);

    $response->assertSessionHasErrors(['password']);
});

test('registration form redirects on valid submission', function () {
    $response = $this->post('/showcase/registration', [
        'name' => 'Dominus',
        'email' => 'dominus@example.com',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
    ]);

    $response->assertRedirect('/showcase');
    $response->assertSessionHas('success');
});

test('profile update redirects on valid submission', function () {
    $response = $this->put('/showcase/profile', [
        'display_name' => 'Dominus',
        'bio' => 'An updated bio.',
    ]);

    $response->assertRedirect('/showcase');
    $response->assertSessionHas('success');
});

test('profile update returns validation errors on empty submission', function () {
    $response = $this->put('/showcase/profile', []);

    $response->assertSessionHasErrors(['display_name']);
});
