@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Transaksi</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <a href="{{ route('transaksi.create') }}">
                    <button class="btn btn-primary">Tambah Data</button>
                </a>
                <a href="{{ url('print-transaksi') }}" target="_blank">
                    <button class="btn btn-primary">Cetak Data</button>
                </a>
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $dok)
                                    <tr>
                                        <td>{{ $dok->ID_TRANSAKSI }}</td>
                                        <td>{{ $dok->NAMA_OUTLET }}</td>
                                        <td>{{ $dok->ASAL }}</td>
                                        <td>{{ $dok->TUJUAN }}</td>
                                        <td>{{ $dok->NAMA_BARANG }}</td>
                                        <td>{{ $dok->NAMA_PEGAWAI }}</td>
                                        <td>{{ $dok->JUMLAH_BARANG }}</td>
                                        <td>{{ $dok->TOTAL_HARGA }}</td>
                                        <td>{{ $dok->METODE_BAYAR }}</td>
                                        <td>{{ $dok->KETERANGAN }}</td>
                                        <td>{{ $dok->TGL_TRANSAKSI }}</td>
                                        <td>
                                            <form action="{{ route('transaksi.destroy', $dok->ID_TRANSAKSI) }}"
                                                method="POST">
                                                <a href="{{ route('transaksi.edit', $dok->ID_TRANSAKSI) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <button class="btn btn-info" type="button">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $transaksi->links('vendor.pagination.bootstrap-5') !!}
                        {{-- <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul> --}}

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
