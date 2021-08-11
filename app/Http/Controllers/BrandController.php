<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    public function index(){
        return view('admin.brands.list');
    }

    public function listBrands(){
        $brands = Brand::all();
        $data['brands'] = $brands;
        echo view('admin.brands.list_ajax', $data);
    }

    public function brandAdd(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'unique:brands'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        // Create brand
        $brands = Brand::create([
            'name' => $request->name
        ]); 

        return 'success';
    }

    public function Edit($id){
        $brand = Brand::find($id);
        echo $brand->name;
    }

    public function brandEdit(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'unique:brands'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $data = [
            'name' => $request->name
        ];

        Brand::where('id', '=', $id)->update($data);

        echo 'success';
    }
    
}
