<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat dan Ketentuan</title>
    <link rel="icon" href="{{ asset('img/about.png') }}">
    <link rel="stylesheet" href="wub/styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Menambahkan font Poppins -->
</head>

<body class="background-image">
    <div class="tas-box">
        <h1 class="tas-title">Syarat dan Ketentuan</h1>

        <div class="tas-content">
            <ul class="tas-list">
                <li>Memberikan informasi tentang hak dan kewajiban pengguna dan penyedia layanan.</li>
                <li>Menetapkan batasan dan aturan penggunaan layanan.</li>
                <li>Melindungi kepentingan hukum kedua belah pihak dalam kasus sengketa.</li>
                <li>Pengguna disarankan membaca dan memahami ketentuan ini sebelum menggunakan layanan untuk menghindari
                    kesalahpahaman atau pelanggaran yang dapat menyebabkan sanksi hukum.</li>
            </ul>
        </div>

        <div class="tas-checkbox">
            <input type="checkbox" id="agree-checkbox">
            <label for="agree-checkbox">Dengan ini saya telah membaca dan menyetujui syarat serta ketentuan yang sudah
                diberlakukan</label>
        </div>

        <div class="buttons-tas">
            <a href="{{ route('loginWub') }}" style="text-decoration: none" class="btn-accept" id="agree-button">Saya Setuju</a>
            <a href="{{ route('home') }}" style="text-decoration: none" class="btn-disagree">Tidak Setuju</a>
        </div>
    </div>

    <script>
        const checkbox = document.getElementById('agree-checkbox');
        const agreeButton = document.getElementById('agree-button');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                agreeButton.classList.add('enabled');
            } else {
                agreeButton.classList.remove('enabled');
            }
        });
    </script>
</body>

</html>
