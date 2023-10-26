<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


//Brand routes
Route::get('/brands', [BrandController::class,'index'])->name('brand.index'); //Список всех брендов
Route::get('/brands/create', [BrandController::class,'create'])->name('brand.create'); //Создать бренд
Route::post('/brands', [BrandController::class,'store'])->name('brand.store'); //Сохранить созданный брендов
Route::get('/brands/{brand}', [BrandController::class,'show'])->name('brand.show'); //Подробнее о бренде
Route::get('/brands/{brand}/edit', [BrandController::class,'edit'])->name('brand.edit'); //Редактировать бренд
Route::patch('/brands/{brand}', [BrandController::class,'update'])->name('brand.update'); //Обновить бренд
Route::delete('/brands/{brand}', [BrandController::class,'destroy'])->name('brand.destroy'); //Удалить бренд

// Category routes 
Route::get('/categories', [CategoryController::class,'index'])->name('category.index'); //Список всех категорий
Route::get('/categories/create', [CategoryController::class,'create'])->name('category.create'); //Создать категорию
Route::post('/categories', [CategoryController::class,'store'])->name('category.store'); //Сохранить созданную категорию
Route::get('/categories/{category}', [CategoryController::class,'show'])->name('category.show'); //Подробнее о категории
Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('category.edit'); //Редактировать категорию
Route::patch('/categories/{category}', [CategoryController::class,'update'])->name('category.update'); //Обновить категорию
Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('category.destroy'); //Удалить категорию

//Products routes
Route::get('/products', [ProductController::class,'index'])->name('product.index'); //Список всех продуктов
Route::get('/products/create', [ProductController::class,'create'])->name('product.create'); //Создать продукт
Route::post('/products', [ProductController::class,'store'])->name('product.store'); //Сохранить созданный продукт
Route::get('/products/{product}', [ProductController::class,'show'])->name('product.show'); //Подробнее о продукте
Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('product.edit'); //Редактировать продукт
Route::patch('/products/{product}', [ProductController::class,'update'])->name('product.update'); //Обновить продукт
Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('product.destroy'); //Удалить продукт
