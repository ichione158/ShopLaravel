<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function userCart(){
        $user_id = Auth::id();

        $data['carts'] = DB::table('carts')->where('user_id', '=', $user_id)
                                            ->where('status', '=', 0)
                                            ->get();

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

    public function checkoutCart(){
        $data['title'] = 'Checkout';

        $user_id = Auth::id();

        $total = 0; $ship = 15000;

        $carts = DB::table('carts')
                    ->where('user_id', '=', Auth::id())
                    ->where('status', '=', 0)
                    ->get();

        foreach($carts as $row){
            $total += $row->product_price * $row->quantity;
        }

        $data['sub_total'] = $total;

        if($total > 1000000){
            $ship = 0;
        }else{
            $ship = $ship;
        }

        $data['ship'] = $ship;

        $total = $total + $ship;

        $data['total'] = $total;

        $data['user'] = DB::select(DB::raw("SELECT * FROM orders WHERE user_id = $user_id ORDER BY id DESC LIMIT 1 "));

        return view('pages.carts.checkout', $data);
    }

    public function orderCart(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            'email' => 'required|max:255',
        ]);

        $code_order = rand(0, 99999);
        $user_id = Auth::id();

        $order = Order::create([
            'user_id'       => $user_id,
            'user_name'     => $request->name,
            'country_code'  => $request->country_code,
            'address'       => $request->address,
            'city'          => $request->city,
            'district'      => $request->district,
            'phone'         => $request->phone,
            'total'         => $request->total,
            'code_order'    => $code_order,
            'status'        => 1
        ]);

        Cart::where('user_id', '=', $user_id)
            ->where('status', '=', 0)
            ->update([
                'order_id' => $order->id,
                'status'   => 1
            ]);

        return 'Cảm ơn bạn đã mua hàng!';
    }
}
