<?php

namespace App\Models\Operasional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    // Nama tabel
    public $table = 'pengurus';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'jabatan_id',
        'nama',
        'kontak',
        'jenis_kelamin',
        'alamat',
        'foto',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function jabatan()
    {
        return $this->belongsTo('App\Models\MasterData\Jabatan', 'jabatan_id', 'id');
    }
}
