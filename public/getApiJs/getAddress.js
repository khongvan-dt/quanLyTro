
const table = document.getElementById("datatablesSimple");
const tbody = table.querySelector("tbody");
const hiddenRow = tbody.querySelector(".hidden-row");

fetch("/api/addAddress")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Lỗi mạng");
        }
        return response.json();
    })
    .then((data) => {
        data.data.forEach(item => {
            const row = hiddenRow.cloneNode(true);
            row.classList.remove("hidden-row");

            const cells = row.querySelectorAll("td");
            cells[0].textContent = item.city;
            cells[1].textContent = item.district;
            cells[2].textContent = item.wardCommune;
            cells[3].textContent = item.streetAddress;
            cells[4].innerHTML = `<a href="/editAddress/${item.id}">Sửa</a> 
            || <a href="/deleteAddress/${item.id}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="main__table-btn main__table-btn--banned open-modal" >xóa</a>`;
            tbody.appendChild(row);
        });
    })
    .catch((error) => {
        console.error("Lỗi:", error);
    });
