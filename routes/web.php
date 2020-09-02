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

        Route::get('/getVariations/{id}','AttributeMaterialController@getAtts');
        Route::post('/create_ingredients/{id}','AttributeMaterialController@create_ingredients');


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
        Route::prefix('variations')->group(function () {
            Route::get('/','VariationController@index');
            Route::get('/add','VariationController@create');
            Route::post('/add/{stock_id}','VariationController@store');
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
            Route::get('/create_product','InventoryController@create_product');
            Route::get('/product/edit/{prod_id}','InventoryController@view_product');
            Route::get('/product/view/{prod_id}','InventoryController@show');
            Route::get('/materials','MaterialController@index');
            Route::get('/materials/create','MaterialController@create');
            Route::post('/materials/create/{track_id}','MaterialController@createMaterial');
            Route::post('/materials/attributes/create','MaterialController@createAttributes');
            Route::get('/materials/attributes/getAttributes/{track_id}','MaterialController@getAttributes');
            Route::get('/create_product/{stock_id}','ProductController@create_product');
            Route::post('/create_product/{stock_id}','ProductController@add_product');
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

        //Admin settings routes
        Route::prefix('settings')->group(function () {
            Route::get('/general','SettingController@general');
            Route::get('/units_of_measure','SettingController@units_of_measure');
            Route::post('/units_of_measure','SettingController@store_units_of_measure');
            Route::get('/tax_rates','SettingController@tax_rates');
            Route::get('/operations','SettingController@operations');
            Route::get('/data_import','SettingController@data_import');
        });


    });
});

Route::fallback(function (){
    return view('pages.404');
});
