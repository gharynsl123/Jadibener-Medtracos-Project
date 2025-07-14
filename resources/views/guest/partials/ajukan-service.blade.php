<div class="container py-5">
    <div class="row g-4 align-items-start">
        <!-- Kiri: Info Kontak -->
        <div class="col-lg-4 min-height-536">
            <div class="bg-light rounded-4 p-4 shadow-sm h-100">
                <button class="btn btn-success mb-3">Contact Us</button>
                <p class="text-success mb-3 manrope-bold" style="max-width: 300px; font-size:28px;">Need More Information? Get in Touch</p>

                <div class="mb-3">
                    <i class="bi bi-telephone-fill text-success me-2"></i>
                    <strong>Phone Number</strong>
                    <p class="mb-0 text-muted">0812-3456-7890</p>
                </div>

                <div>
                    <i class="bi bi-geo-alt-fill text-success me-2"></i>
                    <strong>Location</strong>
                    <p class="mb-0 text-muted">Jakarta - Indonesia</p>
                </div>
            </div>
        </div>

        <!-- Kanan: Formulir -->
        <div class="col-lg-8">
            <p class="text-success mb-4 manrope-semibold" style="font-size:40px;">Ajukan Permintaan Service</p>
            <div class="bg-light rounded-4 p-4 shadow-sm">

                <form action="{{ url('/store-request-service') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                        </div>

                        <div class="col-md-6">
                            <input type="tel" class="form-control" name="phone_number" placeholder="Nomor Telepon" required>
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="tools_type" placeholder="Jenis Peralatan">
                        </div>

                        <div class="col-md-6">
                            <textarea class="form-control" name="address" rows="3" placeholder="Alamat Lengkap" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <textarea class="form-control" name="issue" rows="3" placeholder="Deskripsi Masalah"></textarea>
                        </div>
                    </div>

                    <div class="mt-4">
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success px-4 py-2">
                            Kirim Permintaan Servis
                        </button>
                    </div>

                    {!! NoCaptcha::renderJs() !!}
                </form>

            </div>
        </div>
    </div>
</div>
