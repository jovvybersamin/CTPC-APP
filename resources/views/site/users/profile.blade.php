@extends('site.layout')

@section('title')
		{{ $user->name }} on Ctpc.tv
@stop

@section('content')
	<div class="container">
		<div class="row Card">
			<article>
				<div class="row">
					<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
						<div class="block">
							<header>
								<h1>
									{{ $user->name }}
								</h1>
								<dl class="inline_block_list user_meta">
									<dt>Joined</dt>
									<dd >
										<time>{{ $user->joined() }}</time>
									</dd>
								</dl>
							</header>
							<section class="user_portraits">
								<img class="img-responsive portrait" src="{{ $user->avatar() }}" alt="Profile picture for {{ $user->name }}">
							</section>
							<section class="user_bio">
								<p>
									{{  $user->aboutN2lbr() }}
								</p>
							</section>
							<section class="user_categories">
								<ul class="user-tags tags">
									@foreach($user->categories as $category)
										<li class="tag">{{ $category->name }}</li>
									@endforeach
								</ul>
							</section>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
						<div class="block">
							<header>
								<h2>
									Videos
								</h2>
							</header>
							<section class="User__videos">
								@if(count($user->videos) > 0)
								@foreach($user->videos->chunk(2) as $chunk)
									<div class="row">
										@foreach($chunk as $video)
										<div class="col-md-6 col-sm-6 col-xs-12">
											@include('site.users.partials.video')
										</div>
										@endforeach
									</div>
								@endforeach
								@else
									<h1>
										Sorry, no uploaded videos for this user.
									</h1>
								@endif
							</section>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
@stop
