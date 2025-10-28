@extends('layouts.main-view')
@section('content')

<div class="d-flex">
    <div>
        <a href="{{url('/instansi')}}" class="btn mr-3 btn-secondary">Kembali</a>
    </div>
    <h2 class="my-0 p-0">Detail Rumah Sakit / Institusi</h2>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="form-group">
            @if($instansi->photo)
            <!-- ambil gambar -->
            <img src="{{ asset('storage/instansi_images/'.$instansi->photo) }}" style="height:350px;"
                class="img-thumbnail" alt="Responsive image">
            @else
            <p>No Image Available</p>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama-rumah-sakit">Nama Rumah Sakit / Institusi</label>
            <input type="text" class="form-control" value="{{ $instansi->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="jumlah-bed">Tipe Rumah Sakit</label>
            <input type="text" class="form-control" value="{{ $instansi->type }}" readonly>
        </div>
        <div class="form-group">
            <label for="pic">Jenis Instansi</label>
            <input type="text" class="form-control" value="{{ ucfirst($instansi->jenis) }}" readonly>
        </div>
        <label for="" class="m-0">alamat</label>
        <p class="mt-0">{!! $instansi->address !!}</p>

        <a href="{{url('/edit-instansi', $instansi->slug)}}" class="btn btn-warning btn-sm"><i
                class="fa fa-pen-to-square"></i> edit</a>
        <a href="{{route('surveyor.data.add', $instansi->slug)}}" class="btn btn-primary btn-sm"><i
                class="fa fa-add"></i> add pic</a>
    </div>
</div>

<div class="card p-3 border-left-primary mt-4">
    @if($user)
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>nama PIC</th>
                    <th>role</th>
                    <th>barang yang terdata</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $items)
                <tr>
                    <td>{{$items->name}}({{$items->username}})</td>
                    <td>{{$items->departement}}</td>
                    <td>
                        {{$jumlahPeralatanPerDepartemen[$items->departement]}} peralatan
                    </td>
                    <td>
                        <form action="{{ route('destroy.user', $items->id) }}" method="post">

                            <a href="{{route('add-survey.tools', $items->slug)}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i>
                                <span class="d-none d-sm-inline-block">
                                    Tambah Barang
                                </span>
                            </a>
                            <a target="_blank" href="{{ route('export.equipment.pdf', [
                                'id_instansi' => $items->id_instansi,
                                'departement' => $items->departement
                            ]) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-file"></i>
                                <span class="d-none d-sm-inline-block">Print Alat</span>
                            </a>
                            <!-- Gantilah kode tombol filter alat dengan ini -->
                            <a href="#" class="btn btn-sm btn-info btn-filter-alat"
                                data-departement="{{$items->departement}}">
                                <i class="fas fa-eye"></i>
                                <span class="d-none d-sm-inline-block">
                                    filter alat
                                </span>
                            </a>

                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus user {{$items->name}} ini?')"
                                class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>Belum ada PIC</p>
    @endif
    <hr class="my-4">
    <div class="table-responsive">
        <table class="table table-borderless table-hover" id="dataTable">
            <thead>
                <tr class="text-white bg-dark-ori-web">
                    <th class="rounded-left">Nama Instansi</th>
                    <th>Produk</th>
                    <th class="d-none">kategori</th>
                    <th class="d-none">merek</th>
                    <th class="d-none">departement</th>
                    <th>Serial Number</th>
                    <th>Instalasi</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th class="rounded-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipment as $item)
                <tr data-departement="{{$item->departement}}">
                    <td>{{$item->instansi->name}}</td>
                    <td>{{$item->poducts->name}}</td>
                    <td class="d-none">{{$item->categories->name}}</td>
                    <td class="d-none">{{$item->brands->name}}</td>
                    <td class="d-none">{{$item->departement}}</td>
                    <td>{{$item->serial_number}}</td>
                    <td>{{$item->installation}}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuenow="{{$item->condition}}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{$item->condition}}%">
                                {{$item->condition}}</div>
                        </div>
                    </td>
                    <td>{{$item->description}}</td>
                    <td>
                        <form action="{{route('destroy.tools', $item->id)}}" method="post">
                            <a href="{{url('/detail-equipment', $item->slug)}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{url('/edit-equipment', $item->slug)}}" class="btn btn-sm btn-success">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus {{$item->poducts->name}} ?')"
                                class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {
    var currentFilter = null;

    // Tangkap klik pada tombol filter alat
    $('.btn-filter-alat').on('click', function(e) {
        e.preventDefault();

        // Dapatkan departemen yang dipilih
        var selectedDepartement = $(this).data('departement');

        // Periksa apakah filter sedang aktif atau tidak
        if (currentFilter === selectedDepartement) {
            // Jika tombol departemen yang sama diklik lagi, hapus filter
            removeFilter();
        } else {
            // Jika tombol departemen yang berbeda diklik, terapkan filter
            applyFilter(selectedDepartement);
        }
    });

    // Fungsi untuk menerapkan filter
    function applyFilter(departement) {
        // Simpan nilai departemen yang sedang difilter
        currentFilter = departement;

        // Semua baris tabel equipment
        var rows = $('#dataTable tbody tr');

        // Sembunyikan semua baris
        rows.hide();

        // Tampilkan hanya baris dengan departemen yang sesuai
        rows.filter('[data-departement="' + departement + '"]').show();
    }

    // Fungsi untuk menghapus filter
    function removeFilter() {
        // Setel nilai filter ke null
        currentFilter = null;

        // Tampilkan kembali semua baris
        $('#dataTable tbody tr').show();
    }
});
</script>
@endsection