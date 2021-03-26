<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $mahasiswa = Mahasiswa::paginate(3);
        return view('mahasiswa.index',['mahasiswa'=>$mahasiswa]);
        

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
            'alamat' => 'required',
            'email' => 'required',
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
    public function show($nim)
    {
        //TODO : Implementasikan Proses Tampilkan Data Satu Mahasiswa Berdasarkan ID
        // return view('mahasiswa.show');

        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //TODO : Implementasikan Proses Tampilkan Form Update Data Mahasiswa by Id
        // return view('mahasiswa.edit');

        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswa.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //TODO : Implementasikan Proses Update Data Mahasiswa By Id
        // return "Proses udpate data ke database";

        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

 //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::find($nim)->update($request->all());

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
    public function destroy($nim)
    {
        //TODO : Implementasikan Proses Delete Mahasiswa By Id
        // return "proses destroy database";

        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswa.index')
            -> with('success', 'Mahasiswa Berhasil Dihapus');

    }  
    public function search(Request $request) {

        $mahasiswa = Mahasiswa::when($request->keyword, function ($query) use ($request){
        
        $query->where( 'nama', 'like', "%{$request->keyword}%")
        
                ->orWhere('nim', 'like', "%{$request->keyword}%") 
                
                ->orWhere('kelas', 'like', "%{$request->keyword}%")
        
                 ->orWhere('jurusan', 'like', "%{$request->keyword}%");
                    })->paginate(5);
        
        $mahasiswa->appends($request->only('keyword')); 
        return view('mahasiswa.index', compact( 'mahasiswa'));
    }
}
