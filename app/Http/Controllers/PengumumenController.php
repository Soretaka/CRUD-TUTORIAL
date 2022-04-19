<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengumumen;
use App\Models\Penyakit;

class PengumumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengumumen::all();
        return view('list-data', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|max:255',
            'Umur' => 'required|integer',
            'Penyakit' => 'required'
        ]);
        $penyakit=Penyakit::create([
            'Penyakit' => $request['Penyakit']
        ]);
        $pengumumen=Pengumumen::create([
            'Nama' => $request['Nama'],
            'Umur' => $request['Umur'],
            'Penyakit_id' => $penyakit->id
        ]);
        return redirect()->route('home')->with('sukses', 'Penambahan Pengguna berhasil');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = pengumumen::find($id);
        $pengumumen = Penyakit::find($data->penyakit_id);
        return view('detail-data',[
            'data'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = pengumumen::find($id)
        $data = pengumumen::where('id',$id)->first();
        return view ('edit-data',[
            'data' => $data
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|max:255',
            'Umur' => 'required|integer',
            'Penyakit' => 'required'
        ]);

        $pengumuman = Pengumumen::findOrFail($id);
        $penyakit = Penyakit::findOrFail($id);
        $pengumuman->update([
            'Nama' => $request['Nama'],
            'Umur' => $request['Umur']
        ]);
        $penyakit->update([
            'Penyakit' => $request['Penyakit']
        ]);
        return redirect()->route('home')->with('edit_data', 'Pengeditan Data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumumen::findOrFail($id)->delete();
        return redirect()->route('home')->with('hapus_data', 'Penghapusan data berhasil');
    }
}
