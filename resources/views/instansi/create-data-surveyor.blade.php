@extends('layouts.main-view')

@section('content')
<style>
.d-flex .line-bottom {
    border-bottom: 1px solid #000;
    padding-bottom: 2px;
    margin-right: 10px;
}

.input-error {
    border-color: red;
}

.error-message {
    color: red;
    font-size: 12px;
}
</style>
<div class="d-flex">
    <a href="{{ url()->previous() }}" class="btn mr-4 btn-secondary">Batalkan</a>

    <div class="d-flex ml-auto btn-group">
        <button class="btn btn-primary" id="prevPage" type="button">Previous</button>
        <button class="btn btn-success" id="nextPage" type="button">Next</button>
    </div>
</div>

<form action="{{route('survey.store-data')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="instansi-form">
        <div class="card shadow mt-3 p-3 border-left-primary">
            <h2 class="m-0 p-0">Input Data Rumah Sakit / Institusi</h2>
            <div class="row pt-3">
                <div class="form-group col-md-6">
                    <select class="form-control" name="id_instansi" id="instansi-select">
                        <option value="">Pilih instansi</option>
                        @foreach($instansi as $row)
                        <option 
                            value="{{$row->id}}" 
                            data-alamat="{{ $row->address }}"
                            data-jenis="{{ $row->jenis }}" 
                            data-type="{{ $row->type }}"
                            data-provinsi="{{ $row->provinsi }}">
                            
                            {{$row->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <select name="provinsi" required class="form-control" id="provinsi">
                        <option value="">-- Select Provinsi --</option>
                        <option value="Aceh">Aceh</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="Riau">Riau</option>
                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Lampung">Lampung</option>
                        <option value="Bangka Belitung">Bangka Belitung</option>
                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                        <option value="Banten">Banten</option>
                        <option value="DKI Jakarta">DKI Jakarta</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Bali">Bali</option>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                        <option value="Gorontalo">Gorontalo</option>
                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        <option value="Maluku Utara">Maluku Utara</option>
                        <option value="Maluku">Maluku</option>
                        <option value="Papua Barat">Papua Barat</option>
                        <option value="Papua">Papua</option>
                        <option value="Papua Tengah">Papua Tengah</option>
                        <option value="Papua Pegunungan">Papua Pegunungan</option>
                        <option value="Papua Selatan">Papua Selatan</option>
                        <option value="Papua Barat Daya">Papua Barat Daya</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <select name="type" required class="form-control" id="type">
                        <option value="">-- Select Tipe --</option>
                        <option value="Rumah Sakit Umum Kelas A">Rumah Sakit Umum Kelas A</option>
                        <option value="Rumah Sakit Umum Kelas B">Rumah Sakit Umum Kelas B</option>
                        <option value="Rumah Sakit Umum Kelas C">Rumah Sakit Umum Kelas C</option>
                        <option value="Rumah Sakit Umum Kelas D">Rumah Sakit Umum Kelas D</option>
                        <option value="Rumah Sakit Khusus Kelas A">Rumah Sakit Khusus Kelas A</option>
                        <option value="Rumah Sakit Khusus Kelas B">Rumah Sakit Khusus Kelas B</option>
                        <option value="Rumah Sakit Khusus Kelas C">Rumah Sakit Khusus Kelas C</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <select name="jenis" required class="form-control" id="jenis">
                        <option value="">-- Select Jenis --</option>
                        <option value="pemerintah">Pemerintah</option>
                        <option value="swasta">Swasta</option>
                        <option value="BUMN">BUMN</option>
                        <option value="TNI/Polri">TNI/Polri</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <input type="file" name="photo" id="" required class="form-control p-0">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control alamat-auto-form" readonly name="alamat_instansi" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="pic-form" style="display: none;">
        <div class="card p-3 mt-3 border-left-primary shadow">
            <h2 class="m-0 p-0">Input User PIC</h2>
            <div class="row pt-3">

                <div class="col-md-6 form-group">
                    <input id="name" type="text" placeholder="Name" class="form-control" name="name" required autofocus>
                </div>
                <div class="col-md-6 form-group">
                    <input id="username" type="text" placeholder="Username" class="form-control" name="username"
                        required>
                    <small>*username ini akan menjadi id mu saat login. jangan spasi dan huruf besar</small>
                </div>
                <div class="col-md-6 form-group">
                    <input id="email" type="email" placeholder="Your Email" class="form-control" name="email" required>
                </div>
                <div class="col-md-6 form-group password-container">
                    <input id="password" type="password" placeholder="Passowrd" class="form-control" name="password"
                        required>
                    <i class="fa-solid fa-eye fa-eye-pass" id="togglePassword"></i>

                    <small>*Minimal 6 huruf/angka</small>
                </div>
                <div class="col-md-6 form-group">
                    <input type="number" placeholder="Nomor HP" class="form-control" name="phone_number" required>
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

                <div class="form-group col-md-6">
                    <select id="gender" class="form-control" name="gender" required>
                        <option value="" selected>-- Select Gender --</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" id="btn-submit" class="ml-auto mt-3 btn btn-primary" style="display: none;">Create</button>
</form>

<script>
var currentPage = 1;
var totalPages = 2;

$('#nextPage').prop('disabled', true); // Nonaktifkan tombol
$(document).ready(function() {
    function checkFormInputs() {
        let isValid = true;
        // Hanya periksa input di dalam .instansi-form
        $('.instansi-form input, .instansi-form select').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('input-error'); // Tambahkan kelas error pada input yang kosong
                if ($(this).next('.error-message').length === 0) {
                    $(this).after(
                        '<span class="error-message">This field is required.</span>'
                    ); // Tambahkan pesan error jika belum ada
                }
            } else {
                $(this).removeClass('input-error'); // Hapus kelas error jika input sudah diisi
                $(this).next('.error-message').remove(); // Hapus pesan error jika input sudah diisi
            }
        });

        if (!isValid) {
            $('#nextPage').prop('disabled', true); // Nonaktifkan tombol
        } else {
            $('#nextPage').prop('disabled', false); // Aktifkan tombol jika semua input terisi
        }
    }

    // Periksa input setiap kali ada perubahan
    $('.instansi-form input, .instansi-form select').on('input change', function() {
        checkFormInputs();
    });

    function showPage(pageNumber) {
        $('.pic-form').hide();
        $('#btn-submit').hide();

        if (pageNumber === 1) {
            $('#btn-submit').hide();
            $('.pic-form').hide();
            $('#nextPage').show();
            $('.instansi-form').show();
            checkFormInputs(); 
        } else if (pageNumber === 2) {
            $('.pic-form').show();
            $('.instansi-form').hide();
            $('#btn-submit').show();
            $('#nextPage').hide();
        }
    }

    $('#nextPage').click(function() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    $('#prevPage').click(function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    // Select2 handling
    var instansiSelect = $('#instansi-select');
    instansiSelect.select2({ allowClear: true });

    instansiSelect.on('select2:select', function(e) {
        $(this).trigger('change');

        var selectedOption = $('#instansi-select').find(':selected');

        // Ambil data tambahan dari <option> yang dipilih
        var alamat = selectedOption.data('alamat');
        var jenis = selectedOption.data('jenis');
        var type = selectedOption.data('type');
        var provinsi = selectedOption.data('provinsi');

        // Isi field sesuai dengan data yang dipilih
        $('.alamat-auto-form').val(alamat).trigger('change');
        $('#jenis').val(jenis).trigger('change');
        $('#type').val(type).trigger('change');
        $('#provinsi').val(provinsi).trigger('change');

        // Validasi ulang setelah pengisian otomatis
        checkFormInputs();
    });

    // Event listener untuk menghapus isi saat unselect
    instansiSelect.on('select2:unselect', function() {
        $('.alamat-auto-form').val('').trigger('change'); // Kosongkan alamat
        $('#jenis').val('').trigger('change'); // Kosongkan jenis
        $('#type').val('').trigger('change'); // Kosongkan type
        $('#provinsi').val('').trigger('change'); // Kosongkan provinsi
        checkFormInputs(); // Validasi ulang
    });

    // Password toggle handling
    const togglePassword = document.getElementById('togglePassword');
    togglePassword.addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

    // Username normalization
    document.getElementById('username').addEventListener('input', function() {
        var usernameInput = this.value.toLowerCase().replace(/\s/g, '');
        this.value = usernameInput;
    });
});
</script>

@endsection