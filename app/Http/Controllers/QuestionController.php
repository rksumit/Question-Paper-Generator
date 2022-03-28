<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\QuestionSet;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Barryvdh\DomPDF\Facade\Pdf;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $questions= Question::with('topic')->where('topic_id', $id)->paginate(15);
//        dd($questions);
        return view('questions.index', compact('questions', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $questions= Question::all();
        $topic = Topic::findOrFail($id);
        return view('questions.create', compact('questions', 'topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $data = $request->validated();
        // dd($request->user());
        Question::create([
            'question' => $data['question'],
            'weightage' => 5,
            'difficulty_level' => $data['difficulty_level'],
            'topic_id' => $data['topic_id'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('questions.index', $data['topic_id'])
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
        $this->authorize('update', $question);
        $question= Question::find($question->id);
        // dd($question);
        if (!\auth()->user()->is_admin)
            $topics = DB::table('topics')
                ->join('subjects', 'topics.subject_id', '=', 'subjects.id')
                ->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')
                ->join('users', 'teachers.user_id', '=', 'users.id')
                ->where([
                    ['user_id', '=', \auth()->id()]
                ])
                ->select(['topics.id', 'topics.topic'])
                ->get();
        else
            $topics = DB::table('topics')
                ->join('subjects', 'topics.subject_id', '=', 'subjects.id')
                ->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')
                ->join('users', 'teachers.user_id', '=', 'users.id')
                ->select(['topics.id', 'topics.topic'])
                ->get();
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
        $this->authorize('update', $question);
        $data = $request->validated();
        $question->update($data);
        return redirect()->route('questions.index', $data['topic_id'])
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
        $this->authorize('delete', $question);
        $question->delete();
        return redirect()->back()
                        ->with('success','Question deleted successfully');
    }

    public function genQuestionSet($id) {
        $subject = Subject::where('id', $id)->first();
        $topics = Topic::where('subject_id', $id)->get();
        return view('questions.questionSet', compact('topics', 'subject'));
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
        $questionSets = DB::table('question_sets')
                        ->join('question_question_set', 'question_sets.id', '=', 'question_question_set.question_set_id')
                        ->join('questions', 'questions.id', '=', 'question_question_set.question_id')
                        ->join('topics', 'questions.topic_id', '=', 'topics.id')
                        ->join('subjects', 'topics.subject_id', '=', 'subjects.id')
                        ->when(!auth()->user()->is_admin, function ($q) {
                                $teacher = Teacher::where('user_id', auth()->id())->first();
                                return $q->where('subjects.teacher_id', '=', $teacher->id);
                        })
                        ->selectRaw('question_sets.id, question_sets.letter, count(*) as no_of_questions, subjects.name as subject')
                        ->groupBy('question_sets.id')->get();
        // dd($questionSets);
        // $questionSets = QuestionSet::with('questions.topic.subject')
        //                 ->when(!auth()->user()->is_admin, function ($q) {
        //                     $teacher = Teacher::where('user_id', auth()->id());
        //                     return $q->where()
        //                 })
        //                 ->get();
        // dd($questionSets);
        return view('questionSet.index', compact('questionSets'));
    }

    public function questionSetShow($id) {
        $questionSet = QuestionSet::where('id', $id)->with('questions.topic.subject')->firstOrFail();
        // dd($questionSet);
        return view('questionSet.show', compact('questionSet'));
    }

    public function print($id) {
        $year = date('Y');
        $questionSet = QuestionSet::where('id', $id)->with('questions.topic.subject')->firstOrFail();
        $time = (floatval(count($questionSet->questions)) * 5 * 1.8) / 60;
        $time = round($time, 2);
        $pdf = Pdf::loadView('questions.questionPaper', compact('questionSet', 'year', 'time'));
        // dd($pdf);
        return $pdf->download($questionSet->letter . '-' . time() . '.pdf');
        // return view('questions.questionPaper', compact('questionSet', 'year', 'time'));
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
