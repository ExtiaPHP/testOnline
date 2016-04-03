@extends('layouts.master')

@section('javascript')
    $(function() {
        $('#button').click(function() {
            document.form.submit();
        });
    });
@stop


@section('content')
    <div>
        {{Form::open(array('route' => 'auth.check', 'name' => 'form'))}}
        <div>
            Email : {{Form::text('email', null, ['id' => 'email'])}}
        </div>
        <div>
            Password : {{Form::password('password', null, ['id' => 'password'])}}
        </div>

        <div id="button">
            Validate
        </div>
        {{ Form::close() }}
    </div>


@stop