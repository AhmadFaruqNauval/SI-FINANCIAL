@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Katagori Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Katagori Barang</li>
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
                            <form action="{{ route('katagori-barang.update',$katagori_barang ->ID_KATAGORI_BARANG) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Katagori Barang</label>
                                        <input type="text" name="id_katagori_barang" value="{{$katagori_barang->ID_KATAGORI_BARANG}}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" id="nama" value ="{{$katagori_barang->NAMA}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                        <textarea class="form-control" type="text" name="deskripsi" id="deskripsi">{{$katagori_barang->DESKRIPSI}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_buat" class="form-control-label">Tanggal Buat</label>
                                        <input class="form-control" type="date" name="tgl_buat" id="tgl_buat"value="{{$katagori_barang->TGL_BUAT}}">
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
