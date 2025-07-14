@section('content')
@if($instansi)
<div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 d-none d-sm-inline-block  text-gray-800">Profile Rumah Sakit</h1>
</div>
<div class="card p-3">
    <div class="row">
        <!-- Gambar rumah sakit -->
        <div class="col-md-5 d-flex justify-content-center align-items-center">
            @if($instansi->photo)
            <!-- ambil gambar -->
            <img src="{{ asset('storage/instansi_images/'.$instansi->photo) }}" style="height:350px;"
                class="img-thumbnail" alt="Responsive image">
            @else
            <p>No Image Available</p>
            @endif
        </div>
        <!-- Informasi rumah sakit -->
        <div class="col-md-7 my-4 px-4">
            <h4 class="mb-3">{{$instansi->name}}</h4>
            <p class="mb-4"><strong>Alamat: </strong><span class="font-weight-bold text-small">{!! $instansi->address
                    !!}</span></p>
            <hr>
            <div class="informasi-user">
                <p><strong>Informasi User</strong></p>
                <ul class="list-unstyled">
                    <li><strong>Nama Asli:</strong> {{$user->name}}</li>
                    <li><strong>Email:</strong> {{$user->email}}</li>
                    <li><strong>Username Pengguna:</strong> {{$user->username}}</li>
                    <li><strong>Divisi:</strong> {{$user->departement ? $user->departement : 'Belum ada'}}</li>
                    <li><strong>Nomor Telpon:</strong> {{$user->phone_number}}</li>
                </ul>
            </div>
            <a href="#" target="_blank" class="btn my-2 btn-secondary">Cetak PDF</a>
        </div>
    </div>
</div>

<!-- Informasi bisnis -->
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card border-left-primary">
            <div class="card-header">BUSINESS INFORMATION</div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>JUMLAH BED</td>
                            <td>:</td>
                            <td>{{$instansi->jumlah_kasur}}</td>
                        </tr>
                        <tr>
                            <td>JENIS INSTANSI</td>
                            <td>:</td>
                            <td>{{$instansi->jenis_instansi}}</td>
                        </tr>
                        <tr>
                            <td>NO. MEMBER</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>JUMLAH PERALATAN</td>
                            <td>:</td>
                            <td><a href="{{url('/barang-rumah-sakit')}}">{{$alatPeralatan}} Peralatan</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
Belum Peganng Instansi
@endif
@endsection