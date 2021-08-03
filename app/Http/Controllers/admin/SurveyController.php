<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AssignedSurvey;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return view('admin.survey.adminSurvey');
        }else{
            return view('app.login');
        }
    }
    public function sendSurvey(){
        if (Auth::check()){
            return view('admin.survey.sendSurvey');
        }else{
            return view('app.login');
        }
    }
    public function getMemberSurvey(){
        $member=User::whereHas(
            'roles', function($q){
            $q->where('name', 'member');
        }
        )->get();
//        $member=User::all();
        return response()->json(['members' => $member], 200);
    }

    public function getSurvey(){
        $survey=Survey::all();
        return response()->json(['surveys' => $survey], 200);
    }
    public function saveSurvey(Request $request){

        $survey=new Survey();
        $survey->name=$request['name'];
        $survey->link=$request['link'];
        $survey->objective=$request['objective'];
        $survey->end_date=$request['end_date'];
        $survey->start_date=$request['start_date'];
        $survey->save();
        return response()->json(['survey' => "ok"], 200);
    }
    public function showSurvey($id){
        $survey=Survey::find($id);
        return response()->json(['survey' => $survey], 200);
    }
    public function updateSurvey(Request $request){
        $survey=Survey::find($request['id']);
        if (!$survey){
            return response()->json(['survey' => "not"], 200);
        }
        $survey->name=$request['name'];
        $survey->objective=$request['objective'];
        $survey->link=$request['link'];
        $survey->start_date=$request['start_date'];
        $survey->end_date=$request['end_date'];
        try{
            $survey->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['survey' => "ok"], 200);
    }
    public function closeSurvey($id){
        $survey=Survey::find($id);
        if ($survey){
            $survey->status=false;
            $survey->save();
            return response()->json(['survey' => "ok"], 200);
        }
        return response()->json(['survey' => "not"], 500);
    }
    public function activateSurvey($id){
        $survey=Survey::find($id);
        if ($survey){
            $survey->status=true;
            $survey->save();
            return response()->json(['survey' => "ok"], 200);
        }
        return response()->json(['survey' => "not"], 500);
    }
    public function deleteSurvey($id){
        $survey=Survey::find($id);
        if ($survey){
            $survey->delete();
            return response()->json(['survey' => "ok"], 200);
        }
        return response()->json(['survey' => "not"], 500);
    }
    public function surveyDetail($id){
        $survey=Survey::find($id);
        if ($survey){
            return view('admin.survey.surveyAttends',['survey'=>$survey]);
        }
        else{
            return view('admin.survey.adminSurvey');
        }
    }
    public function getSurveyAttendance($id){
        $survey=AssignedSurvey::with(['Survey','User'])->where('survey_id',$id)->get();
        return response()->json(['surveys' => $survey], 200);
    }




    public function sendSurveySMS(Request $request){
        $users=$request['users'];

        foreach ($users as $id){
            $check=AssignedSurvey::where('user_id',$id)->where('survey_id',$request['survey'])->first();
            if (!$check){
                $survey=new AssignedSurvey();
                $survey->user_id=$id;
                $survey->survey_id=$request['survey'];
                $survey->save();
            }

        }
        return response()->json(['survey' =>'ok','data'=>$users], 200);










        $data = array(
                "sender"=>'Intouch',
                "recipients"=>"0722404528",
                "message"=>"hello world",);
        $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
        $data = http_build_query($data);
        $username="tuyandre20";
        $password="kamana1234567";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return response()->json(['result' => $result,'httpcode'=>$httpcode], 200);

    }
    public function sendEmail(Request $request){

    }
}
