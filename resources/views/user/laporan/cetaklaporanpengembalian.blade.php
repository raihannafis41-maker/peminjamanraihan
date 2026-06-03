{{-- resources/views/user/laporan/cetaklaporanpengembalian.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Pengembalian</title>

    <style>
        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
            padding:8px;
        }

        .no-print{
            margin-bottom: 15px;
        }

        @media print{
            .no-print{
                display:none;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="no-print">
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
            ← Kembali ke Laporan
        </a>
    </div>

    <h2>Laporan Pengembalian</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Keterlambatan</th>
                <th>Denda</th>
                <th>Kondisi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->peminjaman_id }}</td>
                <td>{{ $item->tanggal_pengembalian }}</td>
                <td>{{ $item->keterlambatan }}</td>
                <td>Rp {{ number_format($item->denda) }}</td>
                <td>{{ $item->kondisi_kembali }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>