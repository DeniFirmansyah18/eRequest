<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            position: relative;
        }

        .header h2,
        .header p {
            margin: 0;
        }

        .header hr {
            margin-top: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-right {
            text-align: right;

        }

        .section p {
            margin: 5px 0;
        }

        .footer {
            margin-top: 50px;
        }

        .footer .left,
        .footer .right {
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
            left: 20px;
            top: 0;
            max-width: 85px;
        }

        .item-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .item-table th,
        .item-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .item-table th {
            background-color: #f2f2f2;
        }

        .signature {
            margin-top: 10px;
        }

        .signature .sign {
            width: 30%;
            display: inline-block;
            text-align: center;
        }

        .signature .sign.left {
            float: left;
        }

        .signature .sign.right {
            float: right;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/images/kab-mjk.png" alt="Logo">
            <h2>PEMERINTAH KABUPATEN MOJOKERTO</h2>
            <h2>DINAS KOMUNIKASI DAN INFORMATIKA</h2>
            <p>Jl. Kyai H. Hasyim Ashari Nomor 12, Jawa Timur. Telp. (0321) 391268</p>
            <p>E-mail: diskominfo@mojokertokab.go.id</p>
            <p>MOJOKERTO 61318</p>
            <hr>
            <h2>BERITA ACARA PENERIMAAN SOFTWARE</h2>
        </div>

        <div class="section">
            <p>Nomor: </p>
            <br>
            <p>Pengajuan aplikasi telah selesai diproses. Berikut adalah detail dari pengajuan aplikasi yang telah diajukan oleh pengguna:</p>
            <p><strong>Nama :</strong> {{ $pengajuan->narahubung }}</p>
            <p><strong>Selaku :</strong> Narahubung</p>
        </div>

        <table class="item-table">
            <tr>
                <th>Nama Aplikasi</th>
                <th>Jenis Pengguna</th>
                <th>Fitur Aplikasi</th>
            </tr>
            <tr>
                <td> {{ $pengajuan->nama_aplikasi }}</td>
                <td> {{ $pengajuan->jenis_pengguna }}</td>
                <td> {{ $pengajuan->fitur_fitur }}</td>
            </tr>
        </table>

        <div class="section">
            <p>Demikian Surat Pengajuan Aplikasi ini dibuat, untuk langkah selanjutnya bisa segera melakukan konfirmasi kepada dinas terkait.</p>
            <br><br>
        </div>
        <div class="section-right">
            <p>Mojokerto, {{ $pengajuan->created_at->format('d-m-Y') }}</p>
        </div>

        <div class="signature">
            <div class="sign left">
                <p>Kepala Bidang Informatika</p>
                <br><br><br><br>
                <p><strong>DIDING ADI PARWOTO, S.Kom., M.Eng.</strong></p>
            </div>
            <div class="sign right">
                <p>Penanggung Jawab</p>
                <br><br><br><br>
                <p><strong>..................</strong></p>
            </div>
        </div>
    </div>
    <script>
        window.print();

    </script>
</body>
</html>
