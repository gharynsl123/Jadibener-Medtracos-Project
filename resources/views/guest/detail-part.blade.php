@extends('layouts.welcome')

@section('content')
<style>
    .custom-img-size {
    height: 450px;
    object-fit: contain;
}
</style>
<div class="container py-4">

    <!-- DETAIL ALAT -->
<div class="row g-4">
    <!-- Gambar -->
    <div class="col-md-4">
  <div style="height: 450px;" class="d-flex align-items-center justify-content-center overflow-hidden">
    <img src="{{ asset('/images/header-background.png') }}"
         class="w-100 h-100 object-fit-cover rounded shadow-sm"
         alt="Gambar Alat">
  </div>
</div>

    <!-- Informasi & Deskripsi -->
    <div class="col-md-4 ">
        <div class="d-flex flex-column gap-3">
            <h2 class="fw-bold mb-1">{{ $part->name }}</h2>
        
        <div class="d-flex align-items-center gap-3 mb-2">
            <span class="badge bg-success px-3 py-2 fs-6 fw-medium">{{ $part->kategori }}</span>
            <small class="text-muted">Terjual <strong>1rb</strong></small>
        </div>

        <h4 class="text-success fw-bold mb-3">
            {{ isset($part->price) && $part->price > 0 ? 'Rp' . number_format($part->price, 0, ',', '.') : 'Rp 100.000,00 {dummy}' }}
        </h4>

        </div>
        

        <h6 class="fw-semibold mb-1">Detail</h6>
    <div id="description-container" class="border rounded p-3 overflow-auto" style="max-height: 25rem;">
        {{ $part->description ?? 'lorem ipsum dolor sit amet...' }}
    </div>
    </div>

   <!-- Atur Jumlah + Form Permintaan -->
<div class="col-md-4">
  <div class="bg-success-subtle p-2 mb-3 rounded-top rounded-bottom text-center fw-medium" style="background-color: #d1f7d6;">
    www.jadibener.com
  </div>
  <div class="border rounded-bottom shadow-sm p-3">
    <h6 class="fw-semibold mb-3">Atur Jumlah</h6>

    <!-- Counter dan Stok -->
    <div class="d-flex align-items-center justify-content-between mb-3">
      <div class="d-flex align-items-center">
        <button class="btn btn-outline-secondary px-3" type="button">+</button>
        <input type="text" class="form-control text-center mx-2" value="1" style="max-width: 60px;" readonly>
        <button class="btn btn-outline-secondary px-3" type="button">-</button>
      </div>
      <div class="fw-medium">Stok: 824</div>
    </div>

    <!-- Subtotal -->
    <div class="d-flex justify-content-between mb-3">
      <span class="fw-medium">Subtotal</span>
      <span class="fw-bold  fs-5">300.000</span>
    </div>

    <!-- Form di dalam Card -->
    <form action="{{ url('/submit-reques-part', $part->name) }}" method="POST">
      @csrf
      <div class="mb-2">
        <input type="text" class="form-control" name="name-user" placeholder="Nama Lengkap" required>
      </div>
      <div class="mb-2">
        <input type="text" class="form-control" name="name-user" placeholder="Nama Perusahaan" required>
      </div>
      <div class="mb-2">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>
      <div class="mb-2">
        <input type="tel" class="form-control" name="phone" placeholder="Nomor HP" required>
      </div>
      <div class="mb-2">
        <select class="form-select" name="part-name" required>
          <option selected value="{{ $part->name }}" disabled>{{ $part->name }}</option>
        </select>
      </div>
      <div class="mb-2">
        <textarea class="form-control" rows="3" name="description" placeholder="Detail permintaan atau catatan tambahan"></textarea>
      </div>
      <button class="btn btn-success w-100 fw-medium rounded" type="submit">Kirim Permintaan</button>
    </form>
  </div>
</div>


</div>

    <!-- FORM PERMINTAAN SPAREPART -->
    <!-- <div class="mt-5">
        <h4 class="fw-semibold">Form Permintaan Sparepart</h4>
        <form action="{{ url('/submit-reques-part', $part->name) }}" class="row g-3" method="POST">
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
                    <option selected value="{{ $part->name }}" disabled>{{ $part->name }}</option>
                </select>
            </div>
            <div class="col-12">
                <textarea class="form-control" rows="4" name="description" placeholder="Detail permintaan atau catatan tambahan"></textarea>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button class="btn btn-success px-4" type="submit">Kirim Permintaan</button>
            </div>
        </form>
    </div>
</div> -->
@endsection
