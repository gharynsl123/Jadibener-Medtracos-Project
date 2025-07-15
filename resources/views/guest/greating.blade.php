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
<section class="container mb-5 mt-5 justify-content-center align-items-center d-flex tentang-kami">
    <div class="row d-flex align-items-center">
        <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
            <img src="{{asset('images/layanan kami.png')}}" alt="layanan kami" class="img-fluid">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="d-flex flex-column">
                <div class="d-flex">
                    <img src="{{asset('images/dot.png')}}" alt="dot" class="img-fluid" style="width: 25px; height: 25px;">
                    <p class="ms-3">Tentang Kami</p>
                </div>
                <p class="montserrat-bold" style="font-size: 2.5rem; line-height: 1.1;">
                    Peralatan Dapur Rusak? <br><span class="text-success"> Serahkan pada Ahlinya!</span>
                </p>
                <p class="manrope-medium" style="font-size: 1.25rem; line-height: 1.5; color: #858788;">
                    Jadibener.com adalah layanan profesional untuk servis peralatan dapur dan penjualan sparepart, melayani rumah tangga, restoran, hotel, dan industri kuliner lainnya. Perbaikan cepat, tepat, dan bergaransi demi dapur yang selalu siap pakai.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- layanan kami -->
<section class="mb-5" style="padding-top: 3.25rem; padding-bottom: 3.25rem; background-color: #F9F9F9">
    <div class="container">
        <p class="montserrat-bold text-center" style="font-size: 3.125rem;">Layanan kami</p>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow border-0 rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/kompor.png" alt="Service Kompor" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                        
                        <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                            <div class="icon-circle bg-success text-white">
                                <i class="bi bi-fire" style="font-size: 1.9rem;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mt-4">
                        <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Service Kompor</p>
                        <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">Mesin cuci, trolley & lainnya. Siap untuk industri, RS, hotel, restoran.</p>
                        <p class="text-success m-0 text-arrow-layanan">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow border-0 rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/kompor.png" alt="Service Kompor" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                        
                        <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                            <div class="icon-circle bg-success text-white">
                                <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mt-4">
                        <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Pembersihan & Servis Kulkas</p>
                        <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">Pembersihan Terbasuk dalam bentuk ruangan atau kulkas.</p>
                        <p class="text-success m-0 text-arrow-layanan">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow border-0 rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/kompor.png" alt="Service Kompor" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                        
                        <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                            <div class="icon-circle bg-success text-white">
                                <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mt-4">
                        <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Servis Open & Steamer</p>
                        <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">penggantian elemen pemanas & perbaikan Digital.</p>
                        <p class="text-success m-0 text-arrow-layanan">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow border-0 rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/kompor.png" alt="Service Kompor" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                        
                        <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                            <div class="icon-circle bg-success text-white">
                                <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mt-4">
                        <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Penjualan Sparepart</p>
                        <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">katalog lengkap sparepart resmi dan purna jual bergaransi.</p>
                        <p class="text-success m-0 text-arrow-layanan">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow border-0 rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/kompor.png" alt="Service Kompor" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                        
                        <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                            <div class="icon-circle bg-success text-white">
                                <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mt-4">
                        <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Maintenance & Instalasi system gas</p>
                        <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">Pengecekan Kemanan & Perawatan berkala.</p>
                        <p class="text-success m-0 text-arrow-layanan">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow border-0 rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="/images/kompor.png" alt="Service Kompor" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                        
                        <div class="position-absolute bottom-1 start-0 translate-middle-y ms-3 mb-n3">
                            <div class="icon-circle bg-success text-white">
                                <i class="bi bi-fire" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mt-4">
                        <p class="montserrat-semibold m-0" style="font-size:1.25rem;">Pembersihan dan Servis Hood</p>
                        <p class="mb-2 mt-2 text-muted manrope-medium" style="font-size:0.938rem; max-width: 273px;">saluran ducting dalam beserta pergantian kipas hood.</p>
                        <p class="text-success m-0 text-arrow-layanan">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </p>
                    </div>
                </div>
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
                <p class="montserrat-bold" style="color: #00000; font-size:2.5rem;">Bikin Dapur Tetep Jalan Gapake Drama</p>
            </div>

            <div class="col-lg-6 col-md-12 mb-5">
                <p style="font-size: 1.25rem;" class="text-muted manrope">Kami berkomitmen untuk mendukung kelancaran operasional dapur Anda melalui layanan servis dan penyediaan sparepart yang andal. Fokus kami adalah memberikan solusi praktis untuk menjaga dapur tetap berjalan optimal baik di rumah, restoran, hotel, maupun industri kuliner lainnya.</p>
            </div>
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card rounded-4 border-0 shadow justify-content-end p-3" style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80'); background-size: cover; min-height: 300px;">
                    <div class="card p-3 border-0">
                        <p class="m-1 montserrat-bold" style="font-size: 1.25rem;">Visi Kami</p>
                        <p class="m-0 manrope-medium" style="font-size:13px;">Menjadi mitra terpercaya dalam mendukung operasional dapur pelanggan dengan layanan service dan penyediaan spare part terbaik di Indonesia.</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card rounded-4 border-0 shadow justify-content-end p-3" style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80'); background-size: cover; min-height: 300px;">
                    <div class="card p-3 border-0">
                        <p class="m-1 montserrat-bold" style="font-size: 1.25rem;">Misi Kami</p>
                        <p class="m-0 manrope-medium" style="font-size:13px;">Memberikan solusi cepat dan tepat untuk setiap permasalahan alat dapur. Menyediakan produk dan sparepart berkualitas dengan harga kompetitif. Menjalin hubungan jangka panjang dengan pelanggan melalui layanan terbaik.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section>
    @include('guest.partials.ajukan-service')
</section>

<section style="height:50vh; background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80'); background-size: cover; background-position: center;">
    <div class="d-flex justify-content-center flex-column align-items-center h-100" style="background-color:#1A875473;">
        <p class="montserrat-bold text-white" style="font-size:3.75rem;">Donwload Brosur Kami</p>
        <a href="{{ asset('document/Brosure jadibener.pdf') }}" download class="btn btn-warning px-4">Download &nbsp; <i class="fa fa-download" aria-hidden="true"></i></a>
    </div>
</section>
@endsection