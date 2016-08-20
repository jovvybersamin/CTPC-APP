@extends('site.layout')


@section('title')
 	{{ $app_title }}
@stop

@section('content')
	<div class="container">
		<div class="row Card">
			<div class="col-md-12" style="text-align: center;">
				<div class="error_container">
					<h1 class="error_code">404</h1>
					<h2 class="error_title">Page not found</h2>
					<p class="error_description">
						The page you were looking for appears to have been moved, deleted or does not exist
					</p>
					<a href="//{{ env('APP_URL') }}" class="btn btn-primary">Back to home</a>
				</div>
			</div>
		</div>
	</div>

@stop
