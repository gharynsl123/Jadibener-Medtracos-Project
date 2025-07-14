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

<div class="container py-3">
    <div class="row">
        <div class="col-md-6  py-3">
            <div class="d-flex gap-2 align-items-center">
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-small">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
                <h4 class="m-0 ">{{ $title }}</h4>
            </div>

            <div class="my-3 d-flex flex-column position-relative">
                @if($categories && count($categories) > 1)
                <select id="category-select" class="custom-select">
                    <option value="{{ $categories[0] }}" selected>KATEGORI {{ $categories[0] }}</option>
                    @foreach ($categories as $index => $category)
                        @if ($index !== 0)
                            {{-- Menghindari kategori pertama yang sudah dipilih --}}
                            <option value="{{ $category }}">KATEGORI {{ $category }}</option>
                        @endif
                    @endforeach
                </select>
                <div id="subtitle-text">
                    {!! $subtitle[$categories[0]] ?? 'Deskripsi tidak tersedia.' !!}
                </div>
                @endif
            </div>
            <div id="description-container">
                    {!! $descriptions[$categories[0]] ?? 'Deskripsi tidak tersedia.' !!}
            </div>
        </div>
        <div class="col-md-6 py-3 justify-content-center align-items-center d-flex flex-column">
            <h3 class="text-center">Ajukasn Service</h3>
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
