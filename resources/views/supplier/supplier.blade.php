@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Supplier</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Supplier</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <a href="{{ route('supplier.create') }}">
                    <button class="btn btn-primary">Tambah Data</button>
                </a>
                <a href="{{ url('print-supplier') }}"target="_blank">
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
                                @foreach ($supplier as $dok)
                                    <tr>
                                        <td>{{ $dok->ID_SUPPLIER }}</td>
                                        <td>{{ $dok->NAMA_BARANG }}</td>
                                        <td>{{ $dok->NAMA }}</td>
                                        <td>{{ $dok->ALAMAT }}</td>
                                        <td>{{ $dok->NO_TELP }}</td>
                                        <td>{{ $dok->JUMLAH_BARANG }}</td>
                                        <td>{{ $dok->TGL_SUPPLY }}</td>
                                        <td>{{ $dok->HARGA_SUPPLY }}</td>
                                        <td>
                                            <form action="{{ route('supplier.destroy', $dok->ID_SUPPLIER) }}"
                                                method="POST">
                                                <a href="{{ route('supplier.edit', $dok->ID_SUPPLIER) }}"
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
                        {!! $supplier->links('vendor.pagination.bootstrap-5') !!}
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
