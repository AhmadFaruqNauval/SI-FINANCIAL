@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Mutasi Stok</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Mutasi Stok</li>
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
                            <form action="{{ route('mutasi-stok.update', $mutasi_stok->ID_MUTASI) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id_pengiriman" value="{{ $mutasi_stok->ID_PENGIRIMAN }}">
                                <div class="card-body">

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
                                        <label for="asal">Asal</label>
                                        <input type="text" name="asal" class="form-control" id="asal"
                                            placeholder=""value="{{ $pengiriman->ASAL }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan">Tujuan</label>
                                        <input type="text" name="tujuan" class="form-control" id="tujuan"
                                            placeholder=""value="{{ $pengiriman->TUJUAN }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ongkos_kirim" class="form-control-label">Ongkos Kirim</label>
                                        <input class="form-control" type="number" name="ongkos_kirim"
                                            id="ongkos_kirim"value="{{ $pengiriman->ONGKOS_KIRIM }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="metode_pengiriman" class="form-control-label">Metode Pengiriman</label>
                                        <input class="form-control" type="text" name="metode_pengiriman"
                                            value="{{ $pengiriman->METODE_PENGIRIMAN }}" id="metode_pengiriman">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_mutasi" class="form-control-label">Jumlah Mutasi</label>
                                        <input class="form-control" type="number" name="jumlah_mutasi"
                                            id="jumlah_mutasi"value="{{ $mutasi_stok->JUMLAH_MUTASI }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                        <textarea class="form-control" type="text" name="keterangan" id="keterangan">{{ $mutasi_stok->KETERANGAN }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_mutasi" class="form-control-label">Tanggal Mutasi</label>
                                        <input class="form-control" type="date" name="tgl_mutasi"
                                            id="tgl_mutasi"value="{{ $mutasi_stok->TGL_MUTASI }}">
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
