<?php

namespace App\Http\Controllers;

use \App\Helper\Helper as Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class userController extends Controller {

    public function drivers(Request $request) {
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return Helper::getBody($data, 'drivers', 'get', $data, $token);
    }

    public function getUsers(Request $request) {
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return Helper::getBody($data, 'adminUsers', 'get', $data, $token);
    }

    public function adminDeleteUser(Request $request) {
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return Helper::getBody($data, 'adminDeleteUser', 'get', $data, $token);
    }

    public function deleteUser(Request $request, $id) {
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data, 'adminDeleteUser', 'post', $data, $token);
    }

    public function deleteAdresse(Request $request) {
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token_user');
        return helper::getBody($data, 'deleteAddresse', 'post', $data, $token);
    }

    public function addAdresse(Request $request) {
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token_user');
        return helper::getBody($data, 'insertAddresse', 'post', $data, $token);
    }

    public function driverAdd(Request $request) {
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data, 'addDriver', 'post', $data, $token);
    }

    public function driverUpdate(Request $request) {
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data, 'updateDriver', 'post', $data, $token);
    }

    public function driverUpdatePicture(Request $request) {
        $data = $request->all();
        //$token = $request->session()->get('token_user');
        //return $data;
        $token = $request->session()->get('token');
        return helper::sendPicture($data, 'updateDriverPicture', 'post', $data, $token);
    }

    public function driverById($id, Request $request) {
        $token = $request->session()->get('token');
        $driver = Helper::getBody($request, "driverById/$id", 'get', $id, $token);
        $picture = \Config::get('globals.url_api') . '/media/images/drivers/' . $id . '/' . $id . '.png';
        //return $picture;
        //$file = 'http://www.domain.com/somefile.jpg';
        $file_headers = @get_headers($picture);
        //return $file_headers[0];
        if ((!$file_headers || $file_headers[0] == 'HTTP/1.0 404 Not Found') || (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found')) {
            $exists_picture = 'false';
        } else {
            $exists_picture = 'true';
        }
        //return $exists_picture;
        $driver = json_decode($driver, true);

        return \View::make('admin.driver', array('driver' => $driver['content'], 'exists_picture' => $exists_picture));
    }

    public function updateAssurance(Request $request) {
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        return helper::getBody($data, 'updateAssurance', 'post', $data, $token);
    }

    public function profile(Request $request) {
        //$token = $request->session()->get('token');
        //$driver =  Helper::getBody($request,"userById/$id",'get',$id,$token);
        //return $driver;
        //$driver = json_decode($driver,true);
        $currentUser = $request->session()->get('currentUser');
        $currentUser = json_decode(json_encode($currentUser), True);
        $currentUser['phone_valide'] = '';
        $currentUser['id_phone_valide'] = '';
        foreach ($currentUser['phones'] as $phone) {
            if ($phone['valide'] == 1) {
                $currentUser['phone_valide'] = $phone['numero'];
                break;
            }
        }
        //var_dump($currentUser['phones']);
        //return '';
        return \View::make('admin.profile', array('user' => $currentUser));
    }

    public function updatePassword(Request $request) {
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        $token = $request->session()->get('token');
        return Helper::getBody($data, 'updatePassword', 'post', $data, $token);
    }

    public function updateProfile(Request $request) {
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //return $data;
        $token = $request->session()->get('token');
        $response = Helper::getBody($data, 'updateProfile', 'post', $data, $token);
        $response_json = $res_json = json_decode($response);
        //return $response_json;
        if ($response_json->code == '200') {
            $request->session()->put('currentUser', $response_json->content);
            $request->session()->put('nom', $response_json->content->nom);
            $request->session()->put('prenom', $response_json->content->prenom);
        }
        return $response;
    }

    public function inscription(Request $request) {
        return \View::make('portail.inscription');
    }

    public function login(Request $request) {
        return \View::make('portail.login');
    }

    public function inscriptionPost(Request $request) {
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        
        $data = array('email' => $request->email,
            'password' => $request->password,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'id_social' => $request->id_social,
            'type' => $request->type,
            'pre' => $request->pre,
            'telephone' => $request->telephone);

        $request->session()->put('nom_insc', $request->nom);           
        $request->session()->put('prenom_insc', $request->prenom);
        $request->session()->put('email_insc', $request->email);
        $request->session()->put('pre_insc', $request->pre);
        $request->session()->put('telephone_insc', $request->telephone);
        $response =  Helper::getBody($request, 'inscription', 'post', $data);
        $body = json_decode($response);
        if($body->code==201){
            
            $request->session()->put('exist_inscription_email', 'exist_inscription_email');
            $request->session()->put('nom_inscription', $body->prenom);
            $request->session()->put('email_inscription', $body->email);
            if($body->type_inscription==1){
                $request->session()->put('type_inscription', 'facebook');
            }else if($body->type_inscription==2){ 
                $request->session()->put('type_inscription', 'google');
            }
            //return redirect('/login')->with($data);
            //return redirect()->guest('login')->with($data);
        }
        if($body->code==200){
            $request->session()->put('form_insc', 'true');
        }
        return $response;
        
    }
    public function activation(Request $request) {
        //var_dump($request->server()['QUERY_STRING']);
        $data = $request->all();
        //$token = $request->session()->get('token');
        $response = Helper::getBody($request, 'activation', 'post', $data);
        $body = json_decode($response);
        if ($body->code == 2000) {
            $request->session()->put('token_user', $body->token);
            $request->session()->put('role_user', $body->role);
            $request->session()->put('code_user', $body->code);
            $request->session()->put('nom_user', $body->content->nom);
            $request->session()->put('prenom_user', $body->content->prenom);
            $request->session()->put('current_user', $body->content);
        }
        return json_encode($body);
    }

    public function activationEmail(Request $request,$email,$code) {
        $data = $request->all();
        //$token = $request->session()->get('token');
        $data['email'] = $email;
        $data['code_activation'] = $code;
        //return $data;
        $response = Helper::getBody($request, 'activation_email', 'post', $data);
        $body = json_decode($response);
        if($body->code=='200'){
            
            $data = [
                    'exist_activation_email'=>'exist_activation_email',
                    'email_activaction'=>$body->content->email,
                    'nom_activaction'=>$body->content->nom,
                ];
            return redirect('/login')->with($data);
        }else if($body->code=='404'){
            return \View::make('portail.nonconfirmation', array('code' => '404'));
        }else{
            return \View::make('portail.alreadyconfirmation', array('code' => '404'));
        }
        
    }
    public function resetpasswordEmail(Request $request,$email,$code) {
        $data = $request->all();
        //$token = $request->session()->get('token');
        $data['email'] = $email;
        $data['code_activation'] = $code;
        //return $data;
        $response = Helper::getBody($request, 'resetpassword_email', 'post', $data);
        //return $response;
        $body = json_decode($response);
        if($body->code=='200'){
            return \View::make('portail.changePassword', array('code' => $code,'email'=>$email));
        }else if($body->code=='400'){
            return \View::make('portail.expired', array('code' => '404'));
        }else{
            return \View::make('portail.expired', array('code' => '404'));
        }
        
    }
    
    public function changePassword(Request $request){
        $data = $request->all();
        $response = Helper::getBody($request, 'changePassword', 'post', $data);
        return $response;
    }
    
    public function initialisationPassword(Request $request){
        $data = $request->all();
        $response = Helper::getBody($request, 'initialisationPassword', 'post', $data);
        $body = json_decode($response);
        if(isset($body->code)){
            return $response;
        }else{
            return [
                'code'=>'505'
            ];
        }
        
    }
    public function sendSms(Request $request){
        $data = $request->all();
        $response = Helper::getBody($request, 'sendSms', 'post', $data);
        $body = json_decode($response);
        if(isset($body->code)){
            $request->session()->put('pre_insc', $request->pre);
            $request->session()->put('telephone_insc', $request->telephone);
            return $response;
        }else{
            return [
                'code'=>'505'
            ];
        } 
    }
    
    public function sendEmail(Request $request){
        $data = $request->all();
        $response = Helper::getBody($request, 'sendEmail', 'post', $data);
        $body = json_decode($response);
        if(isset($body->code)){
            return $response;
        }else{
            return [
                'code'=>'505'
            ];
        }
        
    }

    public function signout(Request $request) {
        $data = $request->all();
        $token = $request->session()->get('token_user');
        $respone = (Helper::getBody($data, 'signout', 'post', $data, $token));
        $respone_json = json_decode($respone);
        //$request->session()->flush();
        //return $respone.$token;
        //return Helper::getBody($data,'signout','post',$data,$token);
        if ($respone_json->code == 200) {
            $request->session()->flush();
            return \View::make('portail.login');
        }
        return \View::make('portail.login');
    }

    public function test(Request $request) {
        $data = $request->all();
        $token = $request->session()->get('token_user');
        return Helper::getBody($data, 'test', 'get', $data, $token);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToFacebook() {
        /**
         * Use this if you want to do the redirect portion from your Lumen App.  You can also do this portion from your frontend app... for example you
         * could be using https://github.com/sahat/satellizer in angular for the redirect portion, and then have it CALLBACK to your lumen app.
         * In other words, this "redirectToProvider" method is optional on the backend (you can do it from your frontend)
         */
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return JsonResponse
     */
    public function handleFacebookCallback(Request $request) {
        $url_previous = url()->previous();
        $user_google = Socialite::driver('facebook')->stateless()->user();
        $user = [
            'token' => $user_google->token,
            'id' => $user_google->id,
            'type' => 'facebook',
        ];
        //$response = Helper::getBody($request, 'loginGoogle', 'post', $user_google->user);
        $response = Helper::getBody($request, 'loginSocial', 'post', $user);
        //return $response;
        $response = (json_decode($response, true));
        if ($response['code'] == '200') {
            return redirect('/course');
        }else if($response['code'] == '202'){
            return redirect('/activation/'.$user_google->user['email']);
        }else {
            $user['email'] = $user_google->user['email'];
            $user['id'] = $user_google->user['id'];
            $nom_complet = explode(' ', $user_google->user['name']);
            $user['prenom'] = $nom_complet[0];
            $user['nom'] = $nom_complet[1];
            return redirect('/inscription')->with(array('prenom' => $user['prenom'], 'nom' => $user['nom'], 'email' => $user['email'], 'id' => $user['id'], 'type' => 'facebook'));
        }

        //if($response)
        $response = (json_decode($response, true));
        return $response;
        //return $url_previous;
        if (strpos($url_previous, 'login') !== false || strpos($url_previous, 'signout') !== false) {
            $providerUser = Socialite::driver('facebook')->stateless()->user();
            $response = Helper::getBody($request, 'loginFacebook', 'post', $providerUser->user);
            //var_dump(json_decode($response, true));exit();
            //if($response)
            $response = (json_decode($response, true));
            //return $providerUser->user;exit();
            if ($response['code'] == '200') {
                return redirect('/course');
            } else {
                return redirect('/login')->with(array('erreur_facebook' => 'erreur_facebook'));
            }
        }
        if (strpos($url_previous, 'inscription') !== false) {
            $user_facebook = Socialite::driver('facebook')->stateless()->user();
            $user['email'] = $user_facebook->user['email'];
            $user['id'] = $user_facebook->user['id'];
            $nom_complet = explode(' ', $user_facebook->user['name']);
            $user['prenom'] = $nom_complet[0];
            $user['nom'] = $nom_complet[1];
            return redirect('/inscription')->with(array('prenom' => $user['prenom'], 'nom' => $user['nom'], 'email' => $user['email'], 'facebook_id' => $user['id']));
        }
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToGoogle() {
        /**
         * Use this if you want to do the redirect portion from your Lumen App.  You can also do this portion from your frontend app... for example you
         * could be using https://github.com/sahat/satellizer in angular for the redirect portion, and then have it CALLBACK to your lumen app.
         * In other words, this "redirectToProvider" method is optional on the backend (you can do it from your frontend)
         */
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return JsonResponse
     */
    public function handleGoogleCallback(Request $request) {
        $url_previous = url()->previous();
        $user_google = Socialite::driver('google')->stateless()->user();
        $user = [
            'token' => $user_google->token,
            'id' => $user_google->id,
            'type' => 'google',
        ];
        //$response = Helper::getBody($request, 'loginGoogle', 'post', $user_google->user);
        $response = Helper::getBody($request, 'loginSocial', 'post', $user);
        //return $response;
        $response = (json_decode($response, true));
        if ($response['code'] == '200') {
            return redirect('/course');
        }else if($response['code'] == '201'){
            if($response['type_inscription']=='0'){
                $res = [
                    'exist_simple'=>'exist_simple'
                ];
            }else if($response['type_inscription']=='1'){
                $res = [
                    'exist_facebook'=>'exist_facebook'
                ];
            }else if($response['type_inscription']=='2'){
                $res = [
                    'exist_google'=>'exist_google'
                ];
            }
            return redirect('/login')->with($res);
        }else if ($response['code'] == '202') {
            return redirect('/activation/'.$user_google->user['email']);
        }else {
            $user['email'] = $user_google->user['email'];
            $user['id'] = $user_google->user['id'];
            $nom_complet = explode(' ', $user_google->user['name']);
            $user['prenom'] = $nom_complet[0];
            $user['nom'] = $nom_complet[1];
            return redirect('/inscription')->with(array('prenom' => $user['prenom'], 'nom' => $user['nom'], 'email' => $user['email'], 'id' => $user['id'], 'type' => 'google'));
        }

        //if($response)
        $response = (json_decode($response, true));
        return $response;
        
    }

    public function recaptcha(Request $request) {
        $data = $request->all();
        $captcha = $data['token'];
        //return $captcha;
        if (!$captcha) {
            echo '<h2>Please check the the captcha form.</h2>';
            exit;
        }
        $secretKey = "6LehdbEUAAAAAOFKUVTcCjZZQtHjw338OegaSxsZ";
        $ip = $_SERVER['REMOTE_ADDR'];

        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $datas = array('secret' => $secretKey, 'response' => $captcha);

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($datas)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response, true);
        header('Content-type: application/json');
        if ($responseKeys["success"]) {
            echo json_encode(array('success' => 'true'));
        } else {
            echo json_encode(array('success' => 'false'));
        }
    }

}
