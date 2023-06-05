<!DOCTYPE html>
<html>

<head>
    <title>Laporan Katagori Barang</title>
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
        <h5 class="mb-2">Laporan Katagori Barang</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>NAMA</th>
                <th>DESKRIPSI</th>
                <th>TGL_BUAT</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($katagori_barang as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->NAMA }}</td>
                    <td>{{ $p->DESKRIPSI }}</td>
                    <td>{{ $p->TGL_BUAT }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
