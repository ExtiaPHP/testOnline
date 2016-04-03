@extends('admin.sublayout')

@section('javascript')
    $(function() {

    });
@stop

@section('subcontent')
    {{Form::open(array('route' => 'question.register', 'name' => 'form_question'))}}
    <div>
        Question : {{Form::text('quextion', $question->question, ['id' => 'question'])}}
    </div>
    <div>
        Point : {{Form::text('point', $question->point, ['id' => 'point'])}}
    </div>

    <div>Answer</div>
    @foreach($answers as $ans)
    <div>
        Answer : {{Form::text('answer', $ans->answer)}}
    </div>
    <div>
        Flag good : {{Form::select('flag', ['0' => 'Non', '1' => 'Oui'], $ans->flag_good)}}
    </div>
    @endforeach

    <div id="button">
        Validate
    </div>
    {{ Form::close() }}
@endsection
