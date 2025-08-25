@extends('layouts.main-view')
@section('title', 'Detail Pengajuan')
@section('content')
<style>
.line {
    width: 5px;
    display: flex;
    flex-direction: column;
    background: black;
    align-items: center;
    justify-content: space-between;
    border-radius: 20px;
}

.line .circle {
    width: 13px;
    height: 13px;
    background-color: black;
    border-radius: 100%;
}

.circle {
    width: 13px;
    height: 13px;
    background-color: black;
    border-radius: 100%;
}
</style>

<a href="{{url('/pengajuan')}}" class="btn my-2 btn-secondary">kembali</a>
<!-- <a href="" target="_blank" class="btn my-2 btn-secondary">Cetak PDF</a> -->
<div class="row gap-2 mb-3">
    <div class="col-md-3">
        <div class="d-flex justify-content-center mb-3">
            <img src="{{asset('storage/product_images/'.$submission->equipments->poducts->photo)}}" alt=""
                class="img-fluid  img-thumbnail" style="width:250px;">
        </div>
    </div>
    <div class="col-md-9">
        <!-- informasi peralatan -->
        <div class="card shadow">
            <div class="card-header bg-info">
                <p class="m-0 text-white font-weight-bolder">keterangan Alat</p>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-borderless">
                    <tr>
                        <th>Instansi</th>
                        <td>:</td>
                        <td>{{ $submission->equipments->instansi->name }}</td>
                        <th>Nama Product</th>
                        <td>:</td>
                        <td>{{$submission->equipments->poducts->name}}</td>
                    </tr>
                    <tr>
                        <th>Serial Number</th>
                        <td>:</td>
                        <td>{{ $submission->equipments->serial_number }}</td>
                        <th>Kode Product</th>
                        <td>:</td>
                        <td>{{ $submission->equipments->poducts->code }}</td>
                    </tr>

                    <tr>
                        <th>Merek</th>
                        <td>:</td>
                        <td>{{ $submission->equipments->brands->name }}</td>
                        <th>Kategori</th>
                        <td>:</td>
                        <td>{{ $submission->equipments->categories->name }}</td>
                    </tr>
                    <tr>
                        <th>usia barang</th>
                        <td>:</td>
                        <td colspan="4">{{ $submission->equipments->age }} tahun</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card shadow border-left-primary">
    <div class="card-header ">
        <p class="m-0 text-capitalize"><strong> info keluhan dengan ID Ticket :</strong> {{$submission->tikects_id}}</p>
    </div>
    <div class="card-body">
        <div class="row">
            <p class="col-md-6"><strong>Tanggal Pengajuan :</strong> {{$submission->created_at}}</p>
            <p class="col-md-6"><strong>Diajukan Oleh :</strong> {{$submission->user->name}}</p>

            <p class="col-md-6"><strong>Nama Product :</strong> {{$submission->equipments->poducts->name}}</p>
            <p class="col-md-6"><strong>Kategori :</strong> {{$submission->equipments->categories->name}}</p>
            <p class="col-md-6 text-danger"><strong>Masalah :</strong> {{$submission->title}}</p>
            <p class="col-md-6 text-danger"><strong>Keterangan Tambahan :</strong> {{$submission->description}}</p>
        </div>
    </div>
</div>

<div class="card shadow mt-5 border-left-primary">
    <div class="card-header ">
        <p class="m-0">Di proses oleh</p>
    </div>
    <div class="card-body">
        @if($submission->status == 'pending')
            <p>menunggu approval dari admin</p>
        @elseif($submission->status == 'rejected')
            <p>gagal untuk memproses tiket kamu. kamu di tolak</p>
        @else
            @if($progress == null)
                @if(Auth::user()->level == 'teknisi')
                    <form action="{{route('progress.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="teknisi">Pilih Teknisi</label>
                                <input type="text" name="submissions_id" value="{{$submission->id}}" hidden readonly>
                                <input type="text" name="id_instansi" value="{{$submission->equipments->instansi->id}}" hidden readonly>
                                <input type="text" name="id_user" value="{{Auth::user()->id}}" hidden readonly>
                                <input type="text" value="{{Auth::user()->name}}" class="form-control" disabled readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="teknisi">Jadwal Pengerjaan</label>
                                <input type="date" name="schedule" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </form>
                @else
                    <p class="text-danger">Belum ada teknisi yang memproses tiket ini</p>
                @endif
            @else
                <div class="row">
                    <p class="col-md-6">
                        <strong>Nama Teknisi : </strong>{{$progress->users->name}}
                    </p>
                    <div class="col-md-6">
                        <div class="progress" role="progressbar" aria-label="Animated striped example"
                            aria-valuenow="{{$progress->work_value}}" aria-valuemin="0"
                            aria-valuemax="{{$progress->work_value}}">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                style="width: {{$progress->work_value}}%">
                                {{$progress->work_value ?? 0}}
                            </div>
                        </div>
                    </div>
                    <p class="col-md-6">
                        <strong>TANGGAL TICKET :</strong>{{$submission->created_at}}
                    </p>
                    <p class="col-md-6">
                        <strong>TANGGAL PROSES :</strong>{{$progress->schedule}}
                    </p>

                    @if(Auth::user()->level == 'teknisi' && Auth::user()->id == $progress->id_user)
                    <div class="col-md-6 @if($progress->work_value == '100') d-none @endif">
                        <form action="{{ route('progress.update', $progress->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-3">
                                <label for="progress">progress</label>
                                <input name="work_value" id="work-value" type="number" class="form-control " required>
                            </div>
                            <input type="number" name="submissions_id" value="{{$submission->id}}" class="d-none">
                            <div class="form-group mb-3">
                                <label>keterangan</label>
                                <textarea name="description" class="form-control " rows="2" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Progress</button>
                        </form>
                    </div>
                    @endif
                </div>
                @if($submission->status == 'closing & unpaid')
                <p class="m-0">status saat ini : <span class="text-danger">{{$submission->status}}</span></p>
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#uploadModal">Selesaikan Pembayaran</a>
                <!-- Modal -->
                <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadModalLabel">Upload Bukti Pembayaran</h5>
                            </div>
                            <form action="{{ url('/uploud-bukti-pembayaran/'. $submission->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="photo" class="form-label">Upload Bukti Pembayaran</label>
                                        <input type="file" class="form-control" id="photo" name="photo" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            @endif
        @endif
    </div>
</div>

<h3 class="mt-4">Tracking Progress</h3>
<div class="card shadow">
    <div class="card-body p-0">

        <div class=" d-flex justify-content-start">
            <div class="line mt-5 py-4">
                @foreach($historyPengajuan as $items)
                <div class="circle"></div>
                @endforeach
            </div>
            <div class="table-responsive mx-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Di Buat Pada</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historyPengajuan as $items)
                        <tr>
                            <td>{{ $items->created_at }}</td>
                            <td>{{ $items->status }}</td>
                            <td>{{ $items->description }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const WorkInput = document.getElementById("work-value");

    WorkInput.addEventListener("input", function() {
        // Pastikan nilai input tidak lebih dari 100
        if (WorkInput.value > 100) {
            WorkInput.value = 100;
        }
    });
})
</script>

@endsection