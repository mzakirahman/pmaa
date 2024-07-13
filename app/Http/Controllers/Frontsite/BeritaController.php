<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\Operasional\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $latestBerita = Berita::latest()->first();

    if ($latestBerita) {
        $berita = Berita::where('id', $latestBerita->id)->orderBy('created_at', 'desc')->get();
    } else {
        $berita = collect(); // Menghasilkan koleksi kosong jika tidak ada data berita
        $latestBerita = null; // Atau kamu bisa mengatur ini ke nilai lain yang sesuai
    }

    return view('pages.frontsite.berita', compact('berita', 'latestBerita'));

    }
}
