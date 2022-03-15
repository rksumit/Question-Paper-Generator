<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Topic;
use App\Rules\CodeRule;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //

    public function index()
    {
        if (auth()->user()->is_admin)
            $subjects = Subject::with('topics', 'teacher.user')->latest()->paginate(5);
        else {
            $user = \App\Models\User::with('teacher')->find(auth()->id());
            $subjects = Subject::with('topics', 'teacher.user')->where('teacher_id', '=', $user->teacher->id)->latest()->paginate(5);
        }
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $this->authorize('create', Subject::class);
        $teachers = Teacher::all();
        return view('subjects.create', compact('teachers'));
    }

    public function store(SubjectRequest $request)
    {
        $this->authorize('create', Subject::class);
        $data = $request->validated();
        Subject::create($data);
        return redirect()->route('subjects.index')
            ->with('success', 'Subject created successfully.');
    }
    public function edit(Subject $subject)
    {
        $this->authorize('update', $subject);
        $teachers = Teacher::all();
        $subject->load('teacher');
        return view('subjects.edit', compact('subject', 'teachers'));
    }
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $this->authorize('update', $subject);
        $data = $request->validated();

        $subject->update($data);

        return redirect()->route('subjects.index')
            ->with('success', 'Subject updated successfully');
    }
    public function destroy(Subject $subject)
    {
        $this->authorize('delete');

        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }
};
