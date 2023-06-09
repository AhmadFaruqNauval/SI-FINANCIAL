<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengiriman</title>
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
        <h5 class="mb-2">Laporan Pengiriman</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pengiriman</th>
                <th>Nama Barang</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Ongkos Kirim</th>
                <th>Metode Pengiriman</th>
                <th>Tanggal Pengiriman</th>
                <th>Tanggal Diterima</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pengiriman as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->ID_PENGIRIMAN }}</td>
                    <td>{{ $p->NAMA_BARANG }}</td>
                    <td>{{ $p->ASAL }}</td>
                    <td>{{ $p->TUJUAN }}</td>
                    <td>{{ $p->ONGKOS_KIRIM }}</td>
                    <td>{{ $p->METODE_PENGIRIMAN }}</td>
                    <td>{{ $p->TGL_PENGIRIMAN }}</td>
                    <td>{{ $p->TGL_DITERIMA }}</td>
                    <td>{{ $p->STATUS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
