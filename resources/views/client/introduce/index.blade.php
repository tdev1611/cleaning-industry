@extends('client.layout')
@section('title','Giới thiệu công ty')
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
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d234.66645969245164!2d105.78398640479449!3d19.769452512641752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313657d66f730a61%3A0x3e22aed3697e5211!2zMzk1IMSQLiBOZ-G7jWMgTWFpLCBRdeG6o25nIFRo4buLbmgsIFRow6BuaCBwaOG7kSBUaGFuaCBIw7NhLCBUaGFuaCBIb8OhLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1694872244447!5m2!1svi!2s"
                width="80%" height="500" style="border:1px solid tan;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>
    </main>
@endsection
