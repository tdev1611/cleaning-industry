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
                                    <li class="nav-item menu_item">
                                        <a class="nav-link sub-link" data-toggle=""
                                            href="gioi-thieu/ve-sinh-cong-nghiep-nam-sao.html" title="Giới thiệu">
                                            Giới thiệu
                                        </a>
                                    </li>
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
                                    <li class="nav-item dropdown menu_item">
                                        <a class="dropdown-item dropdown-toggle nav-link" data-toggle="dropdown"
                                            href="bang-gia.html" title="Bảng giá">
                                            Bảng giá
                                        </a>
                                        <ul class="nav dropdown-menu hide">
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="bang-gia/bang-gia-dich-vu-ve-sinh-nha-pho-sau-xay-dung-khu-vuc-tphcm.html"
                                                    title="Bảng giá dịch vụ vệ sinh nhà phố">
                                                    Bảng giá dịch vụ vệ sinh nhà phố
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="bang-gia/bang-gia-ve-sinh-can-ho-nha-chung-cu-sau-xay-dung-tai-tphcm.html"
                                                    title="Bảng giá vệ sinh căn hộ">
                                                    Bảng giá vệ sinh căn hộ
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="bang-gia/bang-gia-giat-tham-van-phong-tham-khao-nam.html"
                                                    title="Bảng giá giặt thảm">
                                                    Bảng giá giặt thảm
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="bang-gia.html" title="Bảng giá khác">
                                                    Bảng giá khác
                                                </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown menu_item">
                                        <a class="dropdown-item dropdown-toggle nav-link" data-toggle="dropdown"
                                            href="san-pham.html" title="Sản phẩm">
                                            Sản phẩm
                                        </a>
                                        <ul class="nav dropdown-menu hide">
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="may-hut-bui.html" title="Máy hút bụi">
                                                    Máy hút bụi
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="may-cha-san.html" title="Máy chà sàn">
                                                    Máy chà sàn
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="may-quet-rac.html" title="Máy quét rác">
                                                    Máy quét rác
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link" data-toggle=""
                                                    href="may-giat-tham.html" title="Máy giặt thảm">
                                                    Máy giặt thảm
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link"
                                                    data-toggle="" href="may-phun-ap-luc.html"
                                                    title="Máy phun áp lực">
                                                    Máy phun áp lực
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link"
                                                    data-toggle="" href="xe-vat-nuoc-lau-nha.html"
                                                    title="Xe vắt nước lau nhà">
                                                    Xe vắt nước lau nhà
                                                </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown menu_item">
                                        <a class="dropdown-item dropdown-toggle nav-link" data-toggle="dropdown"
                                            href="tin-tuc.html" title="Tin tức">
                                            Tin tức
                                        </a>
                                        <ul class="nav dropdown-menu hide">
                                            <li class="nav-item menu_item"><a class="nav-link sub-link"
                                                    data-toggle="" href="tin-tuc.html" title="Xem tất cả">
                                                    Xem tất cả
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link"
                                                    data-toggle="" href="tin-cong-ty.html" title="Tin công ty">
                                                    Tin công ty
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link"
                                                    data-toggle="" href="tuyen-dung.html" title="Tuyển dụng">
                                                    Tuyển dụng
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link"
                                                    data-toggle="" href="kinh-nghiem.html"
                                                    title="Kinh nghiệm - Mẹo vặt">
                                                    Kinh nghiệm - Mẹo vặt
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link"
                                                    data-toggle="" href="ve-sinh-cong-nghiep.html"
                                                    title="Tin chuyên ngành">
                                                    Tin chuyên ngành
                                                </a></li>
                                            <li class="nav-item menu_item"><a class="nav-link sub-link"
                                                    data-toggle="" href="tin-lau-kinh.html" title="Tin tức lau kính">
                                                    Tin tức lau kính
                                                </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item menu_item">
                                        <a class="nav-link sub-link" data-toggle="" href="lien-he.html"
                                            title="Liên hệ">
                                            Liên hệ
                                        </a>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>
                                    </li>

                            </div>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
