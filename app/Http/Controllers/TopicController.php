<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!\auth()->user()->is_admin)
            $topics = DB::table('topics')
                ->join('subjects', 'topics.subject_id', '=', 'subjects.id')
                ->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')
                ->join('users', 'teachers.user_id', '=', 'users.id')
                ->where([
                    ['user_id', '=', \auth()->id()]
                ])
                ->select(['topics.id', 'topics.topic', 'subjects.name as subject', 'hoursallocated'])
                ->paginate();
        else
            $topics = DB::table('topics')
                ->join('subjects', 'topics.subject_id', '=', 'subjects.id')
                ->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')
                ->join('users', 'teachers.user_id', '=', 'users.id')
                ->select(['topics.id', 'topics.topic', 'subjects.name as subject', 'hoursallocated'])
                ->paginate();
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\auth()->user()->is_admin)
            $subjects = Subject::all();
        else {
            $teacher = Teacher::where('user_id', \auth()->id())->first();
//            dd($teacher);
            $subjects = Subject::where('teacher_id', $teacher->id)->get();
        }
        return view('topics.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(TopicRequest $request)
    {

        $data = $request->validated();

        Topic::create($data);

        return redirect()->route('topics.index')
            ->with('success', 'Topic created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);

        if (\auth()->user()->is_admin)
            $subjects = Subject::all();
        else {
            $teacher = Teacher::where('user_id', \auth()->id())->first();
//            dd($teacher);
            $subjects = Subject::where('teacher_id', $teacher->id)->get();
        }
        return view('topics.edit', compact('topic', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $data = $request->validated();
        $topic->update($data);
        return redirect()->route('topics.index')
            ->with('success', 'Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index')
            ->with('success', 'Topic deleted successfully');
    }
};
