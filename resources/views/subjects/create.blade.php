@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Subject</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form class="form-horizontal" action="{{ route('subjects.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="shadow p-3 mb-5 bg-white rounded">

                <div class="card-body">
                    <div class="form-group">
                        {{-- <input type="hidden" name="id" id="id" value="{{$subejct->id}}" id="id" /> --}}
                        <label class="control-label col-sm-3" for="entersubjects"><b> Name</b></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="entersubjects"
                                value="{{ old('name') ? old('name') : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="code"><b>Subject Code</b></label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="code" id="code"
                                value="{{ old('code') ? old('code') : '' }}" required>
                        </div>
                    </div>
                    {{-- <div class="form-group">
            <label class="control-label col-sm-3" for="Questionset"><b>Subject</b></label>
            <div class="col-sm-5">
        <select class="form-control form-control-lg" name="subject" id="Questionset">
            @forelse ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>

            @empty
                <option value=""> No any Subjects Added </option>
            @endforelse
          </select>
        </div>
        </div> --}}

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="Questionset"><b>Teacher</b></label>
                        <div class="col-sm-5">
                            <select class="form-control form-control-lg" name="teacher_id" id="Questionset">
                                @forelse ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">
                                        {{ $teacher->name }}
                                    </option>
                                @empty
                                    <option value=""> No any teachers Added </option>
                                @endforelse
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

        </div>
        </div>
        </div>
    </form>
@endsection