<?php

namespace App\Exports;

use App\Models\PasienIms;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PasienImsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PasienIms::select(  'id' ,'no_cm', 'nama' , 'nik', 'tanggal_lahir', 'tanggal_kunjungan' , 'alamat' , 'diagnosa' , 'status' , 'kelurahan' , 'jenis_kelamin', 'puskesmas')->get();
    }

    public function headings(): array{
        return [ "NO" , "NO CM", "NAMA" ,"NIK" , "TANGGAL LAHIR", "TANGGAL KUNJUNGAN", "ALAMAT" , "DIAGNOSA" , "STATUS", "KELURAHAN", "JENIS KELAMIN", "PUSKESMAS"];
    }


    // public function collection()
    // {
    //     return PasienIms::all();
    // }
}
