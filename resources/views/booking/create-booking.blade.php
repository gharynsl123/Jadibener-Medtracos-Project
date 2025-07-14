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

<!-- buat form untuk atur jadwal teknisi -->
<div class="card shadow border-left-primary">
    <form action="{{url('/store-booking', $informationTools->slug)}}" method="post" class="p-4">
        @csrf
        <div class="row gap-2">
            <div class="form-group col-md-6">
                <label for="">pilih teknisi yang pergi</label>
                <select name="id_user" id="" class="form-control">
                    <option value="">pilih teknisi</option>
                    @foreach($teknisi as $items)
                    <option value="{{$items->id}}">{{$items->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">tanggal</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="">instansi</label>

                <input type="text" name="id_instansi" value="{{$informationTools->instansi->id}}" readonly hidden>
                <input type="text" name="equipment_id" value="{{$informationTools->id}}" readonly hidden>
                <input type="text" value="{{$informationTools->instansi->name}}" readonly class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="">keluhan</label>
                <input type="text" name="complaint" class="form-control">
            </div>
            <div class="form-group col-md-12">
                <label for="">renaca tindakan</label>
                <textarea type="text" name="action_plan" class="form-control"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">kirim</button>
        <a  class="btn btn-secondary" href="{{url()->previous()}}">cancel</a>
    </form>
</div>
@endsection