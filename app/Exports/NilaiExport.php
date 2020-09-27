<?php
 
namespace App\Exports;
 
use App\Nilai;
use App\User;
use App\Rombel;
use Maatwebsite\Excel\Concerns\FromCollection;
 
class NilaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nilai::all();
       
    }
}