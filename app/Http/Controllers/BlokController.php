<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\Blok;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Excel;
use Notifiable, HasRoleAndPermission;

class BlokController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // Grab all the blok
        $blok = blok::All();
        $iduser = Auth::id();
        //dd($blok);
        // Show the page
        return View('admin.siswa.blok', compact('blok', 'iduser'));
    }

    public function delete($id_blok) 
    {
    	blok::where('id_blok', $id_blok)->delete();
    }

    public function create(UserRequest $request)
    {

        $tambahblok = new blok;
        $tambahblok->blok = $request->get('blok');
        $tambahblok->save();

        echo "work";
    }

    public function edit(UserRequest $request)
    {

        $idblok = $request->get('idblo');
        $editblok = blok::where('id_blok', $idblok)->first();
        $editblok->blok = $request->get('blok');
        $editblok->save();

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

    public function searchblok($jenisblok){
        switch ($jenisblok) {
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

        $hasilsearch = blok::where('blok', $search)->orWhere('blok', 'like', '%' . $search . '%')->get();

        return $hasilsearch;
    }
}
