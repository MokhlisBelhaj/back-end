<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BibliothequeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\RegionsMarocController;
use App\Http\Controllers\SalleController;
use App\Models\bibliotheque;
use App\Models\regions;
use App\Models\regionsMaroc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Users regions
Route::get('/allregions',[RegionsController::class,'index']);
//bibliotheque router
Route::post('/bibliotheque',[BibliothequeController::class,'index']);
Route::post('/bibliothequeCreate',[BibliothequeController::class,'create']);
Route::get('/bibliothequedestroy/{id}',[BibliothequeController::class,'destroy']);
// salle router
Route::post('/salle',[SalleController::class,'index']);
Route::post('/salleCreate',[SalleController::class,'create']);
Route::get('/salle/{id}',[SalleController::class,'show']);
Route::get('/salledestroy/{id}',[SalleController::class,'destroy']);
// post router
Route::post('/postCreate',[PostController::class,'create']);
// Users router
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/UsersByRegion/{region_id}', [AuthController::class, 'getUsersByRegion']);
Route::post('/Users', [AuthController::class, 'getUsers']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
