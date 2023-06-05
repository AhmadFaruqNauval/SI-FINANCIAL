<?php

namespace App\Http\Controllers;

use App\Models\Stok_Barang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Katagori_Barang;
use App\Models\Gudang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::join('gudang', 'gudang.ID_GUDANG', '=', 'barang.ID_GUDANG')
            ->join('katagori_barang', 'katagori_barang.ID_KATAGORI_BARANG', '=', 'barang.ID_KATAGORI_BARANG')
            ->join('stok_barang', 'stok_barang.ID_STOK_BARANG', '=', 'barang.ID_STOK_BARANG')
            ->select('barang.*', 'stok_barang.JUMLAH_STOK as STOK', 'gudang.NAMA as NAMA_GUDANG', 'katagori_barang.NAMA as NAMA_KATAGORI')
            ->paginate(10);
        return view('barang/barang', compact('barang'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["katagori"] = Katagori_Barang::all();
        $data["gudang"] = Gudang::all();
        $data["stok"] = Stok_Barang::all();
        return view('barang/tambah-barang', $data);
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
            'nama' => 'required',
            'id_katagori_barang' => 'required',
            'id_gudang' => 'required',
            'id_stok_barang' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'status' => 'required',

        ]);
        Barang::create([
            'ID_BARANG' => rand(),
            'ID_KATAGORI_BARANG' => $request->id_katagori_barang,
            'ID_STOK_BARANG' => $request->id_stok_barang,
            'ID_GUDANG' => $request->id_gudang,
            'NAMA' => $request->nama,
            'HARGA' => $request->harga,
            'TGL_MASUK' => $request->tgl_masuk,
            'TGL_KELUAR' => $request->tgl_keluar,
            'DESKRIPSI' => $request->deskripsi,
            'Status' => $request->status,

        ]);
        return redirect("barang")->with("message", "Data berhasil disimpan");
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
    public function edit(Barang $barang)
    {
        $data["katagori"] = Katagori_Barang::all();
        $data["gudang"] = Gudang::all();
        $data["stok"] = Stok_Barang::all();
        return view('barang/edit-barang', compact('barang'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'id_katagori_barang' => 'required',
            'id_gudang' => 'required',
            'id_stok_barang' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'status' => 'required',
        ]);
        $barang->update([
            'ID_KATAGORI_BARANG' => $request->id_katagori_barang,
            'ID_STOK_BARANG' => $request->id_stok_barang,
            'ID_GUDANG' => $request->id_gudang,
            'NAMA' => $request->nama,
            'HARGA' => $request->harga,
            'TGL_MASUK' => $request->tgl_masuk,
            'TGL_KELUAR' => $request->tgl_keluar,
            'DESKRIPSI' => $request->deskripsi,
            'Status' => $request->status,

        ]);
        return redirect("barang")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect("barang")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $barang = Barang::get();
        $pdf = Pdf::loadview('barang/laporan-barang', ['barang' => $barang])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-barang.pdf');
    }
}
