<?php

namespace App\Http\Controllers\admin;

use \App\Helper\Helper as Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AuthController extends Controller
{
    public function postLogin(Request $request){
        //return $request;
        $data = array('email'=>$request->email,'password'=>$request->password);
        
        return Helper::getBody($request,'login','post',$data);
    }
    
    public function postUserLogin(Request $request){
        
        $request->session()->forget('exist_inscription_email');
        $request->session()->forget('nom_inscription');
        $request->session()->forget('type_inscription');
        $request->session()->forget('email_inscription');
        $request->session()->forget('non_activation_sms');
        $request->session()->forget('non_activation_sms_email');
        $request->session()->forget('non_activation_email');
        $request->session()->forget('exist_activation_email');
        $data = array('email'=>$request->email,'password'=>$request->password);
        
        $response =  Helper::getBody($request,'userLogin','post',$data);
        $body = json_decode($response);
        
        if($body->code==202){
            
            $request->session()->put('non_activation_sms', 'non_activation_sms');
            $request->session()->put('nom_inscription', $body->content->nom);
            $request->session()->put('telephone_inscription', $body->content->telephone);
            $request->session()->put('email_inscription', $body->content->email);
        }
        if($body->code==204){
            $request->session()->put('non_activation_sms_email', 'non_activation_sms_email');
            $request->session()->put('nom_inscription', $body->content->nom);
            $request->session()->put('telephone_inscription', $body->content->telephone);
            $request->session()->put('email_inscription', $body->content->email);
        }
        if($body->code==206){
            $request->session()->put('non_activation_email', 'non_activation_email');
            $request->session()->put('nom_inscription', $body->content->nom);
            $request->session()->put('email_inscription', $body->content->email);
        }
        return $response;
        
    }
    
    public function login(Request $request){
        $data = array('email'=>$request->email,'password'=>$request->password);
        
        return Helper::getBody($request,'login','post',$data);
    }
    
    public function loginFacebook(Request $request){
        //var_dump($request);exit();
        $data = array('email'=>$request->email,'facebook_id'=>$request->id);
        
        return Helper::getBody($request,'loginFacebook','post',$data);
    }
    
    public function loginGoogle(Request $request){
        $data = array('email'=>$request->email,'password'=>$request->password);
        
        return Helper::getBody($request,'loginGoogle','post',$data);
    }
}
