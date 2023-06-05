<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\Barang;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gudang = Gudang::paginate(10);
        return view('gudang/gudang', compact('gudang'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('gudang/tambah-gudang');
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
            'id_gudang' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kapasitas' => 'required',
            'tgl_barang_masuk' => 'required',
            'tgl_barang_keluar' => 'required',
            'deskripsi' => 'required',
        ]);
        Gudang::create([
            'ID_GUDANG' => $request->id_gudang,
            'NAMA' => $request->nama,
            'DESKRIPSI' => $request->deskripsi,
            'ALAMAT' => $request->alamat,
            'KAPASITAS' => $request->kapasitas,
            'TGL_BARANG_MASUK' => $request->tgl_barang_masuk,
            'TGL_BARANG_KELUAR' => $request->tgl_barang_keluar,
        ]);
        return redirect("gudang")->with("message", "Data berhasil disimpan");
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
    public function edit(Gudang $gudang)
    {
        return view('gudang/edit-gudang', compact('gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudang $gudang)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kapasitas' => 'required',
            'tgl_barang_masuk' => 'required',
            'tgl_barang_keluar' => 'required',
            'deskripsi' => 'required',
        ]);
        $gudang->update([
            'NAMA' => $request->nama,
            'DESKRIPSI' => $request->deskripsi,
            'ALAMAT' => $request->alamat,
            'KAPASITAS' => $request->kapasitas,
            'TGL_BARANG_MASUK' => $request->tgl_barang_masuk,
            'TGL_BARANG_KELUAR' => $request->tgl_barang_keluar,
        ]);
        return redirect("gudang")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(gudang $gudang)
    {
        $gudang->delete();
        return redirect("gudang")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $gudang = Gudang::get();
        $pdf = Pdf::loadview('gudang/laporan-gudang', ['gudang' => $gudang])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-gudang.pdf');
    }
}
