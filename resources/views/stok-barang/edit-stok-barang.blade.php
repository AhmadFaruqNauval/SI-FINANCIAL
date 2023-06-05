@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Stok Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Stok Barang</li>
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
                            <form action="{{ route('stok-barang.update', $stok_barang->ID_STOK_BARANG) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Stok Barang</label>
                                        <input type="text" name="id_stok_barang" value="{{ $stok_barang->ID_STOK_BARANG }}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_stok" class="form-control-label">Jumlah Stok</label>
                                        <input class="form-control" type="number" value="{{ $stok_barang->JUMLAH_STOK }}" name="jumlah_stok" id="jumlah_stok">
                                    </div>
                                    <div class="form-group">
                                        <label for="satuan" class="form-control-label">Satuan</label>
                                        <input class="form-control" type="text" name="satuan" value="{{ $stok_barang->SATUAN }}" id="satuan">
                                    </div>
                                    <div class="form-group">
                                        <label for="supplier" class="form-control-label">Supplier</label>
                                        <input class="form-control" type="text" name="supplier" value="{{ $stok_barang->SUPPLIER }}" id="supplier">
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
