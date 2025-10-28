@extends('layouts.main-view')
@section('content')
<style>
    .floating{
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 100;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    }
</style>
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Informasi</h1>
</div>

<div class="row gap-2">
    @foreach($information as $item)
    <a href="{{route('information.detail', $item->slug)}}" class="text-decoration-none text-dark col-md-4">
        <div class="card shadow p-3">
            <p class="h5 font-weight-bolder text-dark">{{$item->title}}</p>
            <p class="overflow-ellipsis">{{$item->description}}</p>
            <hr>
            <div class="d-flex justify-content-between">
                <span>{{$item->author}}</span>
                <span>{{$item->created_at}}</span>
            </div>
        </div>
    </a>
    @endforeach
</div>

@if(Auth::user()->level != 'pic')
<a href="#" data-toggle="modal" data-target="#addInformation" class="rounded px-3 py-2 text-white floating bg-primary">
    <i class="fa fa-plus"></i>
</a>
@endif

<div class="modal fade" id="addInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/store-infomation') }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Information</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="text" class="mb-3 form-control" placeholder="Judul Informasi" name="title">
                    <input type="text" class="mb-3 form-control" hidden readonly name="author" value="{{Auth::user()->name}}">
                    <textarea name="description" class="form-control" placeholder="tulis informasi" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection