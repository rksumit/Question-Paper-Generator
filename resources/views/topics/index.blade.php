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
            <h2>Topic</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('topics.create') }}"> Add Topic</a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>

            <tr>

                <th>S.No</th>

                <th>Topic</th>

                <th>Hoursallocated</th>

                <th>Subject_id</th>

                <th>Action</th>

            </tr>
        </thead>
        </thead>
        <tbody>
            {{-- {{ dd($topics)}} --}}
            <?php $i = $topics->perPage() * ($topics->currentPage() - 1) ?>
            @foreach ($topics as $topic)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $topic->topic }}</td>
                    <td>{{ $topic->hoursallocated }}</td>
                    <td>{{ $topic->subject }}</td>
                    <td>
                        <a href="{{ url('/topics/' . $topic->id . '/edit') }}" title="Edit topic">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit
                            </button>
                        </a>
                        <a class="btn btn-outline-primary" href="{{ route('questions.create', $topic->id) }}"> Add Question</a>

                        <a href="{{ url('/topics/' . $topic->id . '/questions') }}" title="View Questions">
                            <button class="btn btn-outline-success btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                View questions
                            </button>
                        </a>
                        <form method="POST" action="{{ url('/topics' . '/' . $topic->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete topic"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{ $topics->links() }}

@endsection
