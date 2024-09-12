@extends('layouts.templateuser')

@section('content')

<section class="section-news">
    <div class="container">
        <div class="row">
            <div class="col-12">

                @foreach($news as $item)
                <div class="news-item">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="img-wrapper">
                                <img src="{{asset('assets/images/thumbnails/'. $item->image_thumbnail)}}" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="text-wrapper">
                                <div class="timestamps">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                </div>
                                <div class="news-title">
                                    <a href="{{route('news_detail',$item->slug)}}" style="color : black;">
                                        {{$item->title}}
                                    </a>
                                </div>
                                <div class="news-subtitle">
                                    {!!$item->content!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                <div class="text-center">
                    <a href="#" class="btn btn-see-more">Muat Berita</a>
                </div>
            </div>
        </div>
    </div>
</section>

@stop