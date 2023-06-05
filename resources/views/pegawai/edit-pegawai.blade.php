@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pegawai</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                            <form action="{{ route('pegawai.update', $pegawai->ID_PEGAWAI)  }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Pegawai</label>
                                        <input type="text" name="id_pegawai" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter ID"value='{{$pegawai->ID_PEGAWAI}}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Pengguna</label>
                                        <select class="form-control" name="id_pengguna" id="">
                                            @foreach ($pengguna as $p)
                                                <option value="{{ $p->ID_PENGGUNA }}">{{ $p->NAMA }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            placeholder="Enter Nama"value='{{$pegawai->NAMA}}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            id="username" placeholder="Enter Username"value='{{$pegawai->USERNAME}}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter Password"value='{{$pegawai->PASSWORD}}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control"
                                            id="alamat" placeholder="Enter Alamat"value='{{$pegawai->ALAMAT}}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No HP</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp"
                                            placeholder="Enter No HP"value='{{$pegawai->NO_HP}}'>
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
