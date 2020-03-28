<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

// returns the welcome page on site access.
Route::get('/', function () {
    return view('welcome');
});



Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

// categories routes
// Route::resource('subcategory', 'PackageCategoryController');

Route::middleware(['is_admin','verified'])->group(function () {

	// admin home page 
	Route::get('admin/home', 'AdminController@adminHome')->name('admin.home');

	Route::get('/category', 'PackageCategoryController@index')->name('category.index');
	Route::get('/category/{id}/edit','PackageCategoryController@edit')->name('category.edit');
	Route::get('/category/{id}','PackageCategoryController@show')->name('category.show');
	Route::get('/category/{id}/delete','PackageCategoryController@destroy')->name('category.destroy');
	Route::get('/createcategory','PackageCategoryController@create')->name('category.create');
	Route::post('/storecategory','PackageCategoryController@store')->name('category.store');
	Route::post('/category/update/{id}','PackageCategoryController@update')->name('category.update');

	// subcategory routes
	// Route::resource('subcategory', 'PackageSubcategoryController');


	Route::get('/subcategory', 'PackageSubcategoryController@index')->name('subcategory.index');
	Route::get('/subcategory/{id}/edit','PackageSubcategoryController@edit')->name('subcategory.edit');
	Route::get('/subcategory/{id}','PackageSubcategoryController@show')->name('subcategory.show');
	Route::get('/subcategory/{id}/delete','PackageSubcategoryController@destroy')->name('subcategory.destroy');
	Route::get('/createsubcategory','PackageSubcategoryController@create')->name('subcategory.create');
	Route::post('/storesubcategory','PackageSubcategoryController@store')->name('subcategory.store');
	Route::post('/subcategory/update/{id}','PackageSubcategoryController@update')->name('subcategory.update');

	// subcategoryitems routes
	// Route::resource('subcatitem', 'SubCatItemController');

	Route::get('/subcatitem', 'SubCatItemController@index')->name('subcatitem.index');
	Route::get('/subcatitem/{id}/edit','SubCatItemController@edit')->name('subcatitem.edit');
	Route::get('/subcatitem/{id}','SubCatItemController@show')->name('subcatitem.show');
	Route::get('/subcatitem/{id}/delete','SubCatItemController@destroy')->name('subcatitem.destroy');
	Route::get('/createsubcatitem','SubCatItemController@create')->name('subcatitem.create');
	Route::post('/storesubcatitem','SubCatItemController@store')->name('subcatitem.store');
	Route::post('/subcatitem/update/{id}','SubCatItemController@update')->name('materialgroup.update');

	Route::get('/subcatitem/restore/{id}','SubCatItemController@restoreitem')->name('subcatitem.restore');
	// view document
	Route::get('view-document/{id}', 'SubCatItemController@viewdoc');

	// subcategoryitems routes
	Route::get('search', 'searchController@search')->name('search');

	// materialgroup(classrooms) routes
	// Route::resource('materialgroup', 'MaterialGroupController');

	Route::get('/materialgroup', 'MaterialGroupController@index')->name('materialgroup.index');
	Route::get('/materialgroup/{id}/edit','MaterialGroupController@edit')->name('materialgroup.edit');
	Route::get('/materialgroup/{id}','MaterialGroupController@show')->name('materialgroup.show');
	Route::get('/materialgroup/{id}/delete','MaterialGroupController@destroy')->name('materialgroup.destroy');
	Route::get('/creatematerialgroup','MaterialGroupController@create')->name('materialgroup.create');
	Route::post('/storematerialgroup','MaterialGroupController@store')->name('materialgroup.store');
	Route::post('/materialgroup/update/{id}','MaterialGroupController@update')->name('materialgroup.update');
});
	// subcategoryitems routes
	Route::get('searchresource', 'searchController@searchresource')->name('searchresource');

	// getresource routes
	// Route::resource('getresource', 'GetResourceController');
	Route::get('/getresource', 'GetResourceController@index')->name('getresource.index');
	Route::get('/getresource/{id}/edit','GetResourceController@edit')->name('getresource.edit');
	Route::get('/getresource/{id}','GetResourceController@show')->name('getresource.show');
	Route::get('/getresource/{id}/delete','GetResourceController@destroy')->name('getresource.destroy');
	Route::get('/creategetresource','GetResourceController@create')->name('getresource.create');
	// // in the search controller
	Route::post('/setgroupresource','SearchController@setgroup')->name('getresource.setgroup');
	Route::post('/storegetresource','GetResourceController@store')->name('getresource.store');
	Route::post('/getresource/update/{id}','GetResourceController@update')->name('getresource.update');
// for logs
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');