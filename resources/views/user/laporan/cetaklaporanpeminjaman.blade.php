{{-- resources/views/user/laporan/cetaklaporanpeminjaman.blade.php --}}

<!DOCTYPE html>
<html>
<head>

    <title>Cetak Laporan Peminjaman</title>

    <style>

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
            padding:8px;
        }

    </style>

</head>

<body onload="window.print()">

    <h2>Laporan Peminjaman</h2>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>User</th>
                <th>Alat</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>

        </thead>

        <tbody>

            @foreach($data as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->nama ?? '-' }}</td>
                <td>{{ $item->alat->nama_alat ?? '-' }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ $item->status }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>