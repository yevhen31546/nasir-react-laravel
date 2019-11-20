<?php

namespace App\Http\Controllers;
use \App\Helper\Helper as Helper;
use Illuminate\Http\Request;

class IdentificationController extends Controller
{
    
    
    public function add(Request $request){
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data,'addIdentification','post',$data,$token);
    }
    
    public function update(Request $request){
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data,'updateIdentification','post',$data,$token);
    }
    
    public function delete(Request $request,$id){
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data,'deleteIdentification','post',$data,$token);
    }
    
    public function driverById($id,Request $request){
         $token = $request->session()->get('token');
         $driver =  Helper::getBody($request,"driverById/$id",'get',$id,$token);
         //return $driver;
         $driver = json_decode($driver,true);
         
         return \View::make('admin.driver',array('driver'=>$driver['content']));
    }
}
