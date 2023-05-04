<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TempatTidurController extends Controller
{
    public function tambah_tmptidur(){
        return view('admin.tambah_tmptidur');
    }
    
    public function store_tmptidur(Request $request){
        
        $request->validate([
            'nomor' => 'required|max:3',
            'ruang' => 'required',
            'status' => 'required|in:Terisi,Kosong',
            'pasien' => 'nullable|string|required_if:status,Terisi',
            ]);
            
        $pasien = DB::table('pasien')->where('nama', $request->pasien)->first();
        
        if(!$pasien && $pasien !== null){
            return redirect('/tambah_tmptidur')->with('pasien', 'Nama pasien belum terdaftar');
        }
            
        $save = DB::table('tempat_tidur')->insert([
            'nomor' => $request->nomor,
            'ruang' => $request->ruang,
            'status' => $request->status,
            'pasien' => $request->pasien,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/tempat_tidur')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_tmptidur(Request $request){
        $id = $request->id;
        DB::table('tempat_tidur')->delete($id);
        return redirect('/tempat_tidur')->with('hapus', 'Data tempat tidur berhasil dihapus');
    }
    
    public function edit_tmptidur($id){
        $data = DB::table('tempat_tidur')->find($id);
        return view('admin.edit_tmptidur', ['data' => $data]);
    }
    
    public function update_tmptidur(Request $request){
        
        $request->validate([
            'nomor' => 'required',
            'ruang' => 'required',
            'status' => 'required|in:Terisi,Kosong',
            'pasien' => 'required_if:status,Terisi',
            ]);
            
        $tmptidur = DB::table('tempat_tidur')->find($request->id);
        
        DB::table('tempat_tidur')->where('id', $request->id)->update([
            'nomor' => $request->nomor,
            'ruang' => $request->ruang,
            'status' => $request->status,
            'pasien' => $request->pasien,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/tempat_tidur')->with('update', 'Data tempat tidur berhasil diupdate');
    }
    
    public function cari_tmptidur(Request $request){
        $tmptidur = DB::table('tempat_tidur')->where('ruang', 'like', "%$request->keyword%")->get();
        return view('admin.cari_tmptidur', ['tmptidur' => $tmptidur, 'keyword' => $request->keyword]);
    }
}
