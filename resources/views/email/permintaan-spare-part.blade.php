<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Spare Part</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <div style="margin: 0 auto; max-width: 750px; padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
            <div style="margin-right: 20px;">
                <p>Subject Masalah:</p>
                <h3 style="margin: 0 0 10px 0;">{{ $data['title'] }}</h3>
                <p>Kondisi:</p>
                <h3 style="margin: 0 0 10px 0;">{{ $data['layanan'] }}</h3>
            </div>
            <div>
                <p>Tanggal Request:</p>
                <h3 style="margin: 0 0 10px 0;">{{ $data['tanggal'] }}</h3>
                <p>Di Request Oleh:</p>
                <h3 style="margin: 0 0 10px 0;">{{ $data['request'] }}</h3>
            </div>
        </div>

        <div
            style="padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; text-align: center;">
            <p style="font-weight: bold; font-size: 1.2em;"> {{ $data['message'] }}.</p>
            <p style="font-weight: bold;">Klik tombol di bawah ini untuk menindaklanjuti pernyataan di atas</p>
            <a href="{{ route('home') }}"
                style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #28a745; border-radius: 50px; text-decoration: none;">Go
                to website</a>
        </div>
    </div>
</body>

</html>