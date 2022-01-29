    @extends('layouts.app')
    @section('content')

    <div class="content-header">
        <div class="pull-left">
            <h2>{{ $questionSet->letter }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('questionset.index') }}"> Back </a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>

            <tr>

                <th>S.No</th>

                <th>Question</th>

                <th>Weightage </th>

                <th>Difficulty</th>

                <th>Topic</th>

                <th>Subject</th>


            </tr>
        </thead>
        </thead>
        <tbody>
            @foreach ($questionSet->questions as $question)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $question->question }}</td>
                    <td class="text-center">{{ $question->weightage }}</td>
                    <td class="text-center">{{ $question->difficulty_level }}</td>
                    <td class="text-center">{{ $question->topic->topic }}</td>
                    <td class="text-center">{{ $question->topic->subject->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    @endsection