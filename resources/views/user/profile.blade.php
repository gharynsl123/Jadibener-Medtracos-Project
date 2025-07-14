@extends('layouts.main-view')
@section('content')

<div class="row gap-2">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-info">
                <p class="m-0 text-white font-weight-bolder">Personal Information</p>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>{{$user->gender ? $user->gender : 'Belum diisi'}}</td>
                    </tr>
                    <tr>
                        <th>No telepon</th>
                        <td>:</td>
                        <td>{{$user->phone_number ? $user->phone_number  : 'Belum diisi'}}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    @if (Auth::user()->level != 'pic')
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-info">
                <p class="m-0 text-white font-weight-bolder">Business Information</p>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>Instansi</th>
                        <td>:</td>
                        <td>You are not pic here</td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>:</td>
                        <td>{{$user->level}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @else
    @if($user->instansi)
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-info">
                <p class="m-0 text-white font-weight-bolder">Business Information</p>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>Instansi</th>
                        <td>:</td>
                        <td>{{ $user->instansi->name ? $user->instansi->name : 'Belum Diisi'}}</td>
                    </tr>
                    <tr>
                        <th>Alamat Rumah Sakit</th>
                        <td>:</td>
                        <td>{{ $user->instansi->address ? $user->instansi->address  : 'Belum diisi'}}</td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>:</td>
                        <td>{{$user->level}}</td>
                    </tr>
                    <tr>
                        <th>Departement</th>
                        <td>:</td>
                        <td>{{$user->departement}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @else
    User Belum Memegang Rumah Sakit
    @endif
    @endif
</div>
@endsection