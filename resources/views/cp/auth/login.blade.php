@extends('cp.outside')

@section('content')

	<form method="post">

		{!! csrf_field() !!}

		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
		</div>


		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" id="password">
		</div>

		<div class="form-group">
			<input type="checkbox" class="form-control" name="remeber">
			<label for="checkbox" class="normal">Remember me</label>
		</div>

		 <div class="">
		 	<button type="submit" class="btn btn-outside btn-primary btn-block">Login</button>
         </div>
	</form>

@stop
