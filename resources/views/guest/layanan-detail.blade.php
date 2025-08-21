@extends('layouts.welcome')

@section('content')
    <style>
        .custom-select {
            background-color: transparent;
            border: none;
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            padding: 0 1.5rem 0 0;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            position: relative;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg width='12' height='8' viewBox='0 0 12 8' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M6 8L0 0h12L6 8z' fill='%23333'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 12px 8px;
        }

        .custom-select:focus {
            outline: none;
        }

        #description-container {
            max-height: none;
            overflow: visible;
        }

        /* Desktop only: aktifin scroll dan batas tinggi */
        @media (min-width: 768px) {
            #description-container {
                max-height: 450px;
                overflow: auto;
            }
        }
    </style>
    <section class="hero-header position-relative text-white mb-5" style="height: 300px;">
        <img src="{{ asset('images/' . $images) }}"
            class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover" alt="Header Image"
            style="z-index: 1; object-fit: cover;" />

        <div class="overlay position-absolute top-0 start-0 w-100 h-100"
            style="background-color: rgba(0, 0, 0, 0.6); z-index: 2;"></div>

        <div
            class="position-relative z-3 d-flex flex-column align-items-center justify-content-center h-100 px-3 text-center">
            <h1 class="fw-bold display-4 mb-3">{{$title}}</h1>
        </div>

    </section>

    <section>
        <div class="mb-3 text-center">
            <h2 class="mx-auto mb-4">
                <!-- ambil dari data service sub-title -->
                 {{$subtitle}}
            </h2>
            <p class="mx-auto" style="max-width: 1000px;">
                {!! $descriptions !!}
            </p>
        </div>
    </section>

    <section class="container mt-5 justify-content-center align-items-center d-flex" id="tentang">
        <div class="row d-flex align-items-center">

            <div class="col-lg-6 col-md-12 col-sm-12 mb-3 d-flex justify-content-center">
                <img src="{{asset('images/layanan kami.png')}}" alt="layanan kami" class="img-fluid"
                    style="max-width: 80%;">
            </div>


            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="d-flex flex-column">


                    <p class="montserrat-bold" style="font-size: 2rem;">
                        Jenis Layanan Kami
                    </p>

                    <p class="manrope-medium"
                        style="font-size: 0.90rem; line-height: 1.5; color: #858788; text-align: justify;">
                        {!! $layanan !!}
                    </p>
                    <p class="montserrat-bold" style="font-size: 2rem;">
                        Kelebihan Layanan Kami
                    </p>
                    <p class="manrope-medium"
                        style="font-size: 0.90rem; line-height: 1.5; color: #858788; text-align: justify;">
                        {!! $kelebihan !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-12 py-3 mt-5 justify-content-center align-items-center d-flex flex-column">
                <h3 class="text-center">Ajukan Service</h3>
                @include('guest.partials.ajukan-service')
            </div>
        </div>
    </div>

    <script>
        const descriptions = @json($descriptions);
        const subtitle = @json($subtitle);

        document.getElementById('category-select').addEventListener('change', function () {
            const selected = this.value;
            const html = descriptions[selected] || "<p>Deskripsi tidak tersedia.</p>";
            const subtitlehtml = subtitle[selected] || "<p></p>";

            document.getElementById('subtitle-text').innerHTML = subtitlehtml;
            document.getElementById('description-container').innerHTML = html;
        });
    </script>
@endsection