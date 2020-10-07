<?php

namespace App\Http\Controllers;
Use App\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LogActivity;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = Auth::user();
        $iduser = Auth::id();

         // Grab all the users
        $info = Informasi::where('untuk','Pengguna')
                       ->orderBy('created_at', 'desc')
                       ->take(4)
                       ->get();


        return view('home', compact('users','iduser','info'));
        // return view('home');
    }
     public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = App\LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }
}
