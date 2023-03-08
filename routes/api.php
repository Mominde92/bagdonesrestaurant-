<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Language;
use App\Models\Country;
use App\Models\City;
use App\Models\Area;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderApiController;

use App\Http\Controllers\Api\UserController;

use Database\Seeders\CategorySeeder;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'middleware' => 'auth:api'], function(){
Route::resource('countries', '\App\Http\Controllers\Api\CountryController')->middleware('locale.check');
Route::get('/countries/{id}/cities', [CountryController::class,'getCities'])->middleware('locale.check');
Route::get('/countries/{id}/areas', [CountryController::class,'getAreasByCountry'])->middleware('locale.check');

Route::get('/cities/{id}/areas', [CityController::class,'getAreas'])->middleware('locale.check');
Route::resource('cities', '\App\Http\Controllers\Api\CityController')->middleware('locale.check');

Route::resource('areas', '\App\Http\Controllers\Api\AreaController')->middleware('locale.check');

Route::resource('categories', '\App\Http\Controllers\Api\CategoryController')->middleware('locale.check');

Route::get('/categories/{id}/subCategories',  [CategoryController::class,'getSubCategories' ])->middleware('locale.check');

Route::get('/subCategories/{id}/parent',  [CategoryController::class,'getParentCategory' ])->middleware('locale.check');

Route::resource('subCategories', '\App\Http\Controllers\Api\SubCategoryController')->middleware('locale.check');

Route::post('/category/dataAjax', [ App\Http\Controllers\Admin\CategoryController::class, 'dataAjax'])->name('categoryAjax');

Route::get('/subcategory/dataAjax', [ App\Http\Controllers\Api\SubCategoryController::class, 'dataAjax'])->name('subcategoryAjax');


Route::resource('contentTypes', '\App\Http\Controllers\Api\ContentTypeController')->middleware('locale.check');
Route::get('home', [\App\Http\Controllers\Api\HomeController::class , 'index'])->middleware('locale.check');

Route::post('/contentTypes/{id}/appearance',  [App\Http\Controllers\Api\ContentTypeController::class,'getAppearances' ])->middleware('locale.check');


//Route::post('/country/cities', [App\Http\Controllers\Admin\unused\CityController::class, 'get_city_select_list']);
//Route::post('/city/areas', [App\Http\Controllers\Admin\unused\AreaController::class, 'get_area_select_list']);


Route::get('item/filter', [\App\Http\Controllers\Api\ItemController::class , 'items'])->middleware('locale.check');
Route::get('item/{item}', [\App\Http\Controllers\Api\ItemController::class , 'show'])->middleware('locale.check');
Route::get('item/suggested_items/{id}', [\App\Http\Controllers\Api\ItemController::class , 'suggested_items'])->middleware('locale.check');
Route::post('item/dataAjax', [\App\Http\Controllers\Api\ItemController::class , 'dataAjax'])->middleware('locale.check');

Route::get('searchitem', [\App\Http\Controllers\Api\ItemController::class , 'searchItem'])->middleware('locale.check');


Route::post('order', [OrderApiController::class, 'store']);

Route::get('order_details', [OrderApiController::class, 'order_details']);


Route::apiResource('address','\App\Http\Controllers\Api\AddressController');
Route::apiResource('Users','\App\Http\Controllers\Api\UserController');

Route::post('login', [UserController::class, 'login'])->name('login');


});

