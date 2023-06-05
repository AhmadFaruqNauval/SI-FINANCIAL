@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Mutasi Stok</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Mutasi Stok</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <a href="{{ route('mutasi-stok.create') }}">
                    <button class="btn btn-primary">Tambah Data</button>
                </a>
                <a href="{{ url('print-mutasi') }}" target="_blank" >
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
                                    <th>ID Mutasi</th>
                                    <th>Nama Barang</th>
                                    <th>Asal</th>
                                    <th>Tujuan</th>
                                    <th>Jumlah Mutasi</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Mutasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mutasi as $dok)
                                    <tr>
                                        <td>{{ $dok->ID_MUTASI }}</td>
                                        <td>{{ $dok->NAMA_BARANG }}</td>
                                        <td>{{ $dok->ASAL }}</td>
                                        <td>{{ $dok->TUJUAN }}</td>
                                        <td>{{ $dok->JUMLAH_MUTASI }}</td>
                                        <td>{{ $dok->KETERANGAN }}</td>
                                        <td>{{ $dok->TGL_MUTASI }}</td>
                                        <td>
                                            <form action="{{ route('mutasi-stok.destroy', $dok->ID_MUTASI) }}"
                                                method="POST">
                                                <a href="{{ route('mutasi-stok.edit', $dok->ID_MUTASI) }}"
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
                        {!! $mutasi->links('vendor.pagination.bootstrap-5') !!}
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
