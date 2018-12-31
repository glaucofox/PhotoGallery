@extends('layouts.app')

@section('content')
	@if(count($albums) > 0)
	<div class="ui equal width grid">
		<div class="ui link cards">
				@foreach($albums as $album)
					<div class="four wide column" style="margin-right: 15px; margin-top: 15px;">
						<a href="/album/{{ $album->id }}">
							<div class="ui fluid card">
								<img src="storage/album_covers/{{ $album->cover_image }}" style="max-width: 260px" alt="" >
								<div class="content">
									<div class="header">{{ $album->name }}</div>
									<div class="meta">{{ date('d F, Y', strtotime($album->updated_at)) }}</div>
								</div>
								<div class="extra content">
									<i class="photo icon"></i> {{ count($album->photos) }} photos.
								</div>
							</div>
						</a>
					</div><!-- 4 column wide -->
				@endforeach
		</div><!-- .link cards -->
	</div><!-- .equal width grid -->
		
	@else
		<p>No Albums To Display</p>	
	@endif
@endsection

