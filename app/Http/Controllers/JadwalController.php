<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\rombel;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
         return view('admin.siswa.generate_jadwal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ->where('rombel.user_id', '=', $search[0]->user_id)
        $search = DB::select('select user_id from rombel where user_id  =' . $id . ' limit 1');
        $data = [
            // Mencari Jurusan yang sesuai di Rombel, dan mengambil data Jadwal sesuai rombel
            $a = DB::table('jadwal')
                ->leftJoin('mapel', 'jadwal.mapel_id', '=', 'mapel.id_mapel')
                ->leftJoin('sesi', 'jadwal.sesi_id', '=', 'sesi.id_sesi')
                ->leftJoin('semester', 'jadwal.semester_id', '=', 'semester.id_semester')
                ->leftJoin('tahunajaran', 'jadwal.id_tahun', '=', 'tahunajaran.id_tahun')
                ->leftJoin('blok', 'jadwal.blok_id', '=', 'blok.id_blok')
                ->leftJoin('rombel', 'jadwal.rombel_id', '=', 'rombel.id_kelas')
                ->select('sesi.sesi', 'tahunajaran.tahun_ajaran', 'semester.semester', 'mapel.nama_mapel', 'jadwal.rombel_id')
                ->where('rombel.user_id', '=', $search[0]->user_id)
                ->get(),

            //Mencari Nama Guru
            $b = DB::table('jadwal')
                ->leftJoin('mapel', 'jadwal.mapel_id', '=', 'mapel.id_mapel')
                ->leftJoin('users', 'mapel.id_guru', '=', 'users.id')
                ->select('users.name')
                ->where('jadwal.rombel_id', '=', $a[0]->rombel_id)
                ->get(),

            //Mencari Kelas dan Jurusan
            $c = DB::table('rombel')
                ->leftJoin('kelas', 'rombel.id_kelas', '=', 'kelas.id_kelas')
                ->leftJoin('jurusan', 'rombel.id_jurusan', '=', 'jurusan.id_jurusan')
                ->select('jurusan.nama_jurusan', 'kelas.kode_kelas')
                ->where('rombel.user_id', '=', $search[0]->user_id)
                ->limit(1)
                ->get()
        ];
        return view('admin.siswa.jadwalsiswa', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
