@extends('layouts.main-view')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 d-none d-sm-inline-block text-gray-800">User Configuration</h1>
    <div>
        <a href="{{url('/create-user')}}" class="btn btn-sm btn-primary mt-1 shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah User
        </a>
        <a href="#" class="btn btn-sm btn-primary mt-1 shadow-sm">
            <i class="fas fa-file fa-sm text-white-50"></i>
            Import Data User
        </a>
    </div>
</div>

<div class="card p-3 border-left-primary">
    <div class="table-responsive">
        <table class="table table-borderless border-0 table-hover" id="dataTable">
            <thead>
                <tr class="bg-dark-ori-web text-white">
                    <td class="rounded-left">Nama & username</td>
                    <td>Level</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>status</td>
                    <td class="rounded-right"></td>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $item)
                <tr>
                    <td>
                        <div>
                            <p class="m-0 text-dark">{{$item->name}} <span class="small">({{$item->username}})</span>
                            </p>
                        </div>
                    </td>
                    <td>{{$item->level}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->pass_view}}</td>
                    <td>
                        @if(Cache::has('user-is-online-' . $item->id))
                        <span class="badge px-3 py-2 text-white bg-success">Online</span>
                        @else
                        <span class="badge px-3 py-2 text-white bg-secondary">Offline</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('destroy.user', $item->id) }}" method="post">
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#detail-user-{{$item->id}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{url ('edit-user',$item->slug)}}" class="btn btn-sm btn-success">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus user {{$item->name}} ini?')"
                                class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="detail-user-{{$item->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Detail {{$item->name}}
                                </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <div class="col-md-6">username : {{$item->username}}</div>
                                <div class="col-md-6">password : {{$item->pass_view}}</div>
                                <div class="col-md-6">Level : {{$item->level}}</div>
                                <div class="col-md-6">Email : {{$item->email}}</div>
                                <div class="col-md-6">Gender : {{$item->gender}}</div>
                                <div class="col-md-6">Nomor HP : {{$item->phone_number}}</div>
                                @if($item->level == 'pic')
                                <div class="col-md-6">departement: {{$item->departement ?? 'tidak ada'}}</div>
                                <div class="col-md-6">Nama Instansi: {{$item->instansi->name ?? 'tidak ada'}}</div>
                                @else
                                <div class="col-md-6">departement: {{$item->role ?? 'tidak ada'}}</div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $('#dataTable').DataTable({
        ordering: false,
        pageLength: 6,
        autoWidth: false,
        lengthChange: false,  
        lengthMenu: null
    });
</script>
@endsection