@extends('cp.layout')

@section('content')
	<user-form inline-template v-cloak >
		<form class="" role="form">
			<div class="card" v-if="formReady">
				<div class="head">
					<h1>{{ (isset($user)) ? $user->username : 'Create User' }}</h1>
					<button type="submit" class="btn btn-primary" @click.prevent="save" :disabled="form.user.busy">
						<span v-if="form.user.busy">
							<i class="fa fa fa-spinner fa-spin fa-fw"></i>
							Saving
						</span>
						<span v-else>
							Save
						</span>
					</button>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label for="username" >Username</label>
							<input type="text" class="form-control" name="username" v-model="form.user.data.username">
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						<user-roles inline-template :user-roles.sync="form.user.data.roles" :roles.sync="form.roles">
							<div class="form-group">
								<label>Roles</label>
								<ul>
									<li v-for="role in roles">
										<input type="checkbox"
											   name="roles[]"
											   id="role-@{{ role.id }}"
											   v-model="userRoles"
											   :value="role.id"
											   :checked="selected(role.id)">
										<label v-on:click="select(role)">@{{ role.name }}</label>
									</li>
								</ul>
							</div>
						</user-roles>
					</div>
				</div>

				<div class="row">

					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" name="email" v-model="form.user.data.email">
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" v-model="form.user.data.name">
						</div>
						<div class="form-group">
							<label for="name">About</label>
							<textarea name="about" cols="30" rows="10" class="form-control" v-model="form.user.data.about"></textarea>
						</div>
					</div>
				</div>



			</div>
		</form>
	</user-form>
@stop
