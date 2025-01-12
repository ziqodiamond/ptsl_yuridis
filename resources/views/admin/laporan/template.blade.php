<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berkas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
        }

        .title {
            margin-bottom: 5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ $logo }}" alt="Logo">
        <h1 class="title">Laporan Berkas</h1>
        <p>Periode: {{ $bulan }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nomor Berkas</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Nomor Hak</th>
                <th>Luas Tanah</th>
                <th>Tanggal Pengajuan</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berkas as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->nomer_hak }}</td>
                    <td>{{ $item->luas_tanah }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d/m/Y') }}</td>
                    <td>{{ $item->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
