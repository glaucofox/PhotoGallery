@extends('layouts.app')

@section('content')
	<h3>{{ $photo->title }} <br/></h3>
	<p>{{ $photo->description }}</p>

	<a href="/album/{{ $photo->album_id }}" ><i class="icon left arrow"></i> Go Back</a>
	<hr>
	<div class="ui grid">
		<div class="ten wide column">
			<img class="ui centered image" src="../../storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" title="{{ $photo->description }}">
		</div>
		<div class="six wide column">
			<br>
			<br>
			<h4>Photo Info:</h4>
			<div class="ui list">
			  <div class="item"><strong>Title:</strong> {{ $photo->title }}</div>
			  <div class="item"><strong>Date:</strong> {{ date('d F, Y', strtotime($photo->updated_at)) }}</div>
			  <div class="item"><strong>Size:</strong> {{ $photo->size }} kbytes</div>
			  <br>
			  <div class="item"><strong>Description:</strong><br> {{ $photo->description }}</div>
			  <div class="item">
			  	{!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST']) !!}
			  		{{ Form::hidden('_method', 'DELETE') }}
			  		<br>
			  		<a href="/photo/edit/{{ $photo->id }}" class="ui medium button teal">Edit</a>
			  		{{ Form::submit('Delete',['class'=>'ui medium button red'])}}
			  	{!! Form::close() !!}
			  </div>
			</div>
		</div>
	</div>
@endsection