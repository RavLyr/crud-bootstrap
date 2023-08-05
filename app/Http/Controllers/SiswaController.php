<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $keyword = $request->keyword;
        $jumlahbaris = 4;

        if(strlen($keyword)){
            $data = Siswa::where('nisn', 'like', "%$keyword%")
                    ->orWhere('nama', 'like', "%$keyword%")
                    ->orWhere('kompetensi', 'like', "%$keyword%")
                    ->orWhere('hobi', 'like', "%$keyword%")
                    ->orWhere('alamat', 'like', "%$keyword%")
                    ->orWhere('telepon', 'like', "%$keyword%")
                    ->paginate($jumlahbaris);
               
        } else {
            $data = Siswa::orderby('nisn','asc')->paginate($jumlahbaris);
        }

      
        $nomor =1;
        return view('siswa.index', compact('data','nomor'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Session::flash('nisn',$request->nisn);
        Session::flash('nama',$request->nama);
        Session::flash('hobi',$request->hobi);
        Session::flash('kompetensi',$request->kompetensi);
        Session::flash('alamat',$request->alamat);
        Session::flash('telepon',$request->telepon);

        $request->validate([
            'nisn' => 'required|numeric|unique:siswa,nisn',
            'nama' => 'required',
            'hobi' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ],[
            'nisn.required'=>'NISN wajib diisi',
            'nisn.numeric'=>'NISN harus angka',
            'nisn.unique'=>'NISN sudah ada',
            'nama.required'=>'Nama wajib diisi',
            'hobi.required'=>'Hobi wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'telepon.required'=>'Telepon wajib diisi',
        ]);
        

        $data = [
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'hobi' => $request->hobi,
            'kompetensi' => $request->kompetensi,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ];

        Siswa::create($data);



        return redirect()->to('siswa')->with('success','Berhasil menambah data');
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
        $data = Siswa::where('nisn',$id)->first();

        return view('siswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           
            'nama' => 'required',
            'hobi' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ],[
          
            'nama.required'=>'Nama wajib diisi',
            'hobi.required'=>'Hobi wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'telepon.required'=>'Telepon wajib diisi',
        ]);
        

        $data = [
           
            'nama' => $request->nama,
            'hobi' => $request->hobi,
            'kompetensi' => $request->kompetensi,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ];

        Siswa::where('nisn',$id)->update($data);



        return redirect()->to('siswa')->with('success','Berhasil mengedit data');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Siswa::where('nisn',$id)->delete();
        Siswa::where('nisn',$id)->delete($data);



        return redirect()->to('siswa')->with('alert','Berhasil menghapus data');
    }
}