<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['kelas_id', 'mapel_id', 'jurusan_id', 'sesi_id', 'semester_id', 'id_tahun', 'blok_id'];
    public $timestamps = false;
}
