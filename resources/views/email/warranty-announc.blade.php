<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan Masa Garansi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #e74c3c;
        }
        p {
            font-size: 1.1em;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pemberitahuan Masa Garansi Hampir Habis</h2>
        
        <p>Halo,</p>

        <p>Kami ingin memberitahukan bahwa masa garansi untuk peralatan berikut hampir habis:</p>
        <ul>
            <li>Nama Peralatan: {{ $data['equipment_name'] }}</li>
            <li>Nomor Seri: {{ $data['serial_number'] }}</li>
            <li>Tanggal Instalasi: {{ $data['installation_date'] }}</li>
            <li>Masa Garansi Berakhir: {{ $data['warranty_end_date'] }}</li>
        </ul>

        <p>Disarankan untuk menjadwalkan pengecekan kondisi barang sebelum masa garansi berakhir. Klik tombol di bawah ini untuk melakukan penjadwalan melalui website kami:</p>
        
        <a href="{{ route('home') }}" class="button">Jadwalkan Pengecekan</a>

        <p>Terima kasih atas perhatiannya.</p>
        
        <p>Salam,</p>
        <p>Tim Support</p>
    </div>
</body>
</html>
