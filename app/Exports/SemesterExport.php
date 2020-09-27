<?php
 
namespace App\Exports;
 
use App\Semester;
use Maatwebsite\Excel\Concerns\FromCollection;
 
class SemesterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Semester::all();
    }
}