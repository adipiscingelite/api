<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rsetBarang = Barang::latest()->paginate(10);
        // return view('v_barang.index',compact('rsetBarang'));

        // return view('vsiswa.index');

        $namaProduk = BarangKeluar::with('barang')->get();
        $rsetBarangKeluar = BarangKeluar::all();
        return view('v_barangkeluar.index',compact('rsetBarangKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangId = Barang::all();
        return view('v_barangkeluar.create',compact('barangId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'tgl_keluar'              => 'required',
            'qty_keluar'              => 'required',
            'barang_id'       => 'required',
        ]);


        //create post
        BarangKeluar::create([
            'tgl_keluar'          => $request->tgl_keluar,
            'qty_keluar'          => $request->qty_keluar,
            'barang_id'   => $request->barang_id,
        ]);

        //redirect to index
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rsetBarangKeluar = BarangKeluar::find($id);

        return view('v_barangkeluar.show', compact('rsetBarangKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $aKategori = array('blank'=>'Pilih Kategori',
        //                 'M'=>'Barang Modal',
        //                 'A'=>'Alat',
        //                 'BHP'=>'Bahan Habis Pakai',
        //                 'BTHP'=>'Bahan Tidak Habis Pakai'
        //             );

        $rsetBarangKeluar = BarangKeluar::find($id);
        $barangID = Barang::all();
        //return $rsetBarang;
        return view('v_barangkeluar.edit', compact('rsetBarangKeluar','barangID'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $this->validate($request, [
        'tgl_keluar' => 'required',
        'qty_keluar' => 'required',
        'barang_id' => 'required',
    ]);

    $rsetBarangKeluar = BarangKeluar::find($id);
    $rsetBarangKeluar->update($request->all());

    return redirect()->route('barangkeluar.index')->with(['Success' => 'Data Berhasil Diubah!']);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rowbarangkeluar = BarangKeluar::find($id);
        //delete image

        //delete post
        $rowbarangkeluar->delete();

        //redirect to index
        return redirect()->route('barangkeluar.index')->with(['Success' => 'Data Berhasil Dihapus!']);
    }
}
