@extends('layouts.app')
@section('content')

<div class="content-header">

{{--    <div class="pull-right">--}}
{{--        <a class="btn btn-success" href="{{ route('questionset.create') }}"> Generate New Question Set </a>--}}
{{--    </div>--}}
<br>
    <div class="pull-left">
        <h2 style="font-size: 25px; text-align:center;"> <b> All Question Sets </b> </h2>
    </div>
    <br>
</div>

<table class="table table-bordered">
    <thead>

        <tr>

            <th style="text-align: center">S.No</th>

            <th style="text-align: center">Name</th>

            <th style="text-align: center">Total Number of questions </th>

            <th style="text-align: center">Subject</th>
            <th style="text-align: center">Actions</th>


        </tr>
    </thead>
    </thead>
    <tbody>
        @forelse ($questionSets as $questionSet)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $questionSet->letter }}</td>
                <td class="text-center">{{ $questionSet->no_of_questions }}</td>
                <td class="text-center">{{ $questionSet->subject }}</td>
                <td class="text-center">
                    <a href="{{ route('questionset.show', $questionSet->id) }}" class="btn btn-primary"> View Question Set </a>
                    <a href="{{ route('questionset.print', $questionSet->id) }}" class="btn btn-outline-success"> Download Pdf </a>
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
