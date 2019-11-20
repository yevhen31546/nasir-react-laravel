<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
class AuthController_ extends BaseController{
    public function postLogin(Request $request){
        
        $data = array('email'=>'a@a.a','password'=>'a');
        //return Helper::getBody('api');
    }
}

