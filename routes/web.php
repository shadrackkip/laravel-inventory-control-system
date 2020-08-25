<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'auth\LoginController@index')->name('login');
Route::prefix('auth')->group(function (){
    Route::post('/login','auth\LoginController@adminLogin');
    Route::post('/logout','auth\LoginController@adminLogout');
});
Route::middleware('auth:admin')->group(function (){
    Route::prefix('admin')->group(function (){
        Route::get('/', function () {
            return view('pages.dashboard');
        });
        Route::get('/profile','ProfileController@index')->name('profile');


        //Admin user routes
        Route::prefix('users')->group(function () {
            Route::get('/','PagesController@users');
            Route::get('/add','PagesController@addUser');
            Route::post('/add','PagesController@createUser');
        });


        //Admin warehouse routes
        Route::prefix('warehouses')->group(function () {
            Route::get('/','WarehouseController@index');
            Route::get('/add','WarehouseController@create');
            Route::post('/add','WarehouseController@store');
        });


        //Admin supplier routes
        Route::prefix('suppliers')->group(function () {
            Route::get('/','SupplierController@index');
            Route::get('/add','SupplierController@create');
            Route::post('/add','SupplierController@store');
        });


        //Admin attributes routes
        Route::prefix('attributes')->group(function () {
            Route::get('/','AttributeController@index');
            Route::get('/add','AttributeController@create');
            Route::post('/add','AttributeController@store');
        });

        //Admin brands routes
        Route::prefix('brands')->group(function () {
            Route::get('/','BrandController@index');
            Route::get('/add','BrandController@create');
            Route::post('/add','BrandController@store');
        });


        //Admin categories routes
        Route::prefix('categories')->group(function () {
            Route::get('/','CategoryController@index');
            Route::get('/add','CategoryController@create');
            Route::post('/add','CategoryController@store');
        });

        //Admin inventory routes
        Route::prefix('inventory')->group(function () {
            Route::get('/','InventoryController@index');
            Route::get('/add','InventoryController@create');
            Route::post('/add','InventoryController@store');
        });

        //Admin payments routes
        Route::prefix('payments')->group(function () {
            Route::get('/','PaymentController@index');
            Route::get('/add','PaymentController@create');
            Route::post('/add','PaymentController@store');
        });


        //Admin reports routes
        Route::prefix('reports')->group(function () {
            Route::get('/','ReportController@index');
            Route::get('/add','ReportController@create');
            Route::post('/add','ReportController@store');
        });

        //Admin orders routes
        Route::prefix('orders')->group(function () {
            Route::get('/','OrderController@index');

        });



        //Admin reports routes
        Route::prefix('reports')->group(function () {
            Route::get('/','ReportController@index');
            Route::get('/add','ReportController@create');
            Route::post('/add','ReportController@store');
        });
    });
});

Route::fallback(function (){
    return view('pages.404');
});
