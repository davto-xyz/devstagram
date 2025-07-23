<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploadController;
use App\Models\Follower;
use Illuminate\Auth\Events\Logout;
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

// ============================================
// RUTAS PRINCIPALES
// ============================================
Route::get('/', HomeController::class)->name('home.index');

// ============================================
// AUTENTICACIÓN
// ============================================
// Registro
Route::get('/registro', [RegisterController::class, 'index'])->name('register');
Route::post('/registro', [RegisterController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// ============================================
// PERFIL
// ============================================
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

// ============================================
// POSTS (rutas sin variables)
// ============================================
Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// ============================================
// UPLOAD
// ============================================
Route::post('/upload', [UploadController::class, 'store'])->name('img.store');

// ============================================
// RUTAS CON VARIABLES (al final)
// ============================================

// Posts con variables
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{user:username}/{post}', [PostController::class, 'show'])->name('posts.show');

// Comentarios
Route::post('/posts/{post}', [ComentarioController::class, 'store'])->name('comentario.store');

// Likes
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.like.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.like.destroy');

// Perfil de usuario (debe ir AL FINAL porque captura cualquier /{username})
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

// Followers

Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');