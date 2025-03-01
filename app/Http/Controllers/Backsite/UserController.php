<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\User\StoreUser;
use App\Http\Requests\User\UpdateUser;

// Everything Else
use Auth;
use File;
use Gate;

// Model
use App\Models\MasterData\Role;
use App\Models\User;

class UserController extends Controller
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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::orderBy('created_at', 'desc')->get();
        $roles = Role::all()->pluck('name', 'id');

        return view('pages.backsite.user.index', compact('user', 'roles'));
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
    public function store(StoreUser $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // hash password
        $data['password'] = Hash::make($data['email']);

        // upload process here
        $path = public_path('app/public/assets/file-user');
        if (!File::isDirectory($path)) {
            $response = Storage::makeDirectory('public/assets/file-user');
        }

        // change file locations
        if (isset($data['foto'])) {
            $data['foto'] = $request->file('foto')->store(
                'assets/file-user',
                'public'
            );
        } else {
            $data['foto'] = "";
        }

        // store to database
        $user = User::create($data);

        // sync role by users select
        $user->role()->sync($request->input('role', []));

        alert()->success('Berhasil', 'Berhasil Menambahkan User Baru');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('role');

        return view('pages.backsite.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::all()->pluck('name', 'id');
        $user->load('role');
        return view('pages.backsite.user.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        // get all request from frontsite
        $data = $request->all();

        // upload process here
        // change format foto
        if (isset($data['foto'])) {

            // first checking old foto to delete from storage
            $get_item = $user['foto'];

            // change file locations
            $data['foto'] = $request->file('foto')->store(
                'assets/file-user',
                'public'
            );

            // delete old foto from storage
            $data_old = 'storage/' . $get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            } else {
                File::delete('storage/app/public/' . $get_item);
            }
        }

        // update to database
        $user->update($data);

        // update roles
        $user->role()->sync($request->input('role', []));

        alert()->success('Berhasil', 'Berhasil Memperbarui Data User');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $user['foto'];

        $data = 'storage/' . $get_item;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_item);
        }

        $user->delete();

        alert()->success('Berhasil', 'Berhasil Menghapus Data User');
        return back();
    }
}
