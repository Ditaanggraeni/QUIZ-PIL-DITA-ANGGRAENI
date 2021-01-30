<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Todo;


class CrudController extends Controller {

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $todo = Todo::all();
        return view('home')->with(compact('todo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_mahasiswa' => 'required|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
        ]);
        $todo = Todo::create($data);

        return Response::json($todo);
    }

    public function edit(Todo $todo)
    {
        return view('edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        Todo::find($id)->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
      $todo = Todo::find($id);
  
      $todo->delete();
  
      return response()->json([
        'message' => 'Data deleted successfully!'
      ]);
}
}

