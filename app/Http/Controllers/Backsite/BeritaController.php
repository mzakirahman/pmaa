<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Berita\StoreBerita;
use App\Http\Requests\Berita\UpdateBerita;
use App\Models\Operasional\Berita;
use Illuminate\Http\Request;

// Everything Else
use Auth;
use Gate;
use File;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BeritaController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('berita_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $berita = Berita::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBerita $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        $path = public_path('app/public/assets/file-berita');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-berita');
        }

        // change file locations
        if(isset($data['gambar'])){
            $data['gambar'] = $request->file('gambar')->store(
                'assets/file-berita', 'public'
            );
        }else{
            $data['gambar'] = "";
        }

        // Kirim data ke database
        $berita = Berita::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Berita');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        abort_if(Gate::denies('berita_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // return($berita);
        return view('pages.backsite.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        abort_if(Gate::denies('berita_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBerita $request, Berita $berita)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        // change format gambar
        if(isset($data['gambar'])){

             // first checking old gambar to delete from storage
            $get_item = $berita['gambar'];

            // change file locations
            $data['gambar'] = $request->file('gambar')->store(
                'assets/file-berita', 'public'
            );

            // delete old gambar from storage
            $data_old = 'storage/'.$get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            }else{
                File::delete('storage/app/public/'.$get_item);
            }

        }

        // Update data ke database
        $berita->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Berita');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        abort_if(Gate::denies('berita_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $berita['gambar'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $berita->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Berita');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
