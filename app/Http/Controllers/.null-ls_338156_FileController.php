<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonFile;
use App\Models\File;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class FileController extends Controller
{
    public function index(Unit $unit, Lesson $lesson): Response
    {
        return Inertia::render("Files/index", [
            "unit" => $unit,
            "lesson" => $lesson,
            "files" => $lesson->files,
        ]);
    }

    public function create(Unit $unit, Lesson $lesson): Response
    {
        return Inertia::render("Files/new", [
            "unit" => $unit,
            "lesson" => $lesson,
        ]);
    }

    public function edit(Unit $unit, Lesson $lesson): Response
    {
        return Inertia::render("Files/edit", [
            "unit" => $unit,
            "lesson" => $lesson,
        ]);
    }

    /** store method for files
    * @var \Illuminate\Http\Request $request
    * @var App\Models\Unit $unit
    * @var App\Models\Lesson $lesson
    *
    * @return RedirectResponse
    */
    public function store(Request $request, Unit $unit, Lesson $lesson) : RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'file' => 'required|',
            'file' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
        ]);

        $filePath = $request->file('file')->store('lesson_files', 'public');

        $file = $lesson->files()->create([
            "file_name" => $request["name"],
            "file_path" => $filePath,
            "file_price" => $request["price"],
        ]);

        LessonFile::create([
            "lesson_id" => $lesson->id,
            "file_id" => $file->id,
        ]);

        return redirect()->route("units.lessons.files.index")->with('success', "File Created Successfully");
    }


    public function update(Request $request, Unit $unit, Lesson $lesson, File $file) : RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'file' => 'required|',
            'file' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
        ]);

        $filePath = $request->file('file')->store('lesson_files', 'public');

        $file->update([
            "file_name" => $request["name"],
            "file_path" => $filePath,
            "file_price" => $request["price"],
        ]);

        return redirect()->route("units.lessons.files.index")->with('success', "File Updated Successfully");
    }

    public function destroy(Unit $unit, Lesson $lesson, File $file): RedirectResponse
    {
        if (Auth::user()->role !== "admin") {
            abort(403, 'Unauthorized action.');
        }

        $file->delete();

        return redirect()->route('units.lessons.index', $unit)->with('success', 'File deleted successfully.');
    }

}
