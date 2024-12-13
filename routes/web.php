<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Restoraunts;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Psy\Command\WhereamiCommand;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::post('/ActionMainPage', [MainController::class, 'ActionMainPage'])->name('ActionMainPage');
Route::match(['get', 'post'], '/regist' , [AuthController::class, 'RegistUser']);
route::get('/', [MainController::class, 'ShowMainPage'])->name('/');
route::get('/AuthShow', [AuthController::class, 'AuthShow'])->name('AuthShow');
route::post('/AuthAction', [AuthController::class, 'AuthUser'])->name('AuthAction');
route::get('/RegistShow', [AuthController::class, 'RegistShow'])->name('RegistShow');
//route::post('/RegistAction', [AuthController::class, 'RegistUser'])->name('RegistAction');
route::post('/DishesShow', [MainController::class, 'ShowDishesPage'])->name('DishesShow');
route::post('/ActionDishesPage', [Maincontroller::class, 'ActionDishesPage'])->name('ActionDishesPage');
route::get('CartShow', [MainController::class, 'CartShow'])->name('CartShow');
route::get('/ProfileShow', [Maincontroller::class, 'ProfileShow'])->name('ProfileShow');
Route::match(['get', 'post'], '/dishes', [MainController::class, 'ShowDishesPage']);

//Route::get('/', [AuthorizeController::class, 'showLoginForm']);