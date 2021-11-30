<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::with('subject')->get();
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('topics.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
    //    dd($request->all());
        $data = $request->validate([
            'topic' => 'required',
            'hoursallocated' => 'required|gt:0',
            'subject_id' => 'required',

        ]);
        // dd($request->user());
        Topic::create([
            'topic' => $data['topic'],
            'hoursallocated' => $data['hoursallocated'],
            'subject_id' => $data['subject_id'],

        ]);

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
        $topics = Topic::find($topic->id);
        // dd($topic);
        $topics = Topic::all();
        $subjects = Subject::all();
        return view('topics.edit', compact('topic', 'topics', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $data = $request->validate([
            'topic' => 'required',
            'hoursallocated' => 'required',
            'subject_id' => 'required',

        ]);

        dd($data);

        $topic->update([
            'topic' => $data['topic'],
            'hoursallocated' => $data['housrsallocated'],
            'subject_id' => $data['subject'],

        ]);
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
