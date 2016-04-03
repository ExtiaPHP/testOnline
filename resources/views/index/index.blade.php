@extends('layouts.master')

@section('javascript')
    $(function() {

        $('#button').click(function() {
            $.ajax({
                url : "{{route('questions.next')}}",
                type : 'POST',
                data : "question="+$('#question_id').val()+"&answer="+$('#answer_list').find('li input:radio:checked').data('id'),
                success : function(response){
                    $('#question').html(response.question);
                    $('#question_id').val(response.question_id);

                    $('#answers').html('');

                    var s = '<ul id="answer_list">';
                    $.each(response.answers, function(key, value) {
                        s += "<li><input data-id='"+key+"' name='ans' type='radio' value='"+value+"'> "+value+"</li>";
                    });
                    s += "</ul>";

                    $('#answers').html(s);

                    if(response.end == 1) {
                        document.location="/questions/end";
                    }
                }
            });
        });

        ts = (new Date()).getTime() + ({{$time}}*1000);

        $('#countdown').countdown({
            timestamp	: ts,
            callback	: function(days, hours, minutes, seconds){
                if(seconds == 0 && minutes == 0) {
                    document.location="/questions/end";
                }

            }
        });



    });
@stop


@section('content')
    <div>
        {{Form::hidden('question', $questions['id'], ['id' => 'question_id'])}}
        <div id="question">
            {{$questions['question']}}
        </div>

        <div id="answers">
            <ul id="answer_list">
            @foreach($answers as $id => $a)
                <li>{{ Form::radio('ans', $a, null, ['data-id' => $id])  }} {{$a}}</li>
            @endforeach
            </ul>
        </div>
    </div>

    <div id="button">
        NEXT
    </div>
@stop