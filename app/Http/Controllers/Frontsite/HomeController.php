<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\Operasional\Agenda;
use App\Models\Operasional\Berita;
use App\Models\Operasional\Galeri;
use App\Models\Operasional\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.frontsite.home');
    }
}
