@extends('admin.template')

@section('header')
    Info
@stop

@section('small')
    information about You and your company
@stop

@section('content')

	<div class=""> 

	<p class="text-muted">Themes can use this data to display information about You. When you're ready save changes anytime you want.</p>

	{!! Form::open([ 'url' => 'admin/info', 'files' => 'true' ]) !!}

		{!! Form::submit('Save changes', [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}

		<div class="clearfix"></div>

		<br><br>

		<div class="centered" style="text-align: center; ">

		<img src="{{ m('Info')->getAvatar() }}" class="img-circle centered" style="width: 150px; height: 150px; margin: 0px auto;">
		<br> 

		</div>

		<h3>{!! Form::label('avatar', 'Avatar') !!}</h3>

		{!! Form::file('avatar', [ 'class' => 'form-control' ]) !!}

		<h3>{!! Form::label('header', 'Header text') !!}</h3>

		{!! Form::textarea('header', module('Info')->header(), [ 'class' => 'form-control input-lg', 'rows' => 1 ]) !!}

		<h3>{!! Form::label('about', 'About text') !!}</h3>

		{!! Form::textarea('about', module('Info')->about(), [ 'class' => 'form-control input-lg', 'rows' => 3 ]) !!}

		<h3>{!! Form::label('title', 'Page title') !!}</h3>

		{!! Form::textarea('title', module('Info')->title(), [ 'class' => 'form-control input-lg', 'rows' => 1 ]) !!}

		<h3>{!! Form::label('address', 'Your address') !!} <small>optional</small></h3>

		{!! Form::textarea('address', module('Info')->address(), [ 'class' => 'form-control input-lg', 'rows' => 3 ]) !!}

	{!! Form::close() !!}

	</div>

@stop
