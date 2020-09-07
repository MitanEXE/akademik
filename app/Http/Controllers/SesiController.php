<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\Sesi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Excel;
use Notifiable, HasRoleAndPermission;

class SesiController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // Grab all the sesi
        $sesi = sesi::All();
        $iduser = Auth::id();
        //dd($sesi);
        // Show the page
        return View('admin.siswa.sesi', compact('sesi', 'iduser'));
    }

    public function delete($id_sesi) 
    {
    	sesi::where('id_sesi', $id_sesi)->delete();
    }

    public function create(UserRequest $request)
    {

        $tambahsesi = new sesi;
        $tambahsesi->sesi = $request->get('sesi');
        $tambahsesi->save();

        echo "work";
    }

    public function edit(UserRequest $request)
    {

        $idsesi = $request->get('idsesi');
        $editsesi = sesi::where('id_sesi', $idsesi)->first();
        $editsesi->sesi = $request->get('sesi');
        $editsesi->save();

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

    public function searchsesi($jenissesi){
        switch ($jenissesi) {
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

        $hasilsearch = sesi::where('sesi', $search)->orWhere('sesi', 'like', '%' . $search . '%')->get();

        return $hasilsearch;
    }
}
