@extends('layouts.main-view')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categori</h1>
</div>
<div class="card p-3 border-left-primary shadow">
    <form action="{{url('store-categories')}}" method="post" class="row gap2">
        @csrf
        <div class="col-md-5 mb-3">
            <input type="text" class="form-control" placeholder="Nama Kategori" name="name">
        </div>
        <div class="col-md-5 mb-3">
            <select id="departement" class="form-control" name="departement">
                <option value="" selected>-- Select Departement --</option>
                <option value="Hospital Kitchen">Hospital Kitchen</option>
                <option value="CSSD">CSSD</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <button type="submit" class="btn form-control btn-primary">Tambahkan</button>
        </div>
    </form>

    <hr>

    <div class="table-responsive mt-3">
        <table class="table table-borderless" id="dataTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <th class="rounded-left">Nama Kategori</th>
                    <th>Departement</th>
                    <th class="rounded-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->departement}}</td>
                    <td>
                        <form action="{{route('destroy.category', $item->id)}}" method="post">
                            <a href="{{url('/edit-category/'. $item->id)}}" class="btn btn-sm btn-success">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin mengnhapus {{$item->name}}?')"
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