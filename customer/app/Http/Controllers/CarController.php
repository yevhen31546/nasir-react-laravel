<?php

namespace App\Http\Controllers;
use \App\Helper\Helper as Helper;
use Illuminate\Http\Request;

class CarController extends Controller
{
    
    
    public function add(Request $request){
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data,'addCar','post',$data,$token);
    }
    
    public function update(Request $request){
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data,'updateCar','post',$data,$token);
    }
    

    
    public function delete(Request $request,$id){
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data,'deleteCar','post',$data,$token);
    }
    

}
