<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function brandAdd(Request $request){

        // Create brand
        $brands = Brand::create([
        'brand_id'    => 1,
        'name'        => $request->name,
        ]); 

        return 'success';
    }
    
}
