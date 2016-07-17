@extends('cp.layout')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="card flush">
				<div class="head">
					<h1>Recent Entries in Videos</h1>
				</div>
				<div class="card-body">
					<table class="control">
						<tbody>
							@foreach ($videos as $video)
							<tr>
								<td>
									<a href="{{ route('cp.videos.edit',$video['id']) }}">
										{{ $video['title'] }}
									</a>
								</td>
								<td>
									{{ $video['human_created_at'] }}
								</td>
								<td class="text-center">
									<a href="">
										<span class="icon icon-eye"></span>
									</a>
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card flush">
				<div class="head">
					<h1>Recent Entries in Users</h1>
				</div>
				<div class="card-body">
					<table class="control">
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>
										<a href="{{ route('cp.users.edit', $user['username']) }}">
											{{ $user['name'] }}
										</a>
									</td>
									<td>
										{{ $user['human_created_at'] }}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@stop
