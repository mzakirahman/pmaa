<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fasilitas\StoreFasilitas;
use App\Http\Requests\Fasilitas\UpdateFasilitas;
use App\Models\Operasional\Fasilitas;
use Illuminate\Http\Request;

// Everything Else
use Auth;
use Gate;
use File;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FasilitasController extends Controller
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
        abort_if(Gate::denies('fasilitas_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fasilitas = Fasilitas::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.fasilitas.index', compact('fasilitas'));
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
    public function store(StoreFasilitas $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        $path = public_path('app/public/assets/file-fasilitas');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-fasilitas');
        }

        // change file locations
        if(isset($data['gambar'])){
            $data['gambar'] = $request->file('gambar')->store(
                'assets/file-fasilitas', 'public'
            );
        }else{
            $data['gambar'] = "";
        }

        // Kirim data ke database
        $fasilitas = Fasilitas::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Fasilitas');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        abort_if(Gate::denies('fasilitas_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        abort_if(Gate::denies('fasilitas_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFasilitas $request, Fasilitas $fasilitas)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        // change format gambar
        if(isset($data['gambar'])){

             // first checking old gambar to delete from storage
            $get_item = $fasilitas['gambar'];

            // change file locations
            $data['gambar'] = $request->file('gambar')->store(
                'assets/file-fasilitas', 'public'
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
        $fasilitas->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Fasilitas');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas)
    {
        abort_if(Gate::denies('fasilitas_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $fasilitas['gambar'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $fasilitas->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Fasilitas');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
