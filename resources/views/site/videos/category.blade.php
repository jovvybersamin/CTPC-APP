@extends('site.layout')

@section('title')
	{{ $category->name }} videos on {{ $app_title }}
@stop

@section('content')

	<div class="Videos">
		<div class="Videos__listing Box">

			<div class="Category__header">
				<h1>
					{{ $category->name }}
				</h1>
			</div>

			@foreach ($videos->chunk(3) as $chunk)
				<div class="row">
					@foreach ($chunk as $video)
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
										{{ $video['published_at'] }}
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

			<div class="Videos__pagination">
				{!! $videos->render() !!}
			</div>
		</div>
	</div>

@stop
