<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller {
 /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $matkul = Matkul::all();
        return view('matkuls.index')->with(compact('matkul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_matakuliah' => 'required|max:255',
            'sks' => 'required',
        ]);
        $matkul = Matkul::create($data);

        return Response::json($matkul);
    }

    public function edit(Matkul $matkul)
    {
        return view('matkuls.edit', compact('matkul'));
    }

    public function update(Request $request, $id)
    {
        Matkul::find($id)->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
        ]);

        return redirect('/matkul');
    }
    
    public function destroy($id)
    {
      $matkul = Matkul::find($id);
  
      $matkul->delete();
  
      return response()->json([
        'message' => 'Data deleted successfully!'
      ]);
    }
}
