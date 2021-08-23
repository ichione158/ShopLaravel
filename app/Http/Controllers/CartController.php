<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function userCart(){
        $user_id = Auth::id();

        $data['carts'] = DB::table('carts')->where('user_id', '=', $user_id)->get();

        $data['title'] = 'Shopping Cart';

        return view('pages.carts.list_card', $data);
    }

    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $quantity = $request->quantity;

        $ProductCart = DB::table('carts')
                        ->where('product_id', '=', $id)
                        ->where('user_id', '=', Auth::id())
                        ->where('status', '=', 0)
                        ->get();

        if(!$ProductCart->isEmpty()){
            $quantityNew = $ProductCart[0]->quantity + $quantity;
            if($quantityNew > 10){
                $quantityNew = 10;
            }
            
            $data = [
                'quantity' => $quantityNew
            ];
    
            Cart::where('id', '=', $ProductCart[0]->id)->update($data);

        }else{
            // Create product cart
            $category = Cart::create([
                'product_id'    => $id,
                'user_id'       => Auth::id(),
                'product_name'  => $product->name,
                'product_slug'  => $product->slug,
                'product_price' => $product->price,
                'quantity'      => $quantity,
                'image'         => $product->image,
                'path'          => $product->path,
                'status'        => 0
            ]); 
        }    
        
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request){
        $id = $request->id;

        $quantity = $request->quantity;

        $check = Cart::find($id);

        if($check !== null){

            if($quantity > 10){
                $quantity = 10;
            }

            $data = [
                'quantity' => $quantity
            ];

            Cart::where('id', '=', $id)->update($data);
        }
    }
}
