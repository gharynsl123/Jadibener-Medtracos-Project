@extends('layouts.welcome')
@section('content')
<style>
    body {
        background-color: #3C7A53;
    }

    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    @media (max-width: 767.98px) {
        .card h2 {
            font-size: 1.5rem;
        }

        .card h3 {
            font-size: 1.2rem;
        }

        .card p,
        .card input,
        .card textarea {
            font-size: 0.9rem;
        }

        .btn {
            font-size: 0.9rem;
        }

        .icon-circle {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }
    }
</style>

<div class="container my-5 px-3">
    <section class="card p-0 bg-light border-0 shadow-lg">
        <div class="p-3">
            <h2 class="mb-4 fw-bold">Hubungi Kami</h2>
            <div class="row p-1">
                <div class="col-md-6">
                    <div class="d-flex align-items-start mb-4">
                        <div class="icon-circle bg-success text-white me-3">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="my-auto">
                            <p class="mb-0">Jakarta, Indonesia</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-4">
                        <div class="icon-circle bg-success text-white me-3">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="my-auto">
                            <p class="mb-0">+62 812-3456-7890</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-4">
                        <div class="icon-circle bg-success text-white me-3">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="my-auto">
                            <p class="mb-0">jadibener@jadibener.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="icon-circle bg-success text-white me-3">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <div>
                            <p class="mb-1">Senin – Sabtu,</p>
                            <p class="mb-0">08:00 – 17:00 WIB</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0 rounded">
                    <div class="map h-100">
                        <iframe src="https://maps.google.com/maps?q=Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            style="width:100%; height:100%; border:0; min-height:300px;" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h3>Isi Formulir</h3>
                <form class="d-flex flex-column gap-3">
                    <input type="text" placeholder="Nama Lengkap" required class="form-control" />
                    <input type="email" placeholder="Email" required class="form-control" />
                    <input type="tel" placeholder="Nomor HP" required class="form-control" />
                    <textarea placeholder="Pesan" required class="form-control"></textarea>
                    <div>
                        <button class="btn btn-success" type="submit">Kirim Pesan</button>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-column flex-md-row gap-3 bg-white py-3 px-4 justify-content-between align-items-center">
                <p class="m-0 fw-bold text-center text-md-start">
                    Masih bingung? Hubungi tim kami langsung sekarang juga!
                </p>
                <a href="https://wa.me/6281234567890" class="btn btn-success" target="_blank">Chat via WhatsApp</a>
            </div>
        </div>
    </section>
</div>
@endsection
