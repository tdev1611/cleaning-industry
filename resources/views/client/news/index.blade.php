@extends('client.layout')
@section('title', $category ? $category->title : null)
@section('content')
    <style>
        .title {
            color: #000;
            font-size: 25px
        }

        a:hover {
            text-decoration: none;

        }

        a:hover .title {
            color: red;
        }
    </style>
    <main>
        <div class="service">
            <div class="service_title">
                <h1><span>{{ $category ? $category->title : null }}</span></h1>
            </div>
            <div class="box-service">
                <div class="container">
                    <div class="row" id="service">
                        @if (isset($category))
                            @foreach ($category->news as $new)
                                <div class="col-md-6 col-lg-4  mb-4">
                                    <div class="h-100 d-flex flex-column justify-content-between list-news_items blogs_m">
                                        <div class="list_news_item_img blogs_i">
                                            <a href="{{ route('client.news.detail', $new->slug) }}">
                                                <img class="lazy" src="{{ url($new->image) }}" alt="{{ $new->title }}">
                                            </a>
                                        </div>
                                        <a class="mb-auto" href="{{ route('client.news.detail', $new->slug) }}">
                                            <h3 class="title">{{ $new->title }}</h3>
                                        </a>
                                        <p class="webkit-box-3 box-intro-news">
                                            {!! Str::words($new->content, 22, '...') !!}
                                        </p>
                                        <div class="">
                                            <a class="btn__link blog_news_link"
                                                href="{{ route('client.news.detail', $new->slug) }}">
                                                <span style="color: #000; font-weight: 600">Chi Tiết
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
