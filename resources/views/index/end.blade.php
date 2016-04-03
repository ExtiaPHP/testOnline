@extends('layouts.master')

@section('javascript')

@stop


@section('content')
    <div>
        @foreach($results as $p)
            <div>
                <div>
                    Question {{$p['question_id']}} : {{$p['question']}}
                </div>
                <div>
                    Réponse : {{$p['answer']}}
                </div>
            </div>
        @endforeach
    </div>


@stop