@extends('layouts.app')

@section('content')

	<h3>Create Album</h3>
	<div class="ui form">
	{!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="field">
			{{ Form::text('name', '', ['placeholder' => 'Album Name']) }}
		</div>
		<div class="field">
			{{ Form::textarea('description', '', ['placeholder' => 'Album Description']) }}
		</div>
		<div class="field">
			{{ Form::file('cover_image') }}
		</div>
		{{ Form::submit('Submit',['class'=>'ui button primary'])}}
	{!! Form::close() !!}
	</div>

@endsection