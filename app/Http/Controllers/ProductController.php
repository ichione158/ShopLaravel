<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productAdd(Request $request){
        // Check file exist
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();

            $folder = 'uploads/products/';

            $file_allow = ['jpg','png','git'];

            // Check type file valid
            $check = in_array($file_type, $file_allow, true);

            if(!$check){
                return 'NoType';
            }
        }

        // Create product
        $products = Product::create([
            'brand_id'    => 1,
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description ? $request->description : null,
            'image'       => $file_name ? $file_name : null,
            'code'        => $request->code ? $request->code : null
        ]);
        
        // Link file
        $folder_file = 'uploads/products/'.$products->id;
        if(!is_dir($folder_file)){
            mkdir($folder_file);
        }

        // Move file to folder
        $file->move($folder_file, $file_name);

        $data = [
            'path' => $folder_file
        ];

        // Update path product
        Product::where('id', '=', $products->id)->update($data);

        return 'success';
    }
}