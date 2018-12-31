@extends('layouts.app')

@section('content')

	<h1>{{ $album->name }}</h1>
	<a href="/" ><i class="icon left arrow"></i> Go Back</a>&nbsp;&nbsp; |&nbsp;&nbsp;
	<a href="/photos/create/{{ $album->id }}">Upload Photo to Album</a>
	<hr>
	
			
				@if(count($album->photos) > 0)
				<div class="ui equal width grid">
					<div class="ui link cards">
					@foreach($album->photos as $photo)
						<div class="four wide column" style="margin-right: 10px; margin-top: 30px;">
							<a href="/photo/{{ $photo->id }}">
								<div class="ui fluid card">
									<img src="../../storage/photos/{{ $album->id }}/{{ $photo->photo }}" title="{{ str_limit($photo->description) }}" style="max-width: 370px">
									<div class="content">
										<div class="header">{{ $photo->title }}</div>
										<div class="description">{{ str_limit($photo->description, $limit = 50, $end = '...') }}</div>
									</div> <!-- .content -->
								</div> <!-- .fluid card -->
							</a>
						</div><!-- .four wide column -->
					@endforeach
					</div> <!-- .link cards -->
				</div> <!-- .equal width grid -->
				@else
					<br><br><br>
					<p>No photos yet.</p>
				@endif
			
		
@endsection