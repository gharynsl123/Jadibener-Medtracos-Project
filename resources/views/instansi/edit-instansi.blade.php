@extends('layouts.main-view')

@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Instansi</h1>
</div>

<div class="card p-3 border-left-primary shadow-lg">
    <form action="{{ url('/update-instansi/' . $instansi->id) }}" class="row" enctype="multipart/form-data"
        method="post">
        @csrf
        @method('PUT')
        <div class="col-md-6 form-group">
            <input type="text" placeholder="Nama Rumah Sakit" required name="name" id="" class="form-control"
                value="{{ $instansi->name }}">
        </div>
        <div class="col-md-6 form-group">
            <select name="provinsi" required class="form-control" id="">
                <option value="">-- Select Provinsi --</option>
                <option value="Aceh" {{$instansi->provinsi == 'Aceh' ? 'selected' : '' }} >Aceh</option>
                <option value="Sumatera Utara" {{$instansi->provinsi == 'Sumatera Utara' ? 'selected' : '' }} >Sumatera Utara</option>
                <option value="Sumatera Selatan" {{$instansi->provinsi == 'Sumatera Selatan' ? 'selected' : '' }} >Sumatera Selatan</option>
                <option value="Sumatera Barat" {{$instansi->provinsi == 'Sumatera Barat' ? 'selected' : '' }} >Sumatera Barat</option>
                <option value="Bengkulu" {{$instansi->provinsi == 'Bengkulu' ? 'selected' : '' }} >Bengkulu</option>
                <option value="Riau" {{$instansi->provinsi == 'Riau' ? 'selected' : '' }} >Riau</option>
                <option value="Kepulauan Riau" {{$instansi->provinsi == 'Kepulauan Riau' ? 'selected' : '' }} >Kepulauan Riau</option>
                <option value="Jambi" {{$instansi->provinsi == 'Jambi' ? 'selected' : '' }} >Jambi</option>
                <option value="Lampung" {{$instansi->provinsi == 'Lampung' ? 'selected' : '' }} >Lampung</option>
                <option value="Bangka Belitung" {{$instansi->provinsi == 'Bangka Belitung' ? 'selected' : '' }} >Bangka Belitung</option>
                <option value="Kalimantan Barat" {{$instansi->provinsi == 'Kalimantan Barat' ? 'selected' : '' }} >Kalimantan Barat</option>
                <option value="Kalimantan Timur" {{$instansi->provinsi == 'Kalimantan Timur' ? 'selected' : '' }} >Kalimantan Timur</option>
                <option value="Kalimantan Selatan" {{$instansi->provinsi == 'Kalimantan Selatan' ? 'selected' : '' }} >Kalimantan Selatan</option>
                <option value="Kalimantan Tengah" {{$instansi->provinsi == 'Kalimantan Tengah' ? 'selected' : '' }} >Kalimantan Tengah</option>
                <option value="Kalimantan Utara" {{$instansi->provinsi == 'Kalimantan Utara' ? 'selected' : '' }} >Kalimantan Utara</option>
                <option value="Banten" {{$instansi->provinsi == 'Banten' ? 'selected' : '' }} >Banten</option>
                <option value="DKI Jakarta" {{$instansi->provinsi == 'DKI Jakarta' ? 'selected' : '' }} >DKI Jakarta</option>
                <option value="Jawa Barat" {{$instansi->provinsi == 'Jawa Barat' ? 'selected' : '' }} >Jawa Barat</option>
                <option value="Jawa Tengah" {{$instansi->provinsi == 'Jawa Tengah' ? 'selected' : '' }} >Jawa Tengah</option>
                <option value="Daerah Istimewa Yogyakarta" {{$instansi->provinsi == 'Daerah Istimewa Yogyakarta' ? 'selected' : '' }} >Daerah Istimewa Yogyakarta</option>
                <option value="Jawa Timur" {{$instansi->provinsi == 'Jawa Timur' ? 'selected' : '' }} >Jawa Timur</option>
                <option value="Bali" {{$instansi->provinsi == 'Bali' ? 'selected' : '' }} >Bali</option>
                <option value="Nusa Tenggara Timur" {{$instansi->provinsi == 'Nusa Tenggara Timur' ? 'selected' : '' }} >Nusa Tenggara Timur</option>
                <option value="Nusa Tenggara Barat" {{$instansi->provinsi == 'Nusa Tenggara Barat' ? 'selected' : '' }} >Nusa Tenggara Barat</option>
                <option value="Gorontalo" {{$instansi->provinsi == 'Gorontalo' ? 'selected' : '' }} >Gorontalo</option>
                <option value="Sulawesi Barat" {{$instansi->provinsi == 'Sulawesi Barat' ? 'selected' : '' }} >Sulawesi Barat</option>
                <option value="Sulawesi Tengah" {{$instansi->provinsi == 'Sulawesi Tengah' ? 'selected' : '' }} >Sulawesi Tengah</option>
                <option value="Sulawesi Utara" {{$instansi->provinsi == 'Sulawesi Utara' ? 'selected' : '' }} >Sulawesi Utara</option>
                <option value="Sulawesi Tenggara" {{$instansi->provinsi == 'Sulawesi Tenggara' ? 'selected' : '' }} >Sulawesi Tenggara</option>
                <option value="Sulawesi Selatan" {{$instansi->provinsi == 'Sulawesi Selatan' ? 'selected' : '' }} >Sulawesi Selatan</option>
                <option value="Maluku Utara" {{$instansi->provinsi == 'Maluku Utara' ? 'selected' : '' }} >Maluku Utara</option>
                <option value="Maluku" {{$instansi->provinsi == 'Maluku' ? 'selected' : '' }} >Maluku</option>
                <option value="Papua Barat" {{$instansi->provinsi == 'Papua Barat' ? 'selected' : '' }} >Papua Barat</option>
                <option value="Papua" {{$instansi->provinsi == 'Papua' ? 'selected' : '' }} >Papua</option>
                <option value="Papua Tengah" {{$instansi->provinsi == 'Papua Tengah' ? 'selected' : '' }} >Papua Tengah</option>
                <option value="Papua Pegunungan" {{$instansi->provinsi == 'Papua Pegunungan' ? 'selected' : '' }} >Papua Pegunungan</option>
                <option value="Papua Selatan" {{$instansi->provinsi == 'Papua Selatan' ? 'selected' : '' }} >Papua Selatan</option>
                <option value="Papua Barat Daya" {{$instansi->provinsi == 'Papua Barat Daya' ? 'selected' : '' }} >Papua Barat Daya</option>
                <!-- Pilih provinsi sesuai data yang tersedia -->
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select name="type" required class="form-control" id="">
                <option value="">-- Select Tipe --</option>
                <option value="Rumah Sakit Umum Kelas A"
                    {{$instansi->type == 'Rumah Sakit Umum Kelas A' ? 'selected' : '' }}>Rumah Sakit Umum Kelas A</option>
                <option value="Rumah Sakit Umum Kelas B"
                    {{$instansi->type == 'Rumah Sakit Umum Kelas B' ? 'selected' : '' }}>Rumah Sakit Umum Kelas B</option>
                <option value="Rumah Sakit Umum Kelas C"
                    {{$instansi->type == 'Rumah Sakit Umum Kelas C' ? 'selected' : '' }}>Rumah Sakit Umum Kelas C</option>
                <option value="Rumah Sakit Umum Kelas D"
                    {{$instansi->type == 'Rumah Sakit Umum Kelas D' ? 'selected' : '' }}>Rumah Sakit Umum Kelas D</option>
                <option value="Rumah Sakit Khusus Kelas A"
                    {{$instansi->type == 'Rumah Sakit Khusus Kelas A' ? 'selected' : '' }}>Rumah Sakit Khusus Kelas A</option>
                <option value="Rumah Sakit Khusus Kelas B"
                    {{$instansi->type == 'Rumah Sakit Khusus Kelas B' ? 'selected' : '' }}>Rumah Sakit Khusus Kelas B</option>
                <option value="Rumah Sakit Khusus Kelas C"
                    {{$instansi->type == 'Rumah Sakit Khusus Kelas C' ? 'selected' : '' }}>Rumah Sakit Khusus Kelas C</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select name="jenis" required class="form-control" id="">
                <option value="">-- Select Jenis --</option>
                <option value="pemerintah" {{$instansi->jenis == 'pemerintah' ? 'selected' : ''}}>pemerintah</option>
                <option value="swasta" {{$instansi->jenis == 'swasta' ? 'selected' : ''}}>swasta</option>
                <option value="BUMN" {{$instansi->jenis == 'BUMN' ? 'selected' : ''}}>BUMN</option>
                <option value="TNI/Polri" {{$instansi->jenis == 'TNI/Polri' ? 'selected' : ''}}>TNI/Polri</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <input type="file" name="photo" id="" class="form-control">
        </div>
        <div class="col-md-12 form-group">
            <textarea name="address" required placeholder="Alamat Rumah Sakit" class="form-control" id="" cols="30"
                rows="10">{!! $instansi->address !!}</textarea>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/instansi" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection