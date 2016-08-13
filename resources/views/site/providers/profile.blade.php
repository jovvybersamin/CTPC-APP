@extends('site.layout')

@section('content')
	<div class="container">
		<div class="row Card">
			<article>
				<div class="row">
					<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
						<div class="block">
							<header>
								<h1>
									{{ $provider->name }}
								</h1>
								<dl class="inline_block_list user_meta">
									<dt>Joined</dt>
									<dd >
										<time>{{ $provider->joined() }}</time>
									</dd>
								</dl>
							</header>
							<section class="user_portraits">
								<img class="img-responsive portrait" src="{{ $provider->avatar() }}" alt="Profile picture for {{ $provider->name }}">
							</section>
						</div>
					</div>
					<div class="col-lg-9 col-md-12 col-xs-12 col-sm-12">

					</div>
				</div>
			</article>
		</div>
	</div>
@stop
