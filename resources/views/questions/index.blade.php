@extends('layouts.layout')
@section('content')


<style>
    .content-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1.2rem;
    }
</style>

<div class="content-header">
    <div class="pull-left">
    <h2>Questions</h2>
    </div>
    <div class="pull-right">
    <a class="btn btn-success" href="{{ route('questions.create') }}"> Add Question</a>
    </div>
</div>

<table class="table table-bordered">
    <thead>

    <tr>

        <th>S.No</th>

        <th>Question</th>

        <th>Question Weightage</th>

        <th>Chapter</th>

        <th>Difficulty level</th>

        <th width="280px">Action</th>

    </tr>
    </thead>
</thead>
<tbody>
@foreach($questions as $question)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $question->question }}</td>
        <td>{{ $question->weightage }}</td>
        <td>{{ $question->topic->topic }}</td>
        <td>{{ $question->difficulty_level }}</td>
        <td>

            <a href="{{ url('/questions/' . $question->id . '/edit') }}" title="Edit Question"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
            <form method="POST" action="{{ url('/questions' . '/' . $question->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Question" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>
</table>


@endsection