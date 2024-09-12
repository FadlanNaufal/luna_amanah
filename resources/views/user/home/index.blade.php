@extends('layouts.templateuser')

@section('content')

<style>
        /* Ubah warna arrow carousel */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5); /* Background color of arrows */
            border-radius: 50%; /* Optional: make arrows circular */
        }

        .carousel-control-prev-icon {
            background-image: url('path/to/your/prev-icon.svg'); /* Replace with your custom previous arrow icon */
        }

        .carousel-control-next-icon {
            background-image: url('path/to/your/next-icon.svg'); /* Replace with your custom next arrow icon */
        }

        /* Ubah warna indikator active dan unactive */
        .carousel-indicators {
            margin-bottom: -20px;
        }

        .carousel-indicators li {
            background-color: rgba(0, 0, 0, 0.5); /* Unactive indicator color */
        }

        .carousel-indicators .active {
            background-color: #FF0000; /* Active indicator color */
        }

        /* Indikator non-aktif (default) */
        .carousel-indicators.custom-indicators li {
            background-color: #6c757d; /* Ganti dengan warna non-aktif yang diinginkan */
        }

        /* Indikator aktif */
        .carousel-indicators.custom-indicators .active {
            background-color: #FF0000; /* Ganti dengan warna aktif yang diinginkan */
        }

    </style>

    <section class="section-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="img-wrapper">
                        <img src="{{asset('assets/images/banner.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-package">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">Ragam Paket dengan Harga Rasional & Kompetitif</div>
                </div>
            </div>
            <div class="row">
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

    <section class="section-usp">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">Alasan Memilih Luna Amanah</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card-usp">
                        <div class="img-wrapper">
                            <img src="{{asset('assets/images/usp.png')}}" alt="">
                        </div>
                        <div class="usp-name">Terdaftar resmi, menjamin legalitas perjalanan aman.</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-usp">
                        <div class="img-wrapper">
                            <img src="{{asset('assets/images/usp.png')}}" alt="">
                        </div>
                        <div class="usp-name">Amanah sesuai kesepakatan, terpercaya tanpa gagal.</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-usp">
                        <div class="img-wrapper">
                            <img src="{{asset('assets/images/usp.png')}}" alt="">
                        </div>
                        <div class="usp-name">Bimbingan ibadah profesional untuk kenyamanan ibadah.</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-usp">
                        <div class="img-wrapper">
                            <img src="{{asset('assets/images/usp.png')}}" alt="">
                        </div>
                        <div class="usp-name">Fasilitas premium dan nyaman selama di sana.</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-usp">
                        <div class="img-wrapper">
                            <img src="{{asset('assets/images/usp.png')}}" alt="">
                        </div>
                        <div class="usp-name">Pelayanan transparan, tanpa biaya tambahan tersembunyi.</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-usp">
                        <div class="img-wrapper">
                            <img src="{{asset('assets/images/usp.png')}}" alt="">
                        </div>
                        <div class="usp-name">Tidak pernah gagal berangkat, terbukti amanah.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">Apa Kata Mereka</div>
                </div>
            </div>
            <div class="row">
        <div class="col-12">
            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach ($testimonis->chunk(3) as $index => $chunk)
                        <li data-target="#testimonialCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach ($testimonis->chunk(3) as $index => $chunk)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $testimoni)
                                    <div class="col-12 col-md-4">
                                        <div class="card-testimonial">
                                            <div class="username">{{ $testimoni->name }}</div>        
                                            <div class="user-package">{{ $testimoni->package_name }}</div>
                                            <div class="star-wrapper">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <img src="{{ asset('assets/images/star.svg') }}" alt="" width="20" {{ $i <= $testimoni->rating ? 'class=active' : '' }}>
                                                @endfor
                                            </div>
                                            <div class="desc">
                                                "{!! $testimoni->content !!}"
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Left and right controls -->
                <!-- <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> -->
            </div>
        </div>
    </div>
        </div>
    </section>


    <section class="section-news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">Berita Terbaru</div>
                </div>
            </div>
            <div class="row">
                @foreach($news as $item)
                <div class="col-12 col-md-4">
                    <div class="card-news">
                        <div class="img-wrapper">
                            <img src="{{asset('assets/images/thumbnails/'. $item->image_thumbnail)}}" alt="">
                        </div>
                        <div class="timestamps">
                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                        </div>
                    <div class="news-title">
                        <a href="{{route('news_detail',$item->slug)}}" style="color : black;">
                            {{$item->title}}
                        </a>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-certificate">
        <div class="container">
            <div class="row">
                <div class="title-center">Sertifikasi & Keanggotaan</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="customLogoCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                        <ol class="carousel-indicators custom-indicators">
                            @foreach ($logos->chunk(6) as $index => $chunk)
                                <li data-target="#customLogoCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($logos->chunk(6) as $index => $chunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach ($chunk as $logo)
                                            <div class="col-12 col-md-2">
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('assets/images/logos/' . $logo->image) }}" alt="{{ $logo->name }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@stop