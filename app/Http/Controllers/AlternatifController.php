<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Alternatif::paginate(5); // Retrieve paginated data with 10 items per page

        return view('pages.alternatif/index', ['siswas' => $siswas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:alternatifs',
            'kelas' => 'required',
        ]);

        $siswa = new Alternatif();
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->kelas = $request->kelas;

        $siswa->save();
        return redirect('/siswa')->with('success', 'Berhasil menambahkan siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $id = $request->post('id_siswa');
        $siswa = Alternatif::where('id', $id)->first();
        if(!$siswa) {
            return redirect('siswa')->with('error', 'Gagal edit siswa');
        }
        $siswa->nama = $request->post('nama');
        $siswa->nis = $request->post('nis');
        $siswa->kelas = $request->post('kelas');
        $siswa->save();

        return redirect('siswa')->with('success', 'Berhasil edit siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id_siswa');
        $siswa = Alternatif::where('id', $id)->first();
        if(!$siswa) {
            return redirect('siswa')->with('error', 'Gagal menghapus siswa');
        }
        $siswa->delete();
        return redirect('siswa')->with('success', 'Berhasil menghapus siswa');
    }
}
