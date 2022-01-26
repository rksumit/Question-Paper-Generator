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
        <h2>Users</h2>
    </div>

</div>

<table class="table table-bordered">
    <thead>

        <tr>

            <th>S.No</th>

            <th>Name</th>

            <th>Email</th>


        </tr>
    </thead>
    </thead>
    <tbody>
        {{-- {{ dd($topics)}} --}}
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
