<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OwnerControllerAPI;
use App\Http\Controllers\API\Animals\AnimalController;

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
Route::group(["prefix" => "owners"], function () {
//with the use of the prefix we can leave the quoation marks empty due to prefixing owners to all of the routes.
    // gets all of the articles and shows them using a get request. Index is the method
    Route::post("", [OwnerControllerAPI::class, "store"]);
    //this enbales posting new owners into the database, need to create a store method
    
    Route::get("", [OwnerControllerAPI::class, "index"]);

    // {owner} is the id of the owners, we are prefixing {owner} to represent the owner id 
    Route::group(["prefix" => "{owner}"], function () {
        Route::get("", [OwnerControllerAPI::class, "show"]);

        Route::put("", [OwnerControllerAPI::class, "update"]);

        Route::delete("", [OwnerControllerAPI::class, "destroy"]);

        Route::group(["prefix" => "animals"], function () {
                //with the use of the prefix we can leave the quoation marks empty due to prefixing owners to all of the routes.
                // gets all of the animals and shows them using a get request. Index is the method
                Route::post("", [AnimalController::class, "store"]);
                //this enbales posting new owners into the database, need to create a store method
        
                Route::get("", [AnimalController::class, "index"]);
        
                // {animal} is the id of the animal, we are prefixing {animal} to represent the animal id 
                Route::group(["prefix" => "{animal}"], function () {
                    Route::get("", [AnimalController::class, "show"]);
        
                    Route::put("", [AnimalController::class, "update"]);
        
                    Route::delete("", [AnimalController::class, "destroy"]);
                });
        
        });
    });
});



