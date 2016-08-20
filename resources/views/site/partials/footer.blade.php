<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
          		<a href="/" class="logo"><img src="/logo/logo.png" class="img-responsive"></img></a>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
					<a href="http://facebook.com/" class="facebook social-link"><i class="fa fa-facebook"></i></a>
					<a href="http://twitter.com" class="twitter social-link"><i class="fa fa-twitter"></i></a>
					<a href="http://plus.google.com" class="google social-link"><i class="fa fa-google-plus"></i></a>
					<div class="clear"></div>
				</div>
				<div class="col-md-3">
					<h4>Video Categories</h4>
					<ul>
	                    @foreach ($categories as $category)
	                        <li>
	                            <a href="{{ route('video.category',$category['slug'])}}">
	                                {{ $category['name'] }}
	                            </a>
	                        </li>
	                    @endforeach
					</ul>
				</div>

				<div class="col-md-2">
					<h4>Links</h4>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><a href="{{ route('about') }}">About</a></li>
						<li><a href="{{ route('contact') }}">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer_auxiliary">
			<div class="container">
				<div class="row">
					<div class="footer_auxiliary-content">
						TM + © 2016 OneStop Tourism, Inc. All rights reserved.
					</div>
				</div>
			</div>

		</div>
	</footer>
