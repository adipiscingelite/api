<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    public function index(){
        $keranjang = Keranjang::where('user_id', auth()->user()->id)->with('barang')->get();

        return view('keranjang.index', compact('keranjang'));
    }

    public function store(Request $request)
    {

        // try {
            $productId = $request->input('barang_id');
            $userId = auth()->user()->id;
            // $productQuantity = $request->input('quantity');

            // Cek apakah produk sudah ada di keranjang
            // $existingCartItem = Cart::where('produk_id', $productId)->where('user_id', $userId)->first();

            // if ($existingCartItem) {
            //     throw new \Exception('Barang sudah ada di keranjang.');
            // }

            // Jika tidak ada, tambahkan ke keranjang
            Keranjang::create([
                'user_id' => $productId,
                'barang_id' => $userId,
                'quantity' => 1,
            ]);

            session()->flash('success', 'Barang telah ditambahkan ke keranjang.');

            return back();
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }
}
