<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login(Request $request){
        $data = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            if(Auth::user()->status == 2){
                return 'admin';
            }else{
                return 'user';
            }
        } else {
            return 'Error';
        }
    }
}
