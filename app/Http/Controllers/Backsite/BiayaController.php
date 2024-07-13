<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Biaya;

class BiayaController extends Controller
{
    public function index()
    {
        $biaya = Biaya::all();

        return view('pages.backsite.biaya.index', compact('biaya'));
    }
}
