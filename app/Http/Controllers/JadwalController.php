<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Redirect;
use App\rombel;
use App\Mapel;
use App\Sesi;
use App\Semester;
use App\Tahunajaran;
use App\Kelas;
use App\Blok;
use App\Jurusan;
use App\Jadwal;

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
       public function create(UserRequest $request)
    {
        // Store the blog post...

        $addjadwal = new Jadwal;
        $addjadwal->mapel_id     = $request->input('mapel');
        $addjadwal->sesi_id     = $request->input('sesi');
        $addjadwal->semester_id      = $request->input('semester');
        $addjadwal->id_tahun     = $request->input('tahunajaran');
        $addjadwal->blok_id     = $request->input('blok');
        $addjadwal->rombel_id     = $request->input('kelas');
        $addjadwal->save();     

        return Redirect::route('jadwal')->with('status', 'Jadwal Berhasil ditambah');

        // echo "Work";
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
                // ->leftJoin('rombel', 'jadwal.jurusan_id', '=', 'rombel.id_jurusan')
                ->select('sesi.sesi', 'tahunajaran.tahun_ajaran', 'semester.semester', 'mapel.nama_mapel', 'jadwal.rombel_id') //, 'jadwal.rombel_id'
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
                // ->leftJoin('jadwal', 'rombel.id_jurusan', '=', 'jadwal.jurusan_id')
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
       public function addjadwal()
    {

        try {
            $iduser = Auth::id();

            $mapel = Mapel::All();
            $jurusan = Jurusan::All();
            $sesi = Sesi::All();
            $semester = Semester::All();
            $tahunajaran = Tahunajaran::All();
            $blok = Blok::All();
            $kelas = Kelas::All();
            $rombel = rombel::All();

            $listkelas = $kelas->pluck('kode_kelas','id_kelas');
            $listsesi = $sesi->pluck('sesi','id_sesi');
            $listmapel = $mapel->pluck('nama_mapel','id_mapel');
            $listjurusan = $jurusan->pluck('nama_jurusan','id_jurusan');
            $listsemester = $semester->pluck('semester','id_semester');
            $listtahunajaran = $tahunajaran->pluck('tahunajaran','id_tahun');
            $listblok = $blok->pluck('blok','id_blok');

            // dd($listkelas);

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
    $listkelas = DB::table('kelas')->select('id_kelas','kode_kelas')->get();
    $listsesi = DB::table('sesi')->select('id_sesi','sesi')->get();
    $listmapel = DB::table('mapel')->select('id_mapel','nama_mapel')->get();
    $listjurusan = DB::table('jurusan')->select('id_jurusan','nama_jurusan')->get();
    $listsemester = DB::table('semester')->select('id_semester','semester')->get();
    $listtahunajaran = DB::table('tahunajaran')->select('id_tahun','tahun_ajaran')->get();
    $listblok = DB::table('blok')->select('id_blok','blok')->get();

        return View('admin.siswa.addjadwal', compact('iduser','listkelas', 'listjurusan','listsesi', 'listmapel', 'listsemester','listtahunajaran', 'listblok'));
    }
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
