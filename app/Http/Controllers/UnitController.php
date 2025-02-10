<?php

namespace App\Http\Controllers;

use App\Models\Unit;
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
            "units" => Unit::all(),
        ]);
    }

    public function new(): Response
    {
        return Inertia::render("Units/new", []);
    }


    public function edit(Unit $unit): Response
    {
        return Inertia::render("Units/edit", [
            "unit" => $unit,
        ]);
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Unit::create([
            "unit_name" => $request["name"],
            "unit_price" => $request["price"],
        ]);

        return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }

    public function update(Request $request, Unit $unit): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $unit->update([
            "unit_name" => $request["name"],
            "unit_price" => $request["price"],
        ]);

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    public function destroy(Unit $unit): RedirectResponse
    {
        if (Auth::user()->role != "admin") {
            abort(403, 'Unauthorized action.');
        }

        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
}
