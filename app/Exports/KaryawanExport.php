<?php

namespace App\Exports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KaryawanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Karyawan::all();
    }
    public function map($karyawan): array
   {

       return [

           $karyawan->no_urut(),
           $karyawan->nik,
           $karyawan->nama_lengkap(),
           $karyawan->jenis_kelamin,
           $karyawan->jabatan,
           $karyawan->kantor,
           $karyawan->tot_pendapatan(),
           $karyawan->tot_potongan(),
           $karyawan->tot_pendapatan()-$karyawan->tot_potongan()

       ];
   }
   public function headings(): array
    {
        return [
            'NO',
            'NIK',
            'NAMA LENGKAP',
            'JENIS Kelamin',
            'JABATAN',
            'KANTOR',
            'PENDAPATAN',
            'POTONGAN',
            'GAJI BERSIH'
        ];
    }
}
