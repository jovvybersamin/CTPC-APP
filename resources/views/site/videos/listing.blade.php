

@foreach ($videos->chunk(3) as $chunk)
	<div class="row">
		@foreach ($chunk as $video)
			<div class="col-md-4 col-sm-6 col-xs-12">
				<article class="v-block">
					<a href="{{ route('video.show',$video['id']) }}" class="block-thumbnail">
						<div class="thumbnail-overlay"></div>
						<span class="play-button"></span>
						<img src="{{ $video['image_cover'] }}">
						<div class="details">
							<h2>{{ $video['title'] }}</h2>
							<span>{{ $video['duration'] }}</span>
						</div>
					</a>
					<div class="block-contents">
						<p class="date">
							{{ $video['human_created_at'] }}
						</p>
						<p class="desc">
							{{ $video['short_description'] }}
						</p>
					</div>
				</article>
			</div>
		@endforeach
	</div>
@endforeach
