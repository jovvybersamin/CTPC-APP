@extends('cp.layout')

@section('content')

	<user-listing inline-template v-cloak>
		<div class="card">

			<div class="head">
				<h1>Users</h1>
				<a href="" class="btn btn-primary">Create User</a>
			</div>

			<hr>

			<dossier-table  :columns.sync="columns" :items.sync="items" :options="tableOptions" :search.sync="search"></dossier-table>

		</div>
	</user-listing>

@stop
