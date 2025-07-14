@extends('layouts.main-view')
@section('title', 'Estimasi Biaya')
@section('content')
<h2>Estimasi Biaya</h2>
<div class="card shadow border-left-primary p-2">
    <div class="table-responsive">
        <table class="table table-bordered border-0p" id="dataTable">
            <thead>
                <tr>
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