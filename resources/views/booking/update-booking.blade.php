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
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <laebl>Keluhan</laebl>
                        <input type="text" readonly value="{{$booking->complaint}}" name="results" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <laebl>Rencana Tindakan</laebl>
                        <input type="text" readonly value="{{$booking->action_plan}}" name="results" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <laebl>kode booking</laebl>
                        <input type="text" readonly value="{{$booking->slug}}" name="results" id="" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow border-left-primary p-3">
    <form action="{{url('/store-hasil', $booking->slug)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <laebl>teknisi</laebl>
                    <select class="form-control" name="id_user">
                        <option value="">pilih teknisi</option>
                        @foreach($user as $row)
                        <option value="{{$row->id}}" @if($booking->user->id) selected @endif>{{$row->name}}</option>
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