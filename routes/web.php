<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource("/user", UserController::class);

Route::resource("/about", AboutController::class);
Route::resource("/education", EducationController::class);
Route::resource("/skill", SkillController::class);
Route::resource("/experience", ExperienceController::class);
Route::resource("/blog", BlogController::class);
Route::resource("/contact", ContactController::class);
Route::resource("/seminar", SeminarController::class);
Route::resource("/", FrontendController::class);
