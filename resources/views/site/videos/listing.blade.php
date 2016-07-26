<div class="Videos">
	<div class="Videos__listing Box">
		@foreach ($categories as $category)
			<div class="row">
				<div class="category-header col-md-12">
					<div class="title">
						<h1>
							{{ ($category->description ) ? $category->description : $category->name }}
						</h1>
					</div>

					<div class="actions">
						<a href="{{ route('video.category',$category->slug)}}">View Category</a>
					</div>

				</div>
				@foreach ($category->limitVideos(3) as $video)
					<div class="col-md-4 col-sm-6 col-xs-12">
						<article class="v-block">
							<a href="{{ route('video.watch',$video['slug']) }}" class="block-thumbnail">
								<div class="thumbnail-overlay"></div>
								<span class="play-button"></span>
								<img src="{{ $video['poster'] }}">
								<div class="details">
									<h2>{{ $video['title'] }}</h2>
									<span>{{ $video['duration'] }}</span>
								</div>
							</a>
							<div class="block-contents">
								<p class="date">
									{{ $video['human_published_at'] }}
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
	</div>
</div>


