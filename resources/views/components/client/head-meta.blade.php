@isset($setting)
    <title>@yield('title', $setting->title)</title>
    <meta name="author" content="{{ $setting->name }}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="title" content="{{ $setting->title }}">
    <meta name="description" content="{{ $setting->meta_desc }}">
    <meta name="keyword" content="{{ $setting->keyword }}">
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $setting->meta_title }}" />
    <meta property="og:image" content="{{ url($setting->logo) }}" />
    <meta property="og:image:alt" content="{{ $setting->meta_title }}" />
    <meta property="og:site_name" content="{{ $setting->name }}" />
    <meta property="og:description" content="{{ $setting->meta_desc }}" />
    <meta property="fb:app_id" content="1983883078562422" />
    <meta property="fb:page_id" content="2154291581254934" />
    <meta property="og:image:width" content="304" />
    <meta property="og:image:height" content="500" />

    <link rel="shortcut icon" href="{{ url($setting->logo) }}" />
    {{-- <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="google-site-verification" content="b9yJYxAIiaESFgPhOkuyjqx79hEbRTpSYWQ3B9Zr-QE" />
    <meta name='dmca-site-verification' content='bEM1Vm9Cckg0a3JnQ3RBTU5KMHN2SGRNUlRKQk1pWFlodEhqTEhka0pIaz01' /> --}}
@endisset
