const table = document.getElementById("datatablesSimple");

fetch("/api/addAddress")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Lỗi mạng");
        }
        return response.json();
    })
    .then((data) => {
        const tbody = table.querySelector("tbody");
        let i = 1;
        data.data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.city}</td>
                <td>${item.district}</td>
                <td>${item.wardCommune}</td>
                <td>${item.streetAddress}</td>
                <td><a href="/edit/${item.id}">Sửa</a></td>`; 
            table.appendChild(row); 
        });
    })
    .catch((error) => {
        console.error("Lỗi:", error);
    });
