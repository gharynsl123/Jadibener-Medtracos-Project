@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
    <a href="#" class="text-decoration-none col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            ticket Solve</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $status->where('status', 'closing & unpaid')->count() }} ticket
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            ticket On Progress</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $status->where('status', 'approved')->count() }} ticket
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ticket
                            pending
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{ $status->where('status', 'pending')->count() }} ticket
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            total ticket</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $status->count() }} ticket</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bars fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Request Approval</h1>
</div>

<div class="card border-left-primary shadow-lg p-3">
    <div class="table-responsive">
        <table class="table table-borderless border-0" id="dataTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <th class="rounded-left">ID Pengajuan</th>
                    <th>Instansi</th>
                    <th>Reported By</th>
                    <th>Product Name</th>
                    <th>Serial Number</th>
                    <th>Status</th>
                    <th class="rounded-right">approve</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submission as $items)
                <tr>
                    <td>
                        <a href="{{url('/progress/'.$items->slug)}}">{{$items->tikects_id}}</a>
                    </td>
                    <td>{{$items->equipments->instansi->name}}</td>
                    <td>{{$items->user->name}}</td>
                    <td>{{$items->equipments->poducts->name}}</td>
                    <td>{{$items->equipments->serial_number}}</td>
                    <td>{{$items->conditions}}</td>
                    <td>
                        <div class="d-flex">
                            <form class="update-form" action="{{ route('pengajuan.update', $items->id) }}"
                                method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="text" name="status" value="approved" hidden>
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fa fa-thumbs-up text-white"></i>
                                </button>
                            </form>
                            <form class="update-form" action="{{ route('pengajuan.update', $items->id) }}"
                                method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="text" name="status" value="rejected" hidden>
                                <button type="submit" class="btn btn-sm  btn-danger">
                                    <i class="fa fa-thumbs-down text-white"></i>
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        'ordering':false;
    });
})
</script>
@endsection