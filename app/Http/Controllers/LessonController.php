<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Unit;

class LessonController extends Controller
{
    public function index(Unit $unit): Response
    {
        return Inertia::render("Units/index", [
            "lessons" => $unit->lessons(),
        ]);
    }
}
