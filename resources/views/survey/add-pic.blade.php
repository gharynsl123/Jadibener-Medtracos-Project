@extends('layouts.main-view')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create User</h1>
</div>

<div class="card shadow-lg p-3 border-left-primary">
    <form method="POST" class="row" action="{{route('surveyor.data.store')}}">
        @csrf
        <div class="col-md-6 form-group">
            <input id="name" type="text" hidden value="{{$instansi->id}}" class="form-control" name="id_instansi">
            <input id="name" type="text" readonly value="{{$instansi->name}}" class="form-control">
            <small>*Nama Rumah Sakit</small>
        </div>
        <div class="col-md-6 form-group">
            <input id="name" type="text" placeholder="Name" class="form-control" name="name" required autofocus>
        </div>
        <div class="col-md-6 form-group">
            <input id="username" type="text" placeholder="Username" class="form-control" name="username" required>
            <small>*username ini akan menjadi id mu saat login. jangan spasi dan huruf besar</small>
        </div>

        <div class="form-group col-md-6">
            <select id="gender" class="form-control" name="gender" required>
                <option value="" selected>-- Select Gender --</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group col-md-6 " id="roleField">
            <select id="role" class="form-control" name="departement">
                <option value="">-- Select Role --</option>
                <option value="Hospital Kitchen">Hospital Kitchen</option>
                <option value="CSSD">CSSD</option>
                <option value="Purcashing">Purcashing</option>
                <option value="IPS-RS">IPS-RS</option>
            </select>
        </div>

        <div class="col-md-6 form-group">
            <input type="number" placeholder="Nomor HP" class="form-control" name="phone_number" required>
        </div>

        <div class="col-md-6 form-group">
            <input id="email" type="email" placeholder="Your Email" class="form-control" name="email" required>
        </div>
        <div class="col-md-6 form-group password-container">
            <input id="password" type="password" placeholder="Passowrd" class="form-control" name="password" required>
            <i class="fa-solid fa-eye fa-eye-pass" id="togglePassword"></i>

            <small>*Minimal 6 huruf/angka</small>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Tambahkan</button>
            <a href="{{url('/detail-instansi', $instansi->slug)}}" class="btn btn-secondary">kembali</a>
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
});
</script>

@endsection