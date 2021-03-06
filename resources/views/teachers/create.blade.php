@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teachers.index') }}"> Back</a>
            </div>
            <br>
            <div class="pull-left">
                <h1 style="font-size: 25px"> <b> Create Teacher</b> </h1>
            </div>
            <br>
            
        </div>
    </div>

    <form class="form-horizontal" action="{{ route('teachers.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="shadow p-3 mb-5 bg-white rounded">

                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="enterteachername"><b> Name</b></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="enterteachername"
                                value="{{ old('name') ? old('name') : '' }}" >
                        </div>
                    </div>
                    @if($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="address"><b>Address</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ old('address') ? old('address') : '' }}" >
                        </div>

                    </div>
                    @if($errors->has('address'))
                    <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                @endif


                <div class="form-group">
                    <label class="control-label col-sm-3" for="qualification"><b>Qualification</b></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="qualification" id="qualification"
                            value="{{ old('qualification') ? old('qualification') : '' }}" >
                    </div>

                </div>
                @if($errors->has('qualification'))
                <div class="alert alert-danger">{{ $errors->first('qualification') }}</div>
            @endif

            <div class="form-group">
                <label class="control-label col-sm-3" for="experience"><b>Experience</b></label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="experience" id="experience"
                        value="{{ old('experience') ? old('experience') : '' }}" >
                </div>

            </div>
            @if($errors->has('experience'))
            <div class="alert alert-danger">{{ $errors->first('experience') }}</div>
        @endif

        <div class="form-group">
            <label class="control-label col-sm-3" for="phone"><b>Mobile Number</b></label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="phone" id="phone"
                    value="{{ old('phone') ? old('phone') : '' }}" >
            </div>

        </div>
        @if($errors->has('phone'))
        <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
    @endif

    <div class="form-group">
        <label class="control-label col-sm-3" for="email"><b>Email</b></label>
        <div class="col-sm-5">
            <input type="email" class="form-control" name="email" id="email"
                value="{{ old('email') ? old('email') : '' }}" >
        </div>

    </div>
    @if($errors->has('email'))
    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
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