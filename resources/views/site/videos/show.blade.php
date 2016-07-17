@extends('site.layout')

@section('title')
  Ctpc.tv - {{ $video['title'] }}
@stop

@section('head.styles')
	<link rel="stylesheet" type="text/css" href="{{ elixir('vendors/css/videojs/all.css') }}">
@stop

@section('content')

	<div class="row">
		<div class="Main col-md-8 col-lg-8">
			<video-app :video="{{ $video }}">
				<template slot="bottom">
					Hello
				</template>
			</video-app>
		</div>

		<div class="Sidebar__right col-md-4 col-lg-4">
			<div class="Videos">
				<div class="Videos__listing Box">

				</div>
			</div>
		</div>
	</div>



@stop

@section('before.scripts')
	<script type="text/javascript" src="{{ elixir('vendors/js/videojs/all.js') }}"></script>
@stop
