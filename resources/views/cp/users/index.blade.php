@extends('cp.layout')

@section('content')
	<user-listing inline-template v-cloak>
		<div class="card">
			<div class="head">
				<h1>Users</h1>
				<a href="{{ route('cp.users.create') }}" class="btn btn-primary">Create User</a>
			</div>
			<hr>
			<dossier-table v-if="hasItems" :options="tableOptions"></dossier-table>
		</div>
	</user-listing>
@stop
