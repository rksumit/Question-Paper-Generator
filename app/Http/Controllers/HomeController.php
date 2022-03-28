<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionSet;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        dd(auth()->user()->is_admin);
        $subject_count = Subject::count();
        $teacher_count = Teacher::count();
        $question_count = Question::count();
        $questionset_count = QuestionSet::count();
        //dd($subject_count);
        return view('home', compact('teacher_count','subject_count','question_count','questionset_count'));



    }



}
