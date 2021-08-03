<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DeviceTrace;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            return view('admin.devices.allDevice');
    }
    public function getDevices(){
        $device=Device::with(['Member'])->get();

        return response()->json(['devices' => $device], 200);
    }
    public function availableDevice(){
        return view('admin.devices.availableDevices');
    }

    public function getAvailableDevices(){
        $device=Device::where('status','=',1)->get();

        return response()->json(['devices' => $device], 200);
    }
    public function unavailableDevice(){
        return view('admin.devices.unavailableDevice');
    }

    public function getUnavailableDevices(){
        $device=Device::with(['Member'])->where('status','=',0)->get();

        return response()->json(['devices' => $device], 200);
    }
    public function historical(){
        return view('admin.devices.historical');
    }
    public function getHistorical(){
        $histo=DeviceTrace::with(['Device','Member'])->get();
        return response()->json(['devices' => $histo], 200);
    }

    public function deviceDetail($id){

        $info=Device::find($id);
        $histo=DeviceTrace::with(['Member','Device'])->where('device_id','=',$id)->get();

        return view('admin.devices.deviceDetail',['info'=>$info,'historicals'=>$histo]);
    }
    public function showDevice($id){

        $dev=Device::find($id);
        return response()->json(['device' => $dev], 201);
    }

    public function releaseDevice($id){
        $device=Device::find($id);
        if ($device){
            $device->status=1;
            $device->member_id=null;
            $device->received_date=null;
            $device->save();
            $trace=DeviceTrace::where('device_id','=',$id)
                ->orderBy('id', 'DESC')
                ->first();
            if ($trace){
                $trace->returned_date=Carbon::now();
                $trace->save();
                return response()->json(['device' => "ok"], 201);
            }
        }
    }



    public function saveDevices(Request $request){
        $this->validate($request, [
            'device_serialNo' => 'required|unique:devices'],
            [
                'name.required' => ' The Name field is required.',
                'name.unique' => ' The  Name must unique ,Find other Name.',
            ]);

        $device=new Device();
        $device->device_name=$request->input('device_name');
        $device->device_brand=$request->input('device_brand');
        $device->device_model=$request->input('device_model');
        $device->device_serialNo=$request->input('device_serialNo');
        $device->device_imei1=$request->input('imei1');
        $device->device_imei2=$request->input('imei2');
        $device->save();
        return response()->json(['device' => "ok"], 201);

    }
    public function assignDevices(Request $request){
        $device=Device::find($request['device_name']);
        if ($device){
            $device->member_id=$request['member'];
            $device->status=0;
            $device->received_date=Carbon::now();
            $device->save();
            $trace=new DeviceTrace();
            $trace->member_id=$request['member'];
            $trace->device_id=$request['device_name'];
            $trace->received_date=Carbon::now();
            $trace->status=0;
            $trace->save();
            return response()->json(['device' => "ok"], 201);
        }
    }
}
