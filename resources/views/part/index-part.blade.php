@extends('layouts.main-view')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Spare Part</h1>
</div>

<div class="card shadow-lg p-3 border-left-primary mb-5">
    <form action="{{url('store-part')}}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark" for="">Nama Part</label>
                <input type="text" placeholder="Nama Spare Part" class="form-control mb-3" name="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark" for="">Kode Part</label>
                <input type="text" class="form-control mb-3" placeholder="Code Spare Part" name="code">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark" for="id_kategori">Kategori</label>
                <input type="text" class="form-control mb-3" placeholder="Nama kategori" name="kategori">
            </div>
        </div>
        <div class="col-md-6">
            <!-- File Input -->
            <div class="mb-3">
                <label for="image" class="form-label">No Image</label>
                <input type="file" class="form-control" name="photo">
            </div>
        </div>
        <button type="submit" class="mx-2 btn btn-primary">Tambahkan</button>
    </form>
</div>

<div class="card border-left-primary shadow-lg p-3">
    <div class="table-responsive">
        <table class="table table-borderless" id="dataTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <th class="rounded-left">Nama Part</th>
                    <th>Kategori</th>
                    <th>Code</th>
                    <th class="rounded-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($part as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <!-- take first word in kategori only -->
                    <td>
                        {{ $item->kategori ? explode(' ', $item->kategori)[0] : 'tidak ada' }}
                    </td>
                    <td>{{$item->code}}</td>
                    <td>
                        <form action="{{route('destroy.part', $item->id)}}" method="post">
                            <a href="{{url('/spare-part/' . $item->name)}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{url('/edit-part/'. $item->id)}}" class="btn btn-sm btn-success">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin user {{$item->name}} ini?')"
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
@endsection