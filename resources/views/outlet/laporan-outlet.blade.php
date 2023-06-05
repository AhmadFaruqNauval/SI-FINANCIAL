<!DOCTYPE html>
<html>

<head>
    <title>Laporan Outlet</title>
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
        <h5 class="mb-2">Laporan Outlet</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Satuan</th>
                <th>Deskripsi</th>
                <th>Alamat</th>
                <th>Kapasitas</th>
                <th>Tgl_Barang_Masuk</th>
                <th>Tgl_Barang_Keluar</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($outlet as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->NAMA }}</td>
                    <td>{{ $p->DESKRIPSI }}</td>
                    <td>{{ $p->ALAMAT }}</td>
                    <td>{{ $p->KAPASITAS }}</td>
                    <td>{{ $p->TGL_BARANG_MASUK }}</td>
                    <td>{{ $p->TGL_BARANG_KELUAR }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
