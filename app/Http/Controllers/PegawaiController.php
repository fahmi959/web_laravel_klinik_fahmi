<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function tambah_pegawai(){
        return view('admin.tambah_pegawai');
    }
    
    public function store_pegawai(Request $request){
        
        $request->validate([
            'no_pegawai' => 'required|max:20',
            'nama' => 'required|string',
            'diterima' => 'required',
            'jabatan' => 'required',
            'telepon' => 'required|max:15',
            'alamat' => 'required'
            ]);
            
        $save = DB::table('pegawai')->insert([
            'no_pegawai' => $request->no_pegawai,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'diterima' => $request->diterima,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_pegawai(Request $request){
        $id = $request->id;
        DB::table('pegawai')->delete($id);
        return redirect('/')->with('hapus', 'Data pegawai berhasil dihapus');
    }
    
    public function edit_pegawai($id){
        $data = DB::table('pegawai')->find($id);
        return view('admin.edit_pegawai', ['data' => $data]);
    }
    
    public function update_pegawai(Request $request){
        
        $request->validate([
            'no_pegawai' => 'required',
            'nama' => 'required|string',
            'jabatan' => 'required',
            'telepon' => 'required',
            'diterima' => 'required',
            'alamat' => 'required',
            ]);
        
        $dokter = DB::table('pegawai')->find($request->id);
        
        DB::table('pegawai')->where('id', $request->id)->update([
            'no_pegawai' => $request->no_pegawai,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'diterima' => $request->diterima,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/')->with('update', 'Data pegawai berhasil diupdate');
    }
    
    public function cari_pegawai(Request $request){
        $pegawai = DB::table('pegawai')->where('nama', 'like', "%$request->keyword%")->get();
        return view('admin.cari_pegawai', ['pegawai' => $pegawai, 'keyword' => $request->keyword]);
    }
}
