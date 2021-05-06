<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        return view('site.pages.cart');
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function updateItem(Request $request, $id)
    {
        if ($request->quantity > $request->productQuantity) {
            session()->flash('error', 'We currently do not have enough items in stock.');
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, array('quantity' => array(
            'relative' => false,
            'value' => $request->quantity
        )));
        session()->flash('message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    public function clearCart()
    {
        Cart::clear();

        return redirect('/');
    }
}
