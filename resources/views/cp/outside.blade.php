<!DOCTYPE html>
<html lang="en">
	<head>
		@include('cp.partials.head')
	</head>
	<body id="app" class="outside">

		<div class="container" style="margin-top:60px;">
			<div class="row">


				<div class="box card col-centered">
					@include('cp.partials.flash')

					<div class="wrapper">
						@yield('content')
					</div>

				</div>
			</div>
		</div>


		@include('cp.partials.scripts')

	</body>
</html>
