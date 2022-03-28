@extends('layouts.app')
@section('content')



<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
        </div>

        <br>
        <div class="pull-left">
          <h2 style="font-size: 25px;" > <b> Edit Questions</b></h2>
      </div>
      <br>
    </div>
</div>

<form class="form-horizontal" action="{{ route('questions.update', $question->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
      <div class="shadow p-3 mb-5 bg-white rounded">

      <div class="card-body">
        <div class="form-group">
            {{-- <input type="hidden" name="id" id="id" value="{{$question->id}}" id="id" /> --}}
          <label class="control-label col-sm-3" for="enterquestions"><b>Enter the Questions</b></label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="question" id="enterquestions" value="{{$question->question}}" required>
        </div>
        </div>
        @if($errors->has('question'))
        <div class="alert alert-danger">{{ $errors->first('question') }}</div>
    @endif


        <div class="form-group">
            <label class="control-label col-sm-3" for="Questionset"><b>Topic</b></label>
            <div class="col-sm-5">
        <select class="form-control form-control-lg" name="topic_id" id="Questionset">
            @forelse ($topics as $topic)
                <option value="{{ $topic->id }}" {{ ($topic->id == $question->topic_id)? 'selected': '' }}>{{ $topic->topic }}</option>
            @empty
                <option value=""> No any topics Added </option>
            @endforelse
          </select>
        </div>
        </div>
        @if($errors->has('topic'))
        <div class="alert alert-danger">{{ $errors->first('topic') }}</div>
    @endif

        <div class="form-group">
            <label class="control-label col-sm-3" for="difficulty_level"><b>Difficulty Level</b></label>
            <div class="col-sm-5">
        <select class="form-control form-control-lg" name="difficulty_level" id="Questionset">
            <option value="easy" {{ ( $question->difficulty_level == 'easy')? 'selected': '' }}>Easy</option>
            <option value="normal" {{ ( $question->difficulty_level == 'normal')? 'selected': '' }}>Normal</option>
            <option value="hard" {{ ( $question->difficulty_level == 'hard')? 'selected': '' }}>Hard</option>
          </select>
        </div>
        </div>
        @if($errors->has('difficulty_level'))
        <div class="alert alert-danger">{{ $errors->first('difficulty_level') }}</div>
    @endif

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
