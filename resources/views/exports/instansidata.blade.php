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
            <th>Nama Rumah Sakit</th>
            <th>Provinsi</th>
            <th>Alamat</th>
            <th>Type</th>
            <th>Jenis Instansi</th>
            <th>Nama PIC</th>
        </tr>
    </thead>
    <tbody>
        @foreach($instansi as $items)
        <tr>
            <td>{{ $items->name }}</td>
            <td>{{ $items->provinsi }}</td>
            <td>{{ $items->address }}</td>
            <td>{{ $items->type }}</td>
            <td>{{ $items->jenis }}</td>
            @php
            $pic = \App\User::where('id_instansi', $items->id)->pluck('name')->implode(', ');
            @endphp
            <td>
                {{ $pic ?: '-' }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>