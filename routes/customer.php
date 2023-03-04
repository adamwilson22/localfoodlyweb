<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Vendor\ProductController;


Route::group(['namespace' => 'Api\V1', 'middleware'=>'localization'], function () {


    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::post('sign-up', 'CustomerAuthController@register');
        Route::post('login', 'CustomerAuthController@login');
        Route::post('verify-phone', 'CustomerAuthController@verify_phone');

        Route::post('check-email', 'CustomerAuthController@check_email');
        Route::post('verify-email', 'CustomerAuthController@verify_email');

        Route::post('forgot-password', 'PasswordResetController@reset_password_request');
        Route::post('verify-token', 'PasswordResetController@verify_token');
        Route::put('reset-password', 'PasswordResetController@reset_password_submit');

        Route::group(['prefix' => 'delivery-man'], function () {
            Route::post('login', 'DeliveryManLoginController@login');
            Route::post('forgot-password', 'DMPasswordResetController@reset_password_request');
            Route::post('verify-token', 'DMPasswordResetController@verify_token');
            Route::put('reset-password', 'DMPasswordResetController@reset_password_submit');
        });

        

        //social login(up comming)
        // Route::post('social-login', 'SocialAuthController@social_login');
        // Route::post('social-register', 'SocialAuthController@social_register');
    });

});
Route::get('/ctest',function (){
    dd('Hello tester');
});


