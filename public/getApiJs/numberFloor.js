$(document).ready(function() {
    $('#totalFloorId').change(function() {
        var selectedTotalFloorId = $(this).val();

        $.ajax({
            url: '/api/get-number-floors', // Đúng đường dẫn API đã đăng ký
            method: 'GET',
            data: {
                totalFloorId: selectedTotalFloorId
            },
            success: function(data) {
                // Xóa tất cả các tùy chọn hiện có trong dropdown "Tầng"
                $('#numberFloors').empty();

                // Thêm các tùy chọn mới dựa trên dữ liệu từ API
                $.each(data, function(key, value) {
                    $('#numberFloors').append('<option value="' + key + '">' + value + '</option>');
                });
            },
            error: function() {
                console.log('Lỗi khi gửi yêu cầu AJAX');
            }
        });
    });
});
