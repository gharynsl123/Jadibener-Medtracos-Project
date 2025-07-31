<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name') }}</title>


    <!-- CSS Style Welcome -->
    <link rel="stylesheet" href="{{asset('css/jadibener-style-web.css')}}">


    <!-- bootstrap things -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
    .navbar {
        min-height: 50px;
        background-color: #1C1F21;
    }

    .nav-link {
        color: #fff !important;
        font-size: 15px;
        font-family: "Manrope", sans-serif;
        font-weight: 500;
    }

    .nav-link:hover {
        color: #B2B2B2FF !important;
    }


     .navbar.sticky-top {
        z-index: 1030; /* lebih tinggi dari default Bootstrap */
    }

    /* Base style notifikasi */
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 16px 24px;
        background-color: #d4edda; /* warna hijau sukses */
        color: #155724;
        border-left: 6px solid #28a745;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
        z-index: 9999;
    }

    /* Saat notifikasi dimunculkan */
    .notification-show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Saat notifikasi disembunyikan */
    .notification-hide {
        opacity: 0;
        transform: translateY(-20px);
    }


    </style>
</head>

<body>
    <!-- Navbar di dalam new-ui.blade.php -->
    <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/icon-web-jadibener.png') }}" alt="Logo" height="50" class="me-2">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" style="border-color: #fff;">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-center align-items-center " id="navbarMenu">
                <ul class="navbar-nav mb-2 mb-lg-0 gap-lg-1">
                    <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/spare-part')}}">Sparet Part</a></li>
                    @php
                    $isHome = request()->is('/') || request()->is('home');
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link{{ !$isHome ? ' disabled' : '' }}" href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ !$isHome ? ' disabled' : '' }}" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/kontak')}}">Kontak</a></li>
                </ul>
                @auth
                <a href="{{ url('dashboard')}}"
                    class="btn secondary-bg btn-sm m-0 d-sm-block d-sm-none fw-normal w-100 btn-login">Internal</a>
                @endauth
                @guest
                <a href="{{url('login')}}"
                    class="btn secondary-bg btn-sm m-0 d-sm-block d-sm-none fw-normal w-100 btn-login">Login</a>
                @endguest
            </div>

            <!-- Login button -->
            <div class="d-none d-lg-block">
                @auth
                <a href="{{ url('dashboard')}}"
                    class="btn secondary-bg fw-normal btn-outline-dark btn-login">Internal</a>
                @endauth
                @guest
                <a href="{{url('login')}}" class="btn secondary-bg fw-normal btn-outline-dark btn-login"
                    style="padding-right:2.219rem; padding-left:2.219rem;">Login</a>
                @endguest
            </div>
        </div>
    </nav>

    <section>
        @yield('content')
    </section>

    @if(session('success'))
    <div id="notification" class="shadow-lg notification notification-success">
        <span class="notification-text">{{ session('success') }}</span>
    </div>
    @endif

    <footer id="footer" class="bg-dark text-light pb-2 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <section id="kontak" class="text-start">
                        <h2>Hubungi Kami</h2>
                        <p>📞 0812-3456-7890 </p>
                        <p>📍 Jakarta - Indonesia</p>
                    </section>
                </div>
                <div class="col-md-6 d-flex flex-column ">
                    <h2 class="m-0">Developed <span class="fs-6"><small>by: Jadibener IT Team</small></span></h2>

                    <div class="my-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-sm px-4 m-0 bottom-0 btn-warning">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i> &nbsp; Hubungi via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-3">
            <small class="m-0  fw-sm">© 2023 Jadibener.com - Semua hak dilindungi</small>
        </div>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const notification = document.getElementById("notification");

    if (notification) {
        // Tampilkan notifikasi
        notification.classList.add("notification-show");

        // Sembunyikan notifikasi setelah 3 detik
        setTimeout(function() {
            notification.classList.remove("notification-show");
            notification.classList.add("notification-hide");

            // Hapus notifikasi dari DOM setelah animasi selesai
            notification.addEventListener("transitionend", function() {
                notification.remove();
            });
        }, 5000);
    }
});
</script>

</html>