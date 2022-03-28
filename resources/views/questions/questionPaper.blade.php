<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Question Paper</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/question.css') }}"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container1 {
    text-align: center;
}

p {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.header1 {
    text-align: center;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.container {
    width: 80%;
    margin-left: auto;
    margin-right: auto;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
    </style>
</head>

<body>
    <div class="container">
        <div class="container1">
            <h1 style="font-size:30px;">ORCHID INTERNATIONAL COLLEGE</h1>
            <h2 style="font-size:20px;">Bijayachowk,Gausala-9,Kathmandu</h2>
            <h3> Terminal Exam - {{ $year }} </h3>
            <h3 style="text-transform: uppercase">{{ $questionSet->letter }}</h3>

        </div>
        <div class="question clearfix">
            <div class="subject" style="float: left">
                <p>Course: BSc. CSIT  </p>
                <p>Subject: {{ $questionSet->questions[0]->topic->subject->name }}</p>
            </div>
            <div class="btn" style="float: right">
                <p>Full Marks: {{ count($questionSet->questions) * 5 }}</p>
                <p>Time: {{ $time }} Hrs.</p>
            </div>
        </div>
        
        <div></div>
        <div class="btn3 ">
            <p>Candidates are required to give their answer in thier own words as far as practicable</p>
        </div>
        <div class="btn4">
            <p>Attempt all questions: [{{ count($questionSet->questions) }} X 5 = {{ count($questionSet->questions) * 5 }}]</p>

            <ol type="1">
                @forelse($questionSet->questions as $question)
                <li>
                    <div class="question">
                        {{ $question->question}}({{ $question->weightage }}) <span>[{{ $question->topic->topic }}]</span>

                    </div>
                </li>
                @empty
                <h2>No any questions found!</h2>
                @endforelse
               
            </ol>
        </div>
        
    </div>
</body>

</html>