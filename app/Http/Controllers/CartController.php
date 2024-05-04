<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $carts = Cart::where('userId', $userId)->get();

        $items = $carts->map(function ($cart) {
            $product = Product::find($cart->productId);
            if ($product) {
                $product->count = $cart->count;
                return $product;
            }
        })->filter();

        return Inertia::render('Cart/ShowCart', [
            'cart' => $carts,
            'items' => $items
        ]);
    }

    public function remove(Request $request)
    {
        $userId = Auth::id();
        Cart::where('userId', $userId)->where('productId', $request->productId)->delete();
        return redirect()->back();
    }

    public function increment(Request $request)
    {
        $userId = Auth::id();
        $cartItem = Cart::where('userId', $userId)->where('productId', $request->productId)->first();
        if ($cartItem) {
            $cartItem->increment('count');
        }

        return redirect()->back();
    }

    public function decrement(Request $request)
    {
        $userId = Auth::id();
        $cartItem = Cart::where('userId', $userId)->where('productId', $request->productId)->first();
        if ($cartItem && $cartItem->count > 1) {
            $cartItem->decrement('count');
        }
        return redirect()->back();
    }

    public function add(Request $request)
    {
        $userId = Auth::id();
        $cartItem = Cart::firstOrNew([
            'userId' => $userId,
            'productId' => $request->input('productId')
        ]);
        $cartItem->count = ($cartItem->count ?? 0) + $request->input('count');
        $cartItem->save();
        return redirect('/cart');
    }
}
