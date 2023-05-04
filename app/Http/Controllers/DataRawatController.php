<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DataRawatController extends Controller
{
    public function tambah_datarawat(){
        return view('admin.tambah_datarawat');
    }
    
    public function store_datarawat(Request $request){
        
        $request->validate([
            'pasien' => 'required|string',
            'tipe' => 'required|in:Rawat Jalan,Rawat Inap',
            'tglmasuk' => 'required',
            'tglkeluar' => 'nullable',
            ]);
            
        //jika pasien tidak ada dalam database 
        $pasien = DB::table('pasien')->where('nama', $request->pasien)->first();
        
        if($pasien == null){
            return redirect('/tambah_rawatjalan')->with('pasien', 'Nama pasien belum terdaftar');
        }
            
        $save = DB::table('data_rawat')->insert([
            'id_pasien' => $pasien->id,
            'tipe' => $request->tipe,
            'tanggal_masuk' => $request->tglmasuk,
            'tanggal_keluar' => $request->tglkeluar,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/data_rawat')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_datarawat(Request $request){
        $id = $request->id;
        DB::table('data_rawat')->delete($id);
        return redirect('/data_rawat')->with('hapus', 'Data rawat jalan berhasil dihapus');
    }
    
    public function edit_datarawat($id){
        $data = DB::table('data_rawat')->find($id);
        $pasien = DB::table('pasien')->find($data->id_pasien);
        return view('admin.edit_datarawat', ['data' => $data, 'pasien' => $pasien]);
    }
    
    public function update_datarawat(Request $request){
        
        $request->validate([
            'pasien' => 'required|string',
            'tipe' => 'required|string|in:Rawat Inap,Rawat Jalan',
            'tglmasuk' => 'required',
            'tglkeluar' => 'nullable'
            ]);
        
        $datarawat = DB::table('data_rawat')->find($request->id);
            
        $pasien = DB::table('pasien')->find($datarawat->id_pasien);
        
        DB::table('data_rawat')->where('id', $request->id)->update([
            'id_pasien' => $pasien->id,
            'tipe' => $request->tipe,
            'tanggal_masuk' => $request->tglmasuk,
            'tanggal_keluar' => $request->tglkeluar,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/data_rawat')->with('update', 'Data rawat inap berhasil diupdate');
    }
    
    public function cari_rawat(Request $request){
        $rawat = DB::table('pasien')->where('nama', 'like', "%$request->keyword%")->join('data_rawat', 'pasien.id', '=', 'data_rawat.id_pasien')->select('pasien.nama', 'data_rawat.*')->get();
        return view('admin.cari_rawat', ['rawat' => $rawat, 'keyword' => $request->keyword]);
    }
}
