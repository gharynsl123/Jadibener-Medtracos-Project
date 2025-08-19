@extends('layouts.main-view')
@section('content')

<style>
/* Samain dengan style statusServiceTable */
#submissionTable td, 
#submissionTable th {
    padding-top: 15px !important;
    padding-bottom: 15px !important;
}

.border-light {
    border: 1px solid #F2F4F7 !important;
}
</style>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
    @if(Auth::user()->role == 'kap_teknisi' && Auth::user()->level == 'teknisi')
        <p class="mb-0 d-none d-sm-inline-block montserrat-semibold py-3 m-0" 
           style="font-size:25px; color:#000000;">
            List Pengajuan
        </p>
    @elseif(Auth::user()->level == 'teknisi')
        <p class="mb-0 d-none d-sm-inline-block montserrat-semibold py-3 m-0" 
           style="font-size:25px; color:#000000;">
            List Tugas Yang Diberikan
        </p>
    @else
        <p class="mb-0 d-none d-sm-inline-block montserrat-semibold py-3 m-0" 
           style="font-size:25px; color:#000000;">
            List Pengajuan
        </p>
    @endif

    @if(Auth::user()->level == 'pic')
        <a href="{{url('barang-rumah-sakit')}}" class="btn btn-sm btn-green mt-1 shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>
            Ajukan Perbaikan
        </a>
    @endif
</div>

<div class="card p-3 shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-hover align-middle table-sm border-light" id="submissionTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <th>Tanggal Proses</th>
                    <th>Instansi</th>
                    <th>Serial Number</th>
                    <th>Kategori</th>
                    <th>Product Name</th>
                    <th>Report By</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($submission->reverse() as $item)
                <tr>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->equipments->instansi->name}}</td>
                    <td>
                        <a href="{{url('/detail-equipment', $item->equipments->slug)}}" 
                           class="btn rounded-pill border border-dark bg-transparent px-3 py-1"
                           style="font-size:10px;">
                            {{$item->equipments->serial_number}}
                            &nbsp;<i class="fa fa-angle-right"></i>
                        </a>
                    </td>
                    <td>{{$item->equipments->categories->name}}</td>
                    <td>{{$item->equipments->poducts->name}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>
                        <span class="rounded rounded-pill bg-success text-white px-4 py-1 text-capitalize" 
                              style="font-size:10px;">
                            {{$item->status}}
                        </span>
                    </td>
                    <td>
                        @if($item->photo)
                            <a href="{{ asset('storage/bukti_pemabayaran/'.$item->photo) }}" class="btn btn-sm btn-success" download>
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        @endif
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

<!-- Info & Pagination -->
<div class="d-flex justify-content-between align-items-center mt-3" id="tableFooterContainer">
    <div id="submissionInfoContainer"></div>
    <div id="submissionPaginationContainer"></div>
</div>

<script>
$('#submissionTable').DataTable({
    ordering: false,
    pageLength: 5,
    autoWidth: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
    ],
    initComplete: function() {
        const $wrapper = $('#submissionTable_wrapper');
        const $filter = $wrapper.find('.dataTables_filter');
        const $input = $filter.find('input');

        // Hapus label "Search:"
        $filter.find('label').contents().filter(function() {
            return this.nodeType === 3;
        }).remove();

        // Custom input
        $input.css({
            'padding-left': '30px',
            'border-radius': '8px',
            'border': '1px solid #ccc',
            'width': '250px',
            'background-image': 'url("https://cdn-icons-png.flaticon.com/512/622/622669.png")',
            'background-repeat': 'no-repeat',
            'background-size': '16px',
            'background-position': '8px center',
            'box-sizing': 'border-box'
        }).attr('placeholder', 'Search...');

        // Styling length selector
        $wrapper.find('.dataTables_length').css({'margin-bottom': '1rem'});
        $wrapper.find('.dataTables_length select').css({'margin': '0 8px'});

        // Pindahkan info & pagination
        $('#submissionInfoContainer').append($wrapper.find('#submissionTable_info'));
        $('#submissionPaginationContainer').append($wrapper.find('.dataTables_paginate'));
    }
});
</script>
@endsection
