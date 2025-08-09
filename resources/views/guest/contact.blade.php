@extends('layouts.welcome')
@section('content')
    <style>
        body {
            background-color: #fff;
        }

        .icon-circle-sm {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #218653;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }


        .contact-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #198754;
        }

        .form-section input,
        .form-section textarea {
            border-radius: 5px;
           
        }

        .map iframe {
            border-radius: 10px;
            
        }

        @media (max-width: 767.98px) {
            .icon-circle {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
    </style>
    <section class="hero-header position-relative text-white mb-5" style="height: 300px;">
        <img src="{{ asset('images/1 sparepart.jpg') }}"
            class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover" alt="Header Image"
            style="z-index: 1; object-fit: cover;" />

        <div class="overlay position-absolute top-0 start-0 w-100 h-100"
            style="background-color: rgba(0, 0, 0, 0.6); z-index: 2;"></div>

        <div
            class="position-relative z-3 d-flex flex-column align-items-center justify-content-center h-100 px-3 text-center">
            <h1 class="fw-bold display-4 mb-3">Hubungi Kami</h1>
            <p style="font-size: 15px; opacity: 80%;" class="w-75" >
                Kami siap bantu dapur Anda tetap jalan tanpa drama. <br />
                Tim JadiBener siap melayani pertanyaan, permintaan layanan, maupun konsultasi teknis terkait instalasi,
                perbaikan, dan pengadaan sparepart dapur rumah sakit atau industri.
            </p>
        </div>

    </section>

    <div class="container my-5 px-3">

        <section class="p-0 bg-transparent border-0">

            <div class="row align-items-center g-5">
                <div class="col-md-5">
                    <div class="contact-section p-4">
                        <button class="btn btn-success mb-3">Contact Us</button>
                        <p class="text-success manrope-bold" style="font-size: 30px; margin-bottom: 5rem;">
                            Butuh Informasi Lebih Lanjut?
                            Hubungi Kami
                        </p>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="icon-circle-sm bg-success text-white me-3">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                    <div class="my-auto">
                                        <p class="mb-0">+62 812-1000-9683</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="icon-circle-sm bg-success text-white me-3">
                                        <i class="bi bi-envelope-fill"></i>
                                    </div>
                                    <div class="my-auto">
                                        <p class="mb-0">CS@jadibener.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="icon-circle-sm bg-success text-white me-3">
                                        <i class="bi bi-clock-fill"></i>
                                    </div>
                                    <div>
                                        <p class="mb-1">Senin – Sabtu</p>
                                        <p class="mb-0">08:00 – 17:00 WIB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="icon-circle-sm bg-success text-white me-3">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                    <div class="my-auto">
                                        <p class="mb-0">Jakarta - Indonesia</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-section bg-light bg-light rounded-3 p-4">
                        <form class="row g-3">
                            <div class="col-12">
                                <input type="text" placeholder="Nama Lengkap:" required class="form-control" />
                            </div>

                            <div class="col-md-6">
                                <input type="text" placeholder="Nama Institusi:" required class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Jabatan:" required class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <input type="tel" placeholder="Email:" required class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nomor HP:" required class="form-control" />
                            </div>

                            <div class="col-md-6">
                                <textarea placeholder="Judul:" required rows="4" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea placeholder="Deskripsi:" required rows="4" class="form-control"></textarea>
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-success px-4" type="submit">
                                    Kirim Formulir
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="mt-5">
                <div
                    class="d-flex justify-content-between align-items-center flex-column flex-md-row bg-white p-4 rounded-3">
                    <h5 class="mb-3 mb-md-0 fw-medium text-md-start">Masih Bingung? Hubungi tim kami langsung
                        sekarang juga</h5>
                    <a href="https://wa.me/6281210009683" class="btn btn-success px-3" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i> Chat Via WhatsApp
                    </a>
                </div>

                <div class="map mt-4">
                    <iframe src="https://maps.google.com/maps?q=Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        style="width:100%; height:300px; border:0;" allowfullscreen></iframe>
                </div>
            </div>
        </section>
    </div>
@endsection