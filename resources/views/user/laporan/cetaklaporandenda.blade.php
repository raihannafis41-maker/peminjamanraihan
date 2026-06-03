{{-- resources/views/user/laporan/cetaklaporandenda.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Denda</title>

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

    <h2>Laporan Denda</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Denda</th>
                <th>Nominal</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_denda }}</td>
                <td>Rp {{ number_format($item->nominal) }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>