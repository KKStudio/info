@extends('admin.template')

@section('content')

	<div class=""> 

	<div class="clearfix"></div> 

	{!! Form::open([ 'url' => 'admin/info', 'files' => 'true' ]) !!}

		{!! Form::submit('Zapisz zmiany', [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}

		<div class="clearfix"></div>

		<div class="col-sm-6">

			<h3>{!! Form::label('avatar', 'Logo') !!}</h3>

			<div class="fileinput fileinput-new" data-provides="fileinput">
			  <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
			    <img src="{{ m('Info')->getAvatar() }}" >
			  </div>
			  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
			  <div>
			    <span class="btn btn-default btn-file">
				    <span class="fileinput-new">Wybierz zdjęcie</span>
				    <span class="fileinput-exists">Zmień</span>		    
				    {!! Form::file('avatar', [ 'class' => 'form-control' ]) !!}
				    </span>
			    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Usuń</a>
			  </div>
			</div>

		</div>

		<div class="col-sm-6">

		<h3>{!! Form::label('cover', 'Zdjęcie w tle') !!} <small>Niektóre szablony mogą używać tego zdjęcia.</small></h3>

		<div class="fileinput fileinput-new" data-provides="fileinput">
		  <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
		    <img src="{{ m('Info')->getCover() }}" >
		  </div>
		  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
		  <div>
		    <span class="btn btn-default btn-file">
			    <span class="fileinput-new">Wybierz zdjęcie</span>
			    <span class="fileinput-exists">Zmień</span>		    
			    {!! Form::file('cover', [ 'class' => 'form-control' ]) !!}
			    </span>
		    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Usuń</a>
		  </div>
		</div>

		</div>

		<div class="clearfix"></div>		

		<h3>{!! Form::label('name', 'Nazwa / Nazwisko') !!}</h3>

		{!! Form::text('name', module('Info')->name(), [ 'class' => 'form-control input-lg', 'rows' => 1 ]) !!}

		<h3>{!! Form::label('header', 'Nagłówek') !!}</h3>

		{!! Form::textarea('header', module('Info')->header(), [ 'class' => 'simple-editor form-control input-lg', 'rows' => 1 ]) !!}

		<h3>{!! Form::label('about', 'O firmie / O mnie') !!}</h3>

		{!! Form::textarea('about', module('Info')->about(), [ 'class' => 'simple-editor form-control input-lg', 'rows' => 3 ]) !!}

		<h3>{!! Form::label('title', 'Tytuł strony') !!}</h3>

		{!! Form::textarea('title', module('Info')->title(), [ 'class' => 'form-control input-lg', 'rows' => 1 ]) !!}

		<h3>{!! Form::label('address', 'Adres') !!} <small>opcjonalne</small></h3>

		{!! Form::textarea('address', module('Info')->address(), [ 'class' => 'form-control input-lg', 'rows' => 3 ]) !!}

		<h3>{!! Form::label('footer', 'Tekst w stopce') !!} <small>niektóre szablony mogą użyć tego tekstu na dole strony</small></h3>

		{!! Form::textarea('footer', module('Info')->footer(), [ 'class' => 'simple-editor form-control input-lg', 'rows' => 3 ]) !!}

		<br>
		{!! Form::submit('Zapisz zmiany', [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}

	{!! Form::close() !!}

		<br><br>

	</div>

@stop
