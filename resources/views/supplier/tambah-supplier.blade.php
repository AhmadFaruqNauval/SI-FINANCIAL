@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Supplier</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Supplier</li>
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
                            <form action="{{ route('supplier.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Supplier</label>
                                        <input type="text" name="id_supplier" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_barang" class="form-control-label">Nama Barang</label>
                                        <select class="form-control" name="id_barang" id="id_barang" required>
                                            @foreach ($barang as $b)
                                                <option value="{{ $b->ID_BARANG }}">
                                                    {{ $b->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama Supplier</label>
                                        <input class="form-control" type="text" name="nama" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat</label>
                                        <input class="form-control" type="text" name="alamat" id="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp" class="form-control-label">Nomor Telp</label>
                                        <input class="form-control" type="text" name="no_telp" id="no_telp">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_barang" class="form-control-label">Jumlah Barang</label>
                                        <input class="form-control" type="number" name="jumlah_barang" id="jumlah_barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_supply" class="form-control-label">Harga Supply</label>
                                        <input class="form-control" type="number" name="harga_supply" id="harga_supply">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_supply" class="form-control-label">Tanggal Supply</label>
                                        <input class="form-control" type="date" name="tgl_supply" id="tgl_supply">
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
