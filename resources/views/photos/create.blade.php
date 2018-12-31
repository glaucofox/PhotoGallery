@extends('layouts.app')

@section('content')

	<h3>Upload Photo</h3>
	<div class="ui form">
	{!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="field">
			{{ Form::text('title', '', ['placeholder' => 'Photo Title']) }}
		</div>
		<div class="field">
			{{ Form::textarea('description', '', ['placeholder' => 'Photo Description']) }}
		</div>
		<div class="field">
			{{ Form::file('photo') }}
		</div>
		{{ Form::hidden('album_id', $album_id) }}
		{{ Form::submit('Submit',['class'=>'ui button primary'])}}
	{!! Form::close() !!}
	</div>

@endsection