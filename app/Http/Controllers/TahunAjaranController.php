<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\Tahunajaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Excel;
use Notifiable, HasRoleAndPermission;

class TahunAjaranController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // Grab all the tahun
        $tahunajaran = tahunajaran::All();
        $iduser = Auth::id();
        //dd($tahun);
        // Show the page
        return View('admin.siswa.tahunajaran', compact('tahunajaran', 'iduser'));
    }

    public function delete($id_tahun) 
    {
        tahun::where('id_tahun', $id_tahun)->delete();
    }

    public function create(UserRequest $request)
    {

        $tambahtahun = new tahun;
        $tambahtahun->tahun = $request->get('tahun');
        $tambahtahun->save();

        echo "work";
    }

    public function edit(UserRequest $request)
    {

        $idtahun = $request->get('idblo');
        $edittahun = tahun::where('id_tahun', $idtahun)->first();
        $edittahun->tahun = $request->get('tahun');
        $edittahun->save();

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

    public function searchtahun($jenistahun){
        switch ($jenistahun) {
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

        $hasilsearch = tahun::where('tahun', $search)->orWhere('tahun', 'like', '%' . $search . '%')->get();

        return $hasilsearch;
    }
}
