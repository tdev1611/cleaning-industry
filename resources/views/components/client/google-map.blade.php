<style>
    .btn-primary {
        background-color: #007BFF !important;
    }
</style>
<section class="google-map" style="margin-top:30px">
    <div class="container-fluid">
        <div class="text-center">
            <h2>Liên hệ tư vấn</h2>
        </div>
        <div class="row ">
            <div class="col-md-6 col-lg-6 mb-4 mt-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d234.66645969245164!2d105.78398640479449!3d19.769452512641752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313657d66f730a61%3A0x3e22aed3697e5211!2zMzk1IMSQLiBOZ-G7jWMgTWFpLCBRdeG6o25nIFRo4buLbmgsIFRow6BuaCBwaOG7kSBUaGFuaCBIw7NhLCBUaGFuaCBIb8OhLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1694872244447!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="col-md-6 mb-4 mt-4">
                <form action="{{ route('client.contact.post') }}" method="post" id="contact_post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" id="name" placeholder="Họ và tên"
                                name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Số điện thoại</label>
                            <input type="number" class="form-control" id="phone" placeholder="Số điện thoại"
                                name="phone">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" placeholder="Địa chỉ của bạn"
                            name="address">
                    </div>

                    <div class="form-group">
                        <label for="service_id">Dịch vụ </label>
                        <select id="service_id" class="form-control" name="service_id">
                            <option selected value="">Chọn</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <textarea class="form-control" id="note" rows="6" placeholder="Yêu cầu cụ thể (nếu có)" name="note"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Gửi tư vấn</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#contact_post').submit(function(e) {
            e.preventDefault();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        .then((result) => {
                            location.reload();
                        })
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: error.responseJSON.error,
                        showConfirmButton: false,
                        timer: 2000
                    }).then((result) => {

                    })
                }
            });
        })
    </script>
</section>
