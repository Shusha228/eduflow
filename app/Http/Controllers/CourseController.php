<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller{

    public function index() : View{
        $courses = Course::with('instructor')->get();
        return view('courses.index', compact('courses'));
    }

    public function create() : View{
        return view('courses.create');
    }

    public function store(Request $request) : RedirectResponse{
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'instructor_id' => auth()->id(),
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }
}
