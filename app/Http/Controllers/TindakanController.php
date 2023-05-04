<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TindakanController extends Controller
{
    public function tambah_tindakan(){
        return view('admin.tambah_tindakan');
    }
    
    public function store_tindakan(Request $request){
        
        $request->validate([
            'pasien' => 'required|string',
            'tindakan' => 'required'
            ]);
            
        //cek pasien apakah ada di database
        $pasien = DB::table('pasien')->where('nama', $request->pasien)->first();
        
        if($pasien == null){
            return redirect('/tambah_tindakan')->with('pasien', 'Nama pasien belum terdaftar');
        }
            
        $save = DB::table('tindakan')->insert([
            'id_pasien' => $pasien->id,
            'nama_tindakan' => $request->tindakan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/data_tindakan')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_tindakan(Request $request){
        $id = $request->id;
        DB::table('tindakan')->delete($id);
        return redirect('/data_tindakan')->with('hapus', 'Data tindakan berhasil dihapus');
    }
    
    public function edit_tindakan($id){
        $data = DB::table('tindakan')->find($id);
        $pasien = DB::table('pasien')->find($data->id_pasien);
        return view('admin.edit_tindakan', ['data' => $data, 'pasien' => $pasien->nama]);
    }
    
    public function update_tindakan(Request $request){
    
        $request->validate([
            'pasien' => 'required',
            'tindakan' => 'required'
            ]);
        
        $pasien = DB::table('pasien')->where('nama', $request->pasien)->first();

        DB::table('tindakan')->where('id', $request->id)->update([
            'id_pasien' => $pasien->id,
            'nama_tindakan' => $request->tindakan,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/data_tindakan')->with('update', 'Data tindakan berhasil diupdate');
    }
    
    public function cari_tindakan(Request $request){
        $tindakan = DB::table('pasien')->where('nama', 'like', "%$request->keyword%")->join('tindakan', 'pasien.id', '=', 'tindakan.id_pasien')->select('pasien.nama', 'tindakan.*')->get();
        return view('admin.cari_tindakan', ['tindakan' => $tindakan, 'keyword' => $request->keyword]);
    }
}
