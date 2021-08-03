<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            $cat=Category::all();
            $subcat=Subcategory::all();
            return view('admin.projects.projects',['categories' => $cat,'subcategories'=>$subcat]);
        }else{
            return view('survey-panel-member.account-login');
        }
    }
    public function getProjects(){
        $projects=Project::with(['Subcategory'=> function($query) {
            $query->with(['Category']);

        }])->get();
        return response()->json(['projects' => $projects], 200);
    }
    public function getSubcategory(Request $request){
        $cat=$request->category;
        $subcat=Subcategory::where('category_id','=',$cat)->get();
        return $subcat->toJson();

    }

    public function saveProject(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|unique:projects'],
            [
                'name.required' => ' The Name field is required.',
                'name.min' => ' The Name must be at least 4 characters.',
                'name.unique' => ' The  Name must unique ,Find other Name.',
            ]);
        $project=new Project();
        $project->name=$request->input('name');
        $project->code=$request->input('code');
        $project->client=$request->input('client');
        $project->cost=$request->input('cost');
        $project->objective=$request->input('objective');
        $project->size=$request->input('size');
        $project->subcategory_id=$request->input('subcategory');
        try{
            $project->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['project' => "ok"], 201);
    }
    public function updateProject(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4'],
            [
                'name.required' => ' The Name field is required.',
                'name.min' => ' The Name must be at least 4 characters.',
                'name.unique' => ' There is no change you did  ,click cancel to leave.',
            ]);

        $project = Project::find($request->input('id'));
        if(!$project){
            return response()->json(['message'=>'Invalid Category'],404);
        }
        $project->name=$request->input('name');
        $project->code=$request->input('code');
        $project->client=$request->input('client');
        $project->cost=$request->input('cost');
        $project->objective=$request->input('objective');
        $project->size=$request->input('size');
        $project->subcategory_id=$request->input('subcategory');
        try{
            $project->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['project' => $project], 200);
    }
    public function show($id)
    {
        $projects=Project::with(['Subcategory'])->where('id','=',$id)
            ->first();
        if(!$projects){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['project'=>$projects]);

    }
    public function destroy($id)
    {
        $cat= Project::find($id);
        if(!$cat){
            return response()->json(['message'=>'Invalid category'],404);
        }
        $cat->delete();
        return response()->json(['message'=>'Data deleted'],200);

    }
    public function projectDetail($id){
        $project=Project::with(['File'])->where('id','=',$id)->first();
        return view('admin.projects.projectDetail',['project' => $project]);
    }
}
