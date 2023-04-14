<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BibliothequeController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\RegionsMarocController;
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
// Users router
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/UsersByRegion/{region_id}', [AuthController::class, 'getUsersByRegion']);
Route::post('/Users', [AuthController::class, 'getUsers']);
// Users regions
Route::get('/allregions',[RegionsController::class,'index']);
 //bibliotheque router
Route::post('/bibliotheque',[BibliothequeController::class,'index']);
Route::post('/bibliothequeCreate',[BibliothequeController::class,'create']);
Route::get('/bibliothequedestroy/{id}',[BibliothequeController::class,'destroy']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
