<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Pengguna;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::join('pengguna', 'pengguna.ID_PENGGUNA', '=', 'pegawai.ID_PENGGUNA')
            ->select('pegawai.*', 'pengguna.nama as jabatan')
            ->paginate(10);
        return view('pegawai.pegawai', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pengguna'] = Pengguna::all();
        return view('pegawai/tambah-pegawai', $data);
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
            'id_pegawai' => 'required',
            'id_pengguna' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',

        ]);
        Pegawai::create([
            'ID_PEGAWAI' => rand(),
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama,
            'USERNAME' => $request->username,
            'PASSWORD' => $request->password,
            'ALAMAT' => $request->alamat,
            'NO_HP' => $request->no_hp,

        ]);
        return redirect("pegawai")->with("message", "Data berhasil disimpan");
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
    public function edit(Pegawai $pegawai)
    {
        $data['pengguna'] = Pengguna::all();
        return view('pegawai.edit-pegawai', $data);
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,pegawai $pegawai )
    {
        $request->validate([
            'id_pegawai' => 'required',
            'id_pengguna' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',

        ]);
        $pegawai->update([
            'ID_PEGAWAI' => $request->id_pengguna,
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama,
            'USERNAME' => $request->alamat,
            'PASSWORD' => $request->no_hp,
            'ALAMAT' => $request->email,
            'NO_HP' => $request->username,

        ]);
        return redirect("pegawai")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect("pegawai")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $pegawai =Pegawai::get();
        $pdf = Pdf::loadview('pegawai/laporan-pegawai', ['pegawai' => $pegawai])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pegawai.pdf');
    }

}
