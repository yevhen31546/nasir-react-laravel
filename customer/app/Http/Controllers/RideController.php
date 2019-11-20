<?php

namespace App\Http\Controllers;
use \App\Helper\Helper as Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RideController extends Controller
{
    public function rides(Request $request){
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //return \View::make('admin.login');
        //return $data;
        //var_dump($request->query->all());
        $token = $request->session()->get('token');
        return Helper::getBody($request,'rides','get',$data,$token);
    }
    
    public function reservation(Request $request){
        $data = $request->all();
        $data['id_ride'] = $token = $request->session()->get('id_ride');;
        $data['state'] = '2';
        $token = $request->session()->get('token_user');
        $response =  Helper::getBody($request,'changeState','post',$data,$token);
        $response_js = json_decode($response,true);
        //return $response_js;
        return \View::make('portail.reservation');
    }
    public function reservations(Request $request){
        setlocale(LC_TIME, "fr_FR"); 
        $data = $request->all();
        $token = $request->session()->get('token_user');
        $rides = Helper::getBody($request,'reservations','post',$data,$token);
        $rides_js = json_decode($rides,true);
        $rides_an = $rides_ef = $rides_ec = array();
        foreach ($rides_js as $value) {
            $time = strtotime($value['date_debut']);
            $ride['id_ride'] = $value['id_ride'];
            $ride['date_debut'] = date('d F Y',$time);
            $ride['time_debut'] = date('H:i',$time);
            $ride['lieu_depart'] = $value['lieu_depart'];
            $ride['lagitude_depart'] = $value['lagitude_depart'];
            $ride['longitude_depart'] = $value['longitude_depart'];
            $ride['lieu_arrive'] = $value['lieu_arrive'];
            $ride['lagitude_arrive'] = $value['lagitude_arrive'];
            $ride['longitude_arrive'] = $value['longitude_arrive'];
            $ride['distance'] = $value['distance'];
            $ride['duration'] = $value['duration'];
            $ride['prix_ht'] = $value['prix_ht'];
            if($value['status']=='21'){
               array_push($rides_an, $ride); 
            }else if($value['status']=='9'){
               array_push($rides_ef, $ride); 
            }else{
               array_push($rides_ec, $ride); 
            }
            
            
        }
        //var_dump($rides_ec);die();
        return \View::make('portail.reservations', array('rides_an' => $rides_an,'rides_ef' => $rides_ef,'rides_ec' => $rides_ec));
    }
    public function reservations_user(Request $request){
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //return \View::make('admin.login');
        //return $data;
        //var_dump($request->query->all());
        $token = $request->session()->get('token_user');
        return Helper::getBody($request,'reservations','post',$data,$token);
    }
    
    public function adresses_user(Request $request){
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //return \View::make('admin.login');
        //return $data;
        //var_dump($request->query->all());
        $token = $request->session()->get('token_user');
        return Helper::getBody($request,'getAddresses','post',$data,$token);
    }
    
    public function adressesUserByUser(Request $request){
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //return \View::make('admin.login');
        //return $data;
        //var_dump($request->query->all());
        $token = $request->session()->get('token');
        return Helper::getBody($request,'getAddressesByUser','get',$data,$token);
    }
    
    
    
    
    public function course(Request $request){
        return \View::make('portail.course');
    }
    
    public function course_1(Request $request){
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        $token = $request->session()->get('token_user');
        //return $token;
        $response =  Helper::getBody($request,'saveRide','post',$data,$token);
        $response_json = json_decode($response,true);
        if(isset($response_json['code']) && $response_json['code']=='200'){
            $data = $response_json['content'];
            $request->session()->put('distance', $data['distance']);
            $request->session()->put('id_ride', $data['id_ride']);
            $request->session()->put('distance_value', $data['distance_value']);
            $request->session()->put('timing', $data['duration']);
            $request->session()->put('timing_value', $data['duration_value']);
            $request->session()->put('prix_ride', $data['prix_ttc']);
            $request->session()->put('statut_course', "ok");
            $request->session()->put('lieu_arrive', $data['lieu_arrive']);
            $request->session()->put('lieu_arrive_lat', $data['lagitude_arrive']);
            $request->session()->put('lieu_arrive_let', $data['longitude_arrive']);
            $request->session()->put('lieu_depart', $data['lieu_depart']);
            $request->session()->put('lieu_depart_lat', $data['lagitude_depart']);
            $request->session()->put('lieu_depart_let', $data['longitude_depart']);
            $request->session()->put('reservation', $data['type']);
            $time = strtotime($data['date_debut']);
            $date_depart = date('Y-m-d',$time);
            $time_depart = date('H:i',$time);
            $request->session()->put('depart_date', $date_depart);
            $request->session()->put('depart_time', $time_depart);
            
            return $response;
        }
        return $response;
        //var_dump(redirect()->back());
        //return redirect()->back();
        //return \View::make('admin.login');
        if(isset($data['reservation'])&& $data['reservation']=='avance'){
            $time = strtotime($data['depart_date']);
            $data['date'] = $data['depart_date'];
            $data['type'] = 1;
            $date_depart = date('Y-m-d',$time);
            $time_depart = date('H:i',$time);
            $request->session()->put('depart_date', $date_depart);
            $request->session()->put('depart_time', $time_depart);
            $request->session()->put('type', '1');
            //return  $time_depart;
        }else{
            //$time = strtotime($data['depart_date']);
            $date_depart = date('Y-m-d');
            $time_depart = date('H:i');
            $data['date'] = $date_depart.' '.$time_depart;
            $data['type'] = 0;
            $request->session()->put('depart_date', $date_depart);
            $request->session()->put('depart_time', $time_depart);
            $request->session()->put('type', '0');
            //return $time_depart;
        }
        $response =  Helper::getBodyNoToken($request,'getDistance','post',$data);
        $response_json = json_decode($response,true);
        //return $response_json;
        if(isset($response_json['status']) && $response_json['status']=='OK'){
            //var_dump($response_json['distance']['text']);
            //return $response_json;
            $request->session()->put('distance', $response_json['distance']['text']);
            $request->session()->put('distance_value', $response_json['distance']['value']);
            $request->session()->put('timing', $response_json['duration']['text']);
            $request->session()->put('timing_value', $response_json['duration']['value']);
            $request->session()->put('prix_ride', $response_json['prix']);
            $request->session()->put('statut_course', "ok");
        }
        //return '';
        $request->session()->put('lieu_arrive', $data['lieu_arrive']);
        $request->session()->put('lieu_arrive_lat', $data['lieu_arrive_lat']);
        $request->session()->put('lieu_arrive_let', $data['lieu_arrive_let']);
        $request->session()->put('lieu_depart', $data['lieu_depart']);
        $request->session()->put('lieu_depart_lat', $data['lieu_depart_lat']);
        $request->session()->put('lieu_depart_let', $data['lieu_depart_let']);
        $request->session()->put('reservation', $data['reservation']);
        
        
        //$request->session()->put('prix', "56");
        if($request->session()->get('statut_course')=="ok"){
            //return redirect()->intended('/infocourse');
            $data['statut_course'] = "ok";
            $data['statut_course'] = "ok";
            $data['statut_course'] = "ok";
            $data['statut_course'] = "ok";
            $data['statut_course'] = "ok";
            $data['statut_course'] = "ok";
            $data['statut_course'] = "ok";
            $data['statut_course'] = "ok";
             return $data;
        }
        //return $data;
        //var_dump($request->query->all());
        //$token = $request->session()->get('token');
        //return Helper::getBody($request,'rides','get',$data,$token);
    }
    
    public function paiment(Request $request){
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        $token = $request->session()->get('token_user');
        //return $token;
        $response =  Helper::getBody($request,'paiment','post',$data,$token);
        $response_json = json_decode($response);
        if($response_json->code==200){
            //return \View::make('portail.facture');
        }
        return $response;
    }
    
    public function updateCoef(Request $request){
        $data = $request->all();
        $token = $request->session()->get('token');
        //return $token;
        $response =  Helper::getBody($request,'updateCoef','post',$data,$token);
        $response_json = json_decode($response);
        
        return $response;
    }
    
    public function prix(Request $request){
        $data = $request->all();
        $token = $request->session()->get('token');
        $response =  Helper::getBody($request,'getAllCoef','post',$data,$token);
        $response_json = json_decode($response,true);
        $response_param =  Helper::getBody($request,'getParams','post',$data,$token);
        $response_param_json = json_decode($response_param,true);
        $params = [];
        foreach ($response_param_json as  $value) {
            if($value['param'] == 'prise_charge'){
                $params['prise_charge'] = (float)$value['value'];
            }
            if($value['param'] == 'prix_km'){
                $params['prix_km'] = (float)$value['value'];
            }
            if($value['param'] == 'prix_min'){
                $params['prix_min'] = (float)$value['value'];
            }
        }

        return \View::make('admin.prix', array('coef' => $response_json,'params' => $params));
    }
    
    public function ride($id,Request $request){
        $data['id_ride'] = $id;
        $token = $request->session()->get('token_user');
        //return $token;
        $response =  Helper::getBody($request,'getRide','post',$data,$token);
        $response_json = json_decode($response,true);
        return \View::make('portail.ride', array('ride' => $response_json));
    }
    
    public function checkCard(Request $request){
        $data = $request->all();
        $token = $request->session()->get('token_user');
        $data['id_ride'] = $request->session()->get('id_ride');
        //return $token;
        $response =  Helper::getBody($request,'checkCard','post',$data,$token);
        $response_json = json_decode($response);
        
        return $response;
    }
    
    public function simulation(Request $request){
        $data = $request->all();
        $token = $request->session()->get('token');
        //return $token;
        $response =  Helper::getBody($request,'simulation','post',$data,$token);
        //$response_json = json_decode($response);
        
        return $response;
    }
}
