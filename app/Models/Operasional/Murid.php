<?php

namespace App\Models\Operasional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    // Nama tabel
    public $table = 'murid';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'nisn',
        'nama_wali',
        'kontak',
        'foto',
        'created_at',
        'updated_at',
    ];
}
