@extends('layouts.main-view')
@section('content')

<style>
/* Sama seperti style generalTable */
#statusServiceTable td, 
#statusServiceTable th {
    padding-top: 15px !important;
    padding-bottom: 15px !important;
}

.border-light {
    border: 1px solid #F2F4F7 !important;
}
</style>



<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-status" role="tabpanel">
         <p class="mb-0 d-none d-sm-inline-block montserrat-semibold py-3 m-0" 
               style="font-size:25px; color:#000000;">
                Status Service
            </p>
        <div class="card p-3 shadow-sm border-0">
           
           
            <div class="table-responsive">
                <table class="table table-hover align-middle table-sm border-light" id="statusServiceTable">
                    <thead>
                        <tr class="bg-dark-ori-web text-white">
                            <th>No</th>
                            <th>Id Pengajuan</th>
                            <th>Dikerjakan Oleh</th>
                            <th>Instansi</th>
                            <th>Jadwal</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($progressList as $index => $progress)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="/progress/{{$progress->submissions->slug}}" 
                                   class="btn rounded-pill border-1 border border-dark bg-transparant"
                                   style="font-size:10px;">
                                    {{$progress->submissions->tikects_id}}
                                    &nbsp;&nbsp;<i class="fa fa-angle-right"></i>
                                </a>
                            </td>
                            <td>{{ $progress->users->name }}</td>
                            <td>{{ $progress->submissions->equipments->instansi->name }}</td>
                            <td>{{ $progress->submissions->created_at }}</td>
                            <td>{{ $progress->submissions->equipments->categories->name }}</td>
                            <td>{{ $progress->submissions->equipments->poducts->name }}</td>
                            <td>
                                <span class="rounded rounded-pill bg-success text-white px-4 py-1 text-capitalize"
                                      style="font-size:10px;">
                                    {{ $progress->submissions->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Info & Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3" id="tableFooterContainer">
            <div id="statusInfoContainer"></div>
            <div id="statusPaginationContainer"></div>
        </div>
    </div>
</div>

<script>
$('#statusServiceTable').DataTable({
    ordering: false,
    pageLength: 5,
    autoWidth: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
    ],
    initComplete: function() {
        const $wrapper = $('#statusServiceTable_wrapper');
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
        $('#statusInfoContainer').append($wrapper.find('#statusServiceTable_info'));
        $('#statusPaginationContainer').append($wrapper.find('.dataTables_paginate'));
    }
});
</script>
@endsection
