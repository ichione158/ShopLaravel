<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function LoginAdmin(Request $request){
        $data = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return 'Success';
        } else {
            return 'Error';
        }
    }
}
