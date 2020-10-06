<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Mapel;
use App\User;
use App\Kelas;
use Illuminate\Support\Facades\DB;
use Response;

class MapelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Grab all the kelas
        $mapel = Mapel::all();
        $iduser = Auth::id();
        // dd($mapel);
        // Show the page
        return View('admin.siswa.datanilai', compact('mapel', 'iduser'));
    }

        public function create(UserRequest $request)
    {


        $tambahmapel = new Mapel;
        $tambahmapel->kode_mapel = $request->get('kodemapel');
        $tambahmapel->nama_mapel = $request->get('namamapel');
        $tambahmapel->save();

        echo "work";
    }

    public function edit(UserRequest $request)
    {
        $editmapel = Mapel::where('kode_mapel', $request->get('oldkodemapel'))->first();
        if ($request->get('oldkodemapel') == $request->get('kodemapel'))
        {
            $editmapel->nama_mapel = $request->get('namamapel');
            $editmapel->save();
        } else {
            $editmapel->kode_mapel = $request->get('kodemapel');
            $editmapel->nama_mapel = $request->get('namamapel');
            $editmapel->save();
        }

        echo "work";
    }

    public function delete($kdmapel) 
    {
        Mapel::where('kode_mapel', $kdmapel)->delete();
    }


    public function listkodemapel()
    {
        $kodemapel = Mapel::select('kode_mapel','nama_mapel')->get();
        return response()->json($kodemapel);

    }
     public function updatemapel($id)
    {
       try {
            $iduser = Auth::id();
            // Get the user information
            $user = User::find($id);
            $mapel = Mapel::find($id);
            $user2 = User::All();
            $listuser = $user2->pluck('id','name');
            
            $idkelas = Mapel::where('id_guru', $mapel->id)->first();


        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
        $listuser = DB::table('users')->where('job', '=', 'guru')->select('id','name')->get();
        return View('admin.siswa.updatemapel',compact('user','iduser','listuser', 'idkelas','mapel'));
    }


    public function editmapel(UserRequest $request)
    {

       $editmapel = Mapel::find($request->input('id_mapel'));
        $editmapel->kode_mapel = $request->input('ikodemapel');
        $editmapel->nama_mapel = $request->input('inamamapel');
        $editmapel->id_guru = $request->input('user');
        $editmapel->save();

        return Redirect::route('data')->with('status', 'Mapel Berhasil Diubah');
    }
    public function datamapel()
    {
       
        $mapel = DB::table('mapel')
                            ->leftjoin('users','users.id', '=', 'mapel.id_guru')
                            ->get();

      return View('admin.siswa.datamapel', compact('mapel'));
    }
}
