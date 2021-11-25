@extends('layouts.layout')
@section('content')



<div class="card bg-dark text-black">
    <img src="{{asset('img/bg.png')}}" alt="">
    <div class="card-img-overlay">
      <div class="col d-flex justify-content-center">
    <div class="card" style="width: 50rem;">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add Questions</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
                </div>
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
          <input type="text" class="form-control" name="question" id="enterquestions" required>
        </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="weightage"><b>Weightage</b></label>
          <div class="col-sm-5">
          <input type="number" class="form-control" name="weightage" id="weightage" required>
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
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="difficultylevel"><b>Difficulty Level</b></label>
            <div class="col-sm-5">
        <select class="form-control form-control-lg" name="difficulty_level" id="Questionset">
            <option value="easy">Easy</option>
            <option value="normal">Normal</option>
            <option value="hard">Hard</option>
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