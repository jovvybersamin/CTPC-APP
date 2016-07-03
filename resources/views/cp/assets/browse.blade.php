@extends('cp.layout')

@section('content')
	<assets-browser container="{{ $container }}"
					path="{{ $folder }}"
	>
	</assets-browser>
@stop
