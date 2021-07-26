<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    public function index(){
        $data['brands'] = Brand::all();
        
        return view('admin.brands.list', $data);
    }

    public function brandAdd(Request $request){

        // Create brand
        $brand = Brand::create([
            'name'        => $request->name
        ]); 

        // Update path brand
        Brand::where('id', '=', $brand->id)->update($data);

        return 'success';
    }

    public function Edit($id){
        $brand = Brand::find($id);

        if(!empty($brand)){
            $data['brand'] = $brand;
            return view('admin.brands.edit', $data);
        }else{
            return abort(404);
        }
    }

    public function brandEdit(Request $request, $id){
        $brand = Brand::find($id);

        // Data update
        $data = [
        'name'        => $request->name,
        ];

        Brand::where('id', '=', $id)->update($data);

        return 'success';

    }
    
}
