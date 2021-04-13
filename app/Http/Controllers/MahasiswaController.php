<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Facades\DB;
use App\Models\ClassModel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $mahasiswa = Mahasiswa::with('class')->get();
        $paginate = Mahasiswa::orderBy('id_student','asc')->paginate(3);
        return view('mahasiswa.index',['mahasiswa'=>$mahasiswa,'paginate'=>$paginate]);
        

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO : Tampilkan Form Create Mahasiswa
        $class =ClassModel::all();
        return view('mahasiswa.create',['class'=>$class]);
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
            'name' => 'required',
            'class' => 'required',
            'major' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

            $mahasiswa= new Mahasiswa;
            $mahasiswa->nim =$request ->get('nim');
            $mahasiswa->name =$request ->get('name');
            $mahasiswa->major =$request ->get('major');
            $mahasiswa->address =$request ->get('address');
            $mahasiswa->email =$request ->get('email');
          

            $class= new ClassModel;
            $class->id= $request->get('class');

            $mahasiswa->class()->associate($class);
        $mahasiswa->save();

        
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

        $Mahasiswa = Mahasiswa::with('class')->where('nim',$nim)->first();
        return view('mahasiswa.detail', ['Mahasiswa'=>$mahasiswa]);
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

        $Mahasiswa = Mahasiswa::with('class')->where('nim',$nim)->first();
        $class = ClassModel::all();
        return view('mahasiswa.edit', compact('Mahasiswa','class'));
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
            'name' => 'required',
            'class' => 'required',
            'major' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

 //fungsi eloquent untuk mengupdate data inputan kita
$mahasiswa->nim =$request ->get('nim');
            $mahasiswa->name =$request ->get('name');
            $mahasiswa->major =$request ->get('major');
            $mahasiswa->address =$request ->get('address');
            $mahasiswa->email =$request ->get('email');
          

            $class= new ClassModel;
            $class->id= $request->get('class');

            $mahasiswa->class()->associate($class);
        $mahasiswa->save();


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
        
        $query->where( 'name', 'like', "%{$request->keyword}%")
        
                ->orWhere('nim', 'like', "%{$request->keyword}%") 
                
                ->orWhere('class', 'like', "%{$request->keyword}%")
        
                 ->orWhere('major', 'like', "%{$request->keyword}%");
                    })->paginate(5);
        
        $mahasiswa->appends($request->only('keyword')); 
        return view('mahasiswa.index', compact( 'mahasiswa'));
    }
    public function showCourse($nim){
        $id = Mahasiswa::where('nim', $nim)->value('id_student');
        $mahasiswa = Mahasiswa::with('class', 'course')
            ->where('nim', $nim)
            ->first();
        // dd($Student->course);

        return view('mahasiswa.course', ['Mahasiswa' => $mahasiswa]);
    }
}
