<?php

use App\Http\Controllers\Customer\{
    CartController,
    LoginController,
    RestaurantController
};
use Illuminate\Support\Facades\Route;
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
// auth

Route::get('/', [LoginController::class, 'index'])->name('login.page');
Route::get('/signup', [LoginController::class, 'create'])->name('cutomers.signup');
Route::get('/otp', [LoginController::class, 'otp'])->name('customer.otp');
Route::post('/otp/verified', [LoginController::class, 'otpVerified'])->name('otp.verified');
Route::post('/loginSubmit', [LoginController::class, 'loginSubmit'])->name('login.submit');
Route::post('/signupFrom', [LoginController::class, 'signup'])->name('signup.page');
Route::post('/resend-otp', [LoginController::class, 'resendCustomerOtp'])->name('resend-otp');
// Route::post('/resend-otp', 'LoginController@resendCustomerOtp')->name('resend-otp');


Route::group(['prefix' => 'customer'], function () {
    Route::group(
        ['middleware' => ['user']],
        function () {
            Route::get('/restaurant', [RestaurantController::class, 'restaurantList'])->name('restaurant.list');
            
            Route::get('/editprofile', [RestaurantController::class, 'customerDetails'])->name('customer.details');
            Route::post('/updateprofile', [RestaurantController::class, 'updateProfile'])->name('profile.update');
            
            Route::post('/send-message', [RestaurantController::class, 'SendMessage'])->name('send.message');
            
            // Filter Data badges or Categories
            Route::get('/view/{id}/restaurant', [RestaurantController::class, 'restaurantView'])->name('restaurant.view');
            // Route::get('/view/{id}/restaurant/filter', [RestaurantController::class, 'filterCategory'])->name('foods.filter1');
            // Category Filteration
            Route::get('/view/restaurant', [RestaurantController::class, 'filterCategory'])->name('foods.filter1');

            Route::get('/view/{id}/restaurant/filterbadges', [RestaurantController::class, 'filterBadges'])->name('foods.filter2');

            
            Route::get('/view/{id}/restaurant', [RestaurantController::class, 'restaurantView'])->name('restaurant.view');
            Route::get('/view/{id}/restaurant-menu', [RestaurantController::class, 'restaurantMenu'])->name('restaurant.menu');
            Route::get('/view/{id}/food', [RestaurantController::class, 'foodView'])->name('food.view');
            Route::get('/follow', [RestaurantController::class, 'userFollow'])->name('user.follow');
            Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addtocart.food');
            Route::patch('update-cart', [CartController::class, 'update'])->name('updateCart.food');
            Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('removeCart.food');
            Route::post('order-food', [CartController::class, 'addOrder'])->name('order.food');
            Route::post('subscribe-food', [CartController::class, 'subscribe'])->name('subscribe.food');
            Route::get('Thank-order', [CartController::class, 'ThankOrder'])->name('thank.order');
            Route::get('/cart', [CartController::class, 'cart'])->name('cart.food');
            Route::get('/signout', [LoginController::class, 'signOut'])->name('sign.out');

            Route::post('review', [App\Http\Controllers\Vendor\ReviewController::class, 'addReview'])->name('review.food');

        }
    );
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('terms-and-conditions', 'HomeController@terms_and_conditions')->name('terms-and-conditions');
Route::get('about-us', 'HomeController@about_us')->name('about-us');
Route::get('contact-us', 'HomeController@contact_us')->name('contact-us');
Route::get('privacy-policy', 'HomeController@privacy_policy')->name('privacy-policy');
Route::post('newsletter/subscribe', 'NewsletterController@newsLetterSubscribe')->name('newsletter.subscribe');
Route::get('authentication-failed', function () {
    $errors = [];
    array_push($errors, ['code' => 'auth-001', 'message' => 'Unauthenticated.']);
    return response()->json([
        'errors' => $errors,
    ], 401);
})->name('authentication-failed');

Route::group(['prefix' => 'payment-mobile'], function () {
    Route::get('/', 'PaymentController@payment')->name('payment-mobile');
    Route::get('set-payment-method/{name}', 'PaymentController@set_payment_method')->name('set-payment-method');
});

// SSLCOMMERZ Start

Route::post('pay-ssl', 'SslCommerzPaymentController@index');
Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');
Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END

/*paypal*/
/*Route::get('/paypal', function (){return view('paypal-test');})->name('paypal');*/
Route::post('pay-paypal', 'PaypalPaymentController@payWithpaypal')->name('pay-paypal');
Route::get('paypal-status', 'PaypalPaymentController@getPaymentStatus')->name('paypal-status');
/*paypal*/


Route::get('pay-stripe', 'StripePaymentController@payment_process_3d')->name('pay-stripe');
Route::get('pay-stripe/success', 'StripePaymentController@success')->name('pay-stripe.success');
Route::get('pay-stripe/fail', 'StripePaymentController@fail')->name('pay-stripe.fail');

// Get Route For Show Payment Form
Route::get('paywithrazorpay', 'RazorPayController@payWithRazorpay')->name('paywithrazorpay');
Route::post('payment-razor/{order_id}', 'RazorPayController@payment')->name('payment-razor');

/*Route::fallback(function () {
return redirect('/admin/auth/login');
});*/

Route::get('payment-success', 'PaymentController@success')->name('payment-success');
Route::get('payment-fail', 'PaymentController@fail')->name('payment-fail');

//senang pay
Route::match(['get', 'post'], '/return-senang-pay', 'SenangPayController@return_senang_pay')->name('return-senang-pay');

// paymob
Route::post('/paymob-credit', 'PaymobController@credit')->name('paymob-credit');
Route::get('/paymob-callback', 'PaymobController@callback')->name('paymob-callback');

//paystack
Route::post('/paystack-pay', 'PaystackController@redirectToGateway')->name('paystack-pay');
Route::get('/paystack-callback', 'PaystackController@handleGatewayCallback')->name('paystack-callback');
Route::get('/paystack',function (){
    return view('paystack');
});


// The route that the button calls to initialize payment
Route::post('/flutterwave-pay','FlutterwaveController@initialize')->name('flutterwave_pay');
// The callback url after a payment
Route::get('/rave/callback', 'FlutterwaveController@callback')->name('flutterwave_callback');


// The callback url after a payment
Route::get('mercadopago/home', 'MercadoPagoController@index')->name('mercadopago.index');
Route::post('mercadopago/make-payment', 'MercadoPagoController@make_payment')->name('mercadopago.make_payment');
Route::get('mercadopago/get-user', 'MercadoPagoController@get_test_user')->name('mercadopago.get-user');

//paytabs
Route::any('/paytabs-payment', 'PaytabsController@payment')->name('paytabs-payment');
Route::any('/paytabs-response', 'PaytabsController@callback_response')->name('paytabs-response');

//bkash
Route::group(['prefix'=>'bkash'], function () {
    // Payment Routes for bKash
    Route::post('get-token', 'BkashPaymentController@getToken')->name('bkash-get-token');
    Route::post('create-payment', 'BkashPaymentController@createPayment')->name('bkash-create-payment');
    Route::post('execute-payment', 'BkashPaymentController@executePayment')->name('bkash-execute-payment');
    Route::get('query-payment', 'BkashPaymentController@queryPayment')->name('bkash-query-payment');
    Route::post('success', 'BkashPaymentController@bkashSuccess')->name('bkash-success');

});

// The callback url after a payment PAYTM
Route::get('paytm-payment', 'PaytmController@payment')->name('paytm-payment');
Route::any('paytm-response', 'PaytmController@callback')->name('paytm-response');

// The callback url after a payment LIQPAY
Route::get('liqpay-payment', 'LiqPayController@payment')->name('liqpay-payment');
Route::any('liqpay-callback', 'LiqPayController@callback')->name('liqpay-callback');

Route::get('wallet-payment','WalletPaymentController@make_payment')->name('wallet.payment');

Route::get('/test',function (){
    dd('Hello tester');
});

Route::get('authentication-failed', function () {
    $errors = [];
    array_push($errors, ['code' => 'auth-001', 'message' => 'Unauthorized.']);
    return response()->json([
        'errors' => $errors
    ], 401);
})->name('authentication-failed');

Route::get('module-test',function (){

});

//Restaurant Registration
Route::group(['prefix' => 'restaurant', 'as' => 'restaurant.'], function () {
    Route::get('apply', 'VendorController@create')->name('create');
    Route::post('apply', 'VendorController@store')->name('store');
});

//Deliveryman Registration
Route::group(['prefix' => 'deliveryman', 'as' => 'deliveryman.'], function () {
    Route::get('apply', 'DeliveryManController@create')->name('create');
    Route::post('apply', 'DeliveryManController@store')->name('store');
});