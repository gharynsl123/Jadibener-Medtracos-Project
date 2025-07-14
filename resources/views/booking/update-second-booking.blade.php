@extends('layouts.main-view')
@section('content')

<div class="card shadow mb-3">
    <div class="card-header bg-info">
        <p class="m-0 text-white font-weight-bolder">KETERANGAN ALAT</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <th>Instansi</th>
                    <td>:</td>
                    <td>{{ $informationTools->instansi->name }}</td>
                    <th>Nama Product</th>
                    <td>:</td>
                    <td>{{$informationTools->poducts->name}}</td>
                </tr>
                <tr>
                    <th>Serial Number</th>
                    <td>:</td>
                    <td>{{ $informationTools->serial_number }}</td>
                    <th>Kode Product</th>
                    <td>:</td>
                    <td>{{ $informationTools->poducts->code }}</td>
                </tr>
                <tr>
                    <th>Merek</th>
                    <td>:</td>
                    <td>{{ $informationTools->brands->name }}</td>
                    <th>Instalasi</th>
                    <td>:</td>
                    <td>{{ $informationTools->installation }}</td>
                </tr>
                <tr>
                    <th>Status Alat</th>
                    <td>:</td>
                    <td>{{$informationTools->description}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="card shadow border-left-primary p-3">
    <form action="{{url('/store-second-hasil')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <laebl>teknisi</laebl>
                    <select class="form-control" name="id_user">
                        <option value="">pilih teknisi</option>
                        @foreach($user as $row)
                        <option value="{{$row->id}}" >{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <laebl>Hasil Kunjungan Teknisi</laebl>
                    <input type="text" name="results" id="" class="form-control">
                </div>
            </div>

            <input type="text" name="equipment_id" id="" value="{{$informationTools->id}}" hidden>
            <input type="text" name="id_instansi" id="" value="{{$informationTools->instansi->id}}" hidden>

            <div class="col-md-12">
                <div class="form-group">
                    <laebl>Kesimpulan Bersama</laebl>
                    <textarea type="text" name="conclusion" id="" class="mt-1 form-control"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">kirim</button>
        <a class="btn btn-secondary" href="{{url()->previous()}}">cancel</a>
    </form>

</div>
@endsection