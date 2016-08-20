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
                    <img src="assets/images/bg1.jpg" alt="" width="1400" height="450">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption--meta_data">
                        <header class="title">
                            Sample Header
                        </header>
                        <div class="by">
                            <span class="by__right">
                                    <span class="by__spacer">from</span>
                                    <a href="#" class="primary-link">
                                        Barbeque First Shot.
                                    </a>
                            </span>

                        </div>
                        <p class="description">
                            See the beaches of the world in this spectacularly fun surf film.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="fill">
                    <img src="assets/images/bg2.jpg" alt="" width="1400" height="450">
                </div>
                <div class="carousel-caption">
                        <div class="carousel-caption--meta_data">
                        <header class="title">
                            Sample Header
                        </header>
                        <div class="by">
                            <span class="by__right">
                                    <span class="by__spacer">from</span>
                                    <a href="#" class="primary-link">
                                        Barbeque First Shot.
                                    </a>
                            </span>

                        </div>
                        <p class="description">
                            See the beaches of the world in this spectacularly fun surf film.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="fill">
                    <img src="assets/images/bg3.jpg" alt="" width="1400" height="450">
                </div>
                <div class="carousel-caption">
                        <div class="carousel-caption--meta_data">
                        <header class="title">
                            Sample Header
                        </header>
                        <div class="by">
                            <span class="by__right">
                                    <span class="by__spacer">from</span>
                                    <a href="#" class="primary-link">
                                        Barbeque First Shot.
                                    </a>
                            </span>

                        </div>
                        <p class="description">
                            See the beaches of the world in this spectacularly fun surf film.
                        </p>
                    </div>
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
		@include('site.videos.listing')
	</div>


@stop
