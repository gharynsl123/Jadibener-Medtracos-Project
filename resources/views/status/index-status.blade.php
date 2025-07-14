@extends('layouts.main-view')
@section('content')
<h2>Status Service</h2>
<div class="table-responsive p-3 mt-4 card shadow border-left-primary">
    <table class="table border-0" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Pengajuan</th>
                <th>dikerjakan oleh</th>
                <th>instansi</th>
                <th>Jadwal</th>
                <th>kategori</th>
                <th>nama produk</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($progressList as $index => $progress)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <a href="/progress/{{$progress->submissions->slug}}"
                        class="btn btn-primary">{{$progress->submissions->tikects_id}}</a>
                </td>
                <td>{{ $progress->users->name }}</td>
                <td>{{ $progress->submissions->equipments->instansi->name }}</td>
                <td>{{ $progress->submissions->created_at }}</td>
                <td>{{ $progress->submissions->equipments->categories->name }}</td>
                <td>{{ $progress->submissions->equipments->poducts->name }}</td>
                <td>
                    {{ $progress->submissions->status }}
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
    border: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
    ],
});
</script>
@endsection