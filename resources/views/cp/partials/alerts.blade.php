<div class="flashdance">
	@if(session('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>{{ session('success') }}</strong>
		</div>
	@endif


	<app-error inline-template :errors="errors" v-cloak>
		<div class="alert alert-danger alert-dismissible" role="alert" v-if="hasErrors">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<ul>
				<li v-for="error in errors">
					<strong>@{{ error}}</strong>
				</li>
			</ul>
		</div>
	</app-error>

	<app-message inline-template :messages="messages" v-cloak>
		<div class="alert alert-success alert-dismissible" role="alert" v-if="hasMessages">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<ul>
				<li v-for="message in messages">
					<strong>@{{ message }}</strong>
				</li>
			</ul>
		</div>
	</app-message>
</div>
