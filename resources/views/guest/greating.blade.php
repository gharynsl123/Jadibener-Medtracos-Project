@extends('layouts.welcome')

@section('content')


    <!-- Hero Content -->
    <section class="hero">
        <div class="background-black-transaparant d-flex flex-column justify-content-center ">
            <div class="container align-self-center">
                <p class="align-self-center poppins-semi-bold montserrat-bold header-title"
                    style="font-size:5rem; line-height: 1.2;">
                    SOLUSI SERVICE <br> DAPUR PROFESIONAL
                </p>
                <p class="manrope-semibold header-subtitle">
                    Service dan penjualan spare part alat dapur untuk rumah sakit, restoran dan hotel
                </p>

                <div class="d-flex gap-4">
                    <a href="#ajukan-service" class="btn bg-warning btn-header fw-medium">Ajukan Service</a>
                    <a href="{{url('/spare-part')}}" class="btn bg-warning btn-header fw-medium">Cari Sparepart</a>
                    <a href="{{ asset('document/Brosure jadibener.pdf') }}"
                        class="btn bg-success btn-header fw-medium text-white" download>Download
                        Brosure Kami</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Tentang Kami -->
    <section class="container mt-5 justify-content-center align-items-center d-flex" id="tentang">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                <img src="{{asset('images/layanan kami.png')}}" alt="layanan kami" class="img-fluid w-85">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="d-flex flex-column">
                    <div class="d-flex">
                        <img src="{{asset('images/dot.png')}}" alt="dot" class="img-fluid"
                            style="width: 25px; height: 25px;">
                        <p class="ms-3">Tentang Kami</p>
                    </div>
                    <p class="montserrat-bold" style="font-size: 2rem; line-height: 1.1;">
                        Peralatan Dapur Rusak? <br><span class="text-success"> Serahkan pada Ahlinya!</span>
                    </p>
                    <p class="manrope-medium" style="font-size: 0.90rem; line-height: 1.5; color: #858788;">
                        Jadibener.com adalah solusi terpercaya untuk segala kebutuhan instalasi, perbaikan, dan penyediaan
                        suku cadang peralatan dapur Anda. Kami melayani rumah tangga, restoran, hotel, dapur industri,
                        hingga dapur rumah sakit, dengan layanan profesional yang cepat, tepat, dan bergaransi.</br> </br>

                        Didukung oleh teknisi ahli dan berpengalaman, kami menangani berbagai jenis peralatan seperti kompor
                        gas dan listrik, oven, deep fryer, chiller & freezer, mesin pencuci piring, hingga sistem penghisap
                        asap (hood system). Kami memastikan semua pekerjaan dilakukan sesuai standar keamanan dan efisiensi
                        kerja dapur.</br> </br>

                        Kami juga menyediakan layanan instalasi baru, perawatan rutin
                        (maintenance), hingga konsultasi teknis untuk memastikan dapur Anda tetap dalam kondisi optimal dan
                        produktif setiap saat.</br> </br>

                        Dengan jaringan layanan yang terus berkembang, Jadibener.com siap hadir di kota Anda, menjadi
                        partner andal dalam menjaga kelancaran operasional dapur Anda, kapan pun
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container mb-5 justify-content-center">
        <div class="container py-4">
            <div class="row gx-3 gy-3">
                <div class="col-md-3">
                    <div class="bg-light rounded-3 h-100 p-3 d-flex align-items-center">
                        <img src="{{asset('images/about-1.png')}}" alt="dot" class="img-fluid"
                            style="width: 25px;  margin-right: 15px;">
                        <strong class="text-success">Teknisi Bersertifikat</strong>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-light rounded-3 h-100 p-3 d-flex align-items-center">
                        <img src="{{asset('images/about-2.png')}}" alt="dot" class="img-fluid"
                            style="width: 25px;  margin-right: 15px;">
                        <strong class="text-success">Sparepart Asli & Bergaransi</strong>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-light rounded-3 h-100 p-3 d-flex align-items-center">
                        <img src="{{asset('images/about-3.png')}}" alt="dot" class="img-fluid"
                            style="width: 20px; margin-right: 15px;">
                        <strong class="text-success">Respon Cepat & Layanan On-site</strong>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-light rounded-3 h-100 p-3 d-flex align-items-center">
                        <img src="{{asset('images/about-4.png')}}" alt="dot" class="img-fluid"
                            style="width: 25px; margin-right: 15px;">
                        <strong class="text-success">Dukungan Purna Jual & Kontrak Service Berkala</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- layanan kami -->
    <section id="layanan"class="mb-5" style="padding-top: 3.25rem; padding-bottom: 3.25rem; background-color: #F9F9F9">
        <div class="container">
            <p class="montserrat-bold text-center mb-4" style="font-size: 3.125rem;">Layanan kami</p>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="{{url('/layanan-kami/kompor-gas')}}"
                        class="card shadow border-0 rounded-4 overflow-hidden text-decoration-none">
                        <div class="position-relative">
                            <img src="images/3 service kompor.jpg" alt="Service Kompor" class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">

                            <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                                <div class="icon-circle bg-success text-white">
                                    <i class="bi bi-fire" style="font-size: 1.9rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4">
                            <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Service Kompor</p>
                            <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">
                                Kendala pada Kompor untuk api merah dan Kompor
                                anda mati segera di tangani</p>
                            <p class="text-success m-0 text-arrow-layanan">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="{{url('/layanan-kami/kulkas-chiller-&-freezer')}}"
                        class="card shadow border-0 rounded-4 overflow-hidden text-decoration-none">
                        <div class="position-relative">
                            <img src="images/6 servis kulkas.jpg" alt="Service Kompor" class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">

                            <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                                <div class="icon-circle bg-success text-white">
                                    <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4">
                            <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Pembersihan & Servis Kulkas</p>
                            <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">
                                Jaga performa kulkas anda dengan servis berkala dan perbaikan profesional</p>
                            <p class="text-success m-0 text-arrow-layanan">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="{{url('/layanan-kami/servis-open-&-steamer')}}"
                        class="card shadow border-0 rounded-4 overflow-hidden text-decoration-none">
                        <div class="position-relative">
                            <img src="images/5 diswasher.jpg" alt="Service Kompor" class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">

                            <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                                <div class="icon-circle bg-success text-white">
                                    <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4">
                            <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Servis Dishwasher & Manual Sink
                            </p>
                            <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">
                                perbaikan dan perawatan mesin Dishwasher serta manual sink di dapur Rumah Sakit dan Industri
                            </p>
                            <p class="text-success m-0 text-arrow-layanan">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="{{url('/layanan-kami/penjualan-sparepart')}}"
                        class="card shadow border-0 rounded-4 overflow-hidden text-decoration-none">
                        <div class="position-relative">
                            <img src="images/1 sparepart.jpg" alt="Service Kompor" class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">

                            <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                                <div class="icon-circle bg-success text-white">
                                    <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4">
                            <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Penjualan Sparepart</p>
                            <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">
                                Penyedia suku cadang asli dan kualitas terjamin, langsung dari ahlinya sesuai kebutuhan</p>
                            <p class="text-success m-0 text-arrow-layanan">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="{{url('/layanan-kami/maintenance-&-instalasi-sistem-gas')}}"
                        class="card shadow border-0 rounded-4 overflow-hidden text-decoration-none">
                        <div class="position-relative">
                            <img src="images/4 trolley & furniture ss.jpg" alt="Service Kompor" class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">

                            <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                                <div class="icon-circle bg-success text-white">
                                    <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4">
                            <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Trolley & Furniture SS Kitchen
                            </p>
                            <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">
                                Pastikan trolley dan furniture dengan stainless steel yang bersih dan berfungsi dengan baik
                            </p>
                            <p class="text-success m-0 text-arrow-layanan">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="{{url('/layanan-kami/pembersihan-&-servis-hood-dapur')}}"
                        class="card shadow border-0 rounded-4 overflow-hidden text-decoration-none">
                        <div class="position-relative">
                            <img src="images/2 service hood.jpg" alt="Service Kompor" class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">

                            <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                                <div class="icon-circle bg-success text-white">
                                    <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4">
                            <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Instalasi Gas & Hood System</p>
                            <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">
                                Maintenance instalasi gas dan Hood agar higienis dan
                                fungsional, untuk keselamatan dan performa baik</p>
                            <p class="text-success m-0 text-arrow-layanan">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="mb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-5">
                    <p class="montserrat-bold mb-1" style="color: #1A8754; font-size:1.25rem;">Who We Are</p>
                    <p class="montserrat-bold" style="color: #00000; font-size:2.5rem;">Bikin Dapur Tetep Jalan Gapake Drama
                    </p>
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <p style="font-size: 1.25rem;" class="text-muted manrope">Kami berkomitmen untuk mendukung kelancaran
                        operasional dapur Anda melalui layanan servis dan penyediaan sparepart yang andal. Fokus kami adalah
                        memberikan solusi praktis untuk menjaga dapur tetap berjalan optimal baik di rumah, restoran, hotel,
                        maupun industri kuliner lainnya.</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card rounded-4 border-0 shadow justify-content-end p-3"
                        style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80'); background-size: cover; min-height: 300px;">
                        <div class="card p-3 border-0">
                            <p class="m-1 montserrat-bold" style="font-size: 1.25rem;">Visi Kami</p>
                            <p class="m-0 manrope-medium" style="font-size:13px;">Menjadi mitra terpercaya dalam mendukung
                                operasional dapur pelanggan dengan layanan service dan penyediaan spare part terbaik di
                                Indonesia.</p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card rounded-4 border-0 shadow justify-content-end p-3"
                        style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80'); background-size: cover; min-height: 300px;">
                        <div class="card p-3 border-0">
                            <p class="m-1 montserrat-bold" style="font-size: 1.25rem;">Misi Kami</p>
                            <p class="m-0 manrope-medium" style="font-size:13px;">Memberikan solusi cepat dan tepat untuk
                                setiap permasalahan alat dapur. Menyediakan produk dan sparepart berkualitas dengan harga
                                kompetitif. Menjalin hubungan jangka panjang dengan pelanggan melalui layanan terbaik.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="ajukan-service">
        @include('guest.partials.ajukan-service')
    </section>

    <section
        style="height:50vh; background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80'); background-size: cover; background-position: center;">
        <div class="d-flex justify-content-center flex-column align-items-center h-100" style="background-color:#1A875473;">
            <p class="montserrat-bold text-white" style="font-size:3.75rem;">Donwload Brosur Kami</p>
            <a href="{{ asset('document/Brosure jadibener.pdf') }}" download class="btn btn-warning px-4">Download &nbsp; <i
                    class="fa fa-download" aria-hidden="true"></i></a>
        </div>
    </section>
@endsection