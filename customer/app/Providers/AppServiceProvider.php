<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Helper\Helper as Helper;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $c['username'] = 'admin@weekab.com';
        $c['password'] = '123Weekab123!';
        $config = helper::getBodyNoToken(array(),'getAllConfig','post',$c);
        $response_json = json_decode($config,true);
        if(array_key_exists('content',$response_json)){
            $parametres = $response_json['content'];
        }
        
        //var_dump($response_json);die();
        foreach ($parametres as $para){
            if($para['nom']=='mail'){
                //config(['mail'=> array_merge(config('mail'), json_decode($para->value,true))]);
            }
            if($para['nom']=='services'){
                config(['services'=> array_merge(config('services'), json_decode($para['value'],true))]);
            }
        }
        //var_dump(config('services'));
    }
}
