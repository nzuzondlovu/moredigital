<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Events\ProductViewEvent;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {

            $bids = $product->bids;

            event(new ProductViewEvent($product));

            return view('show', [
                'bids' => $bids,
                'product' => $product,
            ]);
        }

        return redirect()->back()->with('failure', 'Product not found.');
    }
}
