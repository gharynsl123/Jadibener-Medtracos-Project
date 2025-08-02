<section class="container py-5">
    <div>
        <div class="row g-4 d-flex align-items-stretch">
            <!-- Kiri: Info Kontak -->
            <div class="col-lg-4">
                <div class="bg-light rounded-4 p-4 shadow-sm h-100 d-flex flex-column  justify-content-between"
                    style="min-height: 450px;">
                    <div>
                        <button class="btn btn-success mb-3">Contact Us</button>
                        <p class="text-success mb-4 manrope-bold" style="font-size: 30px;">
                            Need More Information? Get in Touch
                        </p>
                        <div class="mb-4">
                            <i class="bi bi-telephone-fill  text-success me-2"></i>
                            <strong class="manrope-bold text-success" style="font-size: 23px; ">Phone Number</strong>
                            <p class="mb-0 text-muted" style="font-size: 20px; ">0812-3456-7890</p>
                        </div>
                        <div>
                            <i class="bi bi-geo-alt-fill text-success me-2"></i>
                            <strong class="manrope-bold text-success" style="font-size: 23px;">Location</strong>
                            <p class="mb-0 text-muted" style="font-size: 20px; ">Jakarta - Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kanan: Formulir -->
            <div class="col-lg-8">
                <div class="bg-light rounded-4 p-4 shadow-sm h-100 d-flex flex-column">
                    <p class="text-success mb-4 manrope-semibold" style="font-size: 32px;">
                        Ajukan Permintaan Service
                    </p>
                    <form action="{{ url('/store-request-service') }}" method="POST"
                        class="flex-grow-1 d-flex flex-column">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="phone_number" placeholder="Nomor Telepon"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tools_type" placeholder="Jenis Peralatan">
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="address" rows="2" placeholder="Alamat Lengkap"
                                    required></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="issue" rows="2"
                                    placeholder="Deskripsi Masalah"></textarea>
                            </div>
                        </div>

                        <div class="mt-4">
                            {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                        </div>

                        <div class="mt-auto pt-4 text-end">
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

</section>