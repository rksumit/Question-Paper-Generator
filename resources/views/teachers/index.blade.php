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

                <th>Teacher Name</th>

                <th>Address </th>

                <th>Qualification</th>

                <th>Experience</th>

                <th>Mobile Number</th>

                <th>Action</th>

            </tr>
        </thead>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>{{ $teacher->qualification }}</td>
                    <td>{{ $teacher->experience }}</td>
                    <td>{{ $teacher->mobilenumber }}</td>
                    <td>

                        <a href="{{ url('/teachers/' . $teacher->id . '/edit') }}" title="Edit Teacher"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        <form method="POST" action="{{ url('/teachers' . '/' . $teacher->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
