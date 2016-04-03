@extends('layouts.master')

@section('content')
    <ul>
        <li><a href="{{ URL::route('user.create') }}">Create user</a></li>
        <li><a href="{{ URL::route('question.create') }}">Create question</a></li>
        <li><a href="{{ URL::route('question.list') }}">Question list</a></li>
    </ul>


    @yield('subcontent')
@stop