<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
.text-cotummen {
    font-size: 12px;
}

.width-50 {
    width: 50%;
}


body {
    padding: 0 !important;
    margin: 0 !important;
    font-family: Roboto, sans-serif;
}
</style>

<body>
    <table>
        <tr>
            <td>
                <img src="{{ asset('images/print-logo.png') }}" class="image-thumbnail" style="width: 180px;"
                    alt="Gambar">
            </td>
            <td>
                <p class="small mt-4">data di ambil dari www.jadibener.com</p>
            </td>
        </tr>
    </table>

    <hr>


    <table class="table">
        <tr>
            <td class="width-50">
                <p class="text-dark">
                    @if(Auth::user()->level == 'pic')
                    Rumah Sakit {{ $instansi->name }}
                    @else
                    List Peralatan
                    @endif
                </p>

                <p>
                    @if(Auth::user()->level == 'pic') Departement:{{$user->departement}} @endif
                </p>
            </td>
            <td class="text-end">

                <p>Tanggal Print:
                    <strong>
                        <?php echo date("l"); ?>
                    </strong><br>
                    <?php echo date("d-m-Y H:i"); ?>
                </p>
            </td>
        </tr>
    </table>

    <div class="table-resposive">
        <table class="table table-borderless">
            @foreach($peralatan as $item)
            <tbody>
                <tr>
                    <td>
                        <p class="text-dark ">
                            Nama : <strong> {{ $item->poducts->name }} </strong> <br>
                            <span class="text-cotummen">Serial Number: <strong>{{ $item->serial_number }} </strong><br>
                                @if(Auth::user()->level != 'pic')
                                Instansi: <strong>{{ $item->instansi->name }}</strong><br>
                                @endif
                                Kategori: <strong>{{ $item->categories->name }}</strong><br>
                                Kondisi Barang: <strong>
                                    {{ max(0, round(100 - ((date('Y') - $item->installation) / $item->age * 100))) }}%</strong><br>
                                request user barang: <strong>{{ $item->age }}</strong><br>
                                Keterangan barang: <strong> {{ $item->description }}</strong><br>
                                Instalasi: <strong>{{ $item->installation }}</strong></span>
                        </p>
                    </td>

                    @if($item->poducts->photo === null)
                    <p>Tidak ada gambar untuk produk ini</p>
                    @else
                    <img src="{{asset('storage/product_images/' .$item->poducts->photo)}}" alt="" srcset="">

                    @endif
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>