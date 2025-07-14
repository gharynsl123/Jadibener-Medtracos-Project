<style>
    * {
        font-size: 15px;
        font-family: 'Calibri';
    }

    thead > tr {
        background-color: #FFFF00;
    }

    thead > tr > th {
        padding: 1rem;
        font-size: 15px;
    }

    tbody > tr > td {
        font-size: 15px;
    }
</style>
<table>
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Nomor Seri</th>
            <th>Tahun Instalasi</th>
            <th>Kondisi</th>
            <th>Usia Barang</th>
            <th>Status Garansi</th>
            <th>Departement</th>
            <th>Keadaan Barang</th>
            <th>Pemilik Barang</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipment as $items)
        <tr>
            <td>{{ $items->poducts->name ?? '-' }} ({{$item->brands->name ?? '-'}})</td>
            <td>{{ $items->serial_number ?? '-' }}</td>
            <td>{{ $items->installation ?? '-' }}</td>
            <td>{{ $items->condition ?? '-' }}</td>
            <td>{{ $items->age ?? '-' }}</td>
            @if($items->warranty_state == 'true')
            <td>Masih Bergaransi</td>
            @else
            <td>Garansi Tidak Berlaku</td>
            @endif
            <td>{{ $items->departement ?? '-' }}</td>
            <td>{{ $items->description ?? '-' }}</td>
            <td>{{ $items->instansi->name ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
