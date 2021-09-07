<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use File;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profil.index', [
            'profils' => Profil::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profil = new Profil;
        $profil->name = $request->name;
        $profil->desc = $request->desc;

        if($request->hasFile('filefoto') == true)
        {
            $file = $request->file('filefoto');
            $filefoto = time()."".$file->getClientOriginalName();
            $file_ext  = $file->getClientOriginalExtension();

            $tujuan_upload = 'img/profil/';
            $file->move($tujuan_upload,$filefoto);
            $profil->image = $filefoto;
        }

        $profil->save();

        return redirect()->route('profil.index')->with(['success' => 'Profil Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        return view('admin.profil.detail', [
            'profil' => $profil,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', [
            'profil' => $profil,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        $profil->name = $request->name;
        $profil->desc = $request->desc;

        if($request->hasFile('filefoto') == true)
        {
            $file = $request->file('filefoto');
            $filefoto = time()."".$file->getClientOriginalName();
            $file_ext  = $file->getClientOriginalExtension();

            $local_gambar = "img/profil/".$profil->image;
            if(File::exists($local_gambar))
            {
                File::delete($local_gambar);
            }

            $tujuan_upload = 'img/profil/';
            $file->move($tujuan_upload,$filefoto);
            $profil->image = $filefoto;
        }

        $profil->save();

        return redirect()->route('profil.index')->with(['success' => 'Profil Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        $local_gambar = "img/profil/".$profil->image;
        if(File::exists($local_gambar))
        {
            File::delete($local_gambar);
        }

        $profil->delete();

        return redirect()->route('profil.index')->with(['success' => 'Profil Berhasil Dihapus']);
    }
}
