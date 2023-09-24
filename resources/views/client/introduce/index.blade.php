@extends('client.layout')
@section('title', 'Giới thiệu công ty')
@section('content')
    <main>
        <div class="container ">
            <div class="component">
                <div class="component__title">
                    <h2 class="title__h2">Giới Thiệu Về Công Ty</h2>
                </div>
                <div class="component__contnet">
                    <table class="table">
                        @if (isset($introduce))
                            <tbody>
                                <tr>
                                    <td class="w-25 key_name">Tên công ty:</td>
                                    <td><b>{{ $introduce->title }}</b></td>
                                </tr>
                                <tr>
                                    <td class="w-25 key_name">Điện thoại:</td>
                                    <td><b>{{ $introduce->phone }}</b></td>
                                </tr>
                                <tr>
                                    <td class="w-25 key_name">Ngày cấp phép:</td>
                                    <td><b>{{ $introduce->license_date }}</b></td>
                                </tr>
                                <tr>
                                    <td class="w-25 key_name">Mã số thuế:</td>
                                    <td><b>{{ $introduce->tax_code }}</b></td>
                                </tr>

                                <tr>
                                    <td class="w-25 key_name">Quản lý bởi:</td>
                                    <td><b>{{ $introduce->managed_by }}</b></td>
                                </tr>
                                <tr>
                                    <td class="w-25 key_name">Dịch vụ:</td>
                                    <td>
                                        {!! $introduce->service !!}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-25 key_name">Địa chỉ:</td>
                                    <td><b>{{ $introduce->address }}</b></td>
                                </tr>
                            </tbody>
                        @endif

                    </table>
                </div>
            </div>

        </div>

        <div class="mb-4 text-center">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d469.33306044697156!2d105.7841879!3d19.7694046!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313657d66f730a5f%3A0xaf1d46857f2de7a2!2zQ8O0bmcgVHkgVG5oaCBW4buHIFNpbmggU8OzbmcgWGFuaA!5e0!3m2!1svi!2s!4v1695538337897!5m2!1svi!2s"
                width="80%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>
    </main>
@endsection
