@extends('cp.layout')

@section('content')

	<video-form inline-template v-cloak>
		<form role="form">


			<div class="card">
				<div class="head">
					<h1>@{{ headerTitle }}</h1>
					<div class="controls">
						<div class="status">
							<label>Published</label>
							<field-toggle name="status" :data.sync="form.video.data.status"></field-toggle>
						</div>
						<div class="featured">
							<label>Featured</label>
							<field-toggle name="featured" :data.sync="form.video.data.featured"></field-toggle>
						</div>
						<div class="btn-group">
							<button type="submit" class="btn btn-primary" @click.prevent="save" :disabled="form.video.busy">
								<span v-if="form.video.busy">
									<i class="fa fa fa-spinner fa-spin fa-fw"></i>
									Saving
								</span>
								<span v-else>
									Save
								</span>
							</button>
						</div>
					</div>
				</div>
				<hr>
				<div class="publish-meta">
					<div class="form-group title-field">
						<label for="title" class="block">Title</label>
						<input type="text"
							   placeholder="New Video"
							   v-model="form.video.data.title"
						>
					</div>

					<div class="form-group equal">
						<label for="short_description">Short Description</label>
						<input type="text"
							placeholder="Short Description"
							class="form-control"
							v-model="form.video.data.short_description"
						>
					</div>

					<div class="form-group equal">
						<label for="description">Description</label>
						<textarea class="form-control"
								 v-model="form.video.data.description"
						>
						</textarea>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="publish-meta">
					<div class="form-group equal">
						<label>Video Image Cover</label>
						<input type="text"
							class="form-control"
							placeholder="Select the image cover"
							v-model="form.video.data.image_cover"
						>
					</div>

					<div class="form-group equal">
						<label>Video Source</label>
						<input type="text"
							class="form-control"
							placeholder="Select the video"
							v-model="form.video.data.source"
						>
					</div>

					<div class="form-group equal">
						<label>Duration</label>
						<small>Enter the video duration in the following format (Hours : Minutes : Seconds)</small>
						<input type="text"
							   class="form-control"
							   placeholder="Enter the duration"
							   v-model="form.video.data.duration">
					</div>

					<div class="form-group equal">
						<label>Category</label>
						<field-select2
							default-text="Select a Category"
							name="category"
							key="id"
							value="name"
							:selected.sync="form.video.data.category_id"
							:options="form.categories"
						>
						</field-select2>
					</div>

					<div class="form-group equal">
						<label>Uploader</label>
						<small>Select the user who upload or requested the video.</small>
						<field-select2
							default-text="Select a Uploader / Requestor"
							name="uploader"
							key="id"
							value="name"
							:selected.sync="form.video.data.uploaded_by"
							:options="form.users"
						>
						</field-select2>
					</div>
				</div>
			</div>

		</form>
	</video-form>

@stop

@section('footer-scripts')

@stop
