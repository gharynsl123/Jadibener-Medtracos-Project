<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Jadibener</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        .password-container {
            width: 100%;
            position: relative;
        }

        .custom-logo {
            height: 50px;
            width: auto;
        }

        .fa-eye {
            position: absolute;
            top: 35%;
            right: 5%;
            cursor: pointer;
            color: lightgray;
        }

        
    </style>
</head>

<body>
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-md-6 d-none d-md-block p-0">
                <img src="{{ asset('images/img-login.png') }}" alt="Login Image"
                    class="img-fluid h-100 w-100 object-fit-cover" style="object-fit: cover;">
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="p-5 w-100">
                    <div class="mb-5">
                        <img src="{{ asset('images/print-logo.png') }}" alt="Login Image" class="custom-logo">
                    </div>
                    <div class="text-left">
                        <h1 class="h2 text-gray-900 mb-4" style="font-weight: bold;">Masuk Ke Akunmu</h1>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="user">
                        @csrf
                        <div class="form-group mb-4">
                            <input id="email" type="text" placeholder="Enter username"
                                class="form-control form-control-user rounded-lg" name="username" required autofocus>
                        </div>
                        <div class="password-container mb-4">
                            <input id="password" type="password" placeholder="Password"
                                class="form-control form-control-user rounded-lg" name="password" required>
                            <i class="fa-solid fa-eye" id="togglePassword"></i>
                        </div>
                        <button type="submit" class="btn rounded-lg py-2 btn-success btn-block mb-3">
                            Login
                        </button>
                    </form>

                    <div class="text-left">
                        <span class="medium text-dark"> Belum memiliki akun?
                            <a class="text-success" href="/request-as-member">Buat disini</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("password");
            const togglePasswordButton = document.getElementById("togglePassword");

            togglePasswordButton.addEventListener("click", function () {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
                this.classList.toggle("fa-eye");
                this.classList.toggle("fa-eye-slash");
            });
        });
    </script>
</body>

</html>
