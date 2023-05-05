<?php

namespace App\Imports;

use App\Models\PuskesmasKecamatanKelurahan;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DateTime;

class DataPuskesmasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {





        return new PuskesmasKecamatanKelurahan([

            'kode_kd' =>  $row['kode_kd'],
            'kelurahan' => (string) $row['kelurahan'],
            'kode_puskesmas' => (string)$row['kode_pusk'],
            'nama_puskesmas' =>  $row['nama_pusk'],
            'kode_kecamatan' => $row['kode_kec'],
            'nama_kecamatan' =>  $row['nama_kec'],
            // nama row pada excel sesuaikan dan Tidak Boleh ada huruf Kapital jika tanda under _ artinya mengganti Spasi dalam Excel
            'kode_kelurahan' => $row['kodekelurahan'],

        ]);
    }
}
