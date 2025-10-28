<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Data Equipment</title>
    <style>
        /* Pengaturan halaman PDF */
        @page {
            margin: 80px 30px 50px 30px; /* top, right, bottom, left */
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            padding-top: 80px;
        }

        header {
            position: fixed;
            top: -80px; /* sesuai margin top di @page */
            left: 0;
            right: 0;
            height: 60px;
            background-color: #1C1F21;
            color: white;
            padding: 10px 20px;
        }

        footer {
            position: fixed;
            bottom: -40px; /* sesuai margin bottom di @page */
            left: 0;
            right: 0;
            height: 30px;
            text-align: center;
            font-size: 10px;
            color: #555;
        }

        main {
            margin-top: 10px;
        }

        p {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
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

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <header>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width:70%; text-align:left; border:0;">
                    <h2 style="margin:0; padding:0;">Daftar Peralatan Yang Terdaftar</h2>
                </td>
                <td style="width:30%; text-align:right; border:0;">
                    <img src="{{ public_path('images/icon-web-jadibener.png') }}" height="40" alt="Logo">
                </td>
            </tr>
        </table>
    </header>

    <!-- FOOTER -->
    <footer>
        Data resmi diambil dari <strong>www.jadibener.com</strong>
    </footer>

    <!-- MAIN CONTENT -->
    <main>
        <p><strong>Jumlah Peralatan :</strong> {{ $equipment->count() }}</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Instalasi</th>
                    <th>Nama Produk</th>
                    <th>Kondisi</th>
                    <th>Masa Garansi</th>
                    <th>Lokasi Instalasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipment as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->installation ?? '-' }}</td>
                    <td>
                        {{ $item->poducts->name ?? '-' }} ({{ $item->brands->name ?? '-' }})<br>
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
                    <td>{{ $item->instansi->name ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>