<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Topic;
use App\Rules\CodeRule;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //

    public function index()
    {
        $subjects = Subject::with('topics', 'teacher.user')->latest()->paginate(5);
        //dd($subjects);
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('subjects.create', compact('teachers'));
    }

    public function store(SubjectRequest $request)
    {
        $data = $request->validated();

        // dd($data);
        Subject::create($data);
        return redirect()->route('subjects.index')
            ->with('success', 'Subject created successfully.');
    }
    public function edit(Subject $subject)

    {
        $teachers = Teacher::all();
        $subject->load('teacher');
        return view('subjects.edit', compact('subject', 'teachers'));
    }
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $data = $request->validated();

        $subject->update($data);

        return redirect()->route('subjects.index')
            ->with('success', 'Subject updated successfully');
    }
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }
};
