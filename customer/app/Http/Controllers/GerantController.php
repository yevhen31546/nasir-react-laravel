<?php

namespace App\Http\Controllers;
use \App\Helper\Helper as Helper;
use Illuminate\Http\Request;

class GerantController extends Controller
{
    
    
    public function add(Request $request){
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data,'addGerant','post',$data,$token);
    }
    

    
    public function delete(Request $request,$id){
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data,'deleteGerant','post',$data,$token);
    }
    

}
