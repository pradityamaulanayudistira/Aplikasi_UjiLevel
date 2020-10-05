<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tabel_makanan;

class ControllerMakanan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Tabel_makanan::all();
        return view('foods/index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foods/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'harga_makanan' => 'required',
            'qty_makanan' => 'required',
            'gambar_makanan' => 'required'
        ]);
        
        $file = $request->file('gambar_makanan');

        // // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';

        // // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        Tabel_makanan::create([
            'nama_makanan' => $request->nama_makanan,
            'harga_makanan' => $request->harga_makanan,
            'qty_makanan' => $request->qty_makanan,
            'gambar_makanan' => $file->getClientOriginalName()
        ]);
        return redirect('/foods')->with('status', 'Data ' . $request->nama_makanan . ' Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tabel_makanan $food)
    {
        return view('foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tabel_makanan $food)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'harga_makanan' => 'required',
            'qty_makanan' => 'required',
            'gambar_makanan' => 'required'
        ]);

        $file = $request->file('gambar_makanan');

        // // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';

        // // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        Tabel_makanan::where('id_makanan', $food->id_makanan)
            ->update([
                'nama_makanan' => $request->nama_makanan,
                'harga_makanan' => $request->harga_makanan,
                'qty_makanan' => $request->qty_makanan,
                'gambar_makanan' => $file->getClientOriginalName()
            ]);
        return redirect('/foods')->with('status', 'Data ' . $request->nama_makanan . ' Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tabel_makanan $food)
    {
        Tabel_makanan::destroy($food->id_makanan);
        return redirect('/foods')->with('statusDelete', 'Data Berhasil Dihapus!');
    }
}
