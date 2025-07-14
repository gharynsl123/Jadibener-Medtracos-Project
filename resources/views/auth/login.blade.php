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
.password-container {
    width: 100%;
    position: relative;
}

.fa-eye {
    position: absolute;
    top: 35%;
    right: 5%;
    cursor: pointer;
    color: lightgray;
}
</style>

<body>
    <div class="vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <div class="card border-0 shadow-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login to member!</h1>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="user">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="text" placeholder="Enter username"
                                        class="form-control form-control-user" name="username" required autofocus>
                                </div>
                                <div class="password-container mb-3">
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control form-control-user" name="password" required>
                                    <i class="fa-solid fa-eye" id="togglePassword"></i>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <span class="small text-dark"> Need an Account? <a class="text-primary " href="/request-as-member">Click
                                        here!</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("password");
        const togglePasswordButton = document.getElementById("togglePassword");

        togglePasswordButton.addEventListener("click", function() {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            // Ganti ikon mata sesuai dengan keadaan password
            const eyeIconClass = type === "password" ? "bi-eye" : "bi-eye-slash";
            togglePasswordButton.innerHTML = `<i class="bi ${eyeIconClass}"></i>`;
        });
    });
    </script>

</body>

</html>