<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ObatPerlengkapanController extends Controller
{
    public function tambah_obat(){
        return view('admin.tambah_obat');
    }
    
    public function store_obat(Request $request){
        
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required',
            'stok' => 'required'
            ]);
            
        $save = DB::table('obat')->insert([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'stok' => $request->stok,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/obat_perlengkapan')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_obat(Request $request){
        $id = $request->id;
        DB::table('obat')->delete($id);
        return redirect('/obat_perlengkapan')->with('hapus', 'Data obat berhasil dihapus');
    }
    
    public function edit_obat($id){
        $data = DB::table('obat')->find($id);
        return view('admin.edit_obat', ['data' => $data]);
    }
    
    public function update_obat(Request $request){
        
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'stok' => 'required'
            ]);
        
        $obat = DB::table('obat')->find($request->id);
        
        DB::table('obat')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'stok' => $request->stok,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/obat_perlengkapan')->with('update', 'Data obat berhasil diupdate');
    }
    
    public function cari_obat(Request $request){
        $obat = DB::table('obat')->where('nama', 'like', "%$request->keyword%")->orWhere('jenis', 'like', "$request->keyword")->get();
        return view('admin.cari_obat', ['obat' => $obat, 'keyword' => $request->keyword]);
    }
}
