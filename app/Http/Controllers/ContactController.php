<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Redirect;

class ContactController extends Controller
{
    public function addContact(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:255',
            'email'     => 'required|max:255|email',
            'phone'     => 'required|regex:/[0-9]{9}/|size:10',
            'message'   => 'required',
        ]);

        if($validator->fails()){
            return Redirect::to('/contact')->withInput()->withErrors($validator);
        }

        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message
        ];

        Contact::create($data);

        return Redirect::to('/contact')->with('success', 'Thank you for your feedback!');
    }
}
