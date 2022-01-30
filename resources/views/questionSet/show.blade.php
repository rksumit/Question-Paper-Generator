    @extends('layouts.app')
    @section('content')

    <div class="content-header">
<br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('questionset.index') }}"> Back </a>
        </div>
        <br>
        <div class="pull-left">
            <h2 style="text-align: center"> <b> {{ $questionSet->letter }} </b></h2>
        </div>
        <br>
        
    </div>

    <table class="table table-bordered">
        <thead>

            <tr>

                <th>S.No</th>

                <th style="text-align: center">Question</th>

                <th style="text-align: center">Weightage </th>

                <th style="text-align: center">Difficulty</th>

                <th style="text-align: center">Topic</th>

                <th style="text-align: center">Subject</th>


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