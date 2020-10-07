<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Kelas;
use App\Rombel;
use App\User;
use App\Nilai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon;
// use Carbon\Carbon;


class AbsensiController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iduser = Auth::id();
        $listkelas = DB::table('kelas')->select('id_kelas','nama_kelas')->get();
        return view('admin.siswa.absensi', compact('iduser', 'listkelas'));
    }
    public function coba()
    {
        $iduser = Auth::id();
        $listkelas = DB::table('kelas')->select('id_kelas','nama_kelas')->get();
        return view('admin.siswa.absensi', compact('iduser', 'listkelas'));
    }

    public function absenkelas(UserRequest $request){

        $iduser = Auth::id();
        $kelassiswa = Db::table('kelas')->select('id_kelas')->where('kode_kelas',$request->get('listkelas'))->first();

        $siswa = DB::table('users')
                            
                            ->leftjoin('rombel','rombel.user_id', '=', 'users.id')
                            ->leftjoin('kelas','kelas.id_kelas','=','rombel.id_kelas')
                            // ->where('rombel.id_kelas', '=', 'kelas.$kelassiswa->id_kelas')
                            // ->where('rombel.id_kelas', '=', '$kelassiswa->id_kelas')
                            ->leftjoin('jurusan','jurusan.id_jurusan','=','rombel.id_jurusan')
                            ->where('rombel.id_kelas', '=', $kelassiswa->id_kelas)
                            ->select('id','username', 'name', 'gender', 'agama', 'kelas.id_kelas')
                            ->get();
        $kelas = $request->get('listkelas');
        $tglsekarang = Carbon\Carbon::now()->format('d M Y \\J\\a\\m H:i ');
        return View('admin.siswa.absenkelas', compact('siswa', 'iduser', 'tglsekarang', 'kelas'));
    }
    public function absenkelas2(UserRequest $request){

        $iduser = Auth::id();
       $siswa = DB::table('users')
                            
                            ->leftjoin('rombel','rombel.user_id', '=', 'users.id')
                            ->leftjoin('kelas','kelas.id_kelas','=','rombel.id_kelas')
                            ->leftjoin('jurusan','jurusan.id_jurusan','=','rombel.id_jurusan')
                            ->leftjoin('absensi','absensi.user_id','=','users.id')
                           
                            ->select('id','username', 'name', 'gender', 'agama', 'kelas.kode_kelas','nama_jurusan','ket_absensi','tgl_absensi')
                            ->whereDate('tgl_absensi', '>', Carbon\Carbon::now()->subDays(365))
                             ->get();
                           
        $kelas = $request->get('listkelas');
        return View('admin.siswa.cekabsen', compact('siswa', 'iduser', 'kelas'));
    }

    public function doabsen( UserRequest $request) 
    {
        $tglsekarang = Carbon\Carbon::now()->format('d M Y');
        echo date_default_timezone_get() . "<br>";
        echo $tglsekarang;

        dd($request->all());
    }

        public function doabsen2(UserRequest $request)
    {
        $absensi = $request->input('absensi');
         $listid = $request->input('user_id');

    
       
        
            // do stuff
            $nilai = new absensi;
            $nilai->user_id = $listid;
            $nilai->id_kelas = $listid;
            $nilai->ket_absensi = $absensi;
         
            $nilai->save();
          
        
        return Redirect::route('absen')->with('status', 'Nilai Berhasil Ditambah');

    }
}
