@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Gudang</h1>
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
                            <form action="{{ route('gudang.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Gudang</label>
                                        <input type="text" name="id_gudang" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                        <textarea class="form-control" type="text" name="deskripsi" id="deskripsi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat</label>
                                        <input class="form-control" type="text" name="alamat" id="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="kapasitas" class="form-control-label">Kapasitas</label>
                                        <input class="form-control" type="number" name="kapasitas" id="kapasitas">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_barang_masuk" class="form-control-label">Tanggal Barang
                                            Masuk</label>
                                        <input class="form-control" type="date" name="tgl_barang_masuk"
                                            id="tgl_barang_masuk">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_barang_keluar" class="form-control-label">Tanggal Barang
                                            Keluar</label>
                                        <input class="form-control" type="date" name="tgl_barang_keluar"
                                            id="tgl_barang_keluar">
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
