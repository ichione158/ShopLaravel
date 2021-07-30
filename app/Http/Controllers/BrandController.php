<?php

namespace App\Http\Controllers;

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
        $data = [
            'name' => $request->name
        ];

        Brand::where('id', '=', $id)->update($data);

        echo 'success';
    }
    
}
