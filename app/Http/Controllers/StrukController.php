<?php

namespace App\Http\Controllers;

use App\Models\Struk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StrukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('struk', [
            'struks' => Struk::get(),
            'total' => 0
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'title' => 'INPUT DATA',
            'data' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->file('gambar')->store('img');
        // dd($request);

        

        $validate = $request->validate([
            'keterangan'       => 'required',
            'jumlah'       => 'required|numeric',
            'total'       => 'required|numeric',
            'gambar'       => 'image|file|max:1024',
        ]);

        if ($request->file('gambar')){
            $validate['gambar'] = $request->file('gambar')->store('img');
        }

        Struk::create($validate);
        return redirect('/struk/create')->with('msg', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function show(Struk $struk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function edit(Struk $struk)
    {
        return view('edit',[
            'title' => 'EDIT STRUK',
            'struk' => Struk::find($struk->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struk $struk)
    {
        $validate = $request->validate([
            'keterangan'       => 'required',
            'jumlah'       => 'required|numeric',
            'total'       => 'required|numeric',
            'gambar'       => 'image|file|max:1024',
        ]);

        if ($request->file('gambar')){
            if ($request->oldFile){
                Storage::delete($request->oldFile);
            }
            $validate['gambar'] = $request->file('gambar')->store('img');
        }



        Struk::where('id', $struk->id)->update($validate);
        return redirect('/struk')->with('msg', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struk $struk)
    {
        Struk::destroy($struk->id);
        return redirect('/struk')->with('msg', 'Berhasil menghapus data');
    }
}
