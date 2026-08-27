<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peralatan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-title {
            padding: 6px;
            border: 1px solid #000;
            font-weight: bold;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 4px 6px;
            vertical-align: top;
        }

        .info-table td.label {
            width: 18%;
            font-weight: bold;
        }

        .info-table td.separator {
            width: 2%;
        }

        .box {
            border: 1px solid #000;
            padding: 6px;
        }

        .history-table th {
            border: 1px solid #000;
            padding: 6px;
            background: #f0f0f0;
        }

        .history-table td {
            border: 1px solid #000;
            padding: 6px;
        }

        .small {
            font-size: 11px;
        }
    </style>
</head>
<body>

    <div class="title">LAPORAN DATA PERALATAN</div>

    <!-- ================= KETERANGAN ALAT ================= -->
    <div class="section-title">KETERANGAN ALAT</div>

    <table class="info-table">
        <tr>
            <td class="label">Instansi</td>
            <td class="separator">:</td>
            <td>{{ $equipment->instansi->name }}</td>

            <td class="label">Nama Produk</td>
            <td class="separator">:</td>
            <td>{{ $equipment->poducts->name }}</td>
        </tr>
        <tr>
            <td class="label">Serial Number</td>
            <td class="separator">:</td>
            <td>{{ $equipment->serial_number }}</td>

            <td class="label">Kode Produk</td>
            <td class="separator">:</td>
            <td>{{ $equipment->poducts->code }}</td>
        </tr>
        <tr>
            <td class="label">Merek</td>
            <td class="separator">:</td>
            <td>{{ $equipment->brands->name }}</td>

            <td class="label">Tahun Instalasi</td>
            <td class="separator">:</td>
            <td>{{ $equipment->installation }}</td>
        </tr>
        <tr>
            <td class="label">Durasi Pemakaian</td>
            <td class="separator">:</td>
            <td>{{ date('Y') - $equipment->installation }} tahun</td>

            <td class="label">Status Alat</td>
            <td class="separator">:</td>
            <td>{{ $equipment->description }}</td>
        </tr>
    </table>

    <!-- ================= KONDISI ================= -->
    <div class="section-title">KONDISI PRODUK</div>

    <table class="info-table">
        <tr>
            <td class="label">Kondisi</td>
            <td class="separator">:</td>
            <td><strong>{{ $equipment->condition }}%</strong></td>
        </tr>
        <tr>
            <td class="label">Request Pergantian</td>
            <td class="separator">:</td>
            <td>{{ $equipment->age }} tahun</td>
        </tr>
        <tr>
            <td class="label">Penurunan Nilai</td>
            <td class="separator">:</td>
            <td>
                <strong>
                    {{ round(100 - ((date('Y') - $equipment->installation) / $equipment->age * 100)) }}%
                </strong>
            </td>
        </tr>
        <tr>
            <td class="label">Tanggal Pendataan</td>
            <td class="separator">:</td>
            <td>
                {{ $equipment->updated_at 
                    ? $equipment->updated_at->format('Y-m-d') 
                    : $equipment->created_at->format('Y-m-d') }}
            </td>
        </tr>
        <tr>
            <td class="label">Surveyor</td>
            <td class="separator">:</td>
            <td>{{ $equipment->users->name }}</td>
        </tr>
    </table>

    <!-- ================= SARAN ================= -->
    <div class="section-title">SARAN PERAWATAN & PERBAIKAN</div>

    <div class="box">
        {{ $equipment->suggestions ?? 'Belum ada saran.' }}
    </div>

    <!-- ================= RIWAYAT ================= -->
    <div class="section-title">RIWAYAT PERALATAN</div>

    <table class="history-table small">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Status</th>
                <th width="30%">Keterangan</th>
                <th width="15%">Tanggal</th>
                <th width="15%">ID Tiket</th>
            </tr>
        </thead>
        <tbody>
            @foreach($history as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                @if($item->submissions)
                    <td>
                        <a href="/progress/{{$item->submissions->slug}}"
                            class="btn btn-primary">{{$item->submissions->tikects_id}}</a>
                    </td>
                @elseif($item->estimation)
                    <td>
                        <a href="{{ asset('storage/biaya_estimasi_images/' . $item->estimation->photo) }}" download
                            class="btn btn-sm btn-primary">
                            <i class="fa fa-file"></i>
                        </a>
                    </td>
                    <td>-</td>
                @elseif($item->booking)
                    <td>
                        <a href="{{ url('/detail-kunjungan', $item->booking->slug) }}"
                            class="btn btn-primary">Booking-{{ $item->booking->id }}</a>
                    </td>
                @else
                    <td>-</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="position: fixed; bottom: 0; left: 0; right: 0; padding: 10px; text-align: center; font-size: 10px; background: white; width: 100%;">
        <p style="margin: 0;">Jadibener.com by <strong>PT Fokus Mandiri Alkestron</strong></p>
    </div>
</body>
</html>