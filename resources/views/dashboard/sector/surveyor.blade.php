@section('content')
<div class="row mb-3">
    <a href="{{url('/instansi')}}" class="text-decoration-none col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pilih Instansi Untuk melihat data instansi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Member Rumah Sakit</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <a class="col-xl-6 col-md-6 mb-4 text-decoration-none" href="{{ route('survey.creat-data') }}">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Buat Data Baru untuk instansi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Daftar member baru</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>


<div class="d-sm-flex flex-column mb-2">
    <h1 class="h3 mb-0 text-gray-800">History Table Add</h1>
    <small>data ini akan dimuat kembali setelah 1 hari</small>
</div>

<div class="card border-left-primary p-3 shadow-lg">
    <div class="table-responsive">
        <table class="table table-borderless border-0 table-hover" id="dataTableGeneral">
            <thead>
                <tr class="text-white bg-dark-ori-web">
                    <th class="rounded-left">Nama Rumah Sakit</th>
                    <th>Provinsi</th>
                    <th>Alamat</th>
                    <th>Type</th>
                    <th>Jenis Instansi</th>
                    <th class="rounded-right"></th>
                </tr>
            </thead>
            <tbody> 
                @foreach($instansi as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->provinsi}}</td>
                    <td>{!!$item->address!!}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->jenis}}</td>
                    <td>
                        <a href="{{url('/detail-instansi', $item->slug)}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{url('/edit-instansi', $item->slug)}}" class="btn btn-sm btn-success">
                            <i class="fa fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#dataTableGeneral').DataTable({
        ordering: false,
        pageLength: 5,
        autoWidth: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });
});
</script>
@endsection