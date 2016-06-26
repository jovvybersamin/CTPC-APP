@extends('cp.layout')

@section('content')

	<video-listing inline-template v-cloak>
		<div class="card">
			<div class="head">
				<h1>Videos</h1>
				<a href="{{ route('cp.videos.create') }}" class="btn btn-primary">Create Video</a>
			</div>
			<hr>
			<dossier-table v-if="hasItems" :options="tableOptions"></dossier-table>
		</div>
	</video-listing>

@stop
