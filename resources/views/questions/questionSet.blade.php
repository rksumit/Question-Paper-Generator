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

        <br>
        <div class="pull-left">
            <h2 style="font-size: 25px;"> <b> Generate Question Sets</b></h2>
        </div>
        <br>
    </div>
</div>

<form class="form-horizontal" action="{{ route('questionset.store') }}" method="POST">
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
                        <div class="col-sm-3" id="buttons">
                            <a id="add-input" class="add-input">
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
        let topics = @json($topics);
        // console.log(topics)
        document.getElementById('add-input').addEventListener('click',function () {
            let input = document.createElement('input');
            let req = document.getElementById('container');
            let select = document.createElement('select');
            let bigDiv = document.createElement('div');
            let smallDiv = document.createElement('div');
            select.classList.add('form-control');
            select.setAttribute('name', 'topics[]');
            let option;
            let selects = document.getElementsByName('topics[]');
            // console.log(selects[0].children[0])

            if (topics.length == selects.length) {
                return;
            }
            if(topics.length > 0) {
                topics.forEach(function (topic, index) {
                    let flag = false;
                    for(let i=0; i<selects.length; i++) {
                        if(selects[i].value == topic.id) {
                            flag = true;
                        }
                    }
                    if(!flag) {
                        // console.log(index)
                        if ( select.childElementCount == 0 ) {
                            for(let i=0; i<selects.length; i++) {
                                for (let j=0; j<selects[i].children.length; j++) {
                                    if (selects[i].children[j].innerText == topic.topic) {
                                        selects[i].children[j].remove();
                                    }
                                }
                                // console.log(selects[i].children.length)
                            }
                        }
                        option = document.createElement('option');
                        option.setAttribute('value', topic.id);
                        option.innerText = topic.topic;
                        select.appendChild(option);
                    }
                })

            } else {
                return
            }
            input.setAttribute('type', 'number');
            input.setAttribute('placeholder', 'Enter the weightage in percent of the topic');
            input.setAttribute('name', 'weightage[]');
            input.classList.add('form-control');

            bigDiv.classList.add('col-sm-5');
            bigDiv.appendChild(select);
            bigDiv.style.marginTop = '1rem';
            smallDiv.classList.add('col-sm-4');
            smallDiv.appendChild(input)
            smallDiv.style.marginTop = '1rem';


            req.appendChild(bigDiv);
            req.appendChild(smallDiv);

            let buttons = document.getElementById('buttons');
            if (!document.getElementById('remove-input')) {
                let minus = document.createElement('a')
                minus.setAttribute('id', 'remove-input');
                minus.setAttribute('onClick', 'removeInput()');
                let icon = document.createElement('i');
                icon.classList.add('fas');
                icon.classList.add('fa-minus-circle');
                icon.style.fontSize = '2rem';
                icon.style.color = 'red';
                minus.appendChild(icon);
                buttons.appendChild(minus)
                minus.style.cursor = 'pointer';
            }

        });

        function removeInput() {
            let req = document.getElementById('container');
            let selects = document.getElementsByName('topics[]');

            // console.log(req)
            if (req.childElementCount > 3) {
                req.removeChild(req.lastChild)

                for(let i=0; i<selects.length; i++) {
                    let option =document.createElement('option');
                    option.setAttribute('value', req.lastChild.lastChild.value);
                    option.innerText = req.lastChild.lastChild.innerText;
                    selects[i].appendChild(option);
                }

                req.removeChild(req.lastChild)

                if (req.childElementCount == 3) {
                    document.getElementById('remove-input').remove();
                }
            }
        }

        function insertAfter(newNode, existingNode) {
            existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
        }


        </script>
@endsection
