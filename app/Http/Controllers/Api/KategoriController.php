<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'status' => 'success',
            'data' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'deskripsi'              => 'required',
            'kategori'              => 'required',
        ]);


        //create post
        $kategori = new Kategori($validated);
        // 😀
        //redirect to index
        if ($kategori->save()) {
            return response()->json([
                'status' => 'berhasil menambahkan data',
                'data' => $kategori,
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
    public function show(Kategori $kategori)
    {
        return response()->json([
            'status' => 'success',
            'data' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
