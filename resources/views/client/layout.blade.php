<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    {{-- <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn"> --}}
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,user-scalable=yes" />
    {{-- meta --}}
    <x-client.head-meta />
    {{-- meta --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('client/style/assets/home.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/style/assets/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/style/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/style/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('client/style/css/slide.css') }}">
    {{-- logo --}}
    <x-client.head-logo />

    {{-- logo --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="{{ asset('client/style/assets/script.min.js') }}" data-render="LPTech.Asia"></script>


    {{-- alert --}}


    <meta name="msapplication-TileColor" content="#ffffff">

    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <x-client.body-header />

    <main>
        @yield('content')
    </main>
    <footer>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="footerLogo">
                            <img class="lazy" src=""
                                data-src="http://localhost/clean-industry/public/uploads/news/tin-tuctin-tuctin-tuc-1695469889.jpg"
                                alt="icon logo 1" data-pagespeed-url-hash="2013785254" />
                        </div>
                        <p>
                        </p>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <p>DỊCH VỤ</p>
                        <p class="head_footer"></p>
                        <ul>

                            <x-client.footer-service />
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-2">
                        <p>TIN MỚI</p>
                        <p class="head_footer"></p>
                        <ul itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                            <li itemprop="name">
                                <a itemprop="url" href="tin-cong-ty.html" title="Tin Công Ty">
                                    Tin Công Ty
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <p>THÔNG TIN LIÊN HỆ</p>
                        <p class="head_footer"></p>
                        <div class="footer_intro_bottom">
                            <x-client.footer-contact-info />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ab-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-6">
                        <p>Giấy phép kinh,....</p>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <p>
                            Copyright ©
                            2023

                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>




    <script src="{{ asset('client/themes/vscn-2020/assets/vendors/slick.js') }}"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')

    <script>
        // testimonialHome();
        bannerProject();
    </script>




</body>


</html>
