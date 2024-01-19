<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShoppingListController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/shopping_list_items', [ShoppingListController::class, 'index']);

Route::prefix('/shopping_list_item')->group(
    function(){
        Route::post('/store',[ShoppingListController::class, 'store']);
        Route::put('/{id}',[ShoppingListController::class, 'update']);
        Route::delete('/{id}',[ShoppingListController::class, 'destroy']);
    }
);
