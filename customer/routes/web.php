<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test', 'UserController@test');

Route::get('login/facebook', 'UserController@redirectToFacebook');
Route::get('inscription/facebook', 'UserController@redirectToFacebook');
Route::get('auth/facebook/callback', 'UserController@handleFacebookCallback');

Route::get('login/google', 'UserController@redirectToGoogle');
Route::get('inscription/google', 'UserController@redirectToGoogle');
Route::get('auth/google/callback', 'UserController@handleGoogleCallback');


Route::post('/admin/login', 'admin\AuthController@postLogin');
Route::post('/user/login', 'admin\AuthController@postUserLogin');
Route::post('/inscription', 'UserController@inscriptionPost')->name('/inscription');
Route::post('/activation', 'UserController@activation');
Route::post('/sendSms', 'UserController@sendSms');
Route::post('/sendEmail', 'UserController@sendEmail');
Route::get('/activation_email/{email}/{code_activation}', 'UserController@activationEmail');
Route::get('/resetpassword_email/{email}/{code_activation}', 'UserController@resetpasswordEmail');
Route::post('/initialisation_password/', 'UserController@initialisationPassword');
Route::post('/changePassword/', 'UserController@changePassword');
Route::get('/resetpassword', function () {
    return view('portail.resetpassword');
})->name('/portail/resetpassword');

Route::post('/recaptcha', 'UserController@recaptcha');


Route::get('/politique', function () {
    return view('portail.politique');
})->name('/portail/politique');




Route::get('/', function () {
    return view('portail.index');
})->name('/portail/index');
Route::get('/course', 'RideController@course');




Route::get('/admin/login', function () {
    return view('admin.login');
})->name('/admin/login');


Route::group(['middleware' => ['isConnect']], function () {
        Route::get('/inscription', 'UserController@inscription');
        Route::get('/login', 'UserController@login')->name('/login');
        Route::get('/activation/{email}', function () {
            return view('portail.activation');
        });
        Route::get('/activation_login/{email}', function () {
            return view('portail.activation_login');
        });
        Route::get('/activation_login_email/{email}', function () {
            return view('portail.activation_login_email');
        });
});

Route::group(['middleware' => ['isAdmin']], function () {
      
});

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
    
    //les routes
    Route::get('/admin/rides', function () {
        return view('admin.rides');
    });
    
    Route::get('/admin/users', function () {
        return view('admin.users');
    });
    
    
    
    Route::get('/admin/getRides', 'RideController@rides');
    
    //les chauffeurs
    Route::get('/admin/drivers', function () {
        return view('admin.drivers');
    });
    Route::get('/admin/getDrivers', 'UserController@drivers');
    Route::post('/admin/driver/add', 'UserController@driverAdd');
    Route::post('/admin/driver/update', 'UserController@driverUpdate');
    Route::post('/admin/driver/updatePicture', 'UserController@driverUpdatePicture');
    Route::get('/admin/driver/{id}', 'UserController@driverById');
    
    Route::get('/admin/getUsers', 'UserController@getUsers');
    Route::post('/admin/user/delete/{id}', 'UserController@deleteUser');

    Route::get('/adresses_user_by_user', 'RideController@adressesUserByUser');     
    
    
    
    //Route::get('/admin/getDrivers', 'UserController@drivers');
    Route::post('/admin/identification/add', 'IdentificationController@add');
    Route::post('/admin/identification/update', 'IdentificationController@update');
    Route::post('/admin/identification/delete/{id}', 'IdentificationController@delete');
    //Route::get('/admin/driver/{id}', 'UserController@driverById');
    
    Route::post('/admin/assurance/update', 'UserController@updateAssurance');
    
    Route::post('/admin/gerant/add', 'GerantController@add');
    Route::post('/admin/gerant/delete/{id}', 'GerantController@delete');
    
    
    Route::post('/admin/car/add', 'CarController@add');
    Route::post('/admin/car/update', 'CarController@update');
    Route::post('/admin/car/delete/{id}', 'CarController@delete');
    
    
    //Profile
    Route::get('/admin/profile', 'UserController@profile');
    Route::post('/admin/updateProfile', 'UserController@updateProfile');
    Route::post('/admin/updatePassword', 'UserController@updatePassword');
    
    //gestion de prix 
    Route::get('/admin/prix', 'RideController@prix');
    Route::post('/admin/coef/update', 'RideController@updateCoef');
    Route::post('/admin/coef/simulation', 'RideController@simulation');
    Route::get('/admin/simulation', function () {
        return view('admin.simulation');
    });
    
    

});


Route::group(['middleware' => ['isUser']], function () {
     //Route::post('/course_1', 'RideController@course_1'); 
});
Route::post('/course_1', 'RideController@course_1'); 
Route::group(['middleware' => ['isUser']], function () {
     
     Route::get('/signout', 'UserController@signout'); 
     Route::get('/reservations', 'RideController@reservations'); 
     /*Route::get('/reservations', function () {
        return view('portail.reservations');
    })->name('/reservations');*/
    Route::get('/adresses', function () {
        return view('portail.adresses');
    })->name('/adresses');
    Route::get('/profile', function () {
        return view('portail.profile');
    })->name('/profile');
    Route::post('/reservations_user', 'RideController@reservations_user'); 
    Route::post('/adresses_user', 'RideController@adresses_user'); 
    Route::post('/adresse/delete', 'UserController@deleteAdresse');
    Route::post('/adresse/add', 'UserController@addAdresse');
    Route::get('/rides/{id}', 'RideController@ride');
});

Route::group(['middleware' => ['isUser','isCourse']], function () {
     Route::get('/infocourse', function () {
        return view('portail.infocourse');
    })->name('/infocourse');
    
    Route::get('/reservation', 'RideController@reservation');
    
    /*Route::get('/reservation', function () {
        return view('portail.reservation');
    })->name('/reservation');*/
    
    Route::post('/reservation/paiement', 'RideController@paiment'); 
    Route::get('/reservation/invoice', 'RideController@invoice'); 
    Route::get('/reservation/facturation', function () {
        return view('portail.facture');
    });
    
    Route::post('checkCard', 'RideController@checkCard');
    
    
});
