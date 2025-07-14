@extends('layouts.main-view')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create User</h1>
</div>

<div class="card shadow-lg p-3 border-left-primary">
    <form method="POST" class="row" action="{{route('store.user')}}">
        @csrf
        <div class="col-md-6 form-group">
            <input id="name" type="text" placeholder="Name" class="form-control" name="name" required autofocus>
        </div>
        <div class="col-md-6 form-group">
            <input id="username" type="text" placeholder="Username" class="form-control" name="username" required>
            <small>*username ini akan menjadi id mu saat login. jangan spasi dan huruf besar</small>
        </div>
        <div class="col-md-6 form-group">
            <input id="email" type="email" placeholder="Your Email" class="form-control" name="email" required>
        </div>
        <div class="col-md-6 form-group password-container">
            <input id="password" type="password" placeholder="Passowrd" class="form-control" name="password" required>
            <i class="fa-solid fa-eye fa-eye-pass" id="togglePassword"></i>

            <small>*Minimal 6 huruf/angka</small>
        </div>
        <div class="col-md-6 form-group">
            <input type="number" placeholder="Nomor HP" class="form-control" name="phone_number" required>
        </div>

        <div class="form-group col-md-6">
            <select id="gender" class="form-control" name="gender" required>
                <option value="" selected>-- Select Gender --</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <select id="level" class="form-control" name="level" required>
                <option value="">-- Select Level --</option>
                <option value="admin">Admin</option>
                <option value="pic">PIC RS</option>
                <option value="sub_service">Sub Divisi</option>
                <option value="surveyor">Surveyor</option>
                <option value="teknisi">Teknisi</option>
            </select>
        </div>

        <div class="col-md-6 form-group" id="instansiField">
            <select class="form-control" id="instansi-select" name="id_instansi">
                <option value="">-- Pilih Instansi --</option>
                @foreach($instansi as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6 " id="roleField" style="display: none;">
            <select id="role" class="form-control" name="departement">
                <option value="">-- Select Role --</option>
                <option value="Hospital Kitchen">Hospital Kitchen</option>
                <option value="CSSD">CSSD</option>
                <option value="Purcashing">Purcashing</option>
                <option value="IPS-RS">IPS-RS</option>
            </select>
        </div>

        <div class="form-group col-md-6 " id="teknisiField" style="display: none;">
            <select id="role" class="form-control" name="role">
                <option value="">-- Select Role --</option>
                <option value="kap_teknisi">Kepala Teknisi</option>
            </select>
            <small class="text-muted">jika user hanya teknisi biasa maka kosong kan role ini</small>
        </div>
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Tambahkan</button>
            <a href="/user-member" class="btn btn-secondary">Batalkan</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.getElementById("togglePassword");

    togglePasswordButton.addEventListener("click", function() {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

        // Ganti ikon mata sesuai dengan keadaan password
        const eyeIconClass = type === "password" ? "bi-eye" : "bi-eye-slash";
        togglePasswordButton.innerHTML = `<i class="bi ${eyeIconClass}"></i>`;
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


    var levelSelect = document.getElementById('level');

    var roleField = document.getElementById('roleField');
    var teknisiField = document.getElementById('teknisiField');
    var instansiField = document.getElementById('instansiField');

    instansiField.style.display = 'none';

    levelSelect.addEventListener('change', function() {
        var selectedLevel = levelSelect.value;

        if (selectedLevel === 'teknisi') {
            roleField.style.display = 'none';
            instansiField.style.display = 'none';
            teknisiField.style.display = 'block';

        } else if (selectedLevel === 'pic') {
            roleField.style.display = 'block';
            instansiField.style.display = 'block';
            teknisiField.style.display = 'none';

        } else {
            roleField.style.display = 'none';
            instansiField.style.display = 'none';
            teknisiField.style.display = 'none';
        }
    });

});
</script>
@endsection