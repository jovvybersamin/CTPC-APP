<!DOCTYPE html>
<html>
	<head>
		@include('site.partials.head')
	</head>
	<body id="app" :class="{'nav-visible' : navVisible }">

		@include('site.partials.nav-main')

		<div class="content">

			@include('site.partials.alerts')

			<div class="page-wrapper">

				@yield('content')

			</div>

		</div>


		@yield('footer-scripts')
	</body>
</html>
