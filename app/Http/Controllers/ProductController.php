<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Inertia\Inertia;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Jetstream\Role;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return Inertia::render('Dashboard', [
            'products' => $products,
            'user' => Auth::user()
        ]);
    }
    public function create(Request $request)
    {
        $saler = Auth::user()->id;
        $token = $request->session()->token();
        $token = csrf_token();
        return Inertia::render('Product/CreateProduct', [
            'token' => $token,
            'saler' => $saler
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $imagePath = $request->file('image')->store('image', 'public');
        $filePath = $request->file('file')->store('certificate', 'public');

        $certificate = Certificate::create([
            'filePath' => '/storage/' . $filePath,
        ]);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'priceOld' => round($request->price * random_int(103, 120) / 100),
            'saler' => $request->saler,
            'imagePath' => '/storage/' . $imagePath,
            'certificateId' => $certificate->id
        ]);

        return Redirect::route('dashboard');
    }

    public function show(Product $product)
    {
        $certificate = Certificate::find($product->certificateId);
        $cerfPath = $certificate ? $certificate->filePath : null;

        return Inertia::render('Product/ShowProduct', [
            'product' => $product,
            'cerfPath' => $cerfPath,
        ]);
    }


    public function edit(Product $product)
    {

    }


    public function update(Product $product)
    {

    }


    public function destroy(Product $product)
    {

    }

}
