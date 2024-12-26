<!DOCTYPE html>
<html class="login-page">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="wub/styles/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="login-body">
    <div class="bg"></div>
    <div class="login-modal">
        <h1>Login</h1>
        <img class="login-logo" src="wub/img/item.png" alt="Logo">
        <form id="loginForm" method="POST" action="{{ route('postLogin') }}">
            @csrf
            <label class="label-text">NIB</label>
            <div class="input-container">
                <span class="material-symbols-outlined">account_circle</span>
                <input class="input_field" type="text" placeholder="NIB" id="nib" name="nib" required>
                <span class="error-message" id="nibError"></span>
            </div>
            <label class="label-text">Password</label>
            <div class="input-container">
                <span class="material-symbols-outlined">key</span>
                <input class="input_field" type="password" placeholder="Password" id="password" name="password" required>
                <span class="error-message" id="passwordError"></span>
            </div>
            <button class="sign-in_button" type="submit">Sign-In</button>
            <p>Belum punya akun?, klik <a href="{{ route('registerWub') }}"><b>disini</b></a></p>
        </form>
    </div>
    <script src="wub/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>

    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Validation Error!',
            text: '{{ implode(', ', $errors->all()) }}', // Menampilkan semua pesan kesalahan
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-fail'
            }
        });
    </script>
    @endif

    @if (Session::has('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ Session::get('success') }}',
        confirmButtonText: 'Lanjut',
        customClass: {
            confirmButton: 'btn btn-success'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('loginWub') }}";
        }
    });
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ Session::get('error') }}',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-fail'
            }
        });
    </script>
    @endif
</body>

</html>
