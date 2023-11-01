// Fetch address data from the API
fetch("/api/addRoom")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Lỗi mạng");
        }
        return response.json();
    })
    .then((data) => {
        const selectElement = document.querySelector("select.city");

        // Create a default option
        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.text = "Chọn địa chỉ";
        selectElement.appendChild(defaultOption);

        // Loop through the data and create options for each address
        data.data.forEach((item) => {
            const option = document.createElement("option");
            option.value = item.id; // Replace with the appropriate value you want to use
            option.text = `${item.streetAddress} - ${item.wardCommune} - ${item.district} - ${item.city}`;
            selectElement.appendChild(option);
        });

        // Add an event listener to the select element to update the table based on the selected option
        selectElement.addEventListener("change", function () {
            const selectedValue = this.value;
            updateTable(selectedValue, data.data);
        });

        // Call the updateTable function to initially populate the table
        updateTable("", data.data);
    })
    .catch((error) => {
        console.error("Lỗi:", error);
    });

function updateTable(selectedValue, data) {
    const tableBody = document.querySelector("#datatablesSimple tbody");

    // Clear the table
    tableBody.innerHTML = "";

    // Filter data based on the selected value
    const filteredData = data.filter((item) => selectedValue === "" || item.id === selectedValue);

    // Populate the table with filtered data
    filteredData.forEach((item) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${item.city}</td>
            <td>${item.district}</td>
            <td>${item.wardCommune}</td>
            <td>${item.streetAddress} +${item.idUser}</td>
            <td><a href="/edit/${item.id}">Sửa</a></td>`;
        tableBody.appendChild(row);
    });
}

// fetch("/api/getAddress") // Change the URL to match your Laravel route
//     .then((response) => {
//         if (!response.ok) {
//             throw new Error("Lỗi mạng");
//         }
//         return response.json();
//     })
//     .then((data) => {
//         const selectElement = document.querySelector("select.city");

//         // Clear existing options
//         selectElement.innerHTML = "";

//         // Create a default option
//         const defaultOption = document.createElement("option");
//         defaultOption.value = "";
//         defaultOption.text = "Chọn địa chỉ";
//         selectElement.appendChild(defaultOption);

//         // Loop through the data and create options for each address
//         data.data.forEach((item) => {
//             const option = document.createElement("option");
//             option.value = item.id;
//             option.text = `${item.streetAddress} - ${item.wardCommune} - ${item.district} - ${item.city}`;
//             selectElement.appendChild(option);
//         });

//         // Add an event listener to the select element to update the table based on the selected option
//         selectElement.addEventListener("change", function () {
//             const selectedValue = this.value;
//             updateTable(selectedValue, data.data);
//         });

//         // Call the updateTable function to initially populate the table
//         updateTable("", data.data);
//     })
//     .catch((error) => {
//         console.error("Lỗi:", error);
//     });

// function updateTable(selectedValue, data) {
//     const tableBody = document.querySelector("#datatablesSimple tbody");

//     // Clear the table
//     tableBody.innerHTML = "";

//     // Filter data based on the selected value
//     const filteredData = data.filter(
//         (item) => selectedValue === "" || item.id == selectedValue
//     );

//     filteredData.forEach((item) => {
//         const row = document.createElement("tr");
//         row.innerHTML = `
//                     <td>${item.city}</td>
//                     <td>${item.district}</td>
//                     <td>${item.wardCommune}</td>
//                     <td>${item.streetAddress} +${item.idUser}</td>
//                     <td><a href="/edit/${item.id}">Sửa</a></td>`;
//         tableBody.appendChild(row);
//     });
// }
