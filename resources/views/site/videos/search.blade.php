@extends('site.layout')

@section('title')
	{{ $keyword }} in videos on {{ $app_title }}
@stop

@section('content')

	<div class="Videos">
		<div class="Videos__listing Box">

			<div class="Video__search-result row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					@if(count($videos) <= 0)
						<h3>
							No results found for {{ $keyword }}
						</h3>
					@else
						 <h3>
							 {{ $count }} results for {{ $keyword }}
						 </h3>
					@endif
				</div>
			</div>

			@foreach ($videos->chunk(3) as $chunk)
				<div class="row">
					@foreach ($chunk as $video)
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								@include('site.videos.partials.video')
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
