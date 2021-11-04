<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\projects\projectsController;
use App\Http\Controllers\api\ProvincesController;
use App\Http\Controllers\api\apiprojectsController;
use App\Http\Controllers\api\apitasksController;
use App\Http\Controllers\api\apifilterCaseController;
use App\Http\Controllers\projects\printController;
use App\Http\Controllers\projects\structuresaController;


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
Auth::routes(['register' => false]);
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
        function(){


//start for route
Route::get('/', function () {
    return redirect()->route('users.index');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//users Route
Route::resource('users' , UserController::class);




// searchCase Route
Route::resource('projects' , projectsController::class);
Route::get('show_all' , [projectsController::class, 'show_all'])->name('projects.show_all');


// register search case api
Route::apiResource('apiprojects', apiprojectsController::class);
Route::get('userPermissions' , [apiprojectsController::class, 'userPermissions'])->name('projects.userPermissions');



Route::apiResource('apitasks', apitasksController::class);


//Search Provinces status api
Route::post('searchProvinces',[apisearchCaseController::class, 'searchProvinces']);

//structure projects
Route::apiResource('structureCase', structuresaController::class);
Route::get('structureCounts',[structuresaController::class, 'structureCounts']);

Route::get('search',[structuresaController::class, 'searchAll'])->name('search.index');




//route for Provinces
Route::apiResource('Provinces', ProvincesController::class);
//End for route
});

