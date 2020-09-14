<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix' => 'get'), function () {
    Route::get('listkelas', array('as' => 'getlistkelas', function(App\Kelas $kelas){
        return $kelas->listkelas();
    }));
});
Route::get('infopublik', 'InfoController@cekinfopublik')->name('infopublik');


Route::group(array('prefix' => 'akademik'), function () {
	Route::get('/', array('as' => 'dashboard','uses' => 'HomeController@index'));

	Route::group(array('prefix' => 'users'), function () {
        Route::get('/', array('as' => 'users', 'uses' => 'UserController@index'));
        Route::post('gantigambar', array('as' => 'gantigambar', 'uses' => 'UserController@changeimage'));
        Route::post('passwordreset', 'UserController@passwordreset');
        Route::get('tambah', 'UserController@adduser')->name('tambahuser');
        Route::post('tambah', 'UserController@createuser')->name('createuser');
        Route::get('editprofile', 'UserController@editprofile')->name('editprofile');
        Route::get('goupdateprofile/{userid}', 'UserController@goupdateprofile')->name('goupdateprofile');
        Route::get('confirm-delete/{userId}', 'UserController@deletewithmodal')->name('confirm-deleteuser');
        Route::delete('delete/{userid}', 'UserController@destroy' )->name('finaldelete');
        Route::put('update/{iduser}', 'UserController@updateprofile')->name('updateprofile');
        Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UserController@show'));
        Route::get('{userId}', array('as' => 'users.show2', 'uses' => 'UserController@show'));
    });


        Route::group(array('prefix' => 'kelas'), function () {
        Route::get('/', array('as' => 'listkelas', 'uses' => 'KelasController@index'));
    	Route::get('listkelas/{jeniskelas}', array('as' => 'listkelas', 'uses' => 'KelasController@searchkelas'));
        Route::get('delete/{idkelas}', array('as' => 'deletekelas', 'uses' => 'KelasController@delete'));
        Route::post('createkelas', array('as' => 'createkelas', 'uses' => 'KelasController@create'));
        Route::post('editkelas', array('as' => 'editkelas', 'uses' => 'KelasController@edit'));
        Route::get('testcetak', 'KelasController@cetak');
    });

    Route::group(array('prefix' => 'siswa'), function () {
        Route::get('/', array('as' => 'listsiswa', 'uses' => 'SiswaController@index'));
        Route::get('add', array('as' => 'addsiswa', 'uses' => 'SiswaController@addsiswa'));
        Route::get('update/{idsiswa}', array('as' => 'updatesiswa', 'uses' => 'SiswaController@updatesiswa'));
        Route::get('daftarsiswa', array('as' => 'daftarsiswa', 'uses' => 'SiswaController@searchsiswa'));
        Route::post('tambahsiswa', array('as' => 'tambahsiswa', 'uses' => 'SiswaController@create'));
        Route::post('editsiswa', array('as' => 'editsiswa', 'uses' => 'SiswaController@edit'));
        Route::get('delete/{niksiswa}', array('as' => 'deletesiswa', 'uses' => 'SiswaController@delete'));
    });


    Route::group(array('prefix' => 'mapel'), function () {
        Route::get('/', array('as' => 'listmapel', 'uses' => 'MapelController@index'));
        Route::post('tambahmapel', array('as' => 'tambahmapel', 'uses' => 'MapelController@create'));
        Route::post('editmapel', array('as' => 'editmapel', 'uses' => 'MapelController@edit'));
        Route::get('delete/{nikmapel}', array('as' => 'deletemapel', 'uses' => 'MapelController@delete'));
        Route::get('listkodemapel', array('as' => 'listkodemapel', 'uses' => 'MapelController@listkodemapel'));
    });

    Route::group(array('prefix' => 'nilai'), function () {
        Route::get('/', array('as' => 'lihatnilai', 'uses' => 'NilaiController@index'));
        Route::get('siswawithnilai', array('as' => 'siswawithnilai', 'uses' => 'NilaiController@siswawithnilai'));
        Route::get('onlynilai/{userid}', array('as' => 'onlynilai', 'uses' => 'NilaiController@onlynilai'));
        Route::get('tambahnilaikelas', array('as' => 'tambahnilaikelas', 'uses' => 'NilaiController@tambahnilaipilihkelas'));
        Route::post('goinputnilaikelas', array('as' => 'goinputnilaikelas', 'uses' => 'NilaiController@goinputnilaikelas'));
        Route::post('gosavenilai', array('as' => 'gosavenilai', 'uses' => 'NilaiController@gosavenilai'));
        Route::post('tambahnilai', array('as' => 'tambahnilai', 'uses' => 'NilaiController@create'));
        Route::get('deletenilai/{idnilai}', array('as' => 'deletenilai', 'uses' => 'NilaiController@delete'));
        Route::get('siswa', array('as' => 'lihatnilaisiswa', 'uses' => 'NilaiController@lihatilaisiswa'));
    });


    Route::group(array('prefix' => 'absen'), function () {
        Route::get('/', array('as' => 'absen', 'uses' => 'AbsensiController@index'));
         Route::get('/coba', array('as' => 'coba', 'uses' => 'AbsensiController@coba'));
        Route::post('absenkelas', array('as' => 'absenkelas', 'uses' => 'AbsensiController@absenkelas'));
        Route::post('doabsen', array('as' => 'doabsen', 'uses' => 'AbsensiController@doabsen'));


    });

    Route::group(array('prefix' => 'info'), function () {
        Route::get('/', array('as' => 'info', 'uses' => 'InfoController@index'));
        Route::get('sms', array('as' => 'sms', 'uses' => 'InfoController@smsgateway'));
        Route::post('kirimsms', array('as' => 'kirimsms', 'uses' => 'InfoController@kirimsms'));
        Route::get('webandro', array('as' => 'webandro', 'uses' => 'InfoController@webandro'));
        Route::post('kiriminfo', array('as' => 'kiriminfo', 'uses' => 'InfoController@kiriminfo'));
        Route::get('list', array('as' => 'listinfo', 'uses' => 'InfoController@listinfo'));
        Route::get('confirm-delete/{userId}', 'InfoController@konfirmdelete')->name('confirm-deleteinfo');
        Route::delete('delete/{idinfo}', 'InfoController@destroy' )->name('infofinaldelete');
        Route::get('goeditinfo/{idinfo}', 'InfoController@goeditinfo')->name('goeditinfo');
        Route::get('lihatinfouser', 'InfoController@lihatinfouser')->name('lihatinfouser');




    });

    Route::group(array('prefix' => 'modem'), function () {
        Route::get('cek', array('as' => 'info', 'uses' => 'InfoController@apimodem'));
        Route::get('update/{idsms}', array('as' => 'updatesms', 'uses' => 'InfoController@modemupdatestatus'));
    });

    Route::group(array('prefix' => 'chat'), function () {
        Route::get('/', 'socketController@index')->name('chatroom');
        Route::post('sendmessage', 'socketController@sendMessage')->name('kirimpesanchat');
        Route::get('writemessage', 'socketController@writemessage');
    });
    Route::group(array('prefix' => 'blok'), function () {
        Route::get('/', array('as' => 'listblok', 'uses' => 'BlokController@index'));
        Route::get('listblok/{jenisblok}', array('as' => 'listblok', 'uses' => 'BlokController@searchblok'));
        Route::get('delete/{idblok}', array('as' => 'deleteblok', 'uses' => 'BlokController@delete'));
        Route::post('createblok', array('as' => 'createblok', 'uses' => 'BlokController@create'));
        Route::post('editblok', array('as' => 'editblok', 'uses' => 'BlokController@edit'));
        Route::get('testcetak', 'BlokController@cetak');
    });
     Route::group(array('prefix' => 'semester'), function () {
        Route::get('/', array('as' => 'listsemester', 'uses' => 'SemesterController@index'));
        Route::get('listsemester/{jenissemester}', array('as' => 'listsemester', 'uses' => 'SemesterController@searchsemester'));
        Route::get('delete/{idsemester}', array('as' => 'deletesemester', 'uses' => 'SemesterController@delete'));
        Route::post('createsemester', array('as' => 'createsemester', 'uses' => 'SemesterController@create'));
        Route::post('editsemester', array('as' => 'editsemester', 'uses' => 'SemesterController@edit'));
        Route::get('testcetak', 'SemesterController@cetak');
    });
        Route::group(array('prefix' => 'sesi'), function () {
        Route::get('/', array('as' => 'listsesi', 'uses' => 'SesiController@index'));
        Route::get('listsesi/{jenissesi}', array('as' => 'listsesi', 'uses' => 'SesiController@searchsesi'));
        Route::get('delete/{idsesi}', array('as' => 'deletesesi', 'uses' => 'SesiController@delete'));
        Route::post('createsesi', array('as' => 'createsesi', 'uses' => 'SesiController@create'));
        Route::post('editsesi', array('as' => 'editsesi', 'uses' => 'SesiController@edit'));
        Route::get('testcetak', 'SesiController@cetak');
    });
        Route::group(array('prefix' => 'tahunajaran'), function () {
        Route::get('/', array('as' => 'listtahunajaran', 'uses' => 'TahunAjaranController@index'));
        Route::get('listtahunajaran/{jenistahunajaran}', array('as' => 'listtahunajaran', 'uses' => 'TahunAjaranController@searchtahunajaran'));
        Route::get('delete/{idtahunajaran}', array('as' => 'deletetahunajaran', 'uses' => 'TahunAjaranController@delete'));
        Route::post('createtahunajaran', array('as' => 'createtahunajaran', 'uses' => 'TahunAjaranController@create'));
        Route::post('edittahunajaran', array('as' => 'edittahunajaran', 'uses' => 'TahunAjaranController@edit'));
        Route::get('testcetak', 'TahunAjaranController@cetak');
    });
       Route::resource('Jadwal', 'JadwalController');
        Route::group(array('prefix' => 'jadwal'), function () {

        Route::get('/', array('as' => 'jadwal', 'uses' => 'JadwalController@index'));

        // Route::get('{userId}', array('as' => 'jadwal.show', 'uses' => 'JadwalController@show'));
        });
        Route::group(array('prefix' => 'jurusan'), function () {
        Route::get('/', array('as' => 'listjurusan', 'uses' => 'jurusanController@index'));
        Route::get('add', array('as' => 'addjadwal', 'uses' => 'JadwalController@addjadwal'));
        Route::post('tambahjadwal', array('as' => 'tambahjadwal', 'uses' => 'JadwalController@create'));
        Route::get('listjurusan/{jenisjurusan}', array('as' => 'listjurusan', 'uses' => 'jurusanController@searchjurusan'));
        Route::get('delete/{idjurusan}', array('as' => 'deletejurusan', 'uses' => 'jurusanController@delete'));
        Route::post('createjurusan', array('as' => 'createjurusan', 'uses' => 'jurusanController@create'));
        Route::post('editjurusan', array('as' => 'editjurusan', 'uses' => 'jurusanController@edit'));
        Route::get('testcetak', 'jurusanController@cetak');
    });
      });