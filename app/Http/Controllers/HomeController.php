<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Modules\Barang\Entities\Barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session()->forget('cart');

        return view('home');
    }

    public function tambahcart($id)
    {
        $cart = session("cart");

        if ($cart != null) {
            if (array_key_exists($id, $cart)) {
                // dd($cart[$id]['jumlah']);
                $jumlah = $cart[$id]['jumlah'];

                $product = Barang::detail_produk($id);
                $cart[$id] = [
                    "nama_barang" => $product->nama_barang,
                    "harga_barang" => $product->harga_barang,
                    "jumlah" => $jumlah + 1,
                ];

            } else {

                $product = Barang::detail_produk($id);
                $cart[$id] = [
                    "nama_barang" => $product->nama_barang,
                    "harga_barang" => $product->harga_barang,
                    "jumlah" => 1,
                ];
            }
        } else {
            $product = Barang::detail_produk($id);
            $cart[$id] = [
                "nama_barang" => $product->nama_barang,
                "harga_barang" => $product->harga_barang,
                "jumlah" => 1,
            ];
        }

        session(["cart" => $cart]);

        return redirect("/cart")->with('message', 'Berhasil menambahkan item');
    }

    public function hapuscart($id)
    {
        $cart = session("cart");
        unset($cart[$id]);

        session(["cart" => $cart]);
        return redirect("/cart")->with('message', 'Keranjang berhasil di hapus');
    }

    public function cart()
    {
        $cart = session("cart");
        return view("cart")->with("cart", $cart);
    }

    public function cartbayar()
    {
        $cart = session("cart");

        $idpoint = DB::table('users_point')->where('id_user', Auth::user()->id)->first();
        // dd($idpoint);

        $grandtotal = 0;
        foreach ($cart as $item => $val) {
            $subtotal = $val["harga_barang"] * $val["jumlah"];

            $grandtotal += $subtotal;
        }

        $idx = DB::table('transaction')->insertGetId(
            ['id_user' => Auth::user()->id,
                'total' => $grandtotal,
            ]
        );

        foreach ($cart as $item => $val) {
            DB::table('transaction_detail')->insert([
                'id_transaction' => $idx,
                'id_barang' => $item,
                'was_harga' => $val['harga_barang'],
                'jumlah' => $val['jumlah'],

            ]);
        }

        if ($idpoint == null) {
            DB::table('users_point')->insert(
                ['id_user' => Auth::user()->id, 'point' => 5]
            );

        } else {
            DB::table('users_point')
                ->where('id_user', Auth::user()->id)
                ->update(['point' => $idpoint->point + 5]);
        }

        session()->forget("cart");
        return redirect("/cart")->with('message', 'Keranjanga telah di bayar');

        // dd($cart, $grandtotal, $idx);

    }
}
