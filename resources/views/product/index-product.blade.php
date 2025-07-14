@extends('layouts.main-view')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 d-none d-sm-inline-block text-gray-800">Our Product</h1>
    <div>
        <button type="button" id="btn-product" class="btn btn-sm btn-primary mt-1 shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Produk
        </button>

        <a data-toggle="modal" data-target="#importdata" class="btn btn-sm mt-1 btn-primary shadow-sm">
            <i class="fas fa-file-import fa-sm text-white-50"></i> Import Data produk</a>
    </div>
</div>

<div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Rumah Sakit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('import.products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex ">
                        <input type="file" required name="file">
                        <button class="btn btn-secondary" type="submit">Import Data</button>
                    </div>
                    <small>format file Xsl, CSV</small>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- form input product -->
<div class="card border-left-primary p-3 shadow-lg" id="form-product" style="display:none;">
    <h3>Tambahkan Produk</h3>
    <form action="{{url('/store-product')}}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6 form-group">
            <input type="text" name="name" placeholder="nama produk" id="" class="form-control">
        </div>
        <div class="col-md-6 form-group">
            <input type="text" name="code" placeholder="kode produk" id="" class="form-control">
        </div>
        <div class="col-md-6 form-group">
            <select name="departement" id="departement" class="form-control">
                <option value="">-- Select Departement --</option>
                <option value="Hospital Kitchen">Hospital Kitchen</option>
                <option value="CSSD">CSSD</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select id="kategori" name="category_id" class="form-control">
                <option value="">-- Select Kategori --</option>
                @foreach($categories as $row)
                <option value="{{$row->id}}" data-departement="{{ $row->departement }}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select id="brand" name="brand_id" class="form-control">
                <option value="">-- Select Merek --</option>
                @foreach($brand as $row)
                <option value="{{$row->id}}" data-departement="{{ $row->departement }}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 form-group">
            <input type="file" name="photo" placeholder="nama produk" id="" class="form-control">
        </div>

        <div class="col-md-6">
            <button class="btn btn-primary" type="submit">Tambahkan</button>
            <button class="btn btn-secondary" id="btn-cancel" type="button">Cancel</button>
        </div>
    </form>
</div>

<div class="card border-left-primary p-3" id="table-product">
    <div class="table-responsive">
        <table class="table table-borderless border-0 table-hover" id="dataTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <th>Nama Produk</th>
                    <th>Kode Produk</th>
                    <th>Departement</th>
                    <th>Kategori</th>
                    <th>Merek</th>
                    <th>Photo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->code}}</td>
                    <td>{{$item->departement}}</td>
                    <td>{{$item->categories->name}}</td>
                    <td>{{$item->brands->name}}</td>
                    <td>
                        <div class="image-frame">
                            @if($item->photo)
                            <img src="{{asset('storage/product_images/' .$item->photo)}}" alt="Product Image">
                            @else
                            Image Not Available
                            @endif
                        </div>
                    </td>
                    <td>
                        <form action="{{ route('destroy.product', $item->id) }}" method="post">
                            <a href="{{url('/detail-product/'.$item->slug)}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{url('/edit-product', $item->slug)}}" class="btn btn-sm btn-success">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk {{$item->name}} ini?')"
                                class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    $("#btn-product").click(function() {
        $("#form-product").fadeToggle();
        $("#table-product").fadeToggle();
    });

    $("#btn-cancel").click(function() {
        $("#form-product").fadeOut();
        $("#table-product").fadeIn();
    });

    $('#dataTable').DataTable({
        ordering: false,
        pageLength: 5,
        autoWidth: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });
});

$('#departement').change(function() {
    var defaultKategori = '<option value="" selected>-- Select Kategori --</option>';
    var defaultBrand = '<option value="" selected>-- Select Merek --</option>';

    // Tangkap perubahan pada elemen departemen
    // Dapatkan nilai departemen yang dipilih
    var selectedDepartement = $(this).val();

    // Sembunyikan semua opsi merek dan kategori
    $('#brand option, #kategori option').hide();

    // Tampilkan hanya opsi yang sesuai dengan departemen yang dipilih
    $('#brand option[data-departement="' + selectedDepartement + '"]').show();
    $('#kategori option[data-departement="' + selectedDepartement + '"]').show();

    if (selectedDepartement === '') {
        // Jika kosong, tambahkan opsi "-- PILIH --"
        $('#brand').prepend(defaultBrand);
        $('#kategori').prepend(defaultKategori);
    } else {
        $('#brand').prepend(defaultBrand);
        $('#kategori').prepend(defaultKategori);
    }
});
</script>

@endsection