@extends('layouts.main-view')
@section('content')

<div class="card border-left-primary p-3 shadow-lg" id="form-product">
    <h3>Edit Produk</h3>
    <form action="{{url('/update-product', $product->id)}}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6 form-group">
            <input type="text" name="name" value="{{$product->name}}" placeholder="nama produk" id=""
                class="form-control">
        </div>
        <div class="col-md-6 form-group">
            <input type="text" name="code" value="{{$product->code}}" placeholder="kode produk" id=""
                class="form-control">
        </div>
        <div class="col-md-6 form-group">
            <select name="departement" id="departement" class="form-control">
                <option value="">-- Select Departement --</option>
                <option value="Hospital Kitchen" {{$product->departement == 'Hospital Kitchen' ? 'selected' : ''}}>
                    Hospital Kitchen</option>
                <option value="CSSD" {{$product->departement == 'CSSD' ? 'selected' : ''}}>CSSD</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select id="kategori" name="category_id" class="form-control">
                <option value="">-- Select Kategori --</option>
                @foreach($categories as $row)
                <option value="{{ $row->id }}" {{ $product->category_id == $row->id ? 'selected' : '' }}>
                    {{ $row->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 form-group">
            <select id="brand" name="brand_id" class="form-control">
                <option value="">-- Select Merek --</option>
                @foreach($brand as $row)
                <option value="{{ $row->id }}" {{ $product->brand_id == $row->id ? 'selected' : '' }}>
                    {{ $row->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 form-group">
            <input type="file" name="photo" placeholder="nama produk" id="" class="form-control">
        </div>

        <div class="col-md-6">
            <button class="btn btn-primary" type="submit">update</button>
            <a href="/product" class="btn btn-secondary">cancel</a>
        </div>
    </form>
</div>
@endsection