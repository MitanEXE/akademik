<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\jurusan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Excel;
use Notifiable, HasRoleAndPermission;

class JurusanController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // Grab all the jurusan
        $jurusan = jurusan::All();
        $iduser = Auth::id();
        //dd($jurusan);
        // Show the page
        return View('admin.siswa.jurusan', compact('jurusan', 'iduser'));
    }

    public function delete($id_jurusan) 
    {
    	jurusan::where('id_jurusan', $id_jurusan)->delete();
    }

    public function create(UserRequest $request)
    {

        $tambahjurusan = new jurusan;
        $tambahjurusan->jurusan = $request->get('nama_jurusan');
        $tambahjurusan->save();

        echo "work";
    }

    public function edit(UserRequest $request)
    {

        $idjurusan = $request->get('idjur');
        $editjurusan = jurusan::where('id_jurusan', $idjurusan)->first();
        $editjurusan->jurusan = $request->get('nama_jurusan');
        $editjurusan->save();

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

}
