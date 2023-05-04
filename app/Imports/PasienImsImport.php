<?php

namespace App\Imports;

use App\Models\PasienIms;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DateTime;

class PasienImsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {





        return new PasienIms([

            'no_cm' => (double) $row['no_cm'],
            'nama' => (string) $row['nama'],
            'nik' => (double) $row['nik'],
            // INI FORMAT DATE MEMAKAI TANDA STRIP ' - ' - ' - ' - ' - ' - ' - ' - ' - '
            'tanggal_lahir' => $row['tanggal_lahir'],
            'tanggal_kunjungan' => $row['tanggal_kunjungan'],
            // INI FORMAT TANGGALAN INTEGER MEMAKAI GARIS MIRING ATAU SLASH ' / ' / ' / ' / ' / ' / '
            'tanggal_lahir' => $row['tanggal_lahir'] instanceof DateTime ? $row['tanggal_lahir']->format('Y-m-d') : date('Y-m-d', strtotime($row['tanggal_lahir'])),
            'tanggal_kunjungan' => $row['tanggal_kunjungan'] instanceof DateTime ? $row['tanggal_kunjungan']->format('Y-m-d') : date('Y-m-d', strtotime($row['tanggal_kunjungan'])),
            'alamat' => (string) $row['alamat'],
            'diagnosa' => (string) $row['diagnosa'],
            'status' => (string) $row['status'],
            'kelurahan' => (string) $row['kelurahan'],
            'jenis_kelamin' => (string) $row['jenis_kelamin'],
            'puskesmas' => (string) $row['puskesmas'],


        ]);
    }
}
