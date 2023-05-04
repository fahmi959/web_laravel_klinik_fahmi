<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PasienImsController extends Controller
{
    public function tambah_pasien_ims(){
        return view('admin/tambah_pasien_ims');
    }

    public function store_pasien_ims(Request $request){

        $request->validate([
            'no_cm' => 'required|numeric',
            'nama' => 'required|string',
            'nik' => 'required|unique:pasien_ims|integer',
            'tanggal_lahir' => 'required',
            'tanggal_kunjungan' => 'required',
            'alamat' => 'required',
            'diagnosa' => 'required|max:255',
            'status' => 'nullable',
            'kelurahan' => 'required',
            'jenis_kelamin' => 'required|boolean',
            'puskesmas' => 'required',
            ]);

        $save = DB::table('pasien_ims')->insert([
            'no_cm' => $request->no_cm,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'alamat' => $request->alamat,
            'diagnosa' => $request->diagnosa,
            'status' => $request->status,
            'kelurahan' => $request->kelurahan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'puskesmas' => $request->puskesmas,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);

            if($save){
                return redirect('/data_pasien_ims')->with('sukses', 'Data berhasil ditambahkan');
            }
    }

    public function hapus_pasien_ims(Request $request){
        $id = $request->id;
        DB::table('pasien_ims')->delete($id);
        return redirect('/data_pasien_ims')->with('hapus', 'Data pasien berhasil dihapus');
    }

    public function edit_pasien_ims($id){
        $data = DB::table('pasien_ims')->find($id);
        return view('admin/edit_pasien_ims', ['data' => $data]);
    }

    public function update_pasien_ims(Request $request){

        $request->validate([
            'no_cm' => 'required|numeric',
            'nama' => 'required|string',
            'nik' => 'required|unique:pasien_ims|integer',
            'tanggal_lahir' => 'required',
            'tanggal_kunjungan' => 'required',
            'alamat' => 'required',
            'diagnosa' => 'required|max:255',
            'status' => 'nullable',
            'kelurahan' => 'required',
            'jenis_kelamin' => 'required|boolean',
            'puskesmas' => 'required',
            ]);

        $pasien_ims = DB::table('pasien_ims')->find($request->id);

        DB::table('pasien_ims')->where('id', $request->id)->update([
            'no_cm' => $request->no_cm,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'alamat' => $request->alamat,
            'diagnosa' => $request->diagnosa,
            'status' => $request->status,
            'kelurahan' => $request->kelurahan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'puskesmas' => $request->puskesmas,
            'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect('/data_pasien_ims')->with('update', 'Data pasien berhasil diupdate');
    }

// CARI PASIEN BERDASARKAN NAMA, NO CM, DAN NIK
    public function cari_pasien_ims(Request $request){
        $pasien_ims = DB::table('pasien_ims')
                        ->where('nama', 'like', "%$request->keyword%")
                        ->orWhere('no_cm', 'like', "%$request->keyword%")
                        ->orWhere('nik', 'like', "%$request->keyword%")
                        ->get();
        return view('admin.cari_pasien_ims', ['pasien_ims' => $pasien_ims, 'keyword' => $request->keyword]);
    }
}