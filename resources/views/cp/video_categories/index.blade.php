@extends('cp.layout')

@section('content')
	<video-category-listing inline-template v-cloak>

		<div class="card">
			<div class="head">
				<h1>Video Categories</h1>
				<a href="{{ route('cp.videos.categories.create') }}" class="btn btn-primary">Create Category</a>
			</div>
			<hr>
			<dossier-table v-if="hasItems" :options="tableOptions"></dossier-table>
		</div>

	</video-category-listing>
@stop
