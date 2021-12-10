@extends('layouts.app')
@section('content')

<style>
    .add-input {
        color: #333;
    }

    .add-input:hover {
        color: #2f80ed;
        cursor: pointer;
    }
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Generate Question Set</h2>
        </div>
    </div>
</div>

<form class="form-horizontal" action="{{ route('topics.store') }}" method="POST">
    @csrf

    <div class="card">
        <div class="shadow p-3 mb-5 bg-white rounded">

            <div class="card-body">
                <div class="form-group">
                    {{-- <input type="hidden" name="id" id="id" value="{{$subejct->id}}" id="id" /> --}}
                    <label class="control-label col-sm-3" for="entertopics"><b> Name </b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="entertopics"
                            value="{{ old('name') ? old('name') : '' }}" >
                    </div>
                </div>
                @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
                <div class="form-group mb-3">
                    <label class="control-label col-sm-3" for="topics"><b>Topic</b></label>
                    <div class="row" id="container">
                        <div class="col-sm-5">
                            <select name="topics[]" id="topics" class="form-control">
                                @forelse ($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                                @empty
                                    <option value="">No Topics Added. Please add a topic</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" placeholder="Enter the weightage in percent of the topic" name="weightage[]">
                        </div>
                        <div class="col-sm-3">
                            <a onclick="addInput()" class="add-input">
                            <i class="fas fa-plus-circle" style="font-size: 2rem"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @if($errors->has('topics'))
                <div class="alert alert-danger">{{ $errors->first('topics') }}</div>
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

</form>


@endsection

@section('scripts')
    <script>
        function addInput() {
            var input = document.createElement('input');
            var req = document.getElementById('requirements');
            input.setAttribute('type', 'text');
            input.setAttribute('placeholder', 'Enter Document Required');
            input.setAttribute('name', 'requirements[]');
            input.classList.add('form-control');
            input.classList.add('req');
            input.classList.add('mt-2');
            insertAfter(input, req)

            if(el.style.display == 'none') {
                el.style.display = 'block'
            }
        }

        function removeInput() {
            let req = document.getElementsByClassName('req');
            if ( req ) {
                let len = req.length;
                req[len-1].remove();
            }
            if(req.length === 0) {
                el.style.display = 'none';
            }
        }

        function insertAfter(newNode, existingNode) {
            existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
        }
@endsection
