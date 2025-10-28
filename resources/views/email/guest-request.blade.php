<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Form Request</title>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color:#f4f6f8; color:#333;">
    <div style="max-width:700px; margin:20px auto; background:#fff; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.08); overflow:hidden;">
        
        <!-- Header -->
        <div style="background:linear-gradient(135deg,#4facfe,#00f2fe); padding:20px; text-align:center; color:#fff;">
            <h2 style="margin:0; font-size:24px;">📩 Guest Form Request</h2>
            <p style="margin:5px 0 0; font-size:14px;">Ada request baru dari website kamu</p>
        </div>

        <!-- Body -->
        <div style="padding:25px;">
            <table style="width:100%; border-collapse:collapse;">
                <tr>
                    <td style="padding:12px; border-bottom:1px solid #eee; width:30%; font-weight:bold;">Nama</td>
                    <td style="padding:12px; border-bottom:1px solid #eee;">{{ $name }}</td>
                </tr>
                <tr>
                    <td style="padding:12px; border-bottom:1px solid #eee; font-weight:bold;">Instansi</td>
                    <td style="padding:12px; border-bottom:1px solid #eee;">{{ $instansi }}</td>
                </tr>
                <tr>
                    <td style="padding:12px; border-bottom:1px solid #eee; font-weight:bold;">Jabatan</td>
                    <td style="padding:12px; border-bottom:1px solid #eee;">{{ $jabatan }}</td>
                </tr>
                <tr>
                    <td style="padding:12px; border-bottom:1px solid #eee; font-weight:bold;">Email</td>
                    <td style="padding:12px; border-bottom:1px solid #eee; color:#007BFF;">{{ $email }}</td>
                </tr>
                <tr>
                    <td style="padding:12px; border-bottom:1px solid #eee; font-weight:bold;">No. Telepon</td>
                    <td style="padding:12px; border-bottom:1px solid #eee;">{{ $phone_number }}</td>
                </tr>
                <tr>
                    <td style="padding:12px; border-bottom:1px solid #eee; font-weight:bold;">Judul</td>
                    <td style="padding:12px; border-bottom:1px solid #eee;">{{ $title }}</td>
                </tr>
                <tr>
                    <td style="padding:12px; vertical-align:top; font-weight:bold;">Masalah/Issue</td>
                    <td style="padding:12px;">{{ $issue }}</td>
                </tr>
            </table>
        </div>

        <!-- CTA -->
        <div style="padding:25px; text-align:center; background:#f9fafb; border-top:1px solid #eee;">
            <p style="margin-bottom:15px; font-size:15px; font-weight:bold;">Klik tombol di bawah untuk menindaklanjuti request ini:</p>
            <a href="{{ route('home') }}" 
               style="display:inline-block; padding:12px 25px; background:#28a745; color:#fff; text-decoration:none; border-radius:30px; font-size:15px; font-weight:bold;">
               🔗 Buka Website
            </a>
        </div>
    </div>
</body>

</html>
