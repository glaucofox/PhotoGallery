@extends('layouts.app')

@section('content')

	<h3>Edit Photo</h3>
	<hr>
	<img class="ui centered image" src="../../storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" title="{{ $photo->description }}"><br>	
	<div class="ui form">
	{!! Form::open(['action' =>  ['PhotosController@update', $photo->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="field">
			{{ Form::text('title', $photo->title, ['placeholder' => 'Photo Title']) }}
		</div>
		<div class="field">
			{{ Form::textarea('description', $photo->description, ['placeholder' => 'Photo Description']) }}
		</div>
		{{ Form::hidden('_method', 'PUT') }}
		{{ Form::submit('Update',['class'=>'ui button teal'])}}
	{!! Form::close() !!}

	</div>

@endsection