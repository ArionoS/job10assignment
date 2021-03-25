<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mahasiswa = Mahasiswa::all(); // Mengambil semua isi tabel
        $posts = Mahasiswa::orderBy('id', 'desc')->paginate(6);
        return view('mahasiswa.index', compact('mahasiswa'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO : Tampilkan Form Create Mahasiswa
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO : Implementasikan Proses Simpan Ke Database
        // return "Proses Simpan ke database";

        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        
        ]);

        Mahasiswa::create($request->all());
        
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //TODO : Implementasikan Proses Tampilkan Data Satu Mahasiswa Berdasarkan ID
        // return view('mahasiswa.show');

        $Mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.show', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //TODO : Implementasikan Proses Tampilkan Form Update Data Mahasiswa by Id
        // return view('mahasiswa.edit');

        $Mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //TODO : Implementasikan Proses Update Data Mahasiswa By Id
        // return "Proses udpate data ke database";

        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        
        ]);

 //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::find($id)->update($request->all());

//jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO : Implementasikan Proses Delete Mahasiswa By Id
        // return "proses destroy database";

        Mahasiswa::find($id)->delete();
        return redirect()->route('mahasiswa.index')
            -> with('success', 'Mahasiswa Berhasil Dihapus');

    }
}
