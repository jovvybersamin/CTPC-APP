<nav class="nav-mobile">
	<a href="#" class="logi">

	</a>

	<a href="" class='toggle' @click.prevent="toggleNav">
		<span class="icon icon-menu"></span>
	</a>

</nav>

<nav class="nav-main">
	<div class="head">
		<a href="#">
			LOGO
		</a>
	</div>
	<ul>

		<li class="nav-dashboard {{ request()->is('cp') ? 'visible active' : '' }}">
			<a href="" title="Dashboard">
				<span class="title">Dashboard</span>
			</a>
		</li>
		<li class="section">CONTENT</li>
		<li class="nav-videos root has-sub">
			<a href="#" title="Videos" >
				<span class="title">Videos</span>
				<span class="icon icon-chevron-left pull-right"></span>
			</a>
			<ul>
				<li>
					<a href="#">All Videos</a>
				</li>
				<li>
					<a href="#">Add New Videos</a>
				</li>
				<li class="{{ nav_is_active('cp.videos.categories.index') }}">
					<a href="{{ route('cp.videos.categories.index') }}">Categories</a>
				</li>
			</ul>
		</li>
		<li class="section">CONFIGURE</li>
		<li class="nav-users root has-sub {{ nav_is_active('cp.users.*') }}">
			<a href="#" title="Users" >
				<span class="title">Users</span>
				<span class="icon icon-chevron-left pull-right"></span>
			</a>
			<ul class="{{ nav_is_active('cp.users.*','nav_open') }}">
				<li class="{{ nav_is_active('cp.users.index')}}">
					<a href="{{ route('cp.users.index') }}">All Users</a>
				</li>
				<li class="{{ nav_is_active('cp.users.create') }}">
					<a href="{{ route('cp.users.create') }}">Add New User</a>
				</li>
			</ul>
		</li>

	</ul>
	<div class="foot">
		<a href="{{ route('cp.account') }}" class="account">
			My Account
		</a>
		<a href="{{ route('cp.auth.logout') }}" class="logout">
			Logout
		</a>
	</div>
</nav>
