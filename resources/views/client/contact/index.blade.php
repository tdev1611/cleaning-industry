@extends('client.layout')
@section('title','Liên hệ')
@section('content')
    <div class="container body mb-5">
        <div class="row bodyLL">
            <div class="col-lg-6 col-md-6">
                <div class="bodyLeft">
                    <h1>Đặt lịch tư vấn & khảo sát</h1>
                    <p><b>Dịch vụ vệ sinh nhà cửa, nhà ở, căn hộ</b></p>
                    <x-client.form-contact />
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="bodyRight">
                    <h5>THÔNG TIN LIÊN HỆ</h5>
                    <p class="contact_content">Quý khách có nhu cầu sử dụng dịch vụ vệ sinh hoặc có bất cứ thắc mắc
                        nào xin liên hệ với chúng tôi theo thông tin bên dưới đây.
                        <br />
                    </p>
                    <h5>{{ $intro? $intro->title : null }}</h5>
                    <ul class="list_contact">
                        <li>
                            <i class="fa-solid fa-phone fa-shake"></i>
                            <a href="">{{ $contact ? $contact->phone : null }} </a>

                        </li>
                        <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a
                                href="mailto:{{ $contact ? $contact->email : null }}">{{ $contact ? $contact->email : null }}</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $contact ? $contact->address : null }}
                        </li>
                        <li><i class="fa-solid fa-globe"></i>
                            <a target="_blank" href="{{ route('home') }}"> {{ $contact ? $contact->link : null }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-center mb-3">
                Google Map
            </h3>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d469.33306044697156!2d105.7841879!3d19.7694046!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313657d66f730a5f%3A0xaf1d46857f2de7a2!2zQ8O0bmcgVHkgVG5oaCBW4buHIFNpbmggU8OzbmcgWGFuaA!5e0!3m2!1svi!2s!4v1695538337897!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
