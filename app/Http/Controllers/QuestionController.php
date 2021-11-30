<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions= Question::with('topic')->get();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions= Question:: all();
        $topics = Topic::all();
        return view('questions.create', compact('questions', 'topics'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'question' => 'required|unique:questions,question',
            'weightage' => 'required|gt:0',
            'topic' => 'required',
            'difficulty_level' => 'required',
        ]);
        // dd($request->user());
        Question::create([
            'question' => $data['question'],
            'weightage' => $data['weightage'],
            'difficulty_level' => $data['difficulty_level'],
            'topic_id' => $data['topic'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('questions.index')
                        ->with('success','Question created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $question= Question::find($question->id);
        // dd($question);
        $topics = Topic::all();
        return view('questions.edit',compact('question', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'question' => 'required',
            'weightage' => 'required',
            'topic' => 'required',
            'difficulty_level' => 'required',
        ]);

        $question->update([
            'question' => $data['question'],
            'weightage' => $data['weightage'],
            'difficulty_level' => $data['difficulty_level'],
            'topic_id' => $data['topic'],
        ]);
        return redirect()->route('questions.index')
                        ->with('success','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
                        ->with('success','Question deleted successfully');
    }
};
