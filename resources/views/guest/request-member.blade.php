@extends('layouts.welcome')

@section('content')
@if(Auth::check())
<div class="container">
    <div class="card my-5 p-0">
        <div class="card-header">{{ __('Pengajuan Data Baru') }}</div>

        <div class="card-body">
            <form method="POST" action="{{url('store-it')}}">
                @csrf
                <div class="row">
                    <h5>Biodata diri</h5>
                    <div class="mb-3 col-md-3">
                        <input type="text" placeholder="Entar name" class="form-control" name="name" required
                            autocomplete="off" autofocus>
                    </div>

                    <div class="mb-3 col-md-3">
                        <input type="email" placeholder="example@gmail.com" class="form-control" name="email"
                            autocomplete="off" required>
                    </div>


                    <div class="mb-3 col-md-3">
                        <input placeholder="nomor " type="number" class="form-control" name="phone_number"
                            autocomplete="off" required>
                    </div>

                    <div class="mb-3 col-md-3">
                        <select class="form-control" name="gender">
                            <option value="">-- pilih gender --</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <hr>

                    <h5>Data akun</h5>

                    <div class="form-group mb-3 col-md-6">
                        <input type="text" placeholder="Enter your username" class="form-control " id="username"
                            name="username" autocomplete="off" required>
                        <small class="text-danger">*mohon untuk mengingat username. jangan spasi dan huruf
                            besar.</small>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                        <input type="text" placeholder="Enter your password" class="form-control" name="password"
                            autocomplete="off" required>
                        <small class="text-danger">*mohon untuk mengingat password ini</small>
                    </div>

                    <div class="form-group mb-3 col-md-6 " id="roleField">
                        <select class="form-control @error('departement') is-invalid @enderror" name="departement">
                            <option value="">-- pilih departement --</option>
                            <option value="Hospital Kitchen">Hospital Kitchen</option>
                            <option value="CSSD">CSSD</option>
                            <option value="Purchasing">Purchasing</option>
                            <option value="IPS-RS">IPS-RS</option>
                        </select>
                    </div>

                    <div class=" form-group mb-3 col-md-6 " id="instansiField">
                        <input id="email" type="text" class="form-control" name="instansi" placeholder="nama instansi"
                            required autocomplete="off">
                    </div>

                    <div class="form-group mb-3 col-md-12">
                        <label for="alamat_user">Alamat Rumah Sakit</label>
                        <textarea class="form-control" id="address" name="address"
                            placeholder="Alamat Anda di sini"></textarea>
                    </div>

                    <div class="form-group mt-3 col-md-12" id="form-keluhan" style="display:none;">
                        <label for="alamat_user">Laporkan Keluhan</label>
                        <textarea class="form-control" id="editor" name="issue"
                            placeholder="Keluhan yang ingin di sampaikan"></textarea>
                    </div>
                </div>


                <div class="form-group mt-3 row mb-0\3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Ajukan Pembuatan Data') }}
                        </button>
                        <a href="#" id="btn-keluhan" class="btn btn-success">Laporan keluhan</a>
                        <a href="/" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('editor');

document.addEventListener('DOMContentLoaded', function() {
    var keluhanButton = document.getElementById('btn-keluhan');
    var formKeluhan = document.getElementById('form-keluhan');

    keluhanButton.addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah link dari berpindah ke halaman lain

        if (formKeluhan.style.display === 'none' || formKeluhan.style.display === '') {
            formKeluhan.style.display = 'block';
        } else {
            formKeluhan.style.display = 'none';
            editor.setData('');
        }
    });
});

document.getElementById('username').addEventListener('input', function() {
    var usernameInput = this.value;

    // Mengubah huruf kapital menjadi huruf kecil
    usernameInput = usernameInput.toLowerCase();

    // Menghilangkan spasi dari username
    usernameInput = usernameInput.replace(/\s/g, '');

    // Menetapkan kembali nilai input
    this.value = usernameInput;
});
</script>
@else
<div class="vh-100 vw-100 d-flex align-items-center justify-content-center">
        <p class="">Woops You have to Log in first..</p>
</div>
@endif
@endsection