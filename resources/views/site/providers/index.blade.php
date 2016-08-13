@extends('site.layout')

@section('content')
	<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					  <h1 class="page-header">Discount Providers</h1>
				</div>
			</div>

			@foreach($providers->chunk(3) as $chunk)
				<div class="row">
					@foreach($chunk as $provider)
			            <div class="col-md-4 text-center provider">
			                <div class="thumbnail">
			                    <img class="img-responsive" src="{{ $provider->avatar() }}" alt="">
			                    <div class="caption">
			                        <h3>
			                        	<a href="{{ $provider->profileUrl() }}">
				                        	{{ $provider->name }}
			                        	</a>
			                        	<br>
			                            @include('site.providers.partials.categories')
			                        </h3>
			                        <p>
			                        	{{ $provider->aboutLimited() }}
			                        </p>
			                    </div>
			                </div>
			            </div>
					@endforeach
				</div>
			@endforeach
	</div>
@stop
