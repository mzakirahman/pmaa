<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Biaya;
use App\Models\MasterData\Jabatan;
use App\Models\MasterData\Permission;
use App\Models\MasterData\Role;
use App\Models\Operasional\Agenda;
use App\Models\Operasional\Berita;
use App\Models\Operasional\Fasilitas;
use App\Models\Operasional\Fasilitias;
use App\Models\Operasional\Galeri;
use App\Models\Operasional\Murid;
use App\Models\Operasional\Pengurus;
use App\Models\Operasional\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userTotal = User::count();
        $permissionTotal = Permission::count();
        $jabatanTotal = Jabatan::count();
        $biayaTotal = Biaya::count();
        $roleTotal = Role::count();
        $beritaTotal = Berita::count();
        $galeriTotal = Galeri::count();
        $pengurusTotal = Pengurus::count();
        $fasilitasTotal = Fasilitas::count();
        $muridTotal = Murid::count();
        return view('pages.backsite.dashboard.index', compact('userTotal', 'permissionTotal', 'jabatanTotal', 'biayaTotal', 'roleTotal', 'beritaTotal', 'galeriTotal', 'pengurusTotal', 'muridTotal', 'fasilitasTotal'));
    }
}
