<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

// EXPORT DAN IMPORT EXCEL
use App\Exports\DataPuskesmasExport;
use App\Imports\DataPuskesmasImport;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PuskesmasKecamatanKelurahan;

// nama model harus sesuai dengan nama migration

class DataPuskesmasController extends Controller
{
    public function tambah_data_puskesmas(){
        return view('admin/tambah_data_puskesmas');
    }

    public function store_data_puskesmas(Request $request){

        $request->validate([
            'kode_kd' => 'unique:puskesmas_kecamatan_kelurahans,kode_kd',
            'kelurahan' => 'required|string',
            'kode_puskesmas' => 'required',
            'nama_puskesmas' => 'required|max:255',
            'kode_kecamatan' => 'required',
            'nama_kecamatan' => 'required|max:255',
            'kode_kelurahan' => 'required|numeric',
            ]);

        $save = DB::table('puskesmas_kecamatan_kelurahans')->insert([
            'kode_kd' => $request->kode_kd,
            'kelurahan' => $request->kelurahan,
            'kode_puskesmas' => $request->kode_puskesmas,
            'nama_puskesmas' => $request->nama_puskesmas,
            'kode_kecamatan' => $request->kode_kecamatan,
            'nama_kecamatan' => $request->nama_kecamatan,
            'kode_kelurahan' => $request->kode_kelurahan,
            ]);

            if($save){
                return redirect('/data_puskesmas')->with('sukses', 'Data berhasil ditambahkan');
            }
    }

    // INI BUAT ID PRIMARY KEY
    // public function hapus_data_puskesmas(Request $request){
    //     $kode_kd = $request->kode_kd;
    //     DB::table('puskesmas_kecamatan_kelurahans')->delete($kode_kd);
    //     return redirect('/data_puskesmas')->with('hapus', 'Data pasien berhasil dihapus');
    // }

    // INI BUAT PRIMARY KEY KODE KD - HAPUS PER DATA SATU PER SATU
    public function hapus_data_puskesmas(Request $request){
        $kode_kd = $request->kode_kd;
        DB::table('puskesmas_kecamatan_kelurahans')->where('kode_kd', $kode_kd)->delete();
        return redirect('/data_puskesmas')->with('hapus', 'Data pasien berhasil dihapus');
    }
    
// INI BUAT HAPUS SEMUA DATA YANG ADA PADA TABEL DATABASE
    public function hapus_semua_data_puskesmas() {
        DB::table('puskesmas_kecamatan_kelurahans')->truncate();
        return redirect('/data_puskesmas')->with('hapus', 'Semua data berhasil dihapus');
    }

    public function edit_data_puskesmas($kode_kd){
        // JIKA fungsi FIND Adalah Mencari ID Ototmatis Dalam bentuk Apapun Tanpa Toleransi
        // $data = DB::table('puskesmas_kecamatan_kelurahans')->find($id);
        // return view('admin/edit_data_puskesmas', ['data' => $data]);

// untuk mencari view edit Maka caranya adalah kita gunakan first agar mencari selain id yaitu primary key yang lain
        $data = PuskesmasKecamatanKelurahan::where('kode_kd', $kode_kd)->first();
        return view('admin/edit_data_puskesmas', ['data' => $data]);

    }
// untuk nambahin setelah edit ke database
    public function update_data_puskesmas(Request $request){

        $request->validate([
            'kode_kd' => 'required',
            'kelurahan' => 'required|string',
            'kode_puskesmas' => 'required',
            'nama_puskesmas' => 'required|max:255',
            'kode_kecamatan' => 'required',
            'nama_kecamatan' => 'required|max:255',
            'kode_kelurahan' => 'required|numeric',
            ]);

            $puskesmas_kecamatan_kelurahans = DB::table('puskesmas_kecamatan_kelurahans')
            ->select('kode_kd')
            ->where('kode_kd', $request->kode_kd)
            ->first();

        DB::table('puskesmas_kecamatan_kelurahans')->where('kode_kd', $request->kode_kd)->update([
            'kode_kd' => $request->kode_kd,
            'kelurahan' => $request->kelurahan,
            'kode_puskesmas' => $request->kode_puskesmas,
            'nama_puskesmas' => $request->nama_puskesmas,
            'kode_kecamatan' => $request->kode_kecamatan,
            'nama_kecamatan' => $request->nama_kecamatan,
            'kode_kelurahan' => $request->kode_kelurahan,
            ]);

        return redirect('/data_puskesmas')->with('update', 'Data pasien berhasil diupdate');
    }

// CARI PASIEN BERDASARKAN KODE DAN NAMA KELURAHAN, KECAMATAN, PUSKESMAS
    public function cari_data_puskesmas(Request $request){
        $data_puskesmas = DB::table('puskesmas_kecamatan_kelurahans')
                        ->where('kode_kd', 'like', "%$request->keyword%")
                        ->orWhere('kode_kelurahan', 'like', "%$request->keyword%")
                        ->orWhere('kode_puskesmas', 'like', "%$request->keyword%")
                        ->orWhere('kode_kecamatan', 'like', "%$request->keyword%")
                        // nama kolom pada view id karena berdasarkan keyword dan data di halaman web kita, jadi ini bukan pada kolom database kita
                        ->orWhere('kelurahan', 'like', "%$request->keyword%")
                        ->orWhere('nama_puskesmas', 'like', "%$request->keyword%")
                        ->orWhere('nama_kecamatan', 'like', "%$request->keyword%")
                        ->get();

        return view('admin.cari_data_puskesmas', ['data_puskesmas' => $data_puskesmas, 'keyword' => $request->keyword]);
    }






    public function index(){
        $puskesmas_kecamatan_kelurahans = PuskesmasKecamatanKelurahan::all();

        return view('layout/data_puskesmas', ['puskesmas_kecamatan_kelurahans'=>$puskesmas_kecamatan_kelurahans]);
    }

    public function unduhpdf(){
        $puskesmas_kecamatan_kelurahans = PuskesmasKecamatanKelurahan::all();

        $pdf = PDF::loadView('layout.data_puskesmas', [ 'puskesmas_kecamatan_kelurahans' => $puskesmas_kecamatan_kelurahans]);

        return $pdf->download('nama.pdf');
    }

    //import / upload
    public function import(){
        Excel::import(new DataPuskesmasImport, request()->file('file'));

        return back();
    }

    //export / download
    public function export(){
        return Excel::download(new DataPuskesmasExport, 'nama.xlsx');
    }
}
