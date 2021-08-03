<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            $project=Project::all();
            return view('admin.projects.files',['projects' => $project]);
        }else{
            return view('survey-panel-member.account-login');
        }
    }
    public function getFiles(){
        $file=File::with(['Project'])->get();
        return response()->json(['files' => $file], 200);
    }
    public function saveFile(Request $request){

        $file=$request->file('file');
        $filename =time().$file->getClientOriginalName();
        $file->move(public_path('uploads\projectFiles'),$filename);

        $file=new File();
        $file->project_id=$request->input('project');
        $file->file=$filename;
        try{
            $file->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['file' => "ok"], 201);
    }
    public function show($id)
    {
        $file=File::find($id);
        if(!$file){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['file'=>$file]);

    }
    public function destroy($id)
    {
        $file= File::find($id);
        if(!$file){
            return response()->json(['message'=>'Invalid category'],404);
        }
        if(file_exists(public_path('uploads/projectFiles/'.$file->file))){
            unlink(public_path('uploads/projectFiles/'.$file->file));
        }else{
            return response()->json(['videos' => 'File does not Deleted'], 200);
        }

        $file->delete();
        return response()->json(['message'=>'Data deleted'],200);

    }
    public function readFile($id){
        $file=File::find($id);
        $fileName=$file->file;
        $path=public_path('uploads\projectFiles/'.$fileName);
        if (blank($fileName)){

            return back()->with('warning','No Contract uploaded!');
        }else{
            return response()->file($path);

        }

    }
}
