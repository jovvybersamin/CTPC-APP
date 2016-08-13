@extends('cp.layout')

@section('content')
	<business-categories-listing inline-template v-cloak>
		<div class="card">
			<div class="head">
				<h1>Business Categories</h1>
				<a href="{{ route('cp.business.categories.create') }}" class="btn btn-primary">Create Category</a>
			</div>
			<hr>
			<dossier-table v-if="hasItems" :options="tableOptions"></dossier-table>
		</div>
	</business-categories-listing>
@stop
