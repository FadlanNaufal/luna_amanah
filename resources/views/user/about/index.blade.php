@extends('layouts.templateuser')

@section('content')

<style>
  
    .about-banner .carousel-item img {
        width: 100%;
        height: 600px;
        object-fit: cover;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #000; /* Customize arrow color */
    }

    .carousel-indicators li {
        background-color: #bbb; /* Non-active color */
    }

    .carousel-indicators .active {
        background-color: #ff0000; /* Active indicator color */
    }
</style>

<section class="about-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="aboutBannerCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach($banners as $key => $banner)
                            <li data-target="#aboutBannerCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach($banners as $key => $banner)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('assets/images/banner/' . $banner->image) }}" alt="Banner {{ $key + 1 }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#aboutBannerCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#aboutBannerCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-about-us">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">Tentang Kami</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
               <div class="iframe-wrapper">
                <iframe src="{{$about->embed_youtube_link}}" 
                            title="YouTube video player" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                    </iframe>
               </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                {!!$about->content!!}
            </div>
        </div>

    </div>
</section>

@stop