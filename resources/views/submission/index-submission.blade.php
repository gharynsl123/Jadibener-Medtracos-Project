@extends('layouts.main-view')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @if(Auth::user()->role == 'kap_teknisi' && Auth::user()->level == 'teknisi')
    <h1 class="h3 mb-0 d-none d-sm-inline-block text-gray-800">List Pengajuan</h1>
    @elseif(Auth::user()->level == 'teknisi')
    <h1 class="h3 mb-0 d-none d-sm-inline-block text-gray-800">List Tugas Yang Di Berikan</h1>
    @else
    <h1 class="h3 mb-0 d-none d-sm-inline-block text-gray-800">List Pengajuan</h1>
    @endif
    @if(Auth::user()->level == 'pic')
    <a href="{{url('barang-rumah-sakit')}}" class="btn btn-sm btn-primary mt-1 shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Ajukan Perbaikan
    </a>
    @endif
</div>

<div class="card border-left-primary p-3 shadow">
    <div class="table-responsive">
        <table class="table border-0 table-borderless" id=dataTable>
            <thead>
                <tr class="text-white bg-dark-ori-web">
                    <th class="rounded-left">Tanggal Proses</th>
                    <th>Instansi</th>
                    <th>Serial number</th>
                    <th>Kategori</th>
                    <th>Product Name</th>
                    <th>report by</th>
                    <th>Status</th>
                    <th class="rounded-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($submission->reverse() as $item)
                <tr>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->equipments->instansi->name}}</td>
                    <td>
                        <a href="{{url('/detail-equipment', $item->equipments->slug)}}">
                            {{$item->equipments->serial_number}}
                        </a>
                    </td>
                    <td>{{$item->equipments->categories->name}}</td>
                    <td>{{$item->equipments->poducts->name}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->status}}</td>

                    <td>
                        @if($item->photo)
                            <a href="{{ asset('storage/bukti_pemabayaran/'.$item->photo) }}" class="btn btn-sm btn-success" download>
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        @endif
                        <!-- for go to detail use resouce route-->
                        <a href="/progress/{{$item->slug}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
$('#dataTable').DataTable({
    ordering: false,
    pageLength: 5,
    autoWidth: false,
    border: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
    ],
});
</script>
@endsection