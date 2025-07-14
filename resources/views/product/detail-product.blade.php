@extends('layouts.main-view')
@section('content')
    <h2 class="mb-4">Detail Produk</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-auto d-flex justify-content-center ">
                    <img src="{{ asset('storage/product_images/' .$product->photo) }}" alt="Image product"
                        class="img-fluid" style="height:250px;">
                </div>
                <div class="col-md-auto">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Nama Merk</th>
                                <th>:</th>
                                <td>{{ $product->brands->name }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <th>:</th>
                                <td>{{ $product->categories->name }}</td>
                            </tr>
                            <tr>
                                <th>Nama Produk</th>
                                <th>:</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Kode Produk</th>
                                <th>:</th>
                                <td>{{ $product->code }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('/product') }}" class="btn btn-primary mt-4">Kembali ke Daftar Produk</a>
@endsection