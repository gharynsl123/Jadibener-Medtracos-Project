@extends('layouts.main-view')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Perlatan</h1>
</div>

<div class="card p-3 border-left-primary">
    <form action="{{url('/update-equipment', $equipment->id)}}" class="row" method="post">
        @csrf
        @method('PUT')
        <div class="form-group col-md-6">
            <label for="merk">Nama Instansi</label>
            <select class="form-control" id="instansi-select" name="id_instansi">
                <option>-- PILIH --</option>
                @foreach($instansi as $row)
                <option value="{{ $row->id }}" {{ $equipment->id_instansi == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="merk">Departement</label>
            <select id="departement" class="form-control" name="departement">
                <option value="" selected>-- PILIH --</option>
                <option value="Hospital Kitchen" {{$equipment->departement == 'Hospital Kitchen' ? 'selected' : ''}} >Hospital Kitchen</option>
                <option value="CSSD" {{$equipment->departement == 'CSSD' ? 'selected' : ''}} >CSSD</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="merk">Nama Merk</label>
            <select id="brand" class="form-control" name="brand_id">
                <option>-- PILIH --</option>
                @foreach($brand as $row)
                <option value="{{ $row->id }}" {{ $equipment->brand_id == $row->id ? 'selected' : '' }} data-departement="{{ $row->departement }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="kategori">Nama Kategori</label>
            <select class="form-control" name="category_id" id="kategori">
                <option>-- PILIH --</option>
                @foreach($category as $row)
                <option value="{{ $row->id }}" {{ $equipment->category_id == $row->id ? 'selected' : '' }} data-departement="{{ $row->departement }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6" id="produk-group">
            <label for="merk">Nama Product</label>
            <select class="form-control" name="products_id" id="product-select">
                <option>-- PILIH --</option>
                @foreach($product as $row)
                <option value="{{ $row->id }}" {{ $equipment->products_id == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="serial-number">Usia Barang</label>
            <input type="number" class="form-control" name="age" value="{{$equipment->age}}" id="pertahun-product"
                placeholder="patokan nilai ini akan berkurang sasuia tahun nya">
            <small class="text-muted">Hanya bisa 5 sampai 10 tahun</small>
        </div>
        <div class="form-group col-md-6">
            <label for="serial-number">Serial Number</label>
            <input type="text" class="form-control" name="serial_number" value="{{$equipment->serial_number}}" id="serial-number" placeholder="Serial Number">
        </div>
        <div class="form-group col-md-6">
            <label for="serial-number">Kondisi Barang</label>
            <input type="text" class="form-control" name="condition" value="{{$equipment->condition}}" id="serial-number" placeholder="Kondisi">
        </div>
        <input type="text" class="form-control" name="id_user" hidden readonly value="{{ Auth::user()->id }}">

        <div class="form-group col-md-6">
            <label for="tahun-pemasangan">Tahun Pemasangan</label>
            <input type="text" class="form-control" name="installation" value="{{$equipment->installation}}" id="tahun-pemasangan"
                placeholder="Tahun Pemasangan">
        </div>
        
        <hr class="border border-1 col-md-12">
        
        <div class="form-group col-md-12">
            <label for="tahun-pemasangan">Saran perawatan dan perbaikan</label>
            <textarea type="text" class="form-control" name="suggestions">{{$equipment->suggestions ?? 'Belum Ada'}}</textarea>
        </div>

        <div class="col-md-12">
            <button type="submit" class="ml-auto btn btn-primary">Update</button>
            <a href="{{url('/detail-instansi', $equipment->instansi->slug)}}" class="ml-auto btn btn-secondary">Batalkan</a>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    var pertahunProductInput = document.getElementById('pertahun-product');
    var defaultOption = '<option value="" selected>-- PILIH --</option>';

    // Tangkap perubahan pada elemen departemen
    $('#departement').change(function() {
        // Dapatkan nilai departemen yang dipilih
        var selectedDepartement = $(this).val();

        // Sembunyikan semua opsi merek dan kategori
        $('#brand option, #kategori option').hide();

        // Tampilkan hanya opsi yang sesuai dengan departemen yang dipilih
        $('#brand option[data-departement="' + selectedDepartement + '"]').show();
        $('#kategori option[data-departement="' + selectedDepartement + '"]').show();

        if (selectedDepartement === '') {
            // Jika kosong, tambahkan opsi "-- PILIH --"
            $('#brand').prepend(defaultOption);
            $('#kategori').prepend(defaultOption);
        } else {
            $('#brand').prepend(defaultOption);
            $('#kategori').prepend(defaultOption);
        }
    });


    const productSelect = document.getElementById('product-select');
    const products = @json($product);

    // Tangkap perubahan pada elemen kategori dan merek
    $('#kategori, #brand').change(function() {
        // Dapatkan nilai kategori dan merek yang dipilih
        var selectedCategoryId = $('#kategori').val();
        var selectedBrandId = $('#brand').val();



        // Menggunakan filter untuk mendapatkan produk yang sesuai dengan kategori dan merek terpilih
        const filteredProducts = products.filter(product => product.category_id == selectedCategoryId &&
            product.brand_id == selectedBrandId);

        // Menghapus semua opsi produk sebelumnya
        productSelect.innerHTML = '';

        // Menambahkan opsi yang difilter ke dalam dropdown produk
        filteredProducts.forEach(product => {
            const option = document.createElement('option');
            option.value = product.id;
            option.textContent = product.name;
            productSelect.appendChild(option);
        });

        console.log(filteredProducts, selectedCategoryId, selectedBrandI);
    });

    pertahunProductInput.addEventListener('input', function() {
        // Get the entered value and convert it to a number
        let value = parseFloat(pertahunProductInput.value);

        // Check if the entered value is greater than 100
        if (value > 10) {
            // If it's greater, set the input value to 100
            pertahunProductInput.value = 10;
        } else if (value < 5) {
            // if it's small than 5, set the input value to 5
            pertahunProductInput.value = 5;
        }
    });
    $('#product-select').select2();
});
</script>
@endsection