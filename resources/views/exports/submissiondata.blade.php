<style>
* {
    font-size: 15px;
    font-family: 'Calibri';
}

thead>tr {
    background-color: #FFFF00;
}

thead>tr>th {
    padding: 1rem;
    font-size: 15px;
}

tbody>tr>td {
    font-size: 15px;
}
</style>
<table>
    <thead>
        <tr>
            <th>Tanggal Pengerjaan</th>
            <th>Instansi</th>
            <th>Serial Number</th>
            <th>Nama Product</th>
            <th>Nama Pelapor</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($submission as $items)
        <tr>
            <td>{{ $items->created_at ? \Carbon\Carbon::parse($items->created_at)->format('d-m-Y') : '' }}</td>
            <td>{{ $items->equipments->instansi->name }}</td>
            <td>{{ $items->equipments->serial_number }}</td>
            <td>{{ $items->equipments->poducts->name }}</td>
            <td>{{ $items->user->name }}</td>
            <td>{{ $items->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>