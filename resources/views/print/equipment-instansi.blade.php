<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Data Equipment</title>
    <style>
    @page {
        margin: 80px 30px 40px 30px;
        /* top, right, bottom, left */
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        padding-top: 10px;
    }

    header {
        position: fixed;
        top: -80px;
        left: -30px;
        right: -30px;
        background-color: #1C1F21;
        color: white;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h2 {
        font-size: 18px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        page-break-inside: auto;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 6px;
        text-align: left;
        vertical-align: top;
    }

    th {
        background-color: #1C1F21;
        color: #ffffff;
    }

    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }

    section {
        padding: 10px;
    }

    footer {
        position: fixed;
        bottom: -30px;
        left: 0;
        right: 0;
        height: 20px;
        text-align: center;
        font-size: 10px;
        color: #777;
    }
    </style>
</head>

<body>
    <!-- HEADER -->
    <header>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width:70%; text-align:left; border:0;">
                    <h2 style="margin:0; padding:0;">List Peralatan Rumah Sakit</h2>
                </td>
                <td style="width:30%; text-align:right; border:0;">
                    <img src="{{ public_path('images/icon-web-jadibener.png') }}" height="40" alt="Logo">
                </td>
            </tr>
        </table>
    </header>

    <!-- MAIN CONTENT -->
    <section>
        <p><strong>Nama Instansi:</strong> {{ $equipment->first()->instansi->name }}</p>
        <p><strong>Jumlah Peralatan:</strong> {{ $equipment->count() }}</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Instalasi</th>
                    <th>Nama Produk</th>
                    <th>Kondisi</th>
                    <th>Masa Garansi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipment as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->installation ?? '-' }}</td>
                    <td>
                        {{ $item->poducts->name ?? '-' }} ({{ $item->brands->name ?? '-' }}) <br>
                        <em>{{ $item->serial_number ?? '-' }}</em>
                    </td>
                    <td>{{ $item->description ?? '-' }}</td>
                    <td>
                        {{ $item->warranty }}
                        @if($item->warranty_state == 'true')
                        (Masih Berlaku)
                        @else
                        (Tidak Berlaku)
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- FOOTER -->
    <footer>
        Laporan Data Equipment — {{ date('d/m/Y') }}
    </footer>

</body>

</html>