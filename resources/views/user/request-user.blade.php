@extends('layouts.main-view')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Request Service</h1>
</div>
<div class="card p-3 border-left-primary">
    <div class="table-responsive">
        <table class="table table-borderless border-0 table-hover" id="dataTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <th class="rounded-left">name</th>
                    <th>nomor hp</th>
                    <th>Alamat</th>
                    <th>Masalah</th>
                    <th>tipe peralatan</th>
                    <th class="rounded-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($member as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone_number}}</td>
                    <td style="width: 25%;">{{$item->address}}</td>
                    <td style="width: 40%;">{{$item->issue}}</td>
                    <td>{{$item->tools_type}}</td>
                    <td>
                        <div class="d-flex ">
                            <a href="{{ route('approve', $item->id) }}" class="btn btn-sm btn-primary">ok</a>
                            <a href="{{ route('reject', $item->id) }}" class="btn mx-2 btn-sm btn-primary">reject</a>
                            <a href="#" class="btn btn-sm btn-primary">detail</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
$('#dataTable').DataTable({
    ordering: false,
    pageLength: 5,
    autoWidth: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
    ],
});
</script>
@endsection