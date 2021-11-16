<?php
use App\Http\Controllers\Resources\UserController;
use App\Http\Controllers\Resources\RoleController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('webroot');

Route::get('/dashboard', function () {
    return Redirect::route('manage.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Site management routes from backend
Route::prefix('manage')->middleware(['auth', 'verified'])->name('manage.')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Manage/Dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class)
    ->missing(function (Request $request) {
        return Redirect::route('manage.users.index');
    });

    Route::resource('roles', RoleController::class)
    ->missing(function (Request $request) {
        return Redirect::route('manage.roles.index');
    });
});

require __DIR__.'/auth.php';
