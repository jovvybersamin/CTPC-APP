
<!DOCTYPE html>
<html lang="en">
	<head>
		@include('cp.partials.head')
	</head>
	<body id="app" :class="{'nav-visible': navVisible }">

		@include('cp.partials.nav-main')

		<div class="content">
			<div class="cp-head">
				<a href="" target="_blank" class="view" v-cloak>
					<span class="icon icon-eye"></span>View Site
				</a>
			</div>

			<div class="page-wrapper">

				@yield('content')

			</div>
		</div>

		@include('cp.partials.scripts')

	</body>
</html>
