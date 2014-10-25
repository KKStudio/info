@extends('admin.template')

@section('header')
    Info
@stop

@section('small')
    information about You and your company
@stop

@section('content')

	{!! Form::open([ 'url' => 'admin/info', 'files' => 'true' ]) !!}

		{!! Form::submit('Edit changes', [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}

		<div class="clearfix"></div>

		<br><br>

		<img src="@if(module('Info')->avatar()) asset('assets/info/' . module('Info')->avatar()) @else http://placehold.it/150x150 @endif" class="img-circle img-thumbnail">
		<br> 

		{!! Form::label('avatar', 'Avatar') !!}

		{!! Form::file('avatar', [ 'class' => 'form-control' ]) !!}

	{!! Form::close() !!}

@stop