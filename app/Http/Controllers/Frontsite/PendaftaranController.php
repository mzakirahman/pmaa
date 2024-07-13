<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Biaya;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $biaya = Biaya::all();
        return view('pages.frontsite.pendaftaran', compact('biaya'));
    }
}
