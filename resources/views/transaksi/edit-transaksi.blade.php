@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Transaksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
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
                            <form action="{{ route('transaksi.update', $transaksi->ID_TRANSAKSI) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="asal" class="form-control-label">ID Pengiriman</label>
                                            <input class="form-control" type="text" value="{{ $transaksi->ID_PENGIRIMAN }}" readonly name="id_pengiriman"
                                                id="id_pengiriman">
                                        </div>
                                        <label for="id_outlet" class="form-control-label">Nama Outlet</label>
                                        <select class="form-control" id="id_outlet" name="id_outlet">
                                            @foreach ($outlet as $o)
                                                <option value="{{ $o->ID_OUTLET }}">
                                                    {{ $o->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="asal" class="form-control-label">Asal</label>
                                        <input class="form-control" type="text" value="{{ $pengiriman->ASAL }}" name="asal" id="asal">
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan" class="form-control-label">Tujuan</label>
                                        <input class="form-control" type="text" value="{{ $pengiriman->TUJUAN }}" name="tujuan" id="tujuan">
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
                                        <label for="id_pegawai" class="form-control-label">Nama Pegawai</label>
                                        <select class="form-control" name="id_pegawai" id="id_pegawai" required>
                                            @foreach ($pegawai as $k)
                                                <option value="{{ $k->ID_PEGAWAI }}">
                                                    {{ $k->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_barang" class="form-control-label">Jumlah Barang</label>
                                        <input class="form-control" type="number" value="{{ $transaksi->JUMLAH_BARANG }}" name="jumlah_barang" id="jumlah_barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="ongkos_kirim" class="form-control-label">Ongkos Kirim</label>
                                        <input class="form-control" type="number" name="ongkos_kirim" value="{{ $pengiriman->ONGKOS_KIRIM }}" id="ongkos_kirim">
                                    </div>
                                    <div class="form-group">
                                        <label for="total_harga" class="form-control-label">Total Harga</label>
                                        <input class="form-control" type="number" name="total_harga" value="{{ $transaksi->TOTAL_HARGA }}" id="total_harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="metode_bayar" class="form-control-label">Metode Pengiriman</label>
                                        <input class="form-control" type="text" value="{{ $pengiriman->METODE_PENGIRIMAN }}" name="metode_pengiriman"
                                            id="metode_pengiriman">
                                    </div>
                                    <div class="form-group">
                                        <label for="metode_bayar" class="form-control-label">Metode Bayar</label>
                                        <input class="form-control" type="text" name="metode_bayar" value="{{ $transaksi->METODE_BAYAR }}" id="metode_bayar">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                        <textarea class="form-control" type="text" name="keterangan" id="keterangan">{{ $transaksi->KETERANGAN }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_transaksi" class="form-control-label">Tanggal Transaksi</label>
                                        <input class="form-control" type="date" name="tgl_transaksi" value="{{ $transaksi->TGL_TRANSAKSI }}"
                                            id="tgl_transaksi">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_transaksi" class="form-control-label">Status</label>
                                        <input class="form-control" type="text" name="status" value="{{ $pengiriman->STATUS }}" id="status">
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
