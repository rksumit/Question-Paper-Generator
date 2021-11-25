@extends('layouts.app')
@section('content')


    <style>
        .content-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.2rem;
        }

        th,
        td {
            text-align: center;
        }

    </style>

    <div class="content-header">
        <div class="pull-left">
            <h2>Subject</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('subjects.create') }}"> Add Subject</a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>

            <tr>

                <th>S.No</th>

                <th>Subject Name</th>

                <th>Subject Code</th>

                <th>Teacher</th>

                <th>Action</th>

            </tr>
        </thead>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->teacher->name }}</td>
                    <td>

                        <a href="{{ url('/subjects/' . $subject->id . '/edit') }}" title="Edit Subject"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        <form method="POST" action="{{ url('/subjects' . '/' . $subject->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Subject"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
