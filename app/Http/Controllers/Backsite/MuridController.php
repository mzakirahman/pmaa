<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Murid\StoreMurid;
use App\Http\Requests\Murid\UpdateMurid;
use App\Models\Operasional\Murid;
use Illuminate\Http\Request;

// Everything Else
use Auth;
use Gate;
use File;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class MuridController extends Controller
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
        abort_if(Gate::denies('murid_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $murid = Murid::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.murid.index', compact('murid'));
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
    public function store(StoreMurid $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        $path = public_path('app/public/assets/file-murid');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-murid');
        }

        // change file locations
        if(isset($data['foto'])){
            $data['foto'] = $request->file('foto')->store(
                'assets/file-murid', 'public'
            );
        }else{
            $data['foto'] = "";
        }

        // Kirim data ke database
        $murid = Murid::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Murid');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.murid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Murid $murid)
    {
        abort_if(Gate::denies('murid_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.murid.show', compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Murid $murid)
    {
        abort_if(Gate::denies('murid_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.murid.edit', compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMurid $request, Murid $murid)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        // change format foto
        if(isset($data['foto'])){

             // first checking old foto to delete from storage
            $get_item = $murid['foto'];

            // change file locations
            $data['foto'] = $request->file('foto')->store(
                'assets/file-murid', 'public'
            );

            // delete old foto from storage
            $data_old = 'storage/'.$get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            }else{
                File::delete('storage/app/public/'.$get_item);
            }

        }

        // Update data ke database
        $murid->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Murid');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.murid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Murid $murid)
    {
        abort_if(Gate::denies('murid_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $murid['foto'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $murid->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Murid');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
