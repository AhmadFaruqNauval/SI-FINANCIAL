@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Outlet</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Outlet</li>
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
                            <form action="{{ route('outlet.update',$outlet ->ID_OUTLET) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Outlet</label>
                                        <input type="text" name="id_outlet" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter ID" value="{{$outlet->ID_OUTLET}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" id="nama"value='{{$outlet->NAMA}}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe" class="form-control-label">Tipe</label>
                                        <input class="form-control" type="text" name="tipe" id="tipe"value='{{$outlet->TIPE}}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                        <textarea class="form-control" type="text" name="deskripsi" id="deskripsi">{{$outlet->DESKRIPSI}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">No Telp</label>
                                        <input type="text" name="no_telp" class="form-control" id="no_telp"
                                            placeholder=""value='{{$outlet->NO_TELP}}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat</label>
                                        <input class="form-control" type="text" name="alamat" id="alamat"value='{{$outlet->ALAMAT}}'>
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
