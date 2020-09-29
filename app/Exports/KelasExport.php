<?php
 
namespace App\Exports;
 
use App\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
 
class KelasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kelas::all();
    }
}