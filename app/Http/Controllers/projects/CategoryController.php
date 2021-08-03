<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return view('admin.projects.categories');
    }else{
            return view('survey-panel-member.account-login');
        }
    }
    public function getCategories(){
        $cat=Category::all();
        return response()->json(['categories' => $cat], 200);
    }
    public function saveCategories(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|unique:categories'],
            [
                'name.required' => ' The Name field is required.',
                'name.min' => ' The Name must be at least 4 characters.',
                'name.unique' => ' The  Name must unique ,Find other Name.',
            ]);
        $cat=new Category();
        $cat->name=$request->input('name');
        try{
            $cat->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['category' => "ok"], 201);
    }
    public function updateCategories(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|unique:categories'],
            [
                'name.required' => ' The Name field is required.',
                'name.min' => ' The Name must be at least 4 characters.',
                'name.unique' => ' There is no change you did  ,click cancel to leave.',
            ]);

        $cat = Category::find($request->input('id'));
        if(!$cat){
            return response()->json(['message'=>'Invalid Category'],404);
        }
        $cat->name = $request->input('name');
        try{
            $cat->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['category' => $cat], 200);
    }
    public function show($id)
    {
        $cat=Category::find($id);
        if(!$cat){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['category'=>$cat]);

    }
    public function destroy($id)
    {
        $cat= Category::find($id);
        if(!$cat){
            return response()->json(['message'=>'Invalid category'],404);
        }
        $cat->delete();
        return response()->json(['message'=>'Data deleted'],200);

    }

}
