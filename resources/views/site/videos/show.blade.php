@extends('site.layout')
@section('title')
  Ctpc.tv - {{ $video['title'] }}
@stop

@section('content')

	<div class="video-bg">
		<div class="container">
			<div class="video-container">
				<video id="example_video_1" class="video-js vjs-default-skin vjs-controls-enabled vjs-has-started vjs-paused vjs-user-inactive" controls preload="none" width="100%" height="100%" poster="{{ $video['image_cover'] }}" data-setup="{}">
				    <source src="{{ $video['source'] }}" type="video/mp4">
		<!-- 		    <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
				    <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg"> -->
				    <track kind="captions" src="../shared/example-captions.vtt" srclang="en" label="English"></track>
				    <!-- Tracks need an ending tag thanks to IE9 -->
				    <track kind="subtitles" src="../shared/example-captions.vtt" srclang="en" label="English"></track>
				    <!-- Tracks need an ending tag thanks to IE9 -->
				    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that
				    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
				 </video>
			</div>

			<div class="video-details">
				<h3>
					{{ $video['title'] }}
				</h3>
				<hr>
				<div class="video-details-container">
					<p>
						{{ $video['description'] }}
					</p>
				</div>
			</div>

			<hr>

			<div class="video-listing">
				<h3>
					Related Videos
				</h3>
				@include('site.videos.listing')
			</div>

		</div>



	</div>

@stop
