<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use App\Models\pelayanan;
use App\Http\Requests\StorepasienRequest;
use App\Http\Requests\UpdatepasienRequest;
use GuzzleHttp\Psr7\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StorepasienRequest $request)
    {
        $keyword = $request->keyword;
        // $dtpasien = pasien::paginate(5);
        $dtpasien = pasien::where('nm_pasien','LIKE','%'.$keyword.'%')
            ->orwhere('alamat','LIKE','%'.$keyword.'%')
            ->orwhere('jns_kelamin','LIKE','%'.$keyword.'%')
            ->orwhere('tpt_lahir','LIKE','%'.$keyword.'%')
            ->orderby('created_at','desc')
            ->cursorpaginate(5);
        $dtpasien->appends($request->all());
        return view('pendaftaran.pendaftaran', compact('dtpasien','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dtpasien = pasien::all();
        $dtpelayanan = pelayanan::all();
        return view('pendaftaran.form_pendaftaran', compact('dtpasien','dtpelayanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepasienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepasienRequest $request)
    {
        // dd($request->all());

        pasien::create([
            'nm_pasien'     => $request->nm_pasien,
            'jns_kelamin'   => $request->jns_kelamin,
            'alamat'        => $request->alamat,
            'tpt_lahir'     => $request->tpt_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'id_pelayanan'  => $request->id_pelayanan,
            'id_dokter'     => $request->id_dokter,
        ]);

        return redirect('pendaftaran')->with('success', 'Data Berhasil Disimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_pasien = pasien::findorfail($id);
        $dtpelayanan = pelayanan::all();
        return view('pendaftaran.edit_pendaftaran', compact('edit_pasien','dtpelayanan'));
    }

    public function read($id)
    {
        $edit_pasien = pasien::findorfail($id);
        return view('pendaftaran.read_pendaftaran', compact('edit_pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepasienRequest  $request
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepasienRequest $request, pasien $pasien, $id)
    {
        $edit_pasien = pasien::findorfail($id);
        $edit_pasien->update($request->all());
        return redirect('pendaftaran')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(pasien $pasien, $id)
    {
        $delete_pasien = pasien::findorfail($id);
        $delete_pasien->delete();

        return redirect('pendaftaran')->with('success', 'Data Berhasil Dihapus!');
    }
}
