<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Galeri\StoreGaleri;
use App\Http\Requests\Galeri\UpdateGaleri;
use App\Models\Operasional\Galeri;
use Illuminate\Http\Request;

// Everything Else
use Auth;
use Gate;
use File;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class GaleriController extends Controller
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
        abort_if(Gate::denies('galeri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galeri = Galeri::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.galeri.index', compact('galeri'));
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
    public function store(StoreGaleri $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        $path = public_path('app/public/assets/file-galeri');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-galeri');
        }

        // change file locations
        if(isset($data['gambar'])){
            $data['gambar'] = $request->file('gambar')->store(
                'assets/file-galeri', 'public'
            );
        }else{
            $data['gambar'] = "";
        }

        // Kirim data ke database
        $galeri = Galeri::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Galeri');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.galeri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        abort_if(Gate::denies('galeri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        abort_if(Gate::denies('galeri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGaleri $request, Galeri $galeri)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        // change format gambar
        if(isset($data['gambar'])){

             // first checking old gambar to delete from storage
            $get_item = $galeri['gambar'];

            // change file locations
            $data['gambar'] = $request->file('gambar')->store(
                'assets/file-galeri', 'public'
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
        $galeri->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Galeri');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.galeri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        abort_if(Gate::denies('galeri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $galeri['gambar'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $galeri->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Galeri');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
