function updateFields() {
    var select = document.getElementById('idServices');
    var residentNameInput = document.getElementById('residentName');
    var priceRoomInput = document.getElementById('priceRoom');
    var streetAddressInput = document.getElementById('streetAddress');

    var selectedOption = select.options[select.selectedIndex];
    if (selectedOption) {
        residentNameInput.value = selectedOption.getAttribute('data-resident');
        priceRoomInput.value = selectedOption.getAttribute('data-price');
        streetAddressInput.value = selectedOption.getAttribute('data-address');
    } else {
        // Clear input fields if no option is selected
        residentNameInput.value = '';
        priceRoomInput.value = '';
        streetAddressInput.value = '';
    }
}
