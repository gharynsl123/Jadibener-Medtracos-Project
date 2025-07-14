@extends('layouts.main-view')
@section('content')
<form action="{{ route('pengajuan.store') }}" method="post">
    <div class="row">
        @csrf
        <div class="col-md-6 mt-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Informasi Peralatan</h5>
                    <div class="form-group d-none">
                        <label>user id</label>
                        <input type="text" class="form-control" name="id_user" value="{{$user->id}}"
                            readonly>
                    </div>
                    <div class="form-group d-none">
                        <label >id barang</label>
                        <input type="text" class="form-control" name="equipment_id"
                            value="{{$equipment->id}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="instansi">Instansi</label>
                        <input type="text" class="form-control" id="instansi" value="{{$equipment->instansi->name}}"
                            readonly>
                    </div>

                    <div class="form-group">
                        <label for="serialNumber">Serial Number</label>
                        <input type="text" class="form-control" id="serialNumber" value="{{$equipment->serial_number}}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" value="{{$equipment->categories->name}}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="namaProduk">Nama Product</label>
                        <input type="text" class="form-control" id="namaProduk" value="{{$equipment->poducts->name}}"
                            readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Pengajuan Item</h5>
                    <div class="form-group">
                        <label for="ugently">Ugently / Kondisi</label>
                        <select class="form-control" name="conditions" id="ugently">
                            <option selected disabled>-- PILIH --</option>
                            <option value="ctok">pelayanan emergensi</option>
                            <option value="reguler">pelayanan reguler</option>
                            <option value="berkala">pelayanan berkala</option>
                            <option value="lain-lain">pelayanan lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subjectMasalah">Subject Masalah</label>
                        <input type="text" class="form-control" name="title" id="subjectMasalah"
                            placeholder="Masukkan subject masalah">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Tambahan</label>
                        <textarea class="form-control" name="description" id="keterangan" rows="4"
                            placeholder="Masukkan keterangan tambahan"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Ajukan Item</button>
                        <a href="{{url('/detail-equipment', $equipment->slug)}}" type="submit"
                            class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection