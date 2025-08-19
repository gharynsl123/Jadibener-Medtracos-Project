@extends('layouts.main-view')
@section('title', 'Estimasi Biaya')
@section('content')

<style>
/* Sama seperti style generalTable */
#estimasiBiayaTable td, 
#estimasiBiayaTable th {
    padding-top: 15px !important;
    padding-bottom: 15px !important;
}

.border-light {
    border: 1px solid #F2F4F7 !important;
}
</style>

<p class="mb-0 d-none d-sm-inline-block montserrat-semibold py-3 m-0" 
   style="font-size:25px; color:#000000;">
    Estimasi Biaya
</p>

<div class="card p-3 shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-hover align-middle table-sm border-light" id="estimasiBiayaTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <th>No</th>
                    <th>Instansi</th>
                    <th>Product</th>
                    <th>SN</th>
                    <th>Harga</th>
                    <th>Kode Part</th>
                    <th>Nama Part</th>
                    <th>Quantity</th>
                    <th>Total Harga</th>
                    <th>Ket.</th>
                    <th>Download Berkas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataEstimasi as $index => $estimasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $estimasi->equipments->instansi->name }}</td>
                    <td>{{ $estimasi->equipments->poducts->name }}</td>
                    <td>{{ $estimasi->equipments->serial_number }}</td>
                    <td>@currency($estimasi->price) </td>
                    @if($estimasi->parts == null)
                        <td colspan="4" class="text-center text-danger">tidak ada pergantian barang</td>
                    @else
                        <td>{{ $estimasi->parts->code }}</td>
                        <td>{{ $estimasi->parts->name }}</td>
                        <td>{{ $estimasi->quantity}}</td>
                        <td>@currency($estimasi->price * $estimasi->quantity)</td>
                    @endif
                    <td>{{ $estimasi->description }}</td>
                    <td>
                        <form action="#" method="POST">
                            <a href="{{ asset('storage/biaya_estimasi_images/'.$estimasi->photo) }}"
                               class="btn btn-sm btn-primary" download>
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>

                            @if(Auth::user()->level == 'admin')
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Anda yakin ingin menghapus estimasi biaya ini?')">
                                <i class="fa fa-trash"></i>
                            </button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Info & Pagination -->
<div class="d-flex justify-content-between align-items-center mt-3" id="tableFooterContainer">
    <div id="estimasiInfoContainer"></div>
    <div id="estimasiPaginationContainer"></div>
</div>

<script>
$('#estimasiBiayaTable').DataTable({
    ordering: false,
    pageLength: 5,
    autoWidth: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
    ],
    initComplete: function() {
        const $wrapper = $('#estimasiBiayaTable_wrapper');
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
        $('#estimasiInfoContainer').append($wrapper.find('#estimasiBiayaTable_info'));
        $('#estimasiPaginationContainer').append($wrapper.find('.dataTables_paginate'));
    }
});
</script>
@endsection
