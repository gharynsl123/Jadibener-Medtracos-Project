<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<style>
    .toggle-btn-custom {
        top: 50%;
        right: -15px;
        transform: translateY(-50%);
        border-radius: 0 10px 10px 0;
        width: 40px;
        height: 40px;
        padding: 0;
        font-size: 14px;
        z-index: 999;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name') }}</title>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/jadibener-style-web.css')}}">
</head>

<style>
    .notification {
    position: fixed;
    top: 20px;
    left: -400px; /* start di luar layar */
    min-width: 300px;
    max-width: 90%;
    padding: 15px 20px;
    color: #fff;
    font-weight: bold;
    border-radius: 8px;
    z-index: 9999;
    transition: all 0.4s ease-in-out;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.notification-success {
    background-color: #28a745;
}

.notification-danger {
    background-color: #dc3545;
}

.notification-show {
    left: 20px; /* geser ke dalam layar */
}

.fade-out {
    opacity: 0;
    transform: translateX(-20px);
    transition: opacity 0.4s ease, transform 0.4s ease;
}

</style>
<body class="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Divider -->
            <div class="sidebar-brand d-flex align-items-center justify-content-between px-3 position-relative">
                <a href="{{url('/')}}" class="d-none d-sm-block">
                    <img src="{{ asset('images/white-logo.png') }}" class="image-thumbnail" style="width: 150px;"
                        alt="Gambar">
                </a>
            </div>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <img src="{{ asset('images/dashboard.svg') }}" alt="Dashboard Icon" width="20" height="20"
                        style="margin-right: 10px;">
                    <span>Dashboard</span>
                </a>
            </li>

            @if(Auth::user()->level == 'teknisi')
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/pengajuan')}}">
                        <i class="fas fa-fw fa-ticket"></i>
                        <span>Ticket Pengajuan</span></a>
                </li>
            @endif

            @if(Auth::user()->level == 'pic')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/barang-rumah-sakit') }}">
                        <img src="{{ asset('images/peralatan.svg') }}" alt="Dashboard Icon" width="20" height="20"
                            style="margin-right: 10px;">
                        <span>Peralatan Rumah Sakit</span>
                    </a>
                </li>
            @endif

            @if(
                    Auth::user()->level == 'teknisi' || Auth::user()->level == 'sub_service' || Auth::user()->level ==
                    'surveyor'
                )
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/instansi')}}">
                        <i class="fas fa-toolbox"></i>
                        <span>Data Rumah Sakit</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/barang-rumah-sakit')}}">
                        <i class="fas fa-toolbox"></i>
                        <span>Peralatan Rumah Sakit</span></a>
                </li>
            @endif

            @if(Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Configuration</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Rumah Sakit:</h6>
                            <a class="collapse-item" href="{{url('/instansi')}}">Data Rumah Sakit</a>
                            <a class="collapse-item" href="{{url('/barang-rumah-sakit')}}">Peralatan Rumah Sakit</a>
                            <h6 class="collapse-header">User:</h6>
                            <a class="collapse-item" href="{{url('/user-member')}}">User Member</a>
                            <a class="collapse-item" href="{{url('/request-user')}}">Pending Request</a>
                        </div>
                    </div>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Layanan Service</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('/status')}}">Status & Laporan Teknisi</a>
                        <a class="collapse-item" href="{{url('/jadwal-kedatangan')}}">Jadwal Kedatangan</a>
                        @if(Auth::user()->level != 'teknisi')
                            <a class="collapse-item" href="{{url('/pengajuan')}}">Pengajuan Ticket</a>
                        @endif
                        <a class="collapse-item" href="{{url('/estimasi-biaya')}}">Estimasi Biaya</a>
                    </div>
                </div>
            </li>

            @if(Auth::user()->level == 'admin' || Auth::user()->level == 'surveyor')
                <hr class="sidebar-divider  my-2">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Products & Parts</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url('/brand')}}">Merek</a>
                            <a class="collapse-item" href="{{url('/categories')}}">Kategori</a>
                            <a class="collapse-item" href="{{url('/part')}}">Spare Part</a>
                            <a class="collapse-item" href="{{url('/product')}}">Products</a>
                        </div>
                    </div>
                </li>
            @endif

            <hr class="sidebar-divider  my-2">

            <li class="nav-item">
                <a class="nav-link" href="{{url('/information')}}">
                    <i class="fas fa-bullhorn"></i>
                    <span>Information</span></a>
            </li>

            @if(Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/archive')}}">
                        <i class="fas fa-archive"></i>
                        <span>Riwayat Activitas</span></a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

            @if(session('success'))
                <div id="notification" class="shadow-lg notification notification-success">
                    <span class="notification-text">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('failure'))
                <div id="notification" class="shadow-lg notification notification-danger">
                    <span class="notification-text">{{ session('failure') }}</span>
                </div>
            @endif

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle">
                        <i class="fa fa-bars"></i>
                    </button>

                    <a href="{{url('/')}}" class="d-md-none">
                        <img src="{{ asset('images/mdh_logo.png') }}" class="image-thumbnail" style="width: 180px;"
                            alt="Gambar">
                    </a>

                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                <div class="d-flex flex-column ">
                                    <span class="mr-3 d-none d-lg-inline text-dark small">{{Auth::user()->name}}</span>
                                    <span
                                        class="mr-3 d-none d-lg-inline text-gray-600 small">{{Auth::user()->level}}</span>
                                </div>
                                <i class="fa fa-user-circle"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('/profile-user/' . Auth::user()->slug) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

</body>


<script>

    document.addEventListener("DOMContentLoaded", function () {
        const notification = document.getElementById("notification");

        $('#instansi-select').select2();
        CKEDITOR.replace('editor');

document.addEventListener("DOMContentLoaded", function() {
    const notifications = document.querySelectorAll('.notification');

    $('#instansi-select').select2();
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('editor');
    }

    notifications.forEach(notification => {
        // Tampilkan notifikasi
        notification.classList.add("notification-show");


        function showNotification() {
            notification.style.left = "20px";
            setTimeout(() => {
                hideNotification();
            }, 3000);
        }

        function hideNotification() {
            notification.classList.add("fade-out");
            setTimeout(() => {
                notification.remove();
            }, 500);
        }

        showNotification();

    });
    document.getElementById('customSidebarToggle').addEventListener('click', function () {
        document.body.classList.toggle('sidebar-toggled');
        document.querySelector('.sidebar').classList.toggle('toggled');

        // Ganti ikon toggle
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-chevron-left');
        icon.classList.toggle('fa-chevron-right');
    });

        // Hilang setelah 3 detik
        setTimeout(() => {
            notification.classList.add("fade-out");

            // Hapus dari DOM setelah animasi selesai
            notification.addEventListener("transitionend", function() {
                notification.remove();
            }, { once: true });
        }, 3000);
    });
});

</script>

</html>