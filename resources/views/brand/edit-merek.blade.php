@extends('layouts.main-view')
@section('content')

<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Merek</h1>
</div>
<div class="card p-3 border-left-primary shadow">
    <form action="{{ route('update.brand', $brand->id) }}" method="post" class="row gap2">
        @csrf
        <div class="col-md-5 mb-3">
            <input type="text" class="form-control" placeholder="Nama Merek" name="name" value="{{ $brand->name }}">
        </div>
        <div class="col-md-5 mb-3">
            <select id="departement" class="form-control" name="departement">
                <option value="" disabled>-- Select Departement --</option>
                <option value="Hospital Kitchen" {{ $brand->departement == 'Hospital Kitchen' ? 'selected' : '' }}>Hospital Kitchen</option>
                <option value="CSSD" {{ $brand->departement == 'CSSD' ? 'selected' : '' }}>CSSD</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <button type="submit" class="btn form-control btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection
