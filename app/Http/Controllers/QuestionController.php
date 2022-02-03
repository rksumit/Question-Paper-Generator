<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\QuestionSet;
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
        $questions= Question::with('topic')->paginate(15);
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
    public function store(QuestionRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
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
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $data = $request->validated();

        $question->update($data);
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

    public function genQuestionSet($id) {
        $topics = Topic::where('subject_id', $id)->get();
        return view('questions.questionSet', compact('topics'));
    }

    public function generateSet(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_of_questions' => 'required|integer|min:5|max:20',
            'topics' => 'required|array',
            'topics.*' => 'required|exists:topics,id',
            'weightage' => 'required|array',
            'weightage.*' => 'required|integer|min:1|max:100'
        ]);
        // dd($validated);
        $topics = [];
        for ($i = 0; $i < intval($validated['no_of_questions']); $i++){
            // echo myRand($arr, $freq, count($arr)) . '<br>';
            $topic = myrand($validated['topics'], $validated['weightage'], count($validated['topics']));
            array_push($topics, $topic);
        }
        // topics = [1, 1, 4, 5, 6, 8, 1]
        // topics = [1, 1, 1, 4, 5, 6, 8]
        $vals = array_count_values($topics);
        foreach ($vals as $index => $val) {
            $question_count = Question::where('topic_id', $index)->count();
            if($question_count < $val) {
                $topic = Topic::where('id', $index)->first();
                return redirect()->back()->with('error', 'Not Enough Questions from the topic ' . $topic->topic . '. Please add more questions.');
            }
        }

        $questionSet = QuestionSet::create([
            'letter' => $validated['name']
        ]);
        $questions = [];
        foreach ($topics as $topic) {
            $question = Question::where('topic_id', $topic)->inRandomOrder()->first();
            for ($i=0; $i<count($questions); $i++) {
                if ($questions[$i] == $question) {
                    $i=0;
                    $question = Question::where('topic_id', $topic)->inRandomOrder()->first();
                }
            }
            array_push($questions, $question);
            $questionSet->questions()->attach($question);
        }
        // dd($questions);
        return redirect(route('questionset.show', $questionSet->id))->with('success', 'Question Generated Successfully');
        // return view('questionSet.show', compact('questions', 'questionSet'))->with('success', 'Question Generated Successfully');
    }

    public function questionSetIndex() {
        $questionSets = QuestionSet::with('questions.topic.subject')->get();
        // dd($questionSets);
        return view('questionSet.index', compact('questionSets'));
    }

    public function questionSetShow($id) {
        $questionSet = QuestionSet::where('id', $id)->with('questions.topic.subject')->firstOrFail();
        // dd($questionSet);
        return view('questionSet.show', compact('questionSet'));
    }


};

function findCeil($arr, $r, $l, $h)
    {
        while ($l < $h)
        {
            $mid = ($l + $h)/2;
            ($r > $arr[$mid]) ? ($l = $mid + 1) : ($h = $mid);
        }
        return ($arr[$l] >= $r) ? $l : -1;
    }

    // The main function that returns a random number
    // from arr[] according to distribution array
    // defined by freq[]. n is size of arrays.
    function myRand($arr, $freq,  $n) {
        // Create and fill cum array
        $cum= [];
        $cum[0] = $freq[0];
        for ($i = 1; $i < $n; ++$i)
            $cum[$i] = $cum[$i - 1] + $freq[$i];

        // cum[n-1] is sum of all frequencies.
        // Generate a random number with
        // value from 1 to this sum
        $r = rand(0, $cum[$n - 1]);
        // echo $r . '<br>';
        // Find index of ceiling of r in cum array
        $indexc = findCeil($cum, $r, 0, $n - 1);
        // echo $indexc . '<br>';


        return $arr[$indexc];
    }
