@extends('layouts.main-view')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center mb-4">
    <a href="{{url()->previous()}}" class="btn mr-4 btn-secondary">Kembali</a>
    <h1 class="h3 mb-0 text-gray-800">Tambahkan Alat</h1>
</div>

<form action="{{route('store-survey.tools', $user->id)}}" method="post">
    @csrf
    <div class="peralatan-form">
        <div class="card p-3 mt-3 shadow border-left-primary">
            <input type="text" id="departement" class="departemenInput" hidden name="departement"
                value="{{$user->departement}}">
            <input type="text" hidden name="id_instansi" value="{{$user->instansi->id}}">
            <input type="text" hidden name="id_user" value="{{ Auth::user()->id }}">

            <div class="row gap-2">

            <div class="form-group col-md-6">
                    <label for="kategori">Nama Kategori</label>
                    <select class="form-control" name="category_id" id="kategori">
                        <option>-- PILIH --</option>
                        @foreach($category as $row)
                        <option value="{{ $row->id }}" data-departement="{{ $row->departement }}">{{ $row->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="merk">Nama Merk</label>
                    <select id="brand" class="form-control" name="brand_id">
                        <option>-- PILIH --</option>
                        @foreach($brand as $row)
                        <option value="{{ $row->id }}" data-departement="{{ $row->departement }}">{{ $row->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="merk">Masa  Garansi</label>
                    <select class="form-control" name="warranty">
                        <option value="" selected>-- PILIH --</option>
                        <option value="1 Tahun">1 tahun</option>
                        <option value="2 Tahun">2 tahun</option>
                    </select>
                </div>
                

                <div class="form-group col-md-6" id="produk-group">
                    <label for="merk">Nama Product</label>
                    <select class="form-control" name="products_id" id="product-select">
                        <option>-- PILIH --</option>
                        @foreach($product as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="serial-number">Usia Barang</label>
                    <input type="number" class="form-control" name="age" id="pertahun-product"
                        placeholder="patokan nilai ini akan berkurang sasuia tahun nya">
                    <small class="text-muted">Hanya bisa 5 sampai 10 tahun</small>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="serial-number">kondisi</label>
                    <input type="text" class="form-control" name="condition" id="pertahun-product"
                        placeholder="kondisi produk">
                </div>

                <div class="form-group col-md-6">
                    <label for="serial-number">Serial Number</label>
                    <input type="text" class="form-control" name="serial_number" id="serial-number"
                        placeholder="Serial Number">
                </div>

                <div class="form-group col-md-6">
                    <label for="tahun-pemasangan">Tahun Pemasangan</label>
                    <input type="text" class="form-control" name="installation" id="tahun-pemasangan"
                        placeholder="Tahun Pemasangan">
                </div>
            </div>
        </div>
    </div>
    <button class="mt-3 btn btn-primary" type="submit">create</button>
</form>

<script>
$(document).ready(function() {
    var pertahunProductInput = document.getElementById('pertahun-product');
    var defaultOption = '<option value="" selected>-- PILIH --</option>';

    var selectedDepartement = $('#departement').val();

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

    const productSelect = document.getElementById('product-select');
    const products = @json($product);

    // Tangkap perubahan pada elemen kategori dan merek
    $('#kategori, #brand').change(function() {
        // Dapatkan nilai kategori dan merek yang dipilih
        var selectedCategoryId = $('#kategori').val();
        var selectedBrandId = $('#brand').val();

        // Menggunakan filter untuk mendapatkan produk yang sesuai dengan kategori dan merek terpilih
        const filteredProducts = products.filter(product => product.category_id ==
            selectedCategoryId &&
            product.brand_id == selectedBrandId);

        // Menghapus semua opsi produk sebelumnya
        productSelect.innerHTML = '';

        // Menambahkan opsi yang difilter ke dalam dropdown produk
        filteredProducts.forEach(products => {
            const option = document.createElement('option');
            option.value = products.id;
            option.textContent = products.name;
            productSelect.appendChild(option);
        });

        console.log(filteredProducts, selectedCategoryId, selectedBrandId);
    });

    pertahunProductInput.addEventListener('input', function() {
        // Get the entered value and convert it to a number
        let value = parseFloat(pertahunProductInput.value);

        // Check if the entered value is greater than 100
        if (value > 10) {
            // If it's greater, set the input value to 10
            pertahunProductInput.value = 10;
        } else if (value < 5) {
            // if it's smaller than 5, set the input value to 5
            pertahunProductInput.value = 5;
        }
    });
    $('#product-select').select2();
});
</script>
@endsection