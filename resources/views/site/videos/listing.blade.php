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
				@foreach ($category->limitVideos() as $video)
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<article class="Video__box">
							<a href="{{ route('video.watch',$video->slug) }}">
								<section class="Video__thumbnail">
									<div class="thumbnail-overlay"></div>
									<span class="play-button"></span>
									<img src="{{ $video->poster}}" class="img-responsive">
									<div class="Video__details">
										<h2 class="Video__title">{{ $video->title }}</h2>
										<span class="Video__duration">{{ $video->duration }}</span>
									</div>
								</section>
							</a>
						</article>
						<div class="Video__metas">
							<div>
								<a href="{{ $video->publisher->profileUrl() }}" class="Video__user_portrait">
									<img src="{{ $video->publisher->avatar() }}">
								</a>
								<div class="Video__user-content">
									<a href="{{ $video->publisher->profileUrl() }}">
										{{ $video->publisher->name }}
									</a>
									<span class="user-item">
										<span>
											{{ $video->numberOfViews() }} views
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
	</div>
</div>


