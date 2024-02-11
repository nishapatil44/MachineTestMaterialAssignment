<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\InwardOutwardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return Redirect::to('categories.show');
});

//Route::resource('categories','CategoryController::class');
Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
Route::get('/categories/list', [CategoryController::class,'index'])->name('categories.show');
Route::post('/categories/store', [CategoryController::class,'store'])->name('categories.store');
Route::post('/categories/update', [CategoryController::class,'update'])->name('categories.update');
Route::get('/categories/{id}/edit', [CategoryController::class,'edit'])->name('categories.edit');
Route::get('/categories/{id}/delete', [CategoryController::class,'destroy'])->name('categories.delete');

Route::get('/material/create', [MaterialController::class,'create'])->name('materials.create');
Route::get('/material/list', [MaterialController::class,'index'])->name('materials.show');
Route::post('/material/store', [MaterialController::class,'store'])->name('materials.store');
Route::post('/material/update', [MaterialController::class,'update'])->name('materials.update');
Route::get('/material/{id}/edit', [MaterialController::class,'edit'])->name('materials.edit');
Route::get('/material/{id}/delete', [MaterialController::class,'destroy'])->name('materials.delete');

Route::get('/iomaster/create', [InwardOutwardController::class,'create'])->name('iomaster.create');
Route::get('/iomaster/list', [InwardOutwardController::class,'index'])->name('iomaster.show');
Route::post('/iomaster/store', [InwardOutwardController::class,'store'])->name('iomaster.store');
Route::post('/iomaster/update', [InwardOutwardController::class,'update'])->name('iomaster.update');
Route::get('/iomaster/{id}/edit', [InwardOutwardController::class,'edit'])->name('iomaster.edit');
Route::get('/iomaster/{id}/delete', [InwardOutwardController::class,'destroy'])->name('iomaster.delete');

