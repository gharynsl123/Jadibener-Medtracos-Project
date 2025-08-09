@section('content')
    @if($instansi)
        <div class="container-fluid py-4" style="background-color: #f8f9fa;">
            <div class="container bg-white p-4 rounded shadow-sm">

                <!-- Judul -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4" >
                    <h3 class=" mb-0 text-gray-800">Profile Rumah Sakit</h3>
                </div>

                <!-- Foto + Judul & Alamat -->
                <div class="row align-items-center mb-3">
                    <div class="col-md-2">
                        @if($instansi->photo)
                            <img src="{{ asset('storage/instansi_images/' . $instansi->photo) }}" class="img-fluid rounded"
                                alt="Foto Rumah Sakit">
                        @else
                            <div class="bg-light border d-flex justify-content-center align-items-center"
                                style="width:100%;height:100px;">
                                <span>-</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-10">
                        <h4 class="fw-bold mb-1">{{ $instansi->name ?? '-' }}</h4>
                        <p class="mb-0">
                            <strong>Alamat:</strong>
                            <span>{!! $instansi->address ?? '-' !!}</span>
                        </p>
                    </div>
                </div>

                <hr>

                <!-- Informasi User -->
                <div class="mb-3">
                    <div class="mb-3 ">
                        <p class="badge py-3 px-4 text-dark" style="background-color: #E8F3EE; font-size: 15px;" >Informasi User</p>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled text-muted mb-0">
                                <li class="mb-3"><strong>Nama Asli:</strong> {{ $user->name ?? '-' }}</li>
                                <li class="mb-3"><strong>Email:</strong> {{ $user->email ?? '-' }}</li>
                                <li class="mb-3"><strong>Username:</strong> {{ $user->username ?? '-' }}</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="list-unstyled text-muted mb-0">
                                <li class="mb-3"><strong>Divisi:</strong> {{ $user->departement ?? '-' }}</li>
                                <li class="mb-3"><strong>Nomor Telpon:</strong> {{ $user->phone_number ?? '-' }}</li>
                            </ul>
                        </div>
                    </div>
                    <a href="#" target="_blank" class="btn btn-success mt-4">Cetak PDF</a>
                </div>

                <!-- Kotak Informasi -->
                <!-- Kotak Informasi (Full Width dengan Margin antar Box) -->
                <div class="d-flex flex-wrap mt-4" style="margin: -0.5rem;">
                    <div class="bg-light p-4 rounded   text-center" style="flex: 1 1 200px; margin: 0.5rem;">
                        <h4 class="text-success fw-bold mb-1">{{ $instansi->jumlah_kasur ?? '-' }}</h4>
                        <p class="mb-0 text-muted">Jumlah Bed</p>
                    </div>
                    <div class="bg-light p-4 rounded  text-center" style="flex: 1 1 200px; margin: 0.5rem;">
                        <h4 class="text-success fw-bold mb-1">{{ $instansi->jenis_instansi ?? '-' }}</h4>
                        <p class="mb-0 text-muted">Jenis Instansi</p>
                    </div>
                    <div class="bg-light p-4 rounded   text-center" style="flex: 1 1 200px; margin: 0.5rem;">
                        <h4 class="text-success fw-bold mb-1">{{ $instansi->nomor_member ?? '-' }}</h4>
                        <p class="mb-0 text-muted">No. Member</p>
                    </div>
                    <div class="bg-light p-4 rounded   text-center" style="flex: 1 1 200px; margin: 0.5rem;">
                        <h4 class="text-success fw-bold mb-1">{{ $alatPeralatan ?? '-' }}</h4>
                        <p class="mb-0 text-muted">Jumlah Peralatan</p>
                    </div>
                </div>

            </div>
        </div>

    @else
        Belum Peggang Instansi
    @endif
@endsection