<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    public function orderHistory(){
        $data['title'] = 'Order';

        $user_id = Auth::id();

        $data['orders'] = DB::table('orders')->where('user_id', '=', $user_id)
                                            ->where('status', '!=', 0)
                                            ->orderBy('created_at', 'desc')
                                            ->get();

        return view('pages.user.order_history', $data);
    }

    public function orderProduct(Request $request){
        $data['abc'] = $request->id_order;

        $order_id = $request->id_order;

        $data['orders'] = DB::table('carts')->where('order_id', '=', $order_id)
                                            ->orderBy('created_at', 'desc')
                                            ->get();

        return view('pages.user.order_product', $data);
    }

    public function viewChangePassword(){
        $data['title'] = 'Change Password';
        return view('pages.user.change_password', $data);
    }

    public function changePass(Request $request){

        $validated = $request->validate([
            'password_old'      => 'required|min:6',
            'password'          => 'required|min:6|max:100',
            'password_confirm'  => 'required|same:password'
        ]);

        $current_user = Auth::user();
        $password_user = $current_user->password;

        $password_old  = $request->password_old;

        if(Hash::check($password_old, $password_user)){
            $current_user->update([
                'password' => bcrypt($request->password)
            ]);

            return redirect()->back()->with('success', 'Password your change');
        }else{
            return redirect()->back()->with('error', 'Old password dose not match');
        }

        // return Auth::id();
    }
}
