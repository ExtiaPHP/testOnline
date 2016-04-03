@extends('admin.sublayout')

@section('javascript')
    $(function() {
        $('#button').click(function() {
            document.form_user.submit();
        });
    });
@stop

@section('subcontent')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div>
        {{Form::open(array('route' => 'user.register', 'name' => 'form_user'))}}
        <div>
            Email : {{Form::text('email', null, ['id' => 'email'])}}
        </div>
        <div>
            Password : {{Form::password('password', null, ['id' => 'password'])}}
        </div>
        <div>
            Confirm Password : {{Form::password('conf_password', null, ['id' => 'conf_password'])}}
        </div>
        <div>
            Role : {{Form::select('role', ['guest' => 'guest', 'admin' => 'admin'], 'guest', ['id' => 'role'])}}
        </div>

        <div id="button">
            Validate
        </div>
        {{ Form::close() }}
    </div>
@endsection
