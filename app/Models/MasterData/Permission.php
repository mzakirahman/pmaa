<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // Nama tabel
    public $table = 'permission';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    // Relasi many to many
    public function role()
    {
        return $this->belongsToMany('App\Models\MasterData\Role');
    }

    // Relasi one to many
    public function permission_role()
    {
        return $this->hasMany('App\Models\ManajemenAkses\PermissionRole', 'permission_id');
    }
}
