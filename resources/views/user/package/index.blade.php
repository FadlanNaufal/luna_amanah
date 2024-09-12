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

<section class="section-package">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-2 mb-3 mb-md-0">
                <form action="#">
                    <select name="#" id="" class="form-control">
                        <option value="#"> -- Pilih Kategori --</option>
                        <option value="#">Haji</option>
                        <option value="#">Umrah</option>
                        <option value="#">Muslim Tour</option>
                    </select>
                </form>
            </div>
            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <form action="#">
                    <select name="#" id="" class="form-control">
                        <option value="#"> -- Pilih Sub Kategori --</option>
                        <option value="#">Haji ABC</option>
                        <option value="#">Umrah ABC</option>
                        <option value="#">Muslim Tour ABC</option>
                    </select>
                </form>
            </div>
            <div class="col-12 col-md-3 mb-3 mb-md-0">
                <input type="search" name="" id="" class="form-control" placeholder="Cari nama paket disini...">
            </div>
            <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-search-package">Cari</button>
            </div>
        </div>
        <div class="row mt-5">
                @forelse($package as $item)
                @php
                    $thumbnail = DB::table('package_galleries')->where('package_id', $item->id)->pluck('image')->first();
                    $gallery = DB::table('package_galleries')->where('package_id', $item->id)->pluck('image');
                @endphp
                <div class="col-12 col-md-4">
                   <div class="card-package-item">
                    <div class="img-wrapper">
                        <img src="{{asset('assets/images/gallery-package/'.$thumbnail)}}" alt="">
                    </div>
                    <div class="benefit-wrapper">
                        <div class="package-name">{{$item->name}}</div>
                        <div class="price-wrapper">
                            @if($item->discounted_price == null)
                            <div class="normal-price">{{ 'Rp ' . number_format($item->normal_price, 0, ',', '.') }}</div>
                            <!-- <div class="discount-price">{{ 'Rp ' . number_format($item->discounted_price, 0, ',', '.') }}</div> -->
                            @else
                            <div class="normal-price">{{ 'Rp ' . number_format($item->discounted_price, 0, ',', '.') }}</div>
                            <div class="discount-price">{{ 'Rp ' . number_format($item->normal_price, 0, ',', '.') }}</div>
                            @endif
                        </div>
                        <div class="benefit-item">
                            <div class="icon-wrapper">
                                <img src="{{asset('assets/images/calendar.svg')}}" alt="">
                                <div class="benefit-name">
                                    Jadwal  {{ \Carbon\Carbon::parse($item->departure_date)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($item->return_date)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <div class="icon-wrapper">
                                <img src="{{asset('assets/images/location.svg')}}" alt="">
                                <div class="benefit-name">
                                   Starting {{$item->departure_location}} to {{$item->destination_location}} - {{$item->airline_name}}
                                </div>
                            </div>
                        </div>
                        <a href="{{route('package_detail',$item->id)}}" class="btn btn-block btn-detail">Lihat Detail</a>
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
</section>

@stop