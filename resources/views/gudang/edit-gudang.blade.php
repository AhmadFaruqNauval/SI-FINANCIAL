@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Gudang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gudang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="{{ route('gudang.update', $gudang->ID_GUDANG) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama"
                                            id="nama"value='{{ $gudang->NAMA }}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                        <textarea class="form-control" type="text" name="deskripsi" id="deskripsi">{{ $gudang->DESKRIPSI }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat</label>
                                        <input class="form-control" type="text" name="alamat"
                                            id="alamat"value='{{ $gudang->ALAMAT }}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="kapasitas" class="form-control-label">Kapasitas</label>
                                        <input class="form-control" type="number" name="kapasitas"
                                            id="kapasitas"value='{{ $gudang->KAPASITAS }}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_barang_masuk" class="form-control-label">Tanggal Barang
                                            Masuk</label>
                                        <input class="form-control" type="date" name="tgl_barang_masuk"
                                            id="tgl_barang_masuk"value='{{ $gudang->TGL_BARANG_MASUK }}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_barang_keluar" class="form-control-label">Tanggal Barang
                                            Keluar</label>
                                        <input class="form-control" type="date" name="tgl_barang_keluar"
                                            id="tgl_barang_keluar"value='{{ $gudang->TGL_BARANG_KELUAR }}'>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
