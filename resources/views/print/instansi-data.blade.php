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
        padding-top: 100px;
    }

    header {
        position: fixed;
        top: -80px;
        /* sesuai margin top */
        left: -30px;
        right: -30px;
        background-color: #1C1F21;
        color: white;
    }

    footer {
        position: fixed;
        bottom: -30px;
        /* sesuai margin bottom */
        left: 0;
        right: 0;
        height: 20px;
        text-align: center;
        font-size: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    th,
    td {
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
    </style>
</head>

<body>
    <header>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width:40%; text-align:left; border:0;">
                    <h2 style="margin:0; padding:0;">Rumah Sakit Yang Terdaftar</h2>
                </td>
                <td style="width:60%; text-align:right; border:0;">
                    <img src="{{ public_path('images/icon-web-jadibener.png') }}" height="50" alt="Logo">
                </td>
            </tr>
        </table>
    </header>

    <footer>
        Data resmi diambil dari <strong>www.jadibener.com</strong>
    </footer>

    <main>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Instansi</th>
                    <th>Provinsi</th>
                    <th>Alamat</th>
                    <th>Tipe</th>
                    <th>Jenis</th>
                    <th>Nama PIC</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instansi as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td>{{ $item->provinsi ?? '-' }}</td>
                    <td>{{ $item->address ?? '-'}}</td>
                    <td>{{ $item->type ?? '-' }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>
                        @php
                        $pic = \App\User::where('id_instansi', $item->id)->pluck('name')->implode(', ');
                        @endphp
                        {{ $pic ?: '-' }}
                    </td>
                </tr>`
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>