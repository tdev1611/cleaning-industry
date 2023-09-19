<form action="{{ route('client.contact.post') }}" method="post" id="contact_post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Họ và tên</label>
            <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Số điện thoại</label>
            <input type="number" class="form-control" id="phone" placeholder="Số điện thoại" name="phone">
        </div>

    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" class="form-control" id="address" placeholder="Địa chỉ của bạn" name="address">
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
