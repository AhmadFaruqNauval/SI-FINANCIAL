@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pengiriman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pengiriman</li>
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
                            <form action="{{ route('pengiriman.update', $pengiriman->ID_PENGIRIMAN) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID Pengiriman</label>
                                        <input type="text" name="id_pengiriman" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter ID"value="{{$pengiriman->ID_PENGIRIMAN}}">
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
                                        <label for="asal" class="form-control-label">Asal</label>
                                        <input class="form-control" type="text" name="asal" id="asal"value="{{$pengiriman->ASAL}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan" class="form-control-label">Tujuan</label>
                                        <input class="form-control" type="text" name="tujuan" id="tujuan"value="{{$pengiriman->TUJUAN}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ongkos_kirim" class="form-control-label">Ongkos Kirim</label>
                                        <input class="form-control" type="number" name="ongkos_kirim" id="ongkos_kirim"value="{{$pengiriman->ONGKOS_KIRIM}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="metode_pengiriman" class="form-control-label">Metode Pengiriman</label>
                                        <input class="form-control" type="text" name="metode_pengiriman"
                                            id="metode_pengiriman"value="{{$pengiriman->METODE_PENGIRIMAN}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_pengiriman" class="form-control-label">Tanggal Pengiriman</label>
                                        <input class="form-control" type="date" name="tgl_pengiriman"
                                            id="tgl_pengiriman"value="{{$pengiriman->TGL_PENGIRIMAN}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_diterima" class="form-control-label">Tanggal Diterima</label>
                                        <input class="form-control" type="date" name="tgl_diterima" id="tgl_diterima"value="{{$pengiriman->TGL_DITERIMA}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-control-label">Status</label>
                                        <input class="form-control" type="text" name="status" id="status"value="{{$pengiriman->STATUS}}">
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
