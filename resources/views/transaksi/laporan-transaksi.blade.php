<!DOCTYPE html>
<html>

<head>
    <title>Laporan supplier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 class="mb-2">Laporan supplier</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama Outlet</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Nama Barang</th>
                <th>Nama Pegawai</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Keterangan</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($transaksi as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->ID_TRANSAKSI }}</td>
                    <td>{{ $p->NAMA_OUTLET }}</td>
                    <td>{{ $p->ASAL }}</td>
                    <td>{{ $p->TUJUAN }}</td>
                    <td>{{ $p->NAMA_BARANG }}</td>
                    <td>{{ $p->NAMA_PEGAWAI }}</td>
                    <td>{{ $p->JUMLAH_BARANG }}</td>
                    <td>{{ $p->TOTAL_HARGA }}</td>
                    <td>{{ $p->METODE_BAYAR }}</td>
                    <td>{{ $p->KETERANGAN }}</td>
                    <td>{{ $p->TGL_TRANSAKSI }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
