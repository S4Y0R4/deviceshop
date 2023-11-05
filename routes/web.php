<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'index'])->name('main.index'); 

Route::group(['namespace'=>'App\Http\Controllers\Brand'], function(){
    Route::get('/brands', 'IndexController' )->name('brand.index');
    Route::get('/brands/create', 'CreateController')->name('brand.create');
    Route::post('/brands', 'StoreController')->name('brand.store');
    Route::get('/brands/{brand}', 'ShowController')->name('brand.show');
    Route::get('/brands/{brand}/edit', 'EditController')->name('brand.edit');
    Route::patch('/brands/{brand}', 'UpdateController')->name('brand.update');
    Route::delete('/brands/{brand}', 'DestroyController')->name('brand.destroy');
});

Route::group(['namespace'=>'App\Http\Controllers\Category'], function(){
    Route::get('/categories', 'IndexController' )->name('category.index');
    Route::get('/categories/create', 'CreateController')->name('category.create');
    Route::post('/categories', 'StoreController')->name('category.store');
    Route::get('/categories/{category}', 'ShowController')->name('category.show');
    Route::get('/categories/{category}/edit', 'EditController')->name('category.edit');
    Route::patch('/categories/{category}', 'UpdateController')->name('category.update');
    Route::delete('/categories/{category}', 'DestroyController')->name('category.destroy');
});

Route::group(['namespace'=>'App\Http\Controllers\Product'], function(){
    Route::get('/products', 'IndexController' )->name('product.index');
    Route::get('/products/create', 'CreateController')->name('product.create');
    Route::post('/products', 'StoreController')->name('product.store');
    Route::get('/products/{product}', 'ShowController')->name('product.show');
    Route::get('/products/{product}/edit', 'EditController')->name('product.edit');
    Route::patch('/products/{product}', 'UpdateController')->name('product.update');
    Route::delete('/products/{product}', 'DestroyController')->name('product.destroy');
});