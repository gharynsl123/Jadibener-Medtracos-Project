@extends('layouts.main-view')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-end mb-3">
        <div>
            @if(Auth::user()->level == 'admin')
                <a href="{{url('/create-equipment')}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Data Peralatan</span>
                </a>
                <a href="#" class="btn btn-sm btn-primary">
                    <i class="fa fa-file"></i>
                    <span>Import Data Peralatan</span>
                </a>
            @endif
        </div>
    </div>

    <div class="modal fade" id="selec-equipment" tabindex="-1" aria-labelledby="selec-equipment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title " id="exampleModalLabel">Select Type</h5>
                </div>
                <div class="modal-body">
                    <a href="{{url('/download-peralatan-garansi')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-star"></i>
                        <span>Inport Data Garansi</span>
                    </a>
                    @if(Auth::user()->level == 'admin')
                        <a href="{{url('/download-peralatan-general')}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-file-alt"></i>
                            <span>Inport Data General</span>
                        </a>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->level != 'pic')
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link btn btn-sm active" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-general" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">General</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link btn btn-sm" id="pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-warranty" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">Under Warranty</button>
            </li>
        </ul>
    @endif

    <div class="tab-content" id="pills-tabContent">
        <!-- general table -->
        <p class="mb-0 d-none d-sm-inline-block montserrat-semibold py-3 m-0" style="font-size:25px; color:#000000;">
            Peralatan Rumah Sakit</p>
        <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card p-3 shadow-sm border-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle table-sm table-striped border-light" id="generalTable">
                        <thead>
                            <tr class="bg-dark-ori-web text-white">
                                <!-- <th class="rounded-left">Nama Instansi</th> -->
                                <th style="width:auto; white-space:nowarp;" class="rounded-left-top">Produk</th>
                                <th style="text-align:center; width:auto; white-space:nowarp;" class="d-none">kategori</th>
                                <th style="text-align:center; width:auto; white-space:nowarp;" class="d-none">merek</th>
                                <th style="text-align:center; width:auto; white-space:nowarp;" class="d-none">departement
                                </th>
                                <th style="text-align:center; width:auto; white-space:nowarp;">Serial Number</th>
                                <th style="text-align:center; width:auto; white-space:nowarp;">Garansi</th>
                                <th style="text-align:center; width:auto; white-space:nowarp;">Kondisi</th>
                                <th style="text-align:center; width:auto; white-space:nowarp;">status</th>
                                <th class="rounded-right-top" style="text-align:center;">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipment as $item)
                                <tr class="py-4">
                                    <!-- <td>{{$item->instansi->name}}</td> -->
                                    <td>{{$item->poducts->name}}</td>
                                    <td style="text-align:center;" class="d-none">{{$item->categories->name}}</td>
                                    <td style="text-align:center;" class="d-none">{{$item->brands->name}}</td>
                                    <td style="text-align:center;" class="d-none">{{$item->departement}}</td>
                                    <td style="text-align:center;">{{$item->serial_number}}</td>
                                    <td style="text-align:center;">{{$item->warranty}}</td>
                                    <td style="text-align:center;">
                                        <div class="progress rounded rounded-pill" style="height:21px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                aria-valuenow="{{$item->condition}}" aria-valuemin="0" aria-valuemax="100"
                                                style="width:{{$item->condition}}%">
                                                <span style="font-size:10px;">{{$item->condition}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;">
                                        <span class="rounded rounded-pill bg-success text-white px-4 py-1 text-capitalize"
                                            style="font-size:10px;">{{$item->description}}
                                        </span>
                                    </td>
                                    <td style="width:10%;">
                                        <form action="{{ route('destroy.tools', $item->id) }}" method="post" 
                                            class="d-flex gap-3 align-items-center" style="width:auto;">
                                            
                                            <a href="{{ url('/detail-equipment', $item->slug) }}" style="font-size:11px;" 
                                            class="btn btn-sm d-inline-flex align-items-center rounded-pill border border-dark bg-transparent">
                                                <span>Detail</span> &nbsp;&nbsp;&nbsp;
                                                <i class="fa fa-angle-right ms-1"></i>
                                            </a>

                                            @if(Auth::user()->level != 'pic')
                                                <a href="{{ url('/edit-equipment', $item->slug) }}" style="font-size:11px;"
                                                class="btn btn-sm d-inline-flex align-items-center mx-2 rounded-pill border border-success bg-transparent">
                                                    <span>Edit</span>&nbsp;&nbsp;&nbsp;
                                                    <i class="fa fa-pen-to-square ms-1"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="font-size:11px;"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $item->poducts->name }} ?')"
                                                    class="btn btn-sm d-inline-flex align-items-center rounded-pill border border-danger bg-transparent">
                                                    <span>Hapus</span>&nbsp;&nbsp;&nbsp;
                                                    <i class="fa fa-trash ms-1"></i>
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3" id="tableFooterContainer">
                <div id="tableInfoContainer"></div>
                <div id="tablePaginationContainer"></div>
            </div>
        </div>
        <!-- warranty table -->
        <div class="tab-pane fade" id="pills-warranty" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card p-3 shadow-lg border-left-primary">
                <div class="table-responsive">
                    <table class="table border-0 table-borderless table-hover" id="warrantyTable">
                        <thead>
                            <tr class="bg-dark-ori-web text-white">
                                <th class="rounded-left">Nama Instansi</th>
                                <th>Produk</th>
                                <th class="d-none">kategori</th>
                                <th class="d-none">merek</th>
                                <th class="d-none">departement</th>
                                <th>Serial Number</th>
                                <th>Garansi</th>
                                <th>Instalasi</th>
                                <th>Kondisi</th>
                                <th>Keterangan</th>
                                <th class="rounded-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($warrantyEquip as $item)
                                <tr>
                                    <td>{{$item->instansi->name}}</td>
                                    <td>{{$item->poducts->name}}</td>
                                    <td class="d-none">{{$item->categories->name}}</td>
                                    <td class="d-none">{{$item->brands->name}}</td>
                                    <td class="d-none">{{$item->departement}}</td>
                                    <td>{{$item->serial_number}}</td>
                                    <td>{{$item->warranty}}</td>
                                    <td>{{$item->installation}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="{{$item->condition}}" aria-valuemin="0"
                                                aria-valuemax="100" style="width: {{$item->condition}}%">
                                                {{$item->condition}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <form action="{{route('destroy.tools', $item->id)}}" method="post">
                                            <a href="{{url('/detail-equipment', $item->slug)}}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if(Auth::user()->level != 'pic')
                                                <a href="{{url('/edit-equipment', $item->slug)}}" class="btn btn-sm btn-success">
                                                    <i class="fa fa-pen-to-square"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus {{$item->poducts->name}} ?')"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif
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

    <div class="d-flex justify-content-end mt-3">
        <button type="button" data-bs-toggle="modal" data-bs-target="#selec-equipment" class="py-2 btn btn-sm text-white"
            style="background-color: #033E3E;">
            <i class="fa fa-download"></i>
            <span>Export Data Peralatan</span>
        </button>
    </div>


    <script>
        $('#generalTable').DataTable({
            ordering: false,
            pageLength: 5,
            autoWidth: false,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            initComplete: function () {
                const $wrapper = $('#generalTable_wrapper');
                const $filter = $wrapper.find('.dataTables_filter');
                const $input = $filter.find('input');

                // Remove default "Search:" label text
                $filter.find('label').contents().filter(function () {
                    return this.nodeType === 3;
                }).remove();

                // Custom search input style
                $input.css({
                    'padding-left': '30px',
                    'border-radius': '8px',
                    'border': '1px solid #ccc',
                    'width': '250px',
                    'background-image': 'url("https://cdn-icons-png.flaticon.com/512/622/622669.png")',
                    'background-repeat': 'no-repeat',
                    'background-size': '16px',
                    'background-position': '8px center',
                    'box-sizing': 'border-box'
                }).attr('placeholder', 'Search...');

                // Margin for length selector
                $wrapper.find('.dataTables_length').css({
                    'margin-bottom': '1rem'
                });

                // Gap for select element
                $wrapper.find('.dataTables_length select').css({
                    'margin': '0 8px'
                });

                // ===== Move info & pagination outside =====
                // Make sure you have these containers in your HTML outside the card/table
                // <div class="d-flex justify-content-between align-items-center mt-2" id="tableFooterContainer">
                //     <div id="tableInfoContainer"></div>
                //     <div id="tablePaginationContainer"></div>
                // </div>
                $('#tableInfoContainer').append($wrapper.find('#generalTable_info'));
                $('#tablePaginationContainer').append($wrapper.find('.dataTables_paginate'));
            }
        });


        $('#warrantyTable').DataTable({
            ordering: false,
            pageLength: 5,
            autoWidth: false,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            initComplete: function () {
                const $filter = $('#warrantyTable_wrapper .dataTables_filter');
                const $input = $filter.find('input');

                $filter.find('label').contents().filter(function () {
                    return this.nodeType === 3;
                }).remove();

                $input.css({
                    'padding-left': '30px',
                    'border-radius': '8px',
                    'border': '1px solid #ccc',
                    'width': '250px',
                    'background-image': 'url("https://cdn-icons-png.flaticon.com/512/622/622669.png")',
                    'background-repeat': 'no-repeat',
                    'background-size': '16px',
                    'background-position': '8px center',
                    'box-sizing': 'border-box'
                });

                $input.attr('placeholder', 'Search...');

                $('#warrantyTable_wrapper .dataTables_length').css({
                    'margin-bottom': '1rem'
                });

                $('#warrantyTable_wrapper .dataTables_length select').css({
                    'margin': '0 8px'
                });
            }
        });
    </script>





@endsection