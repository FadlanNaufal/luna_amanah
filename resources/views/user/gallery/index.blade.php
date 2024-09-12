@extends('layouts.templateuser')

@section('content')

<style>
    .section-header .carousel-item img {
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

<section class="section-header">
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

<section class="section-gallery">
    <div class="container">
        <div class="row">
           <div class="col-12">
            <!-- TAB -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="haji-tab" data-toggle="tab" href="#haji" role="tab" aria-controls="haji" aria-selected="true">Haji</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="umrah-tab" data-toggle="tab" href="#umrah" role="tab" aria-controls="umrah" aria-selected="false">Umrah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ramadhan-tab" data-toggle="tab" href="#ramadhan" role="tab" aria-controls="ramadhan" aria-selected="false">Ramadhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="muslimtour-tab" data-toggle="tab" href="#muslimtour" role="tab" aria-controls="muslimtour" aria-selected="false">Muslim Tour</a>
                </li>
            </ul>

            <!-- CONTENT -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="haji" role="tabpanel" aria-labelledby="haji-tab">
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Haji Plus</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($haji_plus as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Haji Furoda</div>
                            </div>
                        </div>
                        <div class="row">
                        @forelse ($haji_furoda as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse    
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="umrah" role="tabpanel" aria-labelledby="umrah-tab">
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Umrah Plus Aqsha</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($umrah_aqsha as $item)
                                <div class="col-12 col-md-3">
                                    <div class="gallery-item">
                                        <div class="img-wrapper">
                                        <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="text-center">
                                        <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                        <div class="empty-title">Belum ada foto</div>
                                    </div>
                                </div>
                                @endforelse
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Umrah Plus Andalusia</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($umrah_andalusia as $item)
                                <div class="col-12 col-md-3">
                                    <div class="gallery-item">
                                        <div class="img-wrapper">
                                        <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="text-center">
                                        <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                        <div class="empty-title">Belum ada foto</div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Umrah Plus Dubai</div>
                            </div>
                        </div>
                        <div class="row">
                        @forelse ($umrah_dubai as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Umrah Plus Turki</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($umrah_turki as $item)
                                <div class="col-12 col-md-3">
                                    <div class="gallery-item">
                                        <div class="img-wrapper">
                                        <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="text-center">
                                        <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                        <div class="empty-title">Belum ada foto</div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Umrah Plus Eropa</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($umrah_eropa as $item)
                                <div class="col-12 col-md-3">
                                    <div class="gallery-item">
                                        <div class="img-wrapper">
                                        <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="text-center">
                                        <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                        <div class="empty-title">Belum ada foto</div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="ramadhan" role="tabpanel" aria-labelledby="ramadhan-tab">
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Badal Haji</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($badal_haji as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Badal Umrah</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($badal_umrah as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="muslimtour" role="tabpanel" aria-labelledby="muslimtour-tab">
                    
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Muslim Tour Turki</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($muslim_turki as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Muslim Tour Eropa</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($muslim_eropa as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Muslim Tour Dubai</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($muslim_dubai as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>


                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-gallery">Muslim Tour Andalusia</div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($muslim_andalusia as $item)
                            <div class="col-12 col-md-3">
                                <div class="gallery-item">
                                    <div class="img-wrapper">
                                    <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/empty.svg')}}" alt="" width="300">
                                    <div class="empty-title">Belum ada foto</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
           </div>
        </div>
    </div>
</section>

@stop