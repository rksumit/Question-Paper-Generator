@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('topics.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form class="form-horizontal" action="{{ route('topics.update', $topic->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="shadow p-3 mb-5 bg-white rounded">

                <div class="card-body">
                    <div class="form-group">
                        {{-- <input type="hidden" name="id" id="id" value="{{$subejct->id}}" id="id" /> --}}
                        <label class="control-label col-sm-3" for="entertopics"><b>topic</b></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="topic" id="entertopics"
                                value="{{ $topic->topic }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="hoursallocated"><b>Hoursallocated</b></label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="hoursallocated" id="hoursallocated"
                                value="{{ $topic->hoursallocated }}" required>
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
                        <label class="control-label col-sm-3" for="Questionset"><b>Subject</b></label>
                        <div class="col-sm-5">
                            <select class="form-control form-control-lg" name="subjects_id" id="Questionset">
                                @forelse ($subjects as $subjects)
                                    <option value="{{ $subjects->id }}">
                                        {{ $subjects->name }}
                                    </option>
                                @empty
                                    <option value=""> No any subjects Edited </option>
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
