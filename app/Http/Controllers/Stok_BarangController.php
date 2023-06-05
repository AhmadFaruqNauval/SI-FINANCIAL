<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok_Barang;
use Barryvdh\DomPDF\Facade\Pdf;

class Stok_BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = Stok_Barang::paginate(10);
        return view('stok-barang/stok-barang', compact('stok'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stok-barang/tambah-stok-barang');
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
            'id_stok_barang' => 'required',
            'jumlah_stok' => 'required',
            'satuan' => 'required',
            'supplier' => 'required',
        ]);
        Stok_Barang::create([
            'ID_STOK_BARANG' => $request->id_stok_barang,
            'JUMLAH_STOK' => $request->jumlah_stok,
            'SATUAN' => $request->satuan,
            'SUPPLIER' => $request->supplier,
        ]);
        return redirect("stok-barang")->with("message", "Data berhasil disimpan");
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
    public function edit(Stok_Barang $stok_barang)
    {
        return view('stok-barang/edit-stok-barang', compact('stok_barang'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stok_Barang $stok_barang)
    {
        $request->validate([
            'id_stok_barang' => 'required',
            'jumlah_stok' => 'required',
            'satuan' => 'required',
            'supplier' => 'required',
        ]);
        $stok_barang->update([
            'ID_STOK_BARANG' => $request->id_stok_barang,
            'JUMLAH_STOK' => $request->jumlah_stok,
            'SATUAN' => $request->satuan,
            'SUPPLIER' => $request->supplier,
        ]);
        return redirect("stok-barang")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stok_Barang $stok_barang)
    {
        $stok_barang->delete();
        return redirect("stok-barang")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $stok = Stok_Barang::get();
        $pdf = Pdf::loadview('stok-barang/laporan-stok-barang', ['stok' => $stok])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-stok.pdf');
    }
}
