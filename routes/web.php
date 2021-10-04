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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();



Route::group(['middleware' => ['auth']], function() {
	Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');

    Route::resource('vendors','VendorController');
    Route::resource('locations','LocationController');
    Route::resource('companies','CompanyController');
    Route::resource('departments','DepartmentController');
    Route::resource('employees','EmployeeController');
    Route::resource('assets','AssetController');
    Route::resource('accessories','AccessoryController');
    Route::get('assign', 'AssetController@assignAsset')->name('assign');
    Route::get('assignedAsset', 'AssetController@assignedAsset')->name('assignedAsset');
    //Route::get('assignAsset/{$id}', 'AssetController@assignAssetSpecific')->name('assignSpecific');
    Route::post('saveAsset', 'AssetController@saveAsseignAsset')->name('saveAssign');
    

    Route::resource('AssignedAsset','assetAssignController');
    //Route::post('saveAssignAsset', 'assetAssignController@saveAsseignAsset')->name('saveAssignSpecific');
    
    Route::get('notifications','CommonController@notifications')->name('notifications');
    Route::get('settings','CommonController@settings')->name('settings');
    Route::post('update-settings','CommonController@updateSettings')->name('updateSettings');
    Route::get('faqs','CommonController@faqs')->name('faqs');
    Route::get('user_guide','CommonController@user_guide')->name('user_guide');

    //Routes for report
    Route::get('vendor-report','ReportController@print_vendor_list')->name('vendor_report');
    Route::get('asset-report','ReportController@asset_report')->name('asset_report');
    Route::get('view-asset-report','ReportController@view_asset_report')->name('view_asset_report');
    Route::get('asset-cost-report','ReportController@asset_cost_report')->name('asset_cost_report');
    Route::get('view-asset-costing-report','ReportController@view_asset_cost_report')->name('view_asset_cost_report');
    
});