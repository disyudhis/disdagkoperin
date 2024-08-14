<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="wub/styles/styles.css">
    </head>
    <body class="container register-body">
        <div class="bg"></div>
        <div class="register-box">
            <h1>Register</h1>
            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <label class="label-text" for="name">Nama Lengkap</label>
                <input id="name" class="register-field" type="text" name="name" required>
                <label class="label-text" for="nik">NIK (Nomor Induk Kependudukan)</label>
                <input id="nik" class="register-field" type="text" name="nik" required>
                <label class="label-text" for="email">E-mail</label>
                <input id="email" class="register-field" type="email" name="email" required>
                <label class="label-text" for="password">Password</label>
                <input id="password" class="register-field" type="password" name="password" required>
                <label class="label-text" for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="register-field" type="password" name="password_confirmation" required>
                <button class="sign-up_button" type="submit">Sign-Up</button>
                <p>Sudah punya akun?, klik <a href="{{ route('loginWub') }}"><b>disini</b></a></p>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
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