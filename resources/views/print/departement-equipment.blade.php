<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Peralatan</title>
    <style>
    /* CSS untuk menambahkan garis pada tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #dee2e6;
        /* Warna garis */
    }

    th,
    td {
        border: 1px solid #dee2e6;
        padding: 8px;
        text-align: left;
    }

    th.rounded-left {
        border-top-left-radius: 8px;
    }

    th.rounded-right {
        border-top-right-radius: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    body {
        padding: 0 !important;
        margin: 0 !important;
        font-family: Arial, sans-serif;
    }
    </style>
</head>

<body>
    <h1 class="mb-4">Daftar Peralatan</h1>
    <table>
        <thead>
            <tr>
                <th class="rounded-left">Nama Instansi</th>
                <th>Produk</th>
                <th>Kategori</th>
                <th>Merek</th>
                <th>Serial Number</th>
                <th>Instalasi</th>
                <th>Kondisi</th>
                <th class="rounded-right">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipment as $index => $item)
            <tr>
                <td>{{$item->instansi->name}}</td>
                <td>{{$item->poducts->name}}</td>
                <td>{{$item->categories->name}}</td>
                <td>{{$item->brands->name}}</td>
                <td>{{$item->serial_number}}</td>
                <td>{{$item->installation}}</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuenow="{{$item->condition}}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{$item->condition}}%">
                            {{$item->condition}}%</div>
                    </div>
                </td>
                <td>{{$item->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>