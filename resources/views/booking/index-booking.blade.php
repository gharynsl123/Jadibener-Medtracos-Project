@extends('layouts.main-view')
@section('content')
<h2>Jadwal Kedatanga Teknisi</h2>
<div class="table-responsive p-3 mt-4 card shadow border-left-primary">
    <table class="table border-0" id="dataTable">
        <thead>
            <tr>
                <th>instansi</th>
                <th>keluhan</th>
                <th>teknisi yang di pilih</th>
                <th>datang pada tanggal</th>
                <th>rencana tindakan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($booking as $items)
            <tr>
                <td>{{ $items->instansi->name }}</td>
                <td>{{ $items->complaint }}</td>
                <td>{{ $items->user->name }}</td>
                <td>{{ $items->date }}</td>
                <td>{{ $items->action_plan }}</td>
                <td>
                    @if(Auth::user()->level != 'pic')
                    @if($items->conclusion && $items->results == null)
                    <a href="{{url ('/input-hasil-kunjungan',$items->slug)}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-pen-to-square"></i>
                    </a>
                    @endif
                    @endif
                    @if($items->conclusion && $items->results != null)
                    <a href="{{url ('/detail-kunjungan',$items->slug)}}" class="btn btn-sm btn-success">
                        <i class="fa fa-eye"></i>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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