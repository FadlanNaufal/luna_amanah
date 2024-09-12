@extends('layouts.templateuser')

@section('content')

<section class="section-news-detail">
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="timestamps"> {{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d F Y') }}</div>
                <div class="news-title">
                    {{$news->title}}
                </div>
                <div class="img-wrapper">
                    <img src="{{asset('assets/images/thumbnails/'. $news->image_thumbnail)}}" alt="">
                </div>
                <div class="news-subtitle">
                    {!!$news->content!!}
                </div>
            </div>
        </div>
    </div>
</section>

@stop