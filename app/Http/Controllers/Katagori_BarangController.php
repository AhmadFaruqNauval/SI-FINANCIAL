<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Katagori_Barang;

class Katagori_BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katagori = Katagori_Barang::paginate(10);
        return view('katagori-barang/katagori-barang', compact('katagori'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('katagori-barang/tambah-katagori-barang');
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
            'id_katagori_barang'=>'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'tgl_buat' => 'required',
        ]);
        Katagori_Barang::create([
            'ID_KATAGORI_BARANG'=> $request->id_katagori_barang,
            'NAMA'  => $request->nama,
            'DESKRIPSI' => $request->deskripsi,
            'TGL_BUAT' => $request->tgl_buat,
        ]);
        return redirect("katagori-barang")->with("message", "Data berhasil disimpan");
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
    public function edit(Katagori_Barang $katagori_barang)
    {
        return view('katagori-barang/edit-katagori-barang',compact('katagori_barang'));
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Katagori_Barang $katagori_barang)
    {
        $request->validate([
            'id_katagori_barang'=>'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'tgl_buat' => 'required',
        ]);
        $katagori_barang->update([
            'ID_KATAGORI_BARANG'=> $request->id_katagori_barang,
            'NAMA'  => $request->nama,
            'DESKRIPSI' => $request->deskripsi,
            'TGL_BUAT' => $request->tgl_buat,
        ]);
        return redirect("katagori-barang")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katagori_Barang $katagori_barang)
    {
        $katagori_barang->delete();
        return redirect("katagori-barang")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $katagori_barang =Katagori_Barang::get();
        $pdf = Pdf::loadview('katagori-barang/laporan-katagori-barang', ['katagori_barang' => $katagori_barang])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-katagori-barang.pdf');
    }
}
