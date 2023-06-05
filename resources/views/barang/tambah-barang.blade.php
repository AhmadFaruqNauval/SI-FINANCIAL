@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Barang</li>
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
                            <form action="{{ route('barang.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="id_katagori_barang" class="form-control-label">Kategori Barang</label>
                                        <select class="form-control" name="id_katagori_barang" id="id_katagori_barang"
                                            required>
                                            @foreach ($katagori as $k)
                                                <option value="{{ $k->ID_KATAGORI_BARANG }}">
                                                    {{ $k->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_gudang" class="form-control-label">Gudang</label>
                                        <select class="form-control" name="id_gudang" id="id_gudang" required>
                                            @foreach ($gudang as $g)
                                                <option value="{{ $g->ID_GUDANG }}">
                                                    {{ $g->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_stok_barang" class="form-control-label">Stok Barang</label>
                                        <select class="form-control" name="id_stok_barang" id="id_stok_barang" required>
                                            @foreach ($stok as $g)
                                                <option value="{{ $g->ID_STOK_BARANG }}">
                                                    {{ $g->JUMLAH_STOK }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Harga</label>
                                        <input class="form-control" type="number" name="harga" id="harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                        <textarea class="form-control" type="text" name="deskripsi" id="deskripsi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_masuk" class="form-control-label">Tanggal Barang Masuk</label>
                                        <input class="form-control" type="date" name="tgl_masuk" id="tgl_masuk">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_keluar" class="form-control-label">Tanggal Barang Keluar</label>
                                        <input class="form-control" type="date" name="tgl_keluar" id="tgl_keluar">
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-control-label">Status</label>
                                        <input class="form-control" type="text" name="status" id="status">
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
