@extends('layouts.main-view')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Seluruh Aktivitas</h1>
</div>

<div class="card shadow p-3 mb-4 border-left-primary">
        <div class="table-responsive">
            <table class="table table-hover border-0 table-borderless" id="TableActivity" >
                <thead class="bg-dark-ori-web text-white">
                    <tr>
                        <th class="rounded-left">Tanggal Proses</th>
                        <th>User</th>
                        <th>Aksi</th>
                        <th>Model</th>
                        <th>ID Model</th>
                        <th class="rounded-right">Nama Produk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <!-- Tampilkan hanya aktivitas dengan aksi "created" -->
                    <tr>
                        <td>{{ $activity->created_at }}</td>
                        <td>{{ $activity->user->nama_user }}</td>
                        <td>{{ $activity->action }}</td>
                        <td>{{ class_basename($activity->model) }}</td>
                        <td>{{ $activity->model_id }}</td>
                        @if($activity->action === 'created')
                        <td>
                            @php
                                // Decode perubahan dari JSON ke dalam bentuk array
                                $changes = json_decode($activity->changes, true);
                            @endphp
                            @if(is_array($changes) && isset($changes['nama_produk']))
                                <!-- Tampilkan hanya nama produk -->
                                {{ $changes['nama_produk'] }}
                            @else
                                -
                            @endif
                        </td>
                        @else
                        <td>
                            <!-- Decode perubahan dari JSON ke dalam bentuk array -->
                            @php
                                $changes = json_decode($activity->changes, true);
                            @endphp
                            @if(is_array($changes))
                                <ul>
                                    <!-- erase the underscore bitween a senten key -->
                                    @foreach($changes as $key => $value)
                                        @php
                                            // Ganti underscore dengan spasi pada key
                                            $formattedKey = str_replace('_', ' ', $key);
                                        @endphp
                                        <li><strong>{{ ucfirst($formattedKey) }}:</strong> {{ $value }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {{ $activity->changes }}
                            @endif
                        </td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

<!-- js mood -->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script>
$('#TableActivity').DataTable();
</script>

@endsection