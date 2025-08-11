<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Jadibener</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<style>

#togglePassword {
    color: #ccc;
    top: 55%;
}

.montserrat-bold {
    font-family: "Montserrat", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    font-weight: 600;
}

</style>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center rounded-4 overflow-hidden bg-white">
            <!-- LEFT: Image -->
            <div class="col-lg-6 d-none d-lg-block p-0">
                <img src="{{ asset('images/header-background.png') }}" alt="Login Image"
                    class="img-fluid h-100 w-100 rounded rounded-5" style="object-fit: cover;">
            </div>

            <!-- RIGHT: Login Form -->
            <div class="col-lg-6 p-5">
                <div class="mb-4">
                    <img src="{{ asset('images/mdh_logo.png') }}" alt="Logo" style="height: 50px;" class="mb-2">
                    <p class="montserrat-bold mb-1" style="color: #000000; font-size: 1.875rem;">Masuk Akun</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="Masukkan Passwordmu" required>
                        <i class="fa fa-eye position-absolute" id="togglePassword"
                            style="top: 60%; right: 10px; cursor: pointer;"></i>
                    </div>

                    <button type="submit" class="btn btn-success w-100 mb-3">Masuk</button>
                    <a href="{{url('/')}}" class="btn btn-outline-secondary w-100 mb-2">
                        Batal
                    </a>
                    <p class="text-start small mt-4">
                        Belum punya akun? <a href="/request-as-member" class="text-success">Daftar disini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.getElementById("togglePassword");
    const password = document.getElementById("password");

    togglePassword.addEventListener("click", function () {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
});
</script>

</html>