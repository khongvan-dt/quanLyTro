// Sau khi nhận được dữ liệu từ API và lưu vào biến data
fetch("/api/addRoom")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Lỗi mạng");
        }
        return response.json();
    })
    .then((data) => {
        const selectElement = document.querySelector("select.city");

        // Tạo một tùy chọn mặc định
        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.text = "Chọn địa chỉ";
        selectElement.appendChild(defaultOption);

        // Duyệt qua mảng dữ liệu và tạo tùy chọn cho mỗi địa chỉ
        data.data.forEach(item => {
            const option = document.createElement("option");
            option.value = item.id; // Thay id bằng giá trị phù hợp bạn muốn sử dụng
            option.text = `${item.streetAddress} - ${item.wardCommune} - ${item.district} - ${item.city}`;
            selectElement.appendChild(option);
        });
        
        // Tiếp theo, bạn có thể thêm bất kỳ logic xử lý sự kiện hoặc hành động nào bạn cần tại đây
    })
    .catch((error) => {
        console.error("Lỗi:", error);
    });
