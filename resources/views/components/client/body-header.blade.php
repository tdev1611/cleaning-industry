<header>
    <div class="sticky-top head">
        <div class="container container-sm container-lg">
            <div class="row">
                <div class="d-none d-lg-block col-md-2 col-lg-2">
                    <div class="logo_web">
                        <a href="{{ route('home') }}">
                            <img src="" alt="logo header 1" data-pagespeed-url-hash="4270396041" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-lg-8 px-lg-0">
                    <div class="menu_main">
                        <nav class="navbar navbar-expand-lg navbar-dark p-lg-0">
                            <a class="d-lg-none" href="{{ route('home') }}" style="width: 25%;">
                                <img src="" alt="logo header 2" data-pagespeed-url-hash="4270396041" />
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                                <ul class="nav navbar-nav headMenu">
                                    <li class="nav-item menu_item {{ request()->is('/') ? 'active' : '' }}">
                                        <a class="nav-link sub-link" data-toggle="" href="{{ route('home') }}"
                                            title="Trang chủ">
                                            Trang chủ
                                        </a>
                                    </li>
                                    @if (isset($introduce))
                                        <li
                                            class="nav-item menu_item  {{ preg_match('/^gioi-thieu\b/', request()->path()) ? 'active' : '' }}">
                                            <a class="nav-link sub-link" data-toggle=""
                                                href="{{ route('client.introduce.index', $introduce->slug) }}"
                                                title="Giới thiệu">
                                                Giới thiệu
                                            </a>
                                        </li>
                                    @endif

                                    <li
                                        class="nav-item dropdown menu_item  {{ preg_match('/^dich-vu\b/', request()->path()) ? 'active' : '' }}">
                                        <a class="dropdown-item dropdown-toggle nav-link" data-toggle="dropdown"
                                            href="dich-vu.html" title="Dịch vụ">
                                            Dịch vụ
                                        </a>
                                        <ul class="nav dropdown-menu hide">
                                            <li class="nav-item menu_item">
                                                <a class="nav-link sub-link" data-toggle=""
                                                    href="{{ route('client.services.index') }}" title="Tất cả dịch vụ">
                                                    Tất cả dịch vụ
                                                </a>
                                            </li>
                                            @foreach ($services as $service)
                                                <li class="nav-item menu_item">
                                                    <a class="nav-link sub-link" data-toggle=""
                                                        href="{{ route('client.services.detail', $service->slug) }}"
                                                        title="{{ $service->title }}">
                                                        {{ $service->title }}
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    {{--                                     
                                    <li class="nav-item dropdown menu_item">
                                        <a class="dropdown-item dropdown-toggle nav-link" data-toggle="dropdown"
                                            href="bang-gia.html" title="Bảng giá">
                                            Bảng giá
                                        </a>
                                        <ul class="nav dropdown-menu hide">
                                     
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="bang-gia.html" title="Bảng giá khác">
                                                    Bảng giá khác
                                                </a></li>
                                        </ul>
                                    </li> --}}

                                    <li class="nav-item dropdown menu_item">
                                        <a class="dropdown-item dropdown-toggle nav-link" data-toggle="dropdown"
                                            href="" title="Tin tức">
                                            Tin tức
                                        </a>
                                        <ul class="nav dropdown-menu hide">
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="" title="Xem tất cả">
                                                    Xem tất cả
                                                </a>
                                            </li>
                                            @foreach ($categories as $category)
                                                <li class="nav-item menu_item">
                                                    <a class="nav-link sub-link" data-toggle=""
                                                        href="{{ route('client.news.index', $category->slug) }}"
                                                        title="{{ $category->title }}">
                                                        {{ $category->title }}
                                                    </a>
                                                </li>
                                            @endforeach



                                        </ul>
                                    </li>
                                    <li class="nav-item menu_item {{ request()->is('lien-he') ? 'active' : '' }}">
                                        <a class="nav-link sub-link" data-toggle=""
                                            href="{{ route('client.contact.index') }}" title="Liên hệ">
                                            Liên hệ
                                        </a>
                                    </li>


                            </div>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
