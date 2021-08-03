<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            $cat=Category::all();
            return view('admin.projects.subcategories',['categories' => $cat]);
        }else{
            return view('survey-panel-member.account-login');
        }
    }
    public function getSubcategories(){
        $cat=Subcategory::with(['Category'])->get();
        return response()->json(['subcategories' => $cat], 200);
    }
    public function saveSubcategories(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|unique:categories'],
            [
                'name.required' => ' The Name field is required.',
                'name.min' => ' The Name must be at least 4 characters.',
                'name.unique' => ' The  Name must unique ,Find other Name.',
            ]);
        $cat=new Subcategory();
        $cat->category_id=$request->input('category');
        $cat->name=$request->input('name');
        try{
            $cat->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['subcategory' => "ok"], 201);
    }
    public function updateSubcategories(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|unique:categories'],
            [
                'name.required' => ' The Name field is required.',
                'name.min' => ' The Name must be at least 4 characters.',
                'name.unique' => ' There is no change you did  ,click cancel to leave.',
            ]);

        $cat = Subcategory::find($request->input('id'));
        if(!$cat){
            return response()->json(['message'=>'Invalid Category'],404);
        }
        $cat->name = $request->input('name');
        $cat->category_id = $request->input('category');
        try{
            $cat->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['subcategory' => $cat], 200);
    }
    public function show($id)
    {
        $cat=Subcategory::find($id);
        if(!$cat){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['subcategory'=>$cat]);

    }
    public function destroy($id)
    {
        $cat= Subcategory::find($id);
        if(!$cat){
            return response()->json(['message'=>'Invalid category'],404);
        }
        $cat->delete();
        return response()->json(['message'=>'Data deleted'],200);

    }
}
