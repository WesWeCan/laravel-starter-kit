<?php

namespace App\Http\Controllers;

use App\Http\Requests\Showcase\StoreContactRequest;
use App\Http\Requests\Showcase\StoreRegistrationRequest;
use App\Http\Requests\Showcase\StoreUploadRequest;
use App\Http\Requests\Showcase\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ShowcaseController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Showcase', [
            'profileDefaults' => [
                'display_name' => 'Dominus',
                'bio' => 'Starter kit profile bio.',
            ],
        ]);
    }

    public function storeContact(StoreContactRequest $request): RedirectResponse
    {
        return redirect()->route('showcase.index')->with('success', 'Contact message sent successfully.');
    }

    public function storeRegistration(StoreRegistrationRequest $request): RedirectResponse
    {
        return redirect()->route('showcase.index')->with('success', 'Registration successful.');
    }

    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        return redirect()->route('showcase.index')->with('success', 'Profile updated successfully.');
    }

    public function storeUpload(StoreUploadRequest $request): RedirectResponse
    {
        return redirect()->route('showcase.index')->with('success', 'File uploaded successfully.');
    }
}
