<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $validated = $request->validated();

        try {
            if ($request->file) {
                $path              = Storage::putFile('public/files', new File($request['file']));
                $validated['file'] = substr($path, 7);
            }

            $product = Product::create($validated);
        } catch (Exception $e) {
            return back()->withErrors();
        }

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            $bids = $product->bids;

            return view('dashboard.show', [
                'bids'    => $bids,
                'product' => $product,
            ]);
        } else {
            return redirect()->back()->with('failure', ['Ooops there was a problem getting the product.']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if ($product) {
            return view('dashboard.edit', ['product' => $product]);
        } else {
            return redirect()->back()->with('failure', ['Ooops there was a problem getting the product.']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $validated = $request->validated();

            $product->name        = $validated['name'];
            $product->sku         = $validated['sku'];
            $product->price       = $validated['price'];
            $product->description = $validated['description'];
            $product->file        = $validated['file'];

            $product->save();

            $this->show($product->id);
        } else {
            return redirect()->back()->with('failure', ['Ooops there was a problem updating the product.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();

            return redirect()->back()->with('success', ['Ooops there was a problem updating the product.']);
        } else {
            return redirect()->back()->with('failure', ['Ooops there was a problem updating the product.']);
        }

    }
}
