<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MahasiswaModel::orderBy('nim', 'desc')->paginate(4);
        return view('index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);

        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa_model,nim',
            'nama' => 'required',
            'jurusan' => 'required'
        ],[
            'nim.required' => 'NIM harus diisi',
            'nim.numeric' => 'NIM harus berupa angka',
            'nim.unique' => 'NIM telah tersedia',
            'nama.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi'
        ]);
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan
        ];
        MahasiswaModel::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = MahasiswaModel::where('nim', $id)->first();
        return view('edit')->with('data', $data);
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required'
        ],[
            'nama.required' => 'Nama harus diisi',
            'jurusan.required' => 'Jurusan harus diisi'
        ]);
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan
        ];
        MahasiswaModel::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MahasiswaModel::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('Berhasil menghapus data');
    }
}
