<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use Redirect;

use App\User;
use App\Question;
use App\Answer;

use Hash;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.index');
    }

    public function userCreate() {

        return view('admin.create_user');
    }

    public function userRegister(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'conf_password' => 'required|max:255|same:password',
        ]);

        if ($validator->fails()) {
            return Redirect::route('user.create')
                ->withErrors($validator)
                ->withInput();
        }

        User::insert(
            [
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]
        );

        return Redirect::route('admin.index')->with('status', 'Account save');
    }

    public function question() {

        return view('admin.question')->with(['questions' => Question::paginate(15)]);
    }

    public function questionEdit($id) {


        return view('admin.question_edit')->with(
            [
                'question' => Question::find($id),
                'answers' => Answer::where('id_question','=', $id)->get(),
            ]
        );
    }
}
