<?php

namespace App\Http\Controllers;

use App\Models\MatrixNilaiSubkriteria;
use App\Models\NilaiPrioritasSubkriteria;
use App\Models\PerhitunganSubkriteria;
use App\Models\SubKriteria;
use App\Models\SubkriteriaValid;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->query('id');
        if($id == null) {
            return redirect('kriteria');
        }
        $subkriterias = Subkriteria::where('id_kriteria', $id)
        ->paginate(10);
        return view('pages.subkriteria/index', ['subkriterias' => $subkriterias]);
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
        $subkriteriaModel = new SubKriteria();
        $subkriteriaModel->nama_subkriteria = $request->nama_subkriteria;
        $subkriteriaModel->id_kriteria = $request->id_kriteria;
        $unValid = SubkriteriaValid::where('id_kriteria', $request->id_kriteria)->first();
        if($unValid) {
            $unValid->is_valid = false;
            $unValid->save();
        }
        $subkriteriaModel->save();
        return redirect('/subkriteria?id=' . $request->id_kriteria)->with('success', 'Berhasil menambahkan subkriteria');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKriteria $subKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubKriteria $subKriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKriteria $subKriteria)
    {
        $id = $request->input('id_subkriteria');
        $subkriteria = Subkriteria::where('id', $id)->first();
        $subkriteria->nama_subkriteria = $request->input('nama_subkriteria');
        $id_kriteria = $subkriteria->id_kriteria;
        $subkriteria->save();
        return redirect('/subkriteria?id=' . $id_kriteria)->with('success', 'Berhasil edit subkriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id_subkriteria');
        $subkriteria = Subkriteria::where('id', $id)->first();
        $id_kriteria = $subkriteria->id_kriteria;
        $subkriteria->delete();
        MatrixNilaiSubkriteria::where('id_kriteria', $id_kriteria)->delete();
        PerhitunganSubkriteria::where('id_kriteria', $id_kriteria)->delete();
        NilaiPrioritasSubkriteria::where('id_kriteria', $id_kriteria)->delete();
        return redirect('/subkriteria?id=' . $id_kriteria)->with('success', 'Berhasil menghapus subkriteria');
    }
}
