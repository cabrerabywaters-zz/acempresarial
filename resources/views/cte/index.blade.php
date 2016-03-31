@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                    <form id="my-awesome-dropzone"
                     action="/users/{{Auth::user()->id}}/ctes" class="dropzone">
                     {{ csrf_field()}}
                     </form>
            </div>
        </div>
    </div>
</div>
@endsection