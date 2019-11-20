<?php



namespace App\Helper;



use GuzzleHttp\Client;



class Helper {



    

    public static function sendPicture($request, $url, $action, $datafield = null, $token = null) {

        //$client_ppm = new Client();

        //return $datafield;

        $url_ = \Config::get('globals.url_api') . $url;

        $client = new Client([

                // Base URI is used with relative requests

                'base_uri' => $url_,

                'timeout' => 300.0,

                'headers' => ['Content-Type' => 'application/json', "Accept" => "application/json", 'Authorization' => "Bearer " . $token, 'from' => 'portail'],

                'http_errors' => false,

                'verify' => false,

                'form_params' => $datafield

            ]);

        

        $res = $client->request($action, $url_);

        return $res->getBody();

    }

    

    public static function getBodyNoToken($request, $url, $action, $datafield = null, $token = null) {

        $client_ppm = new Client();

        $url_ = \Config::get('globals.url_api') . $url;

        $result = $client_ppm->post($url_, [

                'form_params' => $datafield

            ]);

        $body = json_decode($result->getBody());

        return json_encode($body);

        

    }

    public static function getBody($request, $url, $action, $datafield = null, $token = null) {

        $client_ppm = new Client();

        $url_ = \Config::get('globals.url_api') . $url;

        //$urls_ = \Config::get('globals.urls_api') . $url;

        //return $datafield;

        if ($url == 'login') {

            //return $url_;

            $result = $client_ppm->post($url_, [

                'form_params' => $datafield

            ]);

            $body = json_decode($result->getBody());

            //return $body->role;

            if ($body->code == 200) {

                $request->session()->put('token', $body->token);

                $request->session()->put('role', $body->role);

                $request->session()->put('code', $body->code);

                $request->session()->put('nom', $body->content->nom);

                $request->session()->put('prenom', $body->content->prenom);

                $request->session()->put('currentUser', $body->content);

            }

            return json_encode($body);

        }



        if ($url == 'userLogin' || $url=='loginSocial' ||$url == 'loginFacebook' || $url == 'loginGoogle') {

            //return $url_;

            $result = $client_ppm->post($url_, [

                'form_params' => $datafield

            ]);

            $body = json_decode($result->getBody());

            //var_dump($body);die();

            if ($body->code == 200) {

                $request->session()->put('token_user', $body->token);

                $request->session()->put('role_user', $body->role);

                $request->session()->put('code_user', $body->code);

                $request->session()->put('nom_user', $body->content->nom);

                $request->session()->put('prenom_user', $body->content->prenom);

                $request->session()->put('current_user', $body->content);

            }

            return json_encode($body);

        }



        if ($url == 'inscription' || $url == 'activation' || $url == 'activation_email' || $url=='resetpassword_email') {

            //return $datafield;

            $client = new Client([

                // Base URI is used with relative requests

                'base_uri' => $url_,

                'timeout' => 300.0,

                'headers' => ['Content-Type' => 'application/json', "Accept" => "application/json", 'from' => 'portail'],

                'http_errors' => false,

                'verify' => false,

                'query' => $datafield

            ]);

            

            

                $res = $client->request($action, $url_);

                $body = json_decode($res->getBody());

                return $res->getBody();

            

            

        }

        //return $datafield;

        $client = new Client([

            // Base URI is used with relative requests

            'base_uri' => $url_,

            'timeout' => 300.0,

            'headers' => ['Content-Type' => 'application/json', "Accept" => "application/json", 'Authorization' => "Bearer " . $token, 'from' => 'portail'],

            'http_errors' => false,

            'verify' => false,

            'query' => $datafield,

        ]);



        $res = $client->request($action, $url_);



        $res_json = json_decode($res->getBody());



        return $res->getBody();

    }



}

