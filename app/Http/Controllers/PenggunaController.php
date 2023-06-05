<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::paginate(10);
        return view('pengguna/pengguna', compact('pengguna'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.tambah-pengguna');
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
            'id_pengguna' => 'required',
            'nama' => 'required',

        ]);
        Pengguna::create([
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama,

        ]);
        return redirect("pengguna")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request,Pengguna $pengguna)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pengguna.edit-pengguna');
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pengguna $pengguna)
    {
        $request->validate([
            'nama' => 'required',

        ]);
        Pengguna::create([
            'NAMA' => $request->nama,

        ]);
        return redirect("pengguna")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect("pengguna")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $pengguna =pengguna::get();
        $pdf = Pdf::loadview('pengguna/laporan-pengguna', ['pengguna' => $pengguna])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pengguna.pdf');
    }
}
