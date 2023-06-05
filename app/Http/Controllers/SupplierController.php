<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Barang;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::join('barang', 'barang.ID_BARANG', '=', 'supplier.ID_BARANG')
            ->select('supplier.*', 'barang.NAMA as NAMA_BARANG')
            ->paginate(10);
        return view('supplier/supplier', compact('supplier'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['barang'] = Barang::all();
        return view('supplier.tambah-supplier', $data);
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
            'id_supplier' => 'required',
            'id_barang' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'jumlah_barang' => 'required',
            'tgl_supply' => 'required',
            'harga_supply' => 'required',

        ]);
        Supplier::create([
            'ID_SUPPLIER' => $request->id_supplier,
            'ID_BARANG' => $request->id_barang,
            'NAMA' => $request->nama,
            'ALAMAT' => $request->alamat,
            'NO_TELP' => $request->no_telp,
            'JUMLAH_BARANG' => $request->jumlah_barang,
            'TGL_SUPPLY' => $request->tgl_supply,
            'HARGA_SUPPLY' => $request->harga_supply,


        ]);
        return redirect("supplier")->with("message", "Data berhasil disimpan");
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
    public function edit(Supplier $supplier)
    {
        $data['barang'] = Barang::all();
        return view('supplier.edit-supplier', compact('supplier'), $data);
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $suplier)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'jumlah_barang' => 'required',
            'tgl_supply' => 'required',
            'harga_supply' => 'required',
        ]);
        $suplier->update([
            'ID_BARANG' => $request->id_barang,
            'NAMA' => $request->nama,
            'ALAMAT' => $request->alamat,
            'NO_TELP' => $request->no_telp,
            'JUMLAH_BARANG' => $request->jumlah_barang,
            'TGL_SUPPLY' => $request->tgl_supply,
            'HARGA_SUPPLY' => $request->harga_supply,
        ]);
        return redirect("supplier")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect("supplier")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $supplier =Supplier::get();
        $pdf = Pdf::loadview('supplier/laporan-supplier', ['supplier' => $supplier])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pengiriman.pdf');
    }
}
