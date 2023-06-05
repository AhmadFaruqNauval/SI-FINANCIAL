<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Muatasi_Stok;
use App\Models\Barang;

class Mutasi_StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mutasi = Muatasi_Stok::join('barang', 'barang.ID_BARANG', '=', 'mutasi_stok.ID_BARANG')
            ->join('pengiriman', 'pengiriman.ID_PENGIRIMAN', '=', 'mutasi_stok.ID_PENGIRIMAN')
            ->select('mutasi_stok.*', 'barang.NAMA as NAMA_BARANG', 'pengiriman.*')
            ->paginate(10);
        return view('mutasi-stok/mutasi-stok', compact('mutasi'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["barang"] = Barang::all();
        return view('mutasi-stok/tambah-mutasi-stok', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mutasi' => 'required',
            'id_barang' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'ongkos_kirim' => 'required',
            'metode_pengiriman' => 'required',
            'jumlah_mutasi' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'tgl_mutasi' => 'required',
        ]);
        Pengiriman::create([
            'ID_PENGIRIMAN' => $request->id_pengiriman,
            'ID_BARANG' => $request->id_barang,
            'ASAL' => $request->asal,
            'TUJUAN' => $request->tujuan,
            'ONGKOS_KIRIM' => $request->ongkos_kirim,
            'METODE_PENGIRIMAN' => $request->metode_pengiriman,
            'TGL_PENGIRIMAN' => $request->tgl_mutasi,
            'TGL_DITERIMA' => $request->tgl_mutasi,
            'STATUS' => $request->status,
        ]);
        // echo $pengiriman;
        Muatasi_Stok::create([
            'ID_MUTASI' => $request->id_mutasi,
            'ID_BARANG' => $request->id_barang,
            'ID_PENGIRIMAN' => $request->id_pengiriman,
            'JUMLAH_MUTASI' => $request->jumlah_mutasi,
            'KETERANGAN' => $request->keterangan,
            'TGL_MUTASI' => $request->tgl_mutasi,

        ]);
        return redirect("mutasi-stok")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Muatasi_Stok $mutasi_stok)
    {
        $data["barang"] = Barang::all();
        $data['pengiriman'] = Pengiriman::find($mutasi_stok->ID_PENGIRIMAN);
        return view('mutasi-stok/edit-mutasi-stok', compact('mutasi_stok'), $data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Muatasi_Stok $mutasi_stok)
    {
        $request->validate([
            'id_barang' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'ongkos_kirim' => 'required',
            'metode_pengiriman' => 'required',
            'jumlah_mutasi' => 'required',
            'keterangan' => 'required',
            'tgl_mutasi' => 'required',
        ]);
        $mutasi_stok->update([
            'ID_BARANG' => $request->id_barang,
            'ID_PENGIRIMAN' => $request->id_pengiriman,
            'JUMLAH_MUTASI' => $request->jumlah_mutasi,
            'KETERANGAN' => $request->keterangan,
            'TGL_MUTASI' => $request->tgl_mutasi,

        ]);
        return redirect("mutasi-stok")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muatasi_Stok $mutasi_stok)
    {
        $mutasi_stok->delete();
        return redirect("mutasi-stok")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $muatasi_stok = Muatasi_Stok::get();
        $pdf = Pdf::loadview('mutasi-stok/laporan-mutasi-stok', ['mutasi' => $muatasi_stok])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-mutasi.pdf');
    }

}
