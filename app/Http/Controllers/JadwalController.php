<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    public function tambah_jadwal(){
        return view('admin.tambah_jadwal');
    }
    
    public function store_jadwal(Request $request){
        
        $request->validate([
            'no_dokter' => 'required',
            'jam' => 'required',
            'hari' => 'required|string',
            ]);
            
        $dokter = DB::table('dokter')->where('no_dokter', $request->no_dokter)->first();
        
        //jika data dokter tidak ada
        if($dokter == null){
            return redirect('/tambah_jadwal')->with('empty', 'Data dokter tidak ditemukan. Mohon periksa nomor dokter kembali');
        }
            
        $save = DB::table('jadwal')->insert([
            'id_dokter' => $dokter->id,
            'jam' => $request->jam,
            'hari' => $request->hari,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/jadwal_praktek')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_jadwal(Request $request){
        $id = $request->id;
        DB::table('jadwal')->delete($id);
        return redirect('/jadwal_praktek')->with('hapus', 'Data jadwal berhasil dihapus');
    }
    
    public function edit_jadwal($id){
        $data = DB::table('jadwal')->find($id);
        
        $no_dokter = DB::table('dokter')->where('id', $data->id_dokter)->first();
        
        return view('admin.edit_jadwal', ['data' => $data, 'no_dokter' => $no_dokter->no_dokter]);
    }
    
    public function update_jadwal(Request $request){
        
        $dokter = DB::table('dokter')->where('no_dokter', $request->no_dokter)->first();

        $request->validate([
            'no_dokter' => 'required',
            'jam' => 'required',
            'hari' => 'required'
            ]);
        
        DB::table('jadwal')->where('id', $request->id)->update([
            'id_dokter' => $dokter->id,
            'jam' => $request->jam,
            'hari' => $request->hari,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/jadwal_praktek')->with('update', 'Jadwal praktek berhasil diupdate');
    }
    
    public function cari_jadwal(Request $request){
        $jadwal = DB::table('dokter')->where('nama', 'like', "%$request->keyword%")->join('jadwal', 'dokter.id', '=', 'jadwal.id_dokter')->select('jadwal.*', 'dokter.nama')->get();
        
        return view('admin.cari_jadwal', ['jadwal' => $jadwal, 'keyword' => $request->keyword]);
    }
}
