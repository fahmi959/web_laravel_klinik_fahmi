<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DokterController extends Controller
{
    public function tambah_dokter(){
        return view('admin.tambah_dokter');
    }
    
    public function store_dokter(Request $request){
        
        $request->validate([
            'no_dokter' => 'required|max:20',
            'nama' => 'required|string',
            'diterima' => 'required',
            'spesialis' => 'required|string',
            'telepon' => 'required|max:15',
            'alamat' => 'required'
            ]);
            
        $save = DB::table('dokter')->insert([
            'no_dokter' => $request->no_dokter,
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'diterima' => $request->diterima,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/data_dokter')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_dokter(Request $request){
        $id = $request->id;
        DB::table('dokter')->delete($id);
        return redirect('/data_dokter')->with('hapus', 'Data dokter berhasil dihapus');
    }
    
    public function edit_dokter($id){
        $data = DB::table('dokter')->find($id);
        return view('admin.edit_dokter', ['data' => $data]);
    }
    
    public function update_dokter(Request $request){
        
        $request->validate([
            'no_dokter' => 'required',
            'nama' => 'required|string',
            'spesialis' => 'required',
            'telepon' => 'required|max:15',
            'diterima_lama' => 'required',
            'alamat' => 'required'
            ]);
        
        $dokter = DB::table('dokter')->find($request->id);
        
        DB::table('dokter')->where('id', $request->id)->update([
            'no_dokter' => $request->no_dokter,
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'diterima' => $request->diterima,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/data_dokter')->with('update', 'Data dokter berhasil diupdate');
    }
    
    public function cari_dokter(Request $request){
        $pegawai = DB::table('dokter')->where('nama', 'like', "%$request->keyword%")->get();
        return view('admin.cari_dokter', ['dokter' => $pegawai, 'keyword' => $request->keyword]);
    }
}
