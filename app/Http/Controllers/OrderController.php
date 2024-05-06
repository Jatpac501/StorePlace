<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class OrderController extends Controller
{
    public function checkout()
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

        return Inertia::render('Order/CreateOrder', [
            'cart' => $carts,
            'items' => $items
        ]);
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required',
            'userId' => 'required',
        ]);

           return redirect()->route('order.success');
       }
}
