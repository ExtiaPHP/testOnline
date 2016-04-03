<?php

namespace App\Http\Controllers;

use Request;
use Redirect;

use App\Question;
use App\Answer;
use App\User;

use Session;
use Response;
use Auth;
use Hash;

class IndexController extends Controller
{
    public function auth() {
        Auth::logout();

        return view('index.auth');
    }

    public function authCheck() {


        Auth::attempt(['email' => Request::get('email'), 'password' => Request::get('password')]);

        if(Auth::check() == null) {
            return Redirect::route('auth')->with('status', 'Bad account');
        }else{

            $r = Auth::user();

            if($r->email == 'admin') {
                return Redirect::route('admin.index');
            }
            
            $d = new \DateTime();
            $r->started_at = $d->format('Y-m-d H:i:s');

            if($r->ended_at === null) {
                $all = round(Question::count()/3,0) * 60;

                $d->modify("+".$all." second");
                $r->ended_at = $d->format('Y-m-d H:i:s');

            }
            $r->save();


            return Redirect::route('question.init');
        }
    }

    public function index()
    {
        $u = Auth::user();

        if(Session::has('results') === false) {
            Session::put('results', []);
            $c = 0;
        }else{
            $c = count(Session::get('results'));

        }

        $all = Question::count();
        $questions = Question::skip($c)->limit($all)->get()->lists('questions_id')->toArray();

        Session::put('questions', $questions);

        $r = $this->nextQuestion();

        $interval = $this->getInterval($u->started_at, $u->ended_at);

        return view('index.index',
            [
                'questions' => $r,
                'answers' => Answer::where('id_question','=', $r['id'])->get()->lists('answer', 'id_answer'),
                'time' => $interval
            ]
        );
    }

    protected function nextQuestion() {
        $r = Session::get('questions');
        $s = array_shift($r);

        Session::put('questions', $r);

        return $s;
    }

    public function next() {
        $this->result(Request::all());

        $u = Auth::user();

        $interval = $this->getInterval($u->started_at, $u->ended_at);

        $s = $this->nextQuestion();

        if($interval <= 0) {
            $end = 1;
            return Response::json(['question' => $s['question'], 'question_id' => $s['id'], 'answers' => Answer::where('id_question','=', $s['id'])->get()->lists('answer', 'id_answer'), 'end' => $end]);
        }

        $end = 0;
        if($s == null)
            $end = 1;

        return Response::json(['question' => $s['question'], 'question_id' => $s['id'], 'answers' => Answer::where('id_question','=', $s['id'])->get()->lists('answer', 'id_answer'), 'end' => $end]);
    }

    protected function result($res) {
        if(Session::has('results')) {
            $r = Session::get('results');
        }

        $r[] = ['id_question' => $res['question'], 'answer' => $res['answer']];

        Session::put('results', $r);
    }

    public function end() {
        $res = Session::get('results');

        $resp = [];
        foreach($res as $r) {
            $t = Question::find($r['id_question']);
            $a = Answer::find($r['answer']);
            if($t !== null && $a !== null)
                $resp[] = [
                    'question' => $t->question,
                    'question_id' => $t->id_question,
                    'answer' => $a->answer
                ];
        }

        //TODO envois de mail

        return view('index.end', ['results' => $resp ]);
    }

    protected function getInterval($start, $end) {
        $datetime1 = new \DateTime($start);
        $datetime2 = new \DateTime($end);

        return $datetime2->getTimestamp() - $datetime1->getTimestamp();
    }
}
