<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\Barang;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengiriman = Pengiriman::join('barang', 'barang.ID_BARANG', '=', 'pengiriman.ID_BARANG')
            ->select('pengiriman.*', 'barang.NAMA as NAMA_BARANG')
            ->paginate(10);
        return view('pengiriman/pengiriman', compact('pengiriman'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['barang'] = Barang::all();
        return view('pengiriman.tambah-pengiriman', $data);
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
            'id_pengiriman' => 'required',
            'id_barang' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'metode_pengiriman' => 'required',
            'tgl_pengiriman' => 'required',
            'tgl_diterima' => 'required',
            'status' => 'required',
            'ongkos_kirim' => 'required',
        ]);
        Pengiriman::create([
            'ID_PENGIRIMAN' => $request->id_barang,
            'ID_BARANG' => $request->id_barang,
            'ASAL' => $request->asal,
            'TUJUAN' => $request->tujuan,
            'METODE_PENGIRIMAN' => $request->metode_pengiriman,
            'TGL_PENGIRIMAN' => $request->tgl_pengiriman,
            'TGL_DITERIMA' => $request->tgl_diterima,
            'STATUS' => $request->status,
            'ONGKOS_KIRIM' => $request->ongkos_kirim,

        ]);
        return redirect("pengiriman")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(pengiriman $pengiriman)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        $data['barang'] = Barang::all();
        return view('pengiriman.edit-pengiriman', $data);
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengiriman $pengiriman)
    {
        $request->validate([
            'id_pengiriman' => 'required',
            'id_barang' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'metode_pengiriman' => 'required',
            'tgl_pengiriman' => 'required',
            'tgl_diterima' => 'required',
            'status' => 'required',
            'ongkos_kirim' => 'required',
        ]);
        $pengiriman->update([
            'ID_PENGIRIMAN' => $request->id_barang,
            'ID_BARANG' => $request->id_barang,
            'ASAL' => $request->asal,
            'TUJUAN' => $request->tujuan,
            'METODE_PENGIRIMAN' => $request->metode_pengiriman,
            'TGL_PENGIRIMAN' => $request->tgl_pengiriman,
            'TGL_DITERIMA' => $request->tgl_diterima,
            'STATUS' => $request->status,
            'ONGKOS_KIRIM' => $request->ongkos_kirim,

        ]);
        return redirect("pengiriman")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengiriman $pengiriman)
    {
        $pengiriman->delete();
        return redirect("pengiriman")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $pengiriman =Pengiriman::get();
        $pdf = Pdf::loadview('pengiriman/laporan-pengiriman', ['pengiriman' => $pengiriman])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pengiriman.pdf');
    }
}
