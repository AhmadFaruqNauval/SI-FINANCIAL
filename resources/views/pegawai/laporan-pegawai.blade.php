<!DOCTYPE html>
<html>

<head>
    <title>Laporan pengiriman</title>
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
                <th>ID Pegawai</th>
                <th>ID Pengguna</th>
                <th>Tingkatan</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Alamat</th>
                <th>No HP</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pegawai as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->ID_PEGAWAI }}</td>
                    <td>{{ $p->ID_PENGGUNA }}</td>
                    <td>{{ $p->NAMA }}</td>
                    <td>{{ $p->USERNAME }}</td>
                    <td>{{ $p->PASSWORD }}</td>
                    <td>{{ $p->ALAMAT }}</td>
                    <td>{{ $p->NO_HP }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
