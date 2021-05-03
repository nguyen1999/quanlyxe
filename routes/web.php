<?php

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

// Redirect to each page
Route::get('/',['uses'=>'HomeController@index','as'=>'index']);

Route::get('car/brand/{id}',['uses'=>'HomeController@show','as'=>'brand.product']);

Route::get('car/id/{id}',['uses'=>'CarController@show','as'=>'product.detail']);

Route::get('login',['uses'=>'SignIn@index','as'=>'login']);

Route::post('login',['uses'=>'SignIn@login','as'=>'handle.login']);

Route::get('logout',['uses'=>'SignIn@logout','as'=>'logout']);

Route::post('search',['uses'=>'SearchController@index','as'=>'search.car']);

Route::get('cars',['uses'=>'CarController@all','as'=>'cars']);

Route::get('car/register/{id}',['uses'=>'CarController@register','as'=>'car.register']);

Route::post('hire',['uses'=>'CalendarController@store','as'=>'hire.car']);

Route::get('sort',['uses'=>'SortController@index']);

Route::get('/introduce', function () {
    return view('introduce');
})->name('introduce');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/search', function () {
    return view('search');
})->name('search');

//Admin login
Route::group(['prefix'=>'admin'],function(){
     // Dashboard
	Route::get('dashboard',['uses'=>'DashboardController@index','as'=>'dashboard']);
    // Banner
    Route::group(['prefix'=>'banner'],function(){
        Route::get('list',['uses'=>'BannerController@index','as'=>'banner.list']);
        
        Route::get('edit/{id}',['uses'=>'BannerController@edit','as'=>'banner.edit.form']);

		Route::post('edit/{id}',['uses'=>'BannerController@update','as'=>'banner.edit']);

        Route::get('add',['uses'=>'BannerController@create','as'=>'banner.add.form']);

        Route::post('add',['uses'=>'BannerController@store','as'=>'banner.add']);
        
        Route::get('delete/{id}',['uses'=>'BannerController@destroy','as'=>'banner.delete']);

        Route::get('disable/{id}',['uses'=>'BannerController@disable','as'=>'banner.disable']);

        Route::get('enable/{id}',['uses'=>'BannerController@enable','as'=>'banner.enable']);
    });
    // Car
	Route::group(['prefix'=>'car'],function(){
        Route::get('list',['uses'=>'CarController@index','as'=>'car.list']);
        
        Route::get('edit/{id}',['uses'=>'CarController@edit','as'=>'car.edit.form']);

		Route::post('edit/{id}',['uses'=>'CarController@update','as'=>'car.edit']);

        Route::get('add',['uses'=>'CarController@create','as'=>'car.add.form']);

        Route::post('add',['uses'=>'CarController@store','as'=>'car.add']);
        
        Route::get('delete/{id}',['uses'=>'CarController@destroy','as'=>'car.delete']);

        Route::get('disable/{id}',['uses'=>'CarController@disable','as'=>'car.disable']);

        Route::get('enable/{id}',['uses'=>'CarController@enable','as'=>'car.enable']);

        Route::get('/back', function () {
            return redirect()->route('car.list');
        })->name('car.back');
    });
    // Accessary
    Route::group(['prefix'=>'accessary'],function(){
        Route::get('list',['uses'=>'AccessaryController@index','as'=>'accessary.list']);
        
        Route::get('edit/{id}',['uses'=>'AccessaryController@edit','as'=>'accessary.edit.form']);

		Route::post('edit/{id}',['uses'=>'AccessaryController@update','as'=>'accessary.edit']);

        Route::get('add',['uses'=>'AccessaryController@create','as'=>'accessary.add.form']);

        Route::post('add',['uses'=>'AccessaryController@store','as'=>'accessary.add']);
        
        Route::get('delete/{id}',['uses'=>'AccessaryController@destroy','as'=>'accessary.delete']);

        Route::get('disable/{id}',['uses'=>'AccessaryController@disable','as'=>'accessary.disable']);

        Route::get('enable/{id}',['uses'=>'AccessaryController@enable','as'=>'accessary.enable']);

        Route::get('/back', function () {
            return redirect()->route('accessary.list');
        })->name('accessary.back');
    });
    // Combine
    Route::group(['prefix'=>'combine'],function(){
        Route::get('list',['uses'=>'CombineController@index','as'=>'combine.list']);
        
        Route::get('edit/{id}',['uses'=>'CombineController@edit','as'=>'combine.edit.form']);

		Route::post('edit/{id}',['uses'=>'CombineController@update','as'=>'combine.edit']);

        Route::get('add',['uses'=>'CombineController@create','as'=>'combine.add.form']);

        Route::post('add',['uses'=>'CombineController@store','as'=>'combine.add']);
        
        Route::get('delete/{id}',['uses'=>'CombineController@destroy','as'=>'combine.delete']);

        Route::get('disable/{id}',['uses'=>'CombineController@disable','as'=>'combine.disable']);

        Route::get('enable/{id}',['uses'=>'CombineController@enable','as'=>'combine.enable']);

        Route::get('/back', function () {
            return redirect()->route('combine.list');
        })->name('combine.back');
    });
    // Calendar
    Route::group(['prefix'=>'calendar'],function(){
        Route::get('list',['uses'=>'CalendarController@index','as'=>'calendar.list']);
        
        Route::get('delete/{id}',['uses'=>'CalendarController@destroy','as'=>'calendar.delete']);

        Route::get('show/{id}',['uses'=>'CalendarController@show','as'=>'calendar.show']);

        Route::get('/back', function () {
            return redirect()->route('calendar.list');
        })->name('calendar.back');
    });
    // Brand
    Route::group(['prefix'=>'brand'],function(){
        Route::get('list',['uses'=>'BrandController@index','as'=>'brand.list']);
        
        Route::get('edit/{id}',['uses'=>'BrandController@edit','as'=>'brand.edit.form']);

		Route::post('edit/{id}',['uses'=>'BrandController@update','as'=>'brand.edit']);

        Route::get('add',['uses'=>'BrandController@create','as'=>'brand.add.form']);
        
        Route::post('add',['uses'=>'BrandController@store','as'=>'brand.add']);

        Route::get('delete/{id}',['uses'=>'BrandController@destroy','as'=>'brand.delete']);

        Route::get('/back', function () {
            return redirect()->route('brand.list');
        })->name('brand.back');
	});
});