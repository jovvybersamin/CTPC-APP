@extends('site.layout')

@section('title')
  Ctpc.tv - Home
@stop

@section('content')


  <!-- Header Carousel -->

      <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill">
                    <img src="assets/images/bg_1.jpg" alt="Flower" width="1400" height="450">
                </div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill">
                    <img src="assets/images/bg_2.jpg" alt="Flower" width="1400" height="450">
                </div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill">
                    <img src="assets/images/bg_3.jpg" alt="Flower" width="1400" height="450">
                </div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

		<div class="home-content">
			<h3>Checkout our Latest Videos Below</h3>
			@include('site.videos.listing')
		</div>

  <hr>

         <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>
@stop
