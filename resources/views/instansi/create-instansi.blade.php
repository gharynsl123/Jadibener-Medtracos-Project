@extends('layouts.main-view')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Instansi</h1>
</div>

<div class="card p-3 border-left-primary shadow-lg">
    <form action="{{url('/store-instansi')}}" class="row" enctype="multipart/form-data" method="post">
        @csrf
        <div class="col-md-6 form-group">
            <input type="text" placeholder="Nama Rumah Sakit" required name="name" id="" class="form-control">
        </div>
        <div class="col-md-6 form-group">
            <select name="provinsi" required class="form-control" id="">
                <option value="">-- Select Provinsi --</option>
                <option value="Aceh">Aceh</option>
                <option value="Sumatera Utara">Sumatera Utara</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Sumatera Barat">Sumatera Barat</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="Riau">Riau</option>
                <option value="Kepulauan Riau">Kepulauan Riau</option>
                <option value="Jambi">Jambi</option>
                <option value="Lampung">Lampung</option>
                <option value="Bangka Belitung">Bangka Belitung</option>
                <option value="Kalimantan Barat">Kalimantan Barat</option>
                <option value="Kalimantan Timur">Kalimantan Timur</option>
                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                <option value="Kalimantan Utara">Kalimantan Utara</option>
                <option value="Banten">Banten</option>
                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Bali">Bali</option>
                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                <option value="Gorontalo">Gorontalo</option>
                <option value="Sulawesi Barat">Sulawesi Barat</option>
                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                <option value="Sulawesi Utara">Sulawesi Utara</option>
                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                <option value="Maluku Utara">Maluku Utara</option>
                <option value="Maluku">Maluku</option>
                <option value="Papua Barat">Papua Barat</option>
                <option value="Papua">Papua</option>
                <option value="Papua Tengah">Papua Tengah</option>
                <option value="Papua Pegunungan">Papua Pegunungan</option>
                <option value="Papua Selatan">Papua Selatan</option>
                <option value="Papua Barat Daya">Papua Barat Daya</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select name="type" required class="form-control" id="">
                <option value="">-- Select Tipe --</option>
                <option value="Rumah Sakit Umum Kelas A">Rumah Sakit Umum Kelas A</option>
                <option value="Rumah Sakit Umum Kelas B">Rumah Sakit Umum Kelas B</option>
                <option value="Rumah Sakit Umum Kelas C">Rumah Sakit Umum Kelas C</option>
                <option value="Rumah Sakit Umum Kelas D">Rumah Sakit Umum Kelas D</option>
                <option value="Rumah Sakit Khusus Kelas A">Rumah Sakit Khusus Kelas A</option>
                <option value="Rumah Sakit Khusus Kelas B">Rumah Sakit Khusus Kelas B</option>
                <option value="Rumah Sakit Khusus Kelas C">Rumah Sakit Khusus Kelas C</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select name="jenis" required class="form-control" id="">
                <option value="">-- Select Jenis --</option>
                <option value="pemerintah">Pemerintah</option>
                <option value="swasta">Swasta</option>
                <option value="BUMN">BUMN</option>
                <option value="TNI/Polri">TNI/Polri</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <input type="file" name="photo" required class="form-control">
        </div>
        <div class="col-md-12 form-group">
            <textarea name="address" required placeholder="Alamat Rumah Sakit" class="form-control" id="" cols="30"
                rows="10"></textarea>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Tambahkan</button>
            <a href="/instansi" class="btn btn-secondary">cancel</a>
        </div>
    </form>
</div>
@endsection