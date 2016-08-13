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
