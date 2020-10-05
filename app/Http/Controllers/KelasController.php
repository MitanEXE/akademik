<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\Kelas;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Exports\KelasExport;
use Excel;
use App\rombel;
use App\Mapel;
use App\Sesi;
use App\Semester;
use App\Tahunajaran;
use App\Blok;
use App\Jurusan;
use App\Jadwal;

class KelasController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // Grab all the kelas
        $kelas = Kelas::All();
        $iduser = Auth::id();
        //dd($kelas);
        // Show the page
        return View('admin.siswa.kelas', compact('kelas', 'iduser'));
    }
    public function cetak_pdf()
    {
        $kelas = Kelas::all();
 
        $pdf = PDF::loadview('print.pdf.kelas',['kelas'=>$kelas]);
        return $pdf->download('laporan-kelas.pdf');
    }
    public function delete($id_kelas) 
    {
    	Kelas::where('id_kelas', $id_kelas)->delete();
    }

    public function create(UserRequest $request)
    {

        $tambahkelas = new Kelas;
        $tambahkelas->nama_kelas = $request->get('namakelas');
        $tambahkelas->save();

        echo "work";
    }

    public function edit(UserRequest $request)
    {

        $idkelas = $request->get('idkel');
        $editkelas = Kelas::where('id_kelas', $idkelas)->first();
        $editkelas->nama_kelas = $request->get('namakelas');
        $editkelas->save();

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
public function export_excel()
    {
        return Excel::download(new KelasExport, 'Kelas.xlsx');
    }
public function searchkelas($jeniskelas){
        switch ($jeniskelas) {
            case 1:
                $search = "X";
                break;            
            case 2:
                $search = "XI";
                break;
            case 3:
                $search = "XII";
                break;
            case 4:
                $search = "PBK";
                break;
            case 5:
                $search = "PRW";
                break;
        }

        $hasilsearch = Kelas::where('kode_kelas', $search)->orWhere('kode_kelas', 'like', '%' . $search . '%')->get();

        return $hasilsearch;
    }
    // public function searchkelas($jeniskelas){
    //     switch ($jeniskelas) {
    //         case 1:
    //             $search = "X";
    //             break;            
    //         case 2:
    //             $search = "XI";
    //             break;
    //         case 3:
    //             $search = "XII";
    //             break;
    //         case 4:
    //             $search = "SMP";
    //             break;
    //         case 5:
    //             $search = "SD";
    //             break;
    //     }

    //     $hasilsearch = Kelas::where('kode_kelas', $search)->orWhere('kode_kelas', 'like', '%' . $search . '%')->get();

    //     return $hasilsearch;
    // }
}
