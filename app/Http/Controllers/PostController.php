<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Rombel;
use App\User;
use App\Comment;

class PostController extends Controller
{
    public function index()
    {
         $users = Auth::user();
        $iduser = Auth::id();

        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.info.posting', compact('posts','users','iduser'));
    }

    public function show($slug)
    {
        $post = Post::with(['comments', 'comments.child'])->where('slug', $slug)->first();
        return view('admin.info.post', compact('post'));
    }

    public function comment(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'comment' => 'required'
        ]);

        Comment::create([
            'post_id' => $request->id,
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'username' => $request->username,
            'comment' => $request->comment
        ]);
        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }
    public function bagi($id_jurusan)
    {

        $users = Auth::user();
        $iduser = Auth::id();
        $user = Rombel::find($id_jurusan);
        $idjurusan = Rombel::find($user);

    // ->where('rombel.user_id', '=', $search[0]->user_id)
        $search = DB::select('select user_id from rombel where user_id  =' . $id_jurusan . ' limit 1');

        $search2 = DB::select('select id_jurusan from rombel where id_jurusan  =' . $id_jurusan . ' limit 1');

        $posts = Post::where('id_jurusan', $search2[0]->id_jurusan)->paginate(10);
        $posts2 = [
            // Mencari Jurusan yang sesuai di Rombel, dan mengambil data Jadwal sesuai rombel
            $a = DB::table('rombel')
               
                ->select('rombel.rombel_id','rombel.tahun','rombel.tanggal') 
                ->where('rombel.user_id', '=', $search[0]->user_id)
                ->get(),

            //Mencari Nama Guru
            $b = DB::table('users') 
                ->select('users.name','users.status')
                ->where('users.id', '=',$search[0]->user_id)
                ->get(),

            //Mencari Kelas dan Jurusan
            $c = DB::table('rombel')
                ->leftJoin('kelas', 'kelas.id_kelas', '=', 'rombel.id_kelas')
               
                ->leftJoin('posts', 'posts.id_kelas', '=', 'kelas.id_kelas')
                ->select('kelas.kode_kelas','posts.title','posts.content','posts.slug','posts.created_at')
               
               ->paginate(10)

        ];
    
        return view('admin.info.postinganuser', compact('posts','posts2','users','iduser'));
    }

}
