@extends('layouts.templateuser')

@section('content')

<section class="section-package-detail">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('package')}}">Paket</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$package->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                @php
                    $packageGalleries = DB::table('package_galleries')->where('package_id', $package->id)->get(); 
                @endphp
                <div class="img-wrapper mb-3 mb-md-0">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($packageGalleries as $index => $gallery)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($packageGalleries as $index => $gallery)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('assets/images/gallery-package/' . $gallery->image) }}" class="d-block w-100" alt="Gallery Image">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6">
                <div class="text-wrapper">
                    <div class="name">{{$package->name}}</div>
                    <div class="price-wrapper">
                        @if($package->discounted_price == null)
                        <div class="normal-price">{{ 'Rp ' . number_format($package->normal_price, 0, ',', '.') }}</div>
                        <!-- <div class="discount-price">{{ 'Rp ' . number_format($package->discounted_price, 0, ',', '.') }}</div> -->
                        @else
                        <div class="normal-price">{{ 'Rp ' . number_format($package->discounted_price, 0, ',', '.') }}</div>
                        <div class="discount-price">{{ 'Rp ' . number_format($package->normal_price, 0, ',', '.') }}</div>
                        @endif
                    </div>
                    <div class="icon-wrapper mb-2">
                        <img src="{{asset('assets/images/location.svg')}}" alt="">
                        <div class="benefit-name">
                        Starting {{$package->departure_location}} to {{$package->destination_location}} - {{$package->airline_name}}
                        </div>
                    </div>
                    <div class="icon-wrapper mb-4">
                        <img src="{{asset('assets/images/calendar.svg')}}" alt="">
                        <div class="benefit-name">
                        Jadwal  {{ \Carbon\Carbon::parse($package->departure_date)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($package->return_date)->translatedFormat('d F Y') }}
                        </div>
                    </div>
                    <div class="desc">{!!$package->description!!}</div>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="include-tab" data-toggle="tab" href="#include" role="tab" aria-controls="include" aria-selected="false">Termasuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="exclude-tab" data-toggle="tab" href="#exclude" role="tab" aria-controls="exclude" aria-selected="false">Belum Termasuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="itinerary-tab" data-toggle="tab" href="#itinerary" role="tab" aria-controls="itinerary" aria-selected="false">Rundown Acara</a>
                    </li>
                </ul>
                @php
                    $packageIncludes = DB::table('package_includes')->where('package_id', $package->id)->first(); 
                    $packageExcludes = DB::table('package_excludes')->where('package_id', $package->id)->first(); 
                    $packageItineraries = DB::table('package_itineraries')->where('package_id', $package->id)->first(); 
                @endphp

                <!-- Tab panes -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane active" id="include" role="tabpanel" aria-labelledby="include-tab">
                        <div class="p-3">
                            {!! $packageIncludes->include_item !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="exclude" role="tabpanel" aria-labelledby="exclude-tab">
                        <div class="p-3">
                        {!! $packageExcludes->exclude_item !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
                        <div class="p-3">
                        {!!$packageItineraries->itinerary_desc!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop