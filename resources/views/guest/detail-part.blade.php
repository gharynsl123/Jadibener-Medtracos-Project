@extends('layouts.welcome')

@section('content')
<div class="container py-4">
    <!-- DETAIL ALAT -->
    <div class="row g-4">
        <!-- Gambar -->
        <div class="col-md-12 col-lg-5 d-flex align-items-center">
            <img src="{{asset('/images/header-background.png')}}" class="img-fluid rounded shadow-sm" alt="Gambar Alat">
        </div>

        <!-- Informasi & Deskripsi -->
        <div class="col-md-12 col-lg-7 position-relative">
            <h2 class="fw-bold">{{$part->name}}</h2>
            <p class="text-muted">Kategori: <span class="badge bg-success">{{$part->kategori}}</span></p>
            <h5 class="text-danger mb-3">
                {{ isset($part->price) && $part->price > 0 ? $part->price : 'Rp 100.000,00 {dummy}' }}
            </h5>

            <div id="description-container" class="border rounded p-3 overflow-auto" style="max-height: 11.7rem;">
                    {{$part->description ?? 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'}}
            </div>

        </div>
    </div>

    <!-- FORM PERMINTAAN SPAREPART -->
    <div class="mt-5">
        <h4 class="fw-semibold">Form Permintaan Sparepart</h4>
        <form action="{{url('/submit-reques-part', $part->name)}}" class="row g-3" method="POST">
            @csrf
            <div class="col-md-6">
                <input type="text" class="form-control" name="name-user" placeholder="Nama Lengkap" required>
            </div>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="col-md-6">
                <input type="tel" class="form-control" name="phone" placeholder="Nomor HP" required>
            </div>
            <div class="col-md-6">
                <select class="form-select" name="part-name" required>
                    <option selected value="{{$part->name}}" disabled>{{$part->name}}</option>
                </select>
            </div>
            <div class="col-12">
                <textarea class="form-control" rows="4" name="description" placeholder="Detail permintaan atau catatan tambahan"></textarea>
            </div>
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btn-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button class="btn btn-success px-4" type="submit">Kirim Permintaan</button>
            </div>
        </form>
    </div>
</div>
@endsection
