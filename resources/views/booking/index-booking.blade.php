@extends('layouts.main-view')
@section('content')

<style>
/* Samain dengan style generalTable / statusServiceTable */
#dataTable td, 
#dataTable th {
    padding-top: 15px !important;
    padding-bottom: 15px !important;
}

.border-light {
    border: 1px solid #F2F4F7 !important;
}
</style>

<p class="mb-0 d-none d-sm-inline-block montserrat-semibold py-3 m-0" 
       style="font-size:25px; color:#000000;">
        Jadwal Kedatangan Teknisi
    </p>

<div class="card p-3 shadow-sm border-0">
    
    <hr class="my-2">
    <div class="table-responsive">
        <table class="table table-hover align-middle table-sm border-light" id="dataTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <th>Instansi</th>
                    <th>Keluhan</th>
                    <th>Teknisi yang Dipilih</th>
                    <th>Datang pada Tanggal</th>
                    <th>Rencana Tindakan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($booking as $items)
                <tr>
                    <td>{{ $items->instansi->name }}</td>
                    <td>{{ $items->complaint }}</td>
                    <td>{{ $items->user->name }}</td>
                    <td>{{ $items->date }}</td>
                    <td>{{ $items->action_plan }}</td>
                    <td>
                        @if(Auth::user()->level != 'pic')
                            @if($items->conclusion && $items->results == null)
                                <a href="{{url ('/input-hasil-kunjungan',$items->slug)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pen-to-square"></i>
                                </a>
                            @endif
                        @endif
                        @if($items->conclusion && $items->results != null)
                            <a href="{{url ('/detail-kunjungan',$items->slug)}}" class="btn btn-sm btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Info & Pagination -->
<div class="d-flex justify-content-between align-items-center mt-3" id="tableFooterContainer">
    <div id="tableInfoContainer"></div>
    <div id="tablePaginationContainer"></div>
</div>

<script>
$('#dataTable').DataTable({
    ordering: false,
    pageLength: 5,
    autoWidth: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
    ],
    initComplete: function() {
        const $wrapper = $('#dataTable_wrapper');
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
        $('#tableInfoContainer').append($wrapper.find('#dataTable_info'));
        $('#tablePaginationContainer').append($wrapper.find('.dataTables_paginate'));
    }
});
</script>
@endsection
