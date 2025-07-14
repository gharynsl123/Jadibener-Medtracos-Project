@extends('layouts.main-view')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Spare Part</h1>
</div>

<div class="card shadow-lg p-3 border-left-primary mb-5">
    <form action="{{url('/update-part/'.$part->id)}}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark" for="">Nama Part</label>
                <input type="text" value="{{$part->name}}" class="form-control mb-3" name="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark" for="">Kode Part</label>
                <input type="text" value="{{$part->code}}" class="form-control mb-3" name="code">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark" for="id_kategori">Kategori</label>
                <input type="text" value="{{$part->kategori}}" class="form-control mb-3" name="kategori">
            </div>
        </div>
        <div class="col-md-6">
            <!-- File Input -->
            <div class="mb-3">
                <label for="image" class="form-label">No Image</label>
                <input type="file" class="form-control" name="photo">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="text-dark" for="">Deskripsi</label>
                <textarea type="text" class="form-control mb-3" name="description">{{$part->description}}</textarea>
            </div>
        </div>

        <button type="submit" class="mx-2 btn btn-primary">Update</button>
    </form>
</div>
@endsection