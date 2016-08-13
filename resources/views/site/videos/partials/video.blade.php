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
