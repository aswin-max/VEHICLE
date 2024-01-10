// clearMessage.js

function toggleSuccessMessage() {
    var successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.style.display = (event.target.value.length > 0) ? 'block' : 'none';
    }
}
