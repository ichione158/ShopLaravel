<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.categories.list');
    }

    public function listCategories(){
        $categories = Category::all();
        $data['categories'] = $categories;
        echo view('admin.categories.list_ajax', $data);
    }

    public function categoryAdd(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'unique:categories'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        // Create brand
        $category = Category::create([
            'name' => $request->name,
            'category_status' => 1
        ]); 

        return 'success';
    }

    public function Edit($id){
        $brand = Category::find($id);
        echo $brand->name;
    }

    public function categoryEdit(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'unique:categories'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $data = [
            'name' => $request->name
        ];

        Category::where('id', '=', $id)->update($data);

        echo 'success';
    }
}
