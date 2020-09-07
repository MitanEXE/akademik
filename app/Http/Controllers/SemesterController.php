<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\Semester;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Excel;
use Notifiable, HasRoleAndPermission;

class SemesterController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // Grab all the semester
        $semester = semester::All();
        $iduser = Auth::id();
        //dd($semester);
        // Show the page
        return View('admin.siswa.semester', compact('semester', 'iduser'));
    }

    public function delete($id_semester) 
    {
    	semester::where('id_semester', $id_semester)->delete();
    }

    public function create(UserRequest $request)
    {

        $tambahsemester = new semester;
        $tambahsemester->semester = $request->get('semester');
        $tambahsemester->save();

        echo "work";
    }

    public function edit(UserRequest $request)
    {

        $idsemester = $request->get('idsemester');
        $editsemester = semester::where('id_semester', $idsemester)->first();
        $editsemester->semester = $request->get('semester');
        $editsemester->save();

        echo "work";
    }

    public function cetak()
    {

        Excel::create('Filename', function($excel) {

            $excel->sheet('Sheetname', function($sheet) {

                $sheet->fromArray(array(
                    array('data panjanggggggggggggggg', 'data2'),
                    array('data3', 'data4')
                ), 'test', 'A1', true);
                
                $sheet->row(1, array(
                     'head1', 'head1'
                ));

            });

        })->export('xls');

    }

    public function searchsemester($jenissemester){
        switch ($jenissemester) {
            case 1:
                $search = "RPL";
                break;            
            case 2:
                $search = "ACC";
                break;
            case 3:
                $search = "MKT";
                break;
            case 4:
                $search = "SMP";
                break;
            case 5:
                $search = "SD";
                break;
        }

        $hasilsearch = semester::where('semester', $search)->orWhere('semester', 'like', '%' . $search . '%')->get();

        return $hasilsearch;
    }
}
