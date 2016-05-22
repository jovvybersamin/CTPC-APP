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
		<li class="section">CONFIGURE</li>
		<li class="nav-users root has-sub">
			<a href="#" title="Users" >
				<span class="title">Users</span>
				<span class="icon icon-chevron-left pull-right"></span>
			</a>
			<ul>
				<li>
					<a href="#">All Users</a>
				</li>
				<li>
					<a href="#">Add New User</a>
				</li>
			</ul>
		</li>
		<li class="nav-users root has-sub">
			<a href="#" title="Users" >
				<span class="title">Users</span>
				<span class="icon icon-chevron-left pull-right"></span>
			</a>
			<ul>
				<li>
					<a href="#">All Users</a>
				</li>
				<li>
					<a href="#">Add New User</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>
