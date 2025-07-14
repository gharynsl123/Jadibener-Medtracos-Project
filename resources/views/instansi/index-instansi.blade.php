@extends('layouts.main-view')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 d-none d-sm-inline-block  text-gray-800">Data Rumah Sakit</h1>
        @if(in_array(Auth::user()->level, ['surveyor', 'teknisi']))
        <p class="mt-2">Total Member Rumah Sakit : {{$special->count()}}</p>
        @else
        <p class="mt-2">Total Rumah Sakit : {{$general->count()}}</p>
        @endif
    </div>
    <div class="">
        @if(Auth::user()->level != 'pic')
        @if(Auth::user()->level == 'admin')
        <a href="{{url('/create-instansi')}}" class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i>
            <span>Tambah Data RS</span>
        </a>
        <a data-toggle="modal" data-target="#importdata" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-file-import fa-sm text-white-50"></i> Import Data RS</a>
        @endif
        <button type="button" data-bs-toggle="modal" data-bs-target="#selec-excel" class="btn btn-sm btn-primary">
            <i class="fa fa-download"></i>
            <span>Export Data RS</span>
        </button>
        @endif
        <button type="button" id="showall" class="btn btn-secondary btn-sm">
            Show All
        </button>
    </div>
</div>
<div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Rumah Sakit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('import.instansi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex ">
                        <input type="file" required name="file">
                        <button class="btn btn-secondary" type="submit">Import Data</button>
                    </div>
                    <small>format file Xsl, CSV</small>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="selec-excel" tabindex="-1" aria-labelledby="selec-excel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title " id="exampleModalLabel">Select Type</h5>
            </div>
            <div class="modal-body">
                <a href="{{url('/download-instansi-special')}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-star"></i>
                    <span>Inport Data Special RS</span>
                </a>
                @if(Auth::user()->level == 'admin')
                <a href="{{url('/download-instansi-excel')}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-file-alt"></i>
                    <span>Inport Data General RS</span>
                </a>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@if(Auth::user()->level == 'admin')
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link btn btn-sm active" id="pills-home-tab" data-bs-toggle="pill"
            data-bs-target="#pills-general" type="button" role="tab" aria-controls="pills-home"
            aria-selected="true">General</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link btn btn-sm" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-member"
            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Member</button>
    </li>
</ul>
@endif

<div class="tab-content" id="pills-tabContent">
    @if(Auth::user()->level == 'admin')
    <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="card border-left-primary p-3 shadow-lg">
            <div class="table-responsive">
                <table class="table table-borderless border-0 table-hover" id="dataTableGeneral">
                    <thead>
                        <tr class="text-white bg-dark-ori-web">
                            <th class="rounded-left">Nama Rumah Sakit</th>
                            <th>Provinsi</th>
                            <th>Alamat</th>
                            <th>Type</th>
                            <th>Jenis Instansi</th>
                            <th class="rounded-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($general->reverse() as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->provinsi}}</td>
                            <td>{!! $item->address !!}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>
                                <form action="{{ route('destroy.instansi', $item->id) }}" method="post">
                                    <a href="{{url('/detail-instansi', $item->slug)}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{url('/edit-instansi', $item->slug)}}" class="btn btn-sm btn-success">
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
    </div>
    @endif
    <div class="tab-pane fade @if(in_array(Auth::user()->level, ['surveyor', 'teknisi'])) show active @endif" id="pills-member"
        role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="card border-left-success p-3 shadow-lg">
            <div class="table-responsive">
                <table class="table table-borderless table-hover border-0 " id="dataTableMember">
                    <thead>
                        <tr class="text-white bg-dark-ori-web">
                            <th class="rounded-left">Nama Rumah Sakit</th>
                            <th>Provinsi</th>
                            <th>Alamat</th>
                            <th>Type</th>
                            <th>Jenis Instansi</th>
                            <th class="rounded-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($special as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->provinsi}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>
                                <form action="{{ route('destroy.instansi', $item->id) }}" method="post">
                                    <a href="{{url('/detail-instansi', $item->slug)}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{url('/edit-instansi', $item->slug)}}" class="btn btn-sm btn-success">
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
    </div>
</div>

<script>
$(document).ready(function() {
    var table1 = $('#dataTableGeneral').DataTable({
        ordering: false,
        pageLength: 5,
        autoWidth: false,
        border: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });
    var table2 = $('#dataTableMember').DataTable({
        ordering: false,
        pageLength: 5,
        autoWidth: false,
        border: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });

    $('#showall').on('click', function() {
        var buttonText = $(this).text();
        if (buttonText === 'Show Less') {
            table1 = $('#dataTableGeneral').DataTable({
                ordering: false,
                pageLength: 5,
                autoWidth: false,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
            });
            table2 = $('#dataTableMember').DataTable({
                ordering: false,
                pageLength: 5,
                autoWidth: false,
                border: false,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
            });
            $(this).text('Show All');
        } else {
            table1.destroy();
            table2.destroy();
            $(this).text('Show Less');
        }
    });
});
</script>
@endsection