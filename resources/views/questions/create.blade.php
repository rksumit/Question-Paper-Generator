@extends('layouts.app')
@section('content')

<div class="col d-flex justify-content-center">
    <div class="card" style="width: 50rem;">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <br>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
                </div>

                <br>
                <div class="pull-left">
                  <h2 style="font-size: 25px;"> <b>  Add Questions</b></h2>
              </div>
              <br>
            </div>
        </div>
   <form class="form-horizontal" action="{{ route('questions.store') }}" method="POST">
    @csrf
    <div class="card">
      <div class="shadow p-3 mb-5 bg-white rounded">

      <div class="card-body">
        <div class="form-group">
          <label class="control-label col-sm-3" for="enterquestions"><b>Enter the Questions</b></label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="question" id="enterquestions" >
        </div>
        </div><br>
        @if($errors->has('question'))
        <div class="alert alert-danger">{{ $errors->first('question') }}</div>
    @endif
        <div class="form-group">
          <label class="control-label col-sm-3" for="weightage"><b>Weightage</b></label>
          <div class="col-sm-5">
          <input type="number" class="form-control" name="weightage" id="weightage" >
        </div>
        </div><br>
        @if($errors->has('weightage'))
        <div class="alert alert-danger">{{ $errors->first('weightage') }}</div>
    @endif
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
            <label class="control-label col-sm-3" for="Questionset"><b>Topic</b></label>
            <div class="col-sm-5">
        <select class="form-control form-control-lg" name="topic" id="Questionset">
            @forelse ($topics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->topic }}</option>

            @empty
                <option value=""> No any topics Added </option>
            @endforelse
          </select>
        </div>
        </div><br>
        @if($errors->has('topic'))
        <div class="alert alert-danger">{{ $errors->first('topic') }}</div>
    @endif

        <div class="form-group">
            <label class="control-label col-sm-3" for="difficulty_level"><b>Difficulty Level</b></label>
            <div class="col-sm-5">
        <select class="form-control form-control-lg" name="difficulty_level" id="Questionset">
            <option value="easy">Easy</option>
            <option value="normal">Normal</option>
            <option value="hard">Hard</option>
          </select>
        </div>
        </div><br>
        @if($errors->has('difficulty_level'))
        <div class="alert alert-danger">{{ $errors->first('difficulty_level') }}</div>
    @endif
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
