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
                    <td>{{ $booking->equipments->instansi->name }}</td>
                    <th>Nama Product</th>
                    <td>:</td>
                    <td>{{$booking->equipments->poducts->name}}</td>
                </tr>
                <tr>
                    <th>Serial Number</th>
                    <td>:</td>
                    <td>{{ $booking->equipments->serial_number }}</td>
                    <th>Kode Product</th>
                    <td>:</td>
                    <td>{{ $booking->equipments->poducts->code }}</td>
                </tr>
                <tr>
                    <th>Merek</th>
                    <td>:</td>
                    <td>{{ $booking->equipments->brands->name }}</td>
                    <th>Instalasi</th>
                    <td>:</td>
                    <td>{{ $booking->equipments->installation }}</td>
                </tr>
                <tr>
                    <th>Status Alat</th>
                    <td>:</td>
                    <td>{{$booking->equipments->description}}</td>
                </tr>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <laebl>Keluhan</laebl>
                        <input type="text" readonly value="{{$booking->complaint}}" name="results" id=""
                            class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <laebl>Rencana Tindakan</laebl>
                        <input type="text" readonly value="{{$booking->action_plan}}" name="results" id=""
                            class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <laebl>kode booking</laebl>
                        <input type="text" readonly value="{{$booking->slug}}" name="results" id=""
                            class="form-control">
                    </div>
                </div>
                <hr>
                <div class="col-md-6">
                    <div class="form-group">
                        <laebl>teknisi</laebl>
                        <select readonly class="form-control">
                            <option readonly>{{$booking->user->name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <laebl>Hasil Kunjungan Teknisi</laebl>
                        <input type="text" readonly value="{{$booking->results}}" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <laebl>Kesimpulan Bersama</laebl>
                        <textarea type="text" readonly id="" class="mt-1 form-control">{{$booking->conclusion}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
@endsection