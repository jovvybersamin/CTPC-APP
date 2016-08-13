@extends('cp.layout')

@section('content')
	<user-form inline-template v-cloak >
		<form class="" role="form">
			<div class="card" v-if="formReady">
				<div class="head">
					<h1>@{{ headerTitle }}</h1>
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
				<div class="row" v-if="form.user.data.id">
					<div class="col-lg-12 col-md-12">
						<avatar id="profile"
								name="profile"
								:profile.sync="form.user.data.profile"
								:user="form.user.data.id"
								class="form-control">
						</avatar>
					</div>
				</div>

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
							<label for="password">Password</label>
							<small v-if="form.user.data.id">Leave empty to keep your original password</small>
							<input type="password" class="form-control" name="password" v-model="form.user.data.password">
						</div>

						<div class="form-group">
							<label for="password">Confirm Password</label>
							<small v-if="form.user.data.id">Leave empty to keep your original password</small>
							<input type="password" class="form-control" name="password" v-model="form.user.data.password_confirmation">
						</div>

						<div class="row">
							<user-categories inline-template :user-categories.sync="form.user.data.categories" :categories.sync="form.categories">
								<div class="col-lg-6 col-md-6">
									<table class="dossier select-categories">
										<thead>
											<th>
												Available Business Categories
											</th>
										</thead>
										<tbody>
											<tr v-for="category in categories">
												<td >
													<a href="#" @click.prevent="addCategory(category)">
														<div >
															@{{ category.name }}
														</div>
													</a>
												</td>
											</tr>
											<tr  v-if="!hasCategories">
												<td>
													No Business Categories to assign.
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-lg-6 col-md-6">
									<table class="dossier select-categories">
										<thead>
											<th>
												User Business Categories
											</th>
										</thead>
										<tbody>
											<tr v-for="category in userCategories" >
												<td >
													<a href="#" @click.prevent="removeCategory(category)">
														<div >
															@{{ category.name }}
														</div>
													</a>
												</td>
											</tr>
											<tr v-if="!hasUserCategories">
												<td>
													No Assigned Business Categories for this user.
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</user-categories>
						</div>

						<div class="form-group" style="margin-top:40px;">
							<label for="name">About</label>
							<textarea name="about" cols="30" rows="10" class="form-control" v-model="form.user.data.about"></textarea>
						</div>
					</div>
				</div>



			</div>
		</form>
	</user-form>
@stop
