<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Buat Akun - Jadibener</title>

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<style>

.montserrat-bold {
    font-family: "Montserrat", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    font-weight: 600;
}
</style>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center overflow-hidden bg-white">
            <!-- LEFT: Image -->
            <div class="col-lg-6 d-none d-lg-block p-0">
                <img src="{{ asset('images/header-background.png') }}" alt="Request Buat Akun"
                    class="img-fluid h-100 w-100 rounded rounded-4" style="object-fit: cover;">
            </div>

            <!-- RIGHT: Request Form -->
            <div class="col-lg-6 p-5">
                <div class="mb-4">
                    <img src="{{ asset('images/mdh_logo.png') }}" alt="Logo" style="height: 50px;" class="mb-2">
                    <p class="montserrat-bold" style="color: #000000; font-size: 1.875rem;">Request Buat Akun</p>
                </div>

                <form method="POST" action="{{ url('/store-request-member') }}">
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan Namamu" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Emailmu" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama Instansi</label>
                            <input type="text" name="instansi" class="form-control" placeholder="Masukkan Nama Institusi">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Masukkan No. Telepon">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="address" class="form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100 mt-2 mb-3">Request</button>
                    <a href="{{url('/')}}" class="btn btn-outline-secondary w-100 mb-2">
                        Batal
                    </a>
                    <p class="text-center small mt-4">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-success">Login disini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
