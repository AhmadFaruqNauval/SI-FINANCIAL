<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Outlet::paginate(10);
        return view('outlet/outlet', compact('outlet'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.tambah-outlet');
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
            'deskripsi' => 'required',
            'tipe' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        Outlet::create([
            'ID_OUTLET' => rand(),
            'NAMA' => $request->nama,
            'DESKRIPSI' => $request->deskripsi,
            'TIPE' => $request->tipe,
            'NO_TELP' => $request->no_telp,
            'ALAMAT' => $request->alamat,
        ]);
        return redirect("outlet")->with("message", "Data berhasil disimpan");
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
    public function edit(Outlet $outlet)
    {
        return view('outlet.edit-outlet',compact('outlet') );
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tipe' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        $outlet->update([
            'NAMA' => $request->nama,
            'DESKRIPSI' => $request->deskripsi,
            'TIPE' => $request->tipe,
            'NO_TELP' => $request->no_telp,
            'ALAMAT' => $request->alamat,
        ]);
        return redirect("outlet")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect("outlet")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $outlet =Outlet::get();
        $pdf = Pdf::loadview('outlet/laporan-outlet', ['outlet' => $outlet])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-outlet.pdf');
    }
}
