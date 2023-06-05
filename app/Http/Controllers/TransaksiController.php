<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Outlet;
use App\Models\Pegawai;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::join('outlet', 'outlet.ID_OUTLET', '=', 'transaksi.ID_OUTLET')
            ->join('pengiriman', 'pengiriman.ID_PENGIRIMAN', '=', 'transaksi.ID_PENGIRIMAN')
            ->join('barang', 'barang.ID_BARANG', '=', 'transaksi.ID_BARANG')
            ->join('pegawai', 'pegawai.ID_PEGAWAI', '=', 'transaksi.ID_PEGAWAI')
            ->select('transaksi.*', 'barang.nama as NAMA_BARANG', 'pegawai.nama as NAMA_PEGAWAI', 'outlet.nama as NAMA_OUTLET', 'pengiriman.*')
            ->paginate(10);
        return view('transaksi/transaksi', compact('transaksi'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['id_pengiriman'] = rand();
        $data["barang"] = Barang::all();
        $data["outlet"] = Outlet::all();
        $data["pegawai"] = Pegawai::all();
        return view('transaksi/tambah-transaksi', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Pengiriman::create([
            'ID_PENGIRIMAN' => $request->id_pengiriman,
            'ID_BARANG' => $request->id_barang,
            'ASAL' => $request->asal,
            'TUJUAN' => $request->tujuan,
            'ONGKOS_KIRIM' => $request->ongkos_kirim,
            'METODE_PENGIRIMAN' => $request->metode_pengiriman,
            'TGL_PENGIRIMAN' => $request->tgl_transaksi,
            'TGL_DITERIMA' => $request->tgl_transaksi,
            'STATUS' => $request->status,
        ]);
        Transaksi::create([
            'ID_TRANSAKSI' => rand(),
            'ID_OUTLET' => $request->id_outlet,
            'ID_PENGIRIMAN' => $request->id_pengiriman,
            'ID_BARANG' => $request->id_barang,
            'ID_PEGAWAI' => $request->id_pegawai,
            'JUMLAH_BARANG' => $request->jumlah_barang,
            'TOTAL_HARGA' => $request->total_harga,
            'METODE_BAYAR' => $request->metode_bayar,
            'KETERANGAN' => $request->keterangan,
            'TGL_TRANSAKSI' => $request->tgl_transaksi,
        ]);
        return redirect("transaksi")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $data["barang"] = Barang::all();
        $data["outlet"] = Outlet::all();
        $data["pegawai"] = Pegawai::all();
        $data["pengiriman"] = Pengiriman::where('ID_PENGIRIMAN', '=', $transaksi->ID_PENGIRIMAN)->first();
        return view('transaksi/edit-transaksi', compact('transaksi'), $data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {

        $pengiriman = Pengiriman::where('ID_PENGIRIMAN', $transaksi->ID_PENGIRIMAN)->first();
        $pengiriman->update([
            'ID_PENGIRIMAN' => $request->id_pengiriman,
            'ID_BARANG' => $request->id_barang,
            'ASAL' => $request->asal,
            'TUJUAN' => $request->tujuan,
            'ONGKOS_KIRIM' => $request->ongkos_kirim,
            'METODE_PENGIRIMAN' => $request->metode_pengiriman,
            'TGL_PENGIRIMAN' => $request->tgl_transaksi,
            'TGL_DITERIMA' => $request->tgl_transaksi,
            'STATUS' => $request->status,
        ]);
        $transaksi->update([
            'ID_OUTLET' => $request->id_outlet,
            'ID_PENGIRIMAN' => $request->id_pengiriman,
            'ID_BARANG' => $request->id_barang,
            'ID_PEGAWAI' => $request->id_pegawai,
            'JUMLAH_BARANG' => $request->jumlah_barang,
            'TOTAL_HARGA' => $request->total_harga,
            'METODE_BAYAR' => $request->metode_bayar,
            'KETERANGAN' => $request->keterangan,
            'TGL_TRANSAKSI' => $request->tgl_transaksi,
        ]);
        return redirect("transaksi")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect("transaksi")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $transaksi = Transaksi::join('outlet', 'outlet.ID_OUTLET', '=', 'transaksi.ID_OUTLET')
            ->join('pengiriman', 'pengiriman.ID_PENGIRIMAN', '=', 'transaksi.ID_PENGIRIMAN')
            ->join('barang', 'barang.ID_BARANG', '=', 'transaksi.ID_BARANG')
            ->join('pegawai', 'pegawai.ID_PEGAWAI', '=', 'transaksi.ID_PEGAWAI')
            ->select('transaksi.*', 'barang.nama as NAMA_BARANG', 'pegawai.nama as NAMA_PEGAWAI', 'outlet.nama as NAMA_OUTLET', 'pengiriman.*')
            ->get();
        $pdf = Pdf::loadview('transaksi/laporan-transaksi', ['transaksi' => $transaksi])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-transaksi.pdf');
    }
}
