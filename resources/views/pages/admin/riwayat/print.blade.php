<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Detail Pengajuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1, .header h2, .header p {
            margin: 0;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            margin-bottom: 10px;
        }
        .section p {
            margin: 5px 0;
        }
        .footer {
            margin-top: 100px;
        }
        .footer .left, .footer .right {
            width: 45%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }
        .footer .left {
            float: left;
        }
        .footer .right {
            float: right;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
        }
        .header img {
            float: left;
            margin-left: 20px;
            max-width: 90px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/images/kab-mjk.png" alt="Logo">
            <h1>PEMERINTAH KOTA MOJOKERTO</h1>
            <h2>DINAS KOMUNIKASI DAN INFORMATIKA</h2>
            <p>Jl. Kyai H. Hasyim Ashari Nomor 12, Jawa Timur. Telp. (0321) 391268</p>
            <p>E-mail: diskominfo@mojokertokab.go.id</p>
            <p>Kode Pos 61318</p>
            <hr>
            <h2>PEMOHONAN PENGAJUAN APLIKASI</h2>
            <p>Nomor:</p>
        </div>

        <div class="opening">
            <p>Pengajuan aplikasi berikut telah selesai diproses. Berikut adalah detail dari pengajuan aplikasi yang telah diajukan oleh pengguna:</p>
        </div>

        <div class="section">
            <h2>Informasi Pengguna</h2>
            <p><strong>Nama:</strong> {{ $pengajuan->user->name }}</p>
            <p><strong>Nama OPD:</strong> {{ $pengajuan->user->name_opd }}</p>
            <p><strong>Telepon:</strong> {{ $pengajuan->user->phone }}</p>
            <p><strong>Email:</strong> {{ $pengajuan->user->email }}</p>
            <p><strong>Alamat:</strong> {{ $pengajuan->user->alamat }}</p>
        </div>

        <div class="section">
            <h2>Informasi Aplikasi</h2>
            <p><strong>Nama Aplikasi:</strong> {{ $pengajuan->nama_aplikasi }}</p>
            <p><strong>Jenis Pengguna:</strong> {{ $pengajuan->jenis_pengguna }}</p>
            <p><strong>Fitur-fitur:</strong> {{ $pengajuan->fitur_fitur }}</p>
            <p><strong>Status:</strong> {{ $pengajuan->status }}</p>
        </div>

        <div class="section">
            <p>Demikian Surat Pengajuan Aplikasi ini dibuat, untuk langkah selanjutnya bisa segera melakukan konfirmasi kepada dinas terkait.</p>
            <br>
            <p>Mojokerto, {{ $pengajuan->created_at->format('d-m-Y') }}</p>
        </div>

        <div class="footer">
            <div class="left">
                <p>Penanggung Jawab</p>
                <br>
                <br>
                <br>
                <br>
                <p><strong>Nama</strong></p>
            </div>
            <div class="right">
                <p>Mengetahui</p>
                <br>
                <br>
                <br>
                <br>
                <p><strong>Nama</strong></p>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>