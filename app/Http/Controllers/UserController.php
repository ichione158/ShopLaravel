<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function orderHistory(){
        $data['title'] = 'Order';

        $user_id = Auth::id();

        $data['orders'] = DB::table('orders')->where('user_id', '=', $user_id)
                                            ->where('status', '=', 1)
                                            ->orderBy('created_at', 'desc')
                                            ->get();

        return view('pages.user.order_history', $data);
    }
}
