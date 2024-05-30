<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
// use h

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return response()->json([
            'status' => 'success',
            'data' => $barang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'merk'              => 'required',
            'seri'              => 'required',
            'spesifikasi'       => 'required',
            'kategori_id'          => 'required',
        ]);


        //create post
        $barang = new Barang($validated);
        // 😀
        //redirect to index
        if ($barang->save()) {
            return response()->json([
                'status' => 'berhasil menambahkan data',
                'data' => $barang,
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menambahkan data',
                'data' => null,
            ], 500);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        // $rsetBarang = Barang::find($barang);
        // $deskripsiKategori = Barang::with('kategori')->where('id', $id)->first();
        return response()->json([
            'status' => 'success',
            'data' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        
        $validated = $this->validate($request, [
            'merk'              => 'required',
            'seri'              => 'required',
            'spesifikasi'       => 'required',
            'kategori_id'          => 'required',
        ]);


        //create post
        $barang->update($validated);
        // 😀
        //redirect to index
            return response()->json([
                'status' => 'berhasil mengedit',
                'data' => $barang,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if ($barang->delete()) {
            return response()->json([
                'status' => 'berhasil menghapus data',
                'data' => $barang,
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menghapus data',
                'data' => null,
            ], 500);
        }
    }
}
