<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    // Nama tabel
    public $table = 'jabatan';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function pengurus()
    {
        return $this->hasMany('App\Models\Operasional\Pengurus', 'jabatan_id');
    }
}
