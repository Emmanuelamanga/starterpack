<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;



// admin users home page 
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// categories routes
// Route::resource('subcategory', 'PackageCategoryController');

Route::get('/category', 'PackageCategoryController@index')->name('category.index');
Route::get('/category/{id}/edit','PackageCategoryController@edit')->name('category.edit');
Route::get('/category/{id}','PackageCategoryController@show')->name('category.show');
Route::get('/category/{id}/delete','PackageCategoryController@destroy')->name('category.destroy');
Route::get('/create','PackageCategoryController@create')->name('category.create');
Route::post('/create','PackageCategoryController@store')->name('category.store');
Route::post('/category/update/{id}','PackageCategoryController@update')->name('category.update');

// subcategory routes
Route::resource('subcategory', 'PackageSubcategoryController');


Route::get('/subcategory', 'PackageSubcategoryController@index')->name('subcategory.index');
Route::get('/subcategory/{id}/edit','PackageSubcategoryController@edit')->name('subcategory.edit');
Route::get('/subcategory/{id}','PackageSubcategoryController@show')->name('subcategory.show');
Route::get('/subcategory/{id}/delete','PackageSubcategoryController@destroy')->name('subcategory.destroy');
Route::get('/create','PackageSubcategoryController@create')->name('subcategory.create');
Route::post('/create','PackageSubcategoryController@store')->name('subcategory.store');
Route::post('/subcategory/update/{id}','PackageSubcategoryController@update')->name('subcategory.update');