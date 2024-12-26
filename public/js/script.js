document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('tas-checkbox');
    const acceptButton = document.querySelector('.btn-accept');

    checkbox.addEventListener('change', function () {
        acceptButton.disabled = !this.checked;
    });

});