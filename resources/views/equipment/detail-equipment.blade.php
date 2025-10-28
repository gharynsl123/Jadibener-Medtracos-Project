@extends('layouts.main-view')
@section('content')

    <div class="mb-4">
        <a href="{{url()->previous()}}" class="btn btn-sm btn-primary">Kembali</a>

        <a href="{{url('/print-detail-alat', $equipment->slug)}}" target="_blank"
            class="btn my-2 btn-sm btn-secondary">Cetak PDF</a>
        <a href="{{url('/buat-pengajuan', $equipment->slug)}}" type="button" class="my-1 btn btn-sm btn-success">Ajukan
            Perbaikan</a>

        @if(Auth::user()->level != 'pic')
            <a href="{{url('/estimasi-biaya/peralatan', $equipment->slug)}}" class="btn my-2 btn-sm btn-info">Input Estimasi
                Biaya</a>
            @if(Auth::user()->level == 'surveyor' || Auth::user()->level == 'admin' || Auth::user()->level == 'teknisi')
                @if(!$booking)
                    <a href="{{ url('/set-booking', $equipment->slug) }}" class="btn my-2 btn-sm btn-warning">Atur Jadwal Kunjungan
                        Teknisi</a>
                @endif
            @endif

            @if(!$booking)
                <a href="{{ url('/hasil-kunjungan', $equipment->slug) }}" class="btn my-1 btn-sm btn-danger">Input Hasil Kunjungan
                    Teknisi</a>
            @endif

            @if($booking)
                <a href="{{ url('/input-hasil-kunjungan', $booking ? $booking->slug : '#') }}"
                    class="btn my-1 btn-sm btn-danger">Input Hasil Kunjungan Teknisi</a>
            @endif
        @endif

    </div>

    <div class="row">
        <!-- Keterangan Produk -->
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header bg-info">
                    <p class="m-0 text-white font-weight-bolder">KETERANGAN ALAT</p>
                </div>
                <div class="card-body">
                    <table class="table table-borderless align-middle">
                        <tr>
                            <!-- Kolom Gambar -->
                            <td style="width: 250px;" class="text-center align-top">
                                <div class="image-frame-detail">
                                    @if($equipment->poducts->photo)
                                        <img src="{{asset('storage/product_images/' . $equipment->poducts->photo)}}" alt=""
                                            class="img-fluid rounded" style="max-height: 100%; object-fit: contain;">
                                    @else
                                        <span class="text-muted">Image Not Available</span>
                                    @endif
                                </div>
                            </td>

                            <!-- Kolom Data -->
                            <td>
                                <table class="table table-sm table-borderless m-0 align-middle">
                                    <colgroup>
                                        <col style="width: 150px;"> <!-- Lebar kolom label -->
                                        <col style="width: 5px;"> <!-- Lebar titik dua -->
                                        <col style="width: 300px;"> <!-- Lebar value -->
                                        <col style="width: 160px;"> <!-- Kolom label kanan -->
                                        <col style="width: 10px;"> <!-- Titik dua kanan -->
                                        <col style="width: 200px;">
                                    </colgroup>
                                    <tr>
                                        <th>Instansi</th>
                                        <td>:</td>
                                        <td>{{ $equipment->instansi->name }}</td>
                                        <th>Nama Product</th>
                                        <td>:</td>
                                        <td>{{ $equipment->poducts->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Serial Number</th>
                                        <td>:</td>
                                        <td>{{ $equipment->serial_number }}</td>
                                        <th>Kode Product</th>
                                        <td>:</td>
                                        <td>{{ $equipment->poducts->code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Merek</th>
                                        <td>:</td>
                                        <td>{{ $equipment->brands->name }}</td>
                                        <th>Instalasi</th>
                                        <td>:</td>
                                        <td>{{ $equipment->installation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Durasi Pemakaian</th>
                                        <td>:</td>
                                        <td><span id="selisih-tahun-{{ $equipment->id }}"></span></td>
                                        <th>Status Alat</th>
                                        <td>:</td>
                                        <td>{{ $equipment->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Masa Garansi</th>
                                        <td>:</td>
                                        <td colspan="2">
                                            <div class="warranty-text">
                                                {{ $equipment->warranty }}
                                                @if($equipment->warranty_state == 'true')
                                                    (masih dalam masa garansi)
                                                @else
                                                    (sudah tidak berlaku)
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                </table>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>



        <!-- kondisi div -->

        <div class="col-md-12">
            <div class="card shadow-sm mt-2">
                <div class="card-header bg-info text-white fw-bold">
                    KONDISI PRODUK
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <tr>
                                <th style="width: 20%;">Kondisi</th>
                                <td style="width: 3%;">:</td>
                                <td style="max-width: 300px;">
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                            role="progressbar" style="width: {{ $equipment->condition }}%;"
                                            aria-valuenow="{{ $equipment->condition }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            {{ $equipment->condition }}%
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Request Tahun Pergantian</th>
                                <td>:</td>
                                <td style="max-width: 300px;">{{ $equipment->age }} tahun</td>
                            </tr>
                            <tr>
                                <th>Penurunan Nilai Barang</th>
                                <td>:</td>
                                <td style="max-width: 300px;">
                                    <div class="progress" style="height: 20px;">
                                        <div id="progress-bar-{{ $equipment->id }}"
                                            class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                            role="progressbar" style="width: {{ round($equipment->condition) }}%;"
                                            aria-valuemin="0" aria-valuemax="100">
                                            {{ round($equipment->condition) }}%
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Pendataan</th>
                                <td>:</td>
                                <td style="max-width: 300px;">
                                    @if($equipment->update_at != null)
                                        {{ $equipment->update_at->format('Y-m-d') }}
                                    @else
                                        {{ $equipment->created_at->format('Y-m-d') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>SURVEYOR</th>
                                <td>:</td>
                                <td style="max-width: 300px;">{{ $equipment->users->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-12">
            <div class="card shado mt-2">
                <div class="card-header bg-info">
                    <p class="m-0 text-white font-weight-bolder">Saran Perawatan Dan perbaikan</p>
                </div>
                <div class="card-body">
                    <p>{{ $equipment->suggestions ?? 'belum ada saran' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- history table -->
    <div class="card  mt-3">
        <div class="card-header bg-info">
            <p class="m-0 text-white font-weight-bolder">Riwayat Peralatan</p>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table id="historyTable" class="table table-borderless">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>STATUS</th>
                            <th>deskripsi</th>
                            <th>tanggal</th>
                            <th>id tiket</th>
                            <th>keluhan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->created_at}}</td>
                                @if($item->submissions)
                                    <td>
                                        <a href="/progress/{{$item->submissions->slug}}"
                                            class="btn btn-primary">{{$item->submissions->tikects_id}}</a>
                                    </td>
                                    <td>{{$item->submissions->title}}</td>
                                    {{$item->estimation}}
                                @elseif($item->estimation)
                                    <td>
                                        <a href="{{ asset('storage/biaya_estimasi_images/' . $item->estimation->photo) }}" download
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-file"></i>
                                        </a>
                                    </td>
                                    <td>-</td>
                                @elseif($item->booking)
                                    <td>
                                        <a href="{{ url('/detail-kunjungan', $item->booking->slug) }}"
                                            class="btn btn-primary">Booking-{{ $item->booking->id }}</a>
                                    </td>
                                    <td>-</td>
                                @else
                                    <td>-</td>
                                    <td>-</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="pagination" class="mt-3">
                    <ul id="pagination-list" class="pagination"></ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById("historyTable");
            const itemsPerPage = 5; // Number of items to display per page
            let currentPage = 1; // Current page
            let totalItems = table.tBodies[0].rows.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            function displayPage(page) {
                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;

                for (let i = 0; i < totalItems; i++) {
                    if (i >= start && i < end) {
                        table.tBodies[0].rows[i].style.display = "";
                    } else {
                        table.tBodies[0].rows[i].style.display = "none";
                    }
                }
            }

            function updatePagination() {
                $('#pagination-list').twbsPagination({
                    totalPages: totalPages,
                    visiblePages: 5,
                    onPageClick: function (event, page) {
                        currentPage = page;
                        displayPage(currentPage);
                    }
                });
            }
            displayPage(currentPage);
            updatePagination();

            perbaruiSelisihTahun();

            setInterval(perbaruiSelisihTahun, 1000 * 60 * 60 * 24 * 365);
            setInterval(updateMasaGaransi, 1000 * 60 * 60 * 24 * 90);
        });

        function updateMasaGaransi() {
            const equipment = @json($equipment);

            if (equipment && equipment.warranty) {
                const warrantyPeriod = equipment.warranty;
                const warrantyState = equipment.warranty_state;
                const installDate = new Date(equipment.installation);

                const years = parseInt(warrantyPeriod.split(' ')[0]);
                const endDate = new Date(installDate);
                endDate.setFullYear(installDate.getFullYear() + years);

                const currentDate = new Date();
                const remainingDays = (endDate - currentDate) / (1000 * 60 * 60 * 24);

                // Jika garansi hampir habis (misalnya dalam 30 hari)
                if (remainingDays <= 30 && remainingDays > 0) {
                    sendWarrantyNotification(equipment);
                }

                // Jika garansi sudah habis
                if (currentDate >= endDate && warrantyState === 'true') {
                    equipment.warranty_state = 'false';

                    fetch(`/update-warranty/${equipment.slug}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({ warranty_state: 'false' }),
                    })
                        .then(response => response.json())
                        .then(data => console.log('Update Successful:', data))
                        .catch(error => console.error('Error:', error));
                }
            } else {
                console.error('No equipment data found.');
            }
        }

        function sendWarrantyNotification(equipment) {
            fetch(`/send-warranty-notification/${equipment.slug}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    equipment_id: equipment.id,
                    user_email: equipment.user_email, // atau dapatkan dari data equipment
                }),
            })
                .then(response => response.json())
                .then(data => console.log('Email notification sent:', data))
                .catch(error => console.error('Error sending email:', error));
        }


        function hitungSelisihTahun(tahunPemasangan) {
            const tahunSekarang = new Date().getFullYear();
            return tahunSekarang - tahunPemasangan;
        }

        function perbaruiSelisihTahun() {
            const idPeralatan = '{{ $equipment->id }}';
            const tahunPemasangan = '{{ $equipment->installation }}';
            const nilaiTahun = '{{ $equipment->age }}';

            const selisihTahun = isNaN(hitungSelisihTahun(tahunPemasangan)) ? 0 : hitungSelisihTahun(tahunPemasangan);
            const kondisiPengurangan = Math.max(0, 100 - (selisihTahun * (100 / nilaiTahun)));

            const progressBar = document.getElementById(`progress-bar-${idPeralatan}`);
            progressBar.style.width = `${kondisiPengurangan}%`;
            progressBar.setAttribute('aria-valuenow', kondisiPengurangan);
            progressBar.innerText = `${kondisiPengurangan.toFixed(2)}%`;

            const elemenSelisihTahun = document.getElementById(`selisih-tahun-${idPeralatan}`);
            elemenSelisihTahun.innerText = `${selisihTahun} tahun`;
        }
    </script>
@endsection