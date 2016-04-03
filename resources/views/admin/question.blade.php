@extends('admin.sublayout')

@section('javascript')
    $(function() {

    });
@stop

@section('subcontent')

    <div>
        <ul>
        @foreach ($questions as $question)
            <li>{{ $question->question }} {{HTML::link(URL::route('question.edit', $question->id_question), 'edit')}}</li>
        @endforeach
        </ul>
    </div>

    {{$questions->render()}}
@endsection
