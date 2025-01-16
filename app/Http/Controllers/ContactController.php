<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    public function show(): Response
    {
        return Inertia::render("Contact", [
            'csrfToken' => csrf_token(),
            "submitRoute" => route("contact.submit"),
        ]);
    }

    public function submit(Request $request): Response
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email",
            "message" => "required|string"
        ]);

        // do something
        // want to sync up to SES but will do that later

        return Inertia::render("Contact", [
            'csrfToken' => csrf_token(),
            "submitRoute" => route("contact.submit"),
            "message" => "success"
        ]);
    }
}
