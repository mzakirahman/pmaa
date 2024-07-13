<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pengurus\StorePengurus;
use App\Http\Requests\Pengurus\UpdatePengurus;
use App\Models\MasterData\Jabatan;
use App\Models\Operasional\Pengurus;
use Illuminate\Http\Request;

// Everything Else
use Auth;
use Gate;
use File;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PengurusController extends Controller
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
        abort_if(Gate::denies('pengurus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengurus = Pengurus::orderBy('created_at', 'desc')->get();
        $jabatan = Jabatan::all();

        return view('pages.backsite.pengurus.index', compact('pengurus', 'jabatan'));
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
    public function store(StorePengurus $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        $path = public_path('app/public/assets/file-pengurus');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-pengurus');
        }

        // change file locations
        if(isset($data['foto'])){
            $data['foto'] = $request->file('foto')->store(
                'assets/file-pengurus', 'public'
            );
        }else{
            $data['foto'] = "";
        }

        // Kirim data ke database
        $pengurus = Pengurus::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Pengurus');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.pengurus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $pengurus)
    {
        abort_if(Gate::denies('pengurus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.pengurus.show', compact('pengurus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengurus $pengurus)
    {
        abort_if(Gate::denies('pengurus_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jabatan = Jabatan::all();

        return view('pages.backsite.pengurus.edit', compact('pengurus', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengurus $request, Pengurus $pengurus)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        // change format foto
        if(isset($data['foto'])){

             // first checking old foto to delete from storage
            $get_item = $pengurus['foto'];

            // change file locations
            $data['foto'] = $request->file('foto')->store(
                'assets/file-pengurus', 'public'
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
        $pengurus->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Pengurus');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.pengurus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengurus $pengurus)
    {
        abort_if(Gate::denies('pengurus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $pengurus['foto'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $pengurus->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Pengurus');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
