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

//frontend routes
Route::group(['namespace'=>'Frontend'],function(){
    Route::get('/','HomeController@index')->name('landing');
    Route::get('/about-us','HomeController@aboutUs');
    //blogs
    Route::get('/blogs','HomeController@blogs');
    Route::get('blog/{slug}','HomeController@singleBlog');
    //contact
    Route::get('/contact-us','HomeController@contact');
    Route::post('/send/inquiry','HomeController@sendInquiry');
    //saving plans
    Route::get('/service/plan','HomeController@plan');
    Route::get('/service/plan/{slug}','HomeCOntroller@singlePlan');
    //services
    Route::get('/services','HomeController@services');
    Route::get('/service/{slug}','HomeController@singleService');
    //for document downloads
    Route::get('/download/{slug}','HomeController@downloadPDF');
    //send inquiry from service plan
    Route::post('/send/plan/inquiry','HomeController@planInquiry');

});





Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

/****admin auth section ***/
Route::group(['prefix'=>'admin'],function(){
    Route::get('/register','Auth\Admin\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register','Auth\Admin\RegisterController@register')->name('admin.register.post');

    Route::get('/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\Admin\LoginController@login')->name('admin.login.post');
    Route::get('/logout','Auth\Admin\LoginController@logout')->name('admin.logout');

    Route::get('/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.request');
    Route::post('/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.email');

    Route::post('/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.reset');
});
/* dashboard all route */
Route::group(['prefix'=>'/arthafal','middleware' => ['admin']], function() {
    /* dashboard */
    Route::get('/back-end', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('logo','Admin\LogoController');
    Route::resource('about','Admin\AboutController');
    Route::resource('link','Admin\LinkController');
    Route::resource('contact','Admin\ContactController');
    Route::resource('blog','Admin\BlogController');
    //banner section
    Route::resource('slider','Admin\SliderController');
    Route::get('enable/{id}', 'Admin\SliderController@enableSlider');
    Route::get('disable/{id}', 'Admin\SliderController@disableSlider');
    /***  Payment, Policy pages**/
    Route::resource('policy','Admin\PolicyController');
    //services
    Route::resource('service','Admin\ServiceController');
    Route::get('service/enable/{id}', 'Admin\ServiceController@enableService');
    Route::get('service/disable/{id}', 'Admin\ServiceController@disableService');
    //realated documents pdf for services
    Route::resource('servicepdf','Admin\ServicepdfController');

    //inquiry data from frontend
    Route::resource('inquiry','Admin\InquiryController');
    Route::get('inquiry/enable/{id}', 'Admin\InquiryController@enableInquiry');
    Route::get('inquiry/disable/{id}', 'Admin\InquiryController@disableInquiry');

    //category for downloads pages
    Route::resource('category','Admin\CategoryController');
    Route::resource('document','Admin\DocumentController');

    //all plans
    Route::resource('product','Admin\ProductController');
    Route::get('product/enable/{id}', 'Admin\ProductController@enableProduct');
    Route::get('product/disable/{id}', 'Admin\ProductController@disableProduct');
    //plan pdf
    Route::resource('planpdf','Admin\PlanpdfController');
    //all data from service plan inquiry
    Route::resource('planinquiry','Admin\PlaninquiryController');
    Route::get('planinquiry/enable/{id}', 'Admin\PlaninquiryController@enablePlaninquiry');
    Route::get('planinquiry/disable/{id}', 'Admin\PlaninquiryController@disablePlaninquiry');

});
