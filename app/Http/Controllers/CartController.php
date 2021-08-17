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
    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $quantity = $request->quantity;

        $ProductCart = DB::table('carts')
                        ->where('product_id', '=', $id)
                        ->where('user_id', '=', Auth::id())
                        ->where('status', '=', 0)
                        ->get();

        if(!empty($ProductCart)){
            $quantityNew = $ProductCart[0]->quantity + $quantity;
            if($quantity_new > 10){
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
                'product_price' => $product->price,
                'quantity'      => $quantity,
                'image'         => $product->image,
                'path'          => $product->path,
                'status'        => 0
            ]); 
        }                     
    }
}
