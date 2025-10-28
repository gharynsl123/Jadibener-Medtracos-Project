<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
body {
    padding: 0 !important;
    margin: 0 !important;
    font-family: Arial, sans-serif;
}
</style>

<body>
    <div class="row">
        <div class="col-md-3">
            <div class="text-center mb-3 d-flex justify-content-centera">
                <div class="image-frame-detail">
                    @if($equipment->poducts->photo)
                    <img src="{{asset('storage/product_images/' .$equipment->poducts->photo)}}" alt="" srcset="">
                    @else
                    Image Not Available
                    @endif
                </div>
            </div>
        </div>

        <!-- Keterangan Produk -->
        <div class="col-md-9">
            <div class="card shadow mb-3">
                <div class="card-header bg-info">
                    <p class="m-0 text-white font-weight-bolder">KETERANGAN ALAT</p>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-borderless">
                        <tr>
                            <th>Instansi</th>
                            <td>:</td>
                            <td>{{ $equipment->instansi->name }}</td>
                            <th>Nama Product</th>
                            <td>:</td>
                            <td>{{$equipment->poducts->name}}</td>
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
                            <td>
                                {{ date('Y') - $equipment->installation }}tahun
                            </td>
                            <th>Status Alat</th>
                            <td>:</td>
                            <td>{{$equipment->description}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <!-- kondisi div -->

        <div class="col-md-12">
            <div class="card shado mt-2">
                <div class="card-header bg-info">
                    <p class="m-0 text-white font-weight-bolder">Kondisi produk</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-borderless">
                            <tr>
                                <th>kondisi</th>
                                <td>:</td>
                                <td>
                                    <div class="progress vw-90">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="{{$equipment->condition}}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{$equipment->condition}}%">
                                            {{$equipment->condition}}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Request tahun pergantian</th>
                                <td>:</td>
                                <td>{{$equipment->age}} tahun</td>
                            </tr>
                            <tr>
                                <th>Penurunan nilai barang</th>
                                <td>:</td>
                                <td>
                                    <strong>
                                        {{ round(100 - ((date('Y') - $equipment->installation) / $equipment->age * 100)) }}%</strong>
                                </td>
                            </tr>
                            <tr>
                                <th>TANGGAL pendataan</th>
                                <td>:</td>
                                @if($equipment->update_at != null)
                                <td>{{ $equipment->update_at->format('Y-m-d') }}</td>
                                @else
                                <td>{{ $equipment->created_at->format('Y-m-d') }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>SURVEYOR</th>
                                <td>:</td>
                                <td>{{$equipment->users->name}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shado mt-2">
                <div class="card-header bg-info">
                    <p class="m-0 text-white font-weight-bolder">Saran perawatan dan perbaikan</p>
                </div>
                <div class="card-body">
                    <p>{{ $equipment->suggestions ?? 'belum ada saran' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- history table -->

    <div class="card border-left-primary mt-3 shadow-lg p-3 ">
        <h3 class="h3">Riwayat Peralatan</h3>
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
                        <td>{{$item->created_at->format('d-m-Y H:s') }}</td>
                        @if($item->submissions)
                        <td>
                            <a href="/progress/{{$item->submissions->slug}}"
                                class="btn btn-primary">{{$item->submissions->tikects_id}}</a>
                        </td>
                        <td>{{$item->submissions->title}}</td>
                        {{$item->estimation}}
                        @elseif($item->estimation)
                        <td>
                            <!-- Tambahkan tombol aksi sesuai kebutuhan -->
                            <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file"></i></a>
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
        </div>
    </div>
</body>

</html>