<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class UnitController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("Units/index", [
            "units" => Resource::units()->get(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render("Units/new", []);
    }


    public function edit(Resource $unit): Response
    {
        return Inertia::render("Units/edit", [
            "unit" => $unit,
        ]);
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // path = if path exist or create it
        $path = "testing";

        dd(Resource::find(1));

        Resource::create([
            "name" => $request["name"],
            "description" => $request["description"],
            "type" => "unit",
            "path" => $path,
            "mime_type" => "folder",
            "price" => $request["price"],
        ]);

        return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }

    public function update(Request $request, Resource $unit): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $unit->update([
            "name" => $request["name"],
            "description" => $request["description"],
            "type" => $request["type"],
            "path" => $request["path"],
            "parent_id" => $request["parent_id"],
            "mime_type" => $request["mime_type"],
            "price" => $request["price"],
        ]);

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    public function destroy(Resource $unit): RedirectResponse
    {
        if (Auth::user()->role != "admin") {
            abort(403, 'Unauthorized action.');
        }

        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
}
