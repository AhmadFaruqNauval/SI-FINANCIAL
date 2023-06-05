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
                <th>ID Supplier</th>
                <th>Nama Barang</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Supply</th>
                <th>Harga Supply</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($supplier as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->ID_SUPPLIER }}</td>
                    <td>{{ $p->NAMA_BARANG }}</td>
                    <td>{{ $p->NAMA }}</td>
                    <td>{{ $p->ALAMAT }}</td>
                    <td>{{ $p->NO_TELP }}</td>
                    <td>{{ $p->JUMLAH_BARANG }}</td>
                    <td>{{ $p->TGL_SUPPLY }}</td>
                    <td>{{ $p->HARGA_SUPPLY }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
