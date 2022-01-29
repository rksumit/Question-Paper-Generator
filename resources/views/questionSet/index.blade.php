@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="pull-left">
        <h2> All Question Sets </h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('questionset.create') }}"> Generate New Question Set </a>
    </div>
</div>

<table class="table table-bordered">
    <thead>

        <tr>

            <th>S.No</th>

            <th>Name</th>

            <th>Total Number of questions </th>

            <th>Topics</th>

            <th>Subject</th>
            <th>View Question</th>


        </tr>
    </thead>
    </thead>
    <tbody>
        @forelse ($questionSets as $questionSet)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $questionSet->letter }}</td>
                <td class="text-center">{{ count($questionSet->questions) }}</td>
                <td class="text-center">{{ $questionSet->questions[0]->topic->topic }}</td>
                <td class="text-center">{{ $questionSet->questions[0]->topic->subject->name }}</td>
                <td class="text-center">
                    <a href="{{ route('questionset.show', $questionSet->id) }}" class="btn btn-primary"> View Question Set </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6"> No any Question Sets Generated </td>
            </tr>
        @endforelse
    </tbody>
</table>


@endsection