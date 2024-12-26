document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('tas-checkbox');
    const acceptButton = document.querySelector('.btn-accept');

    checkbox.addEventListener('change', function () {
        acceptButton.disabled = !this.checked;
    });

});

document.getElementById('loginForm').addEventListener('submit', function(event) {
    let valid = true;

    // Reset error messages
    document.getElementById('nibError').style.display = 'none';
    document.getElementById('passwordError').style.display = 'none';

    // Validate NIB
    const nib = document.getElementById('nib').value;
    if (nib.trim() === '') {
        document.getElementById('nibError').innerText = 'NIB tidak boleh kosong';
        document.getElementById('nibError').style.display = 'block';
        valid = false;
    }

    // Validate Password
    const password = document.getElementById('password').value;
    if (password.trim() === '') {
        document.getElementById('passwordError').innerText = 'Password tidak boleh kosong';
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    }

    // Prevent form submission if invalid
    if (!valid) {
        event.preventDefault();
    }
});

// Fungsi untuk menambahkan kelas no-scroll
function preventScroll() {
    document.body.classList.add('no-scroll');
}

// Fungsi untuk menghapus kelas no-scroll
function allowScroll() {
    document.body.classList.remove('no-scroll');
}

// Menambahkan event listener untuk halaman tertentu
if (window.location.pathname === '/login' || window.location.pathname === '/register' || window.location.pathname === '/tas') {
    preventScroll();
} else {
    allowScroll();
}
