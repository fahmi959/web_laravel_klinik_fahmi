<?php

namespace App\Exports;

use App\Models\PuskesmasKecamatanKelurahan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataPuskesmasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PuskesmasKecamatanKelurahan::select(  'kode_kd' ,'kelurahan', 'kode_puskesmas' , 'nama_puskesmas', 'kode_kecamatan', 'nama_kecamatan' , 'kode_kelurahan' )->get();
    }

    public function headings(): array{
        return [ "kode_kd" , "kelurahan", "kode_pusk" ,"nama pusk" , "kode_kec", "nama kec", "kodeKelurahan" ];
    }


    // public function collection()
    // {
    //     return DataPuskesmas::all();
    // }
}
