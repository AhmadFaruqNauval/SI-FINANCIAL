<!DOCTYPE html>
<html>

<head>
    <title>Laporan Barang</title>
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
        <h5 class="mb-2">Laporan Barang</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Gudang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($barang as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->ID_BARANG }}</td>
                    <td>{{ $p->NAMA }}</td>
                    <td>{{ $p->NAMA_KATAGORI }}</td>
                    <td>{{ $p->NAMA_GUDANG }}</td>
                    <td>{{ $p->STOK }}</td>
                    <td>{{ $p->HARGA }}</td>
                    <td>{{ $p->TGL_MASUK }}</td>
                    <td>{{ $p->TGL_KELUAR }}</td>
                    <td>{{ $p->Status }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
