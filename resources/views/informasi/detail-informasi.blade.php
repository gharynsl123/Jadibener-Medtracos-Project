@extends('layouts.main-view')
@section('content')

<div class="d-sm-flex align-items-center mb-4">
    <a href="{{url()->previous()}}" class="btn mr-4 btn-sm btn-primary"><i class="fa fa-arrow-left"></i> kembali</a>
    <h1 class="h3 mb-0 text-gray-800">{{$information->title}}</h1>
</div>

<div class="p-3 card shadow-lg">
    <p>{{$information->description}}</p>
</div>

@endsection