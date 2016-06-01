@extends('cp.layout')

@section('content')

	<user-listing inline-template v-cloak>
		<div class="card">

			<div class="head">
				<h1>Users</h1>
			</div>

			<hr>

			<dossier-table  :columns.sync="columns" :items.sync="items" :options="tableOptions"></dossier-table>

		</div>
	</user-listing>

@stop
