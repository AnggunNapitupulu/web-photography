<?php

use App\Models\Saran;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CatGalleryController;
use App\Models\CatGallery;

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

// Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
// Route::get('/auth/login-admin', [AuthController::class, 'login_admin'])->name('auth.login-admin');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
// Route::post('/auth/login-admin', [AuthController::class, 'login_admin'])->name('auth.login-admin');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::group(['prefix' => 'helper'], function () {
  Route::get('unsplash/{category}', function ($category) {
    $url = 'https://api.unsplash.com/photos/random?page=1&per_page=1&query=' . $category . '&client_id=' . env('UNSPLASH_ACCESS_KEY');
    $object = Http::get($url)->object();
    return $object;
  });

  Route::get('eloquent', function () {
    $services = Service::skip(5)->take(3)->get();
    $collection = collect($services);
    $forTaked = 0;
    if ($services->count() < 3) {
      $forTaked = 3 - $services->count();
      // return $forTaked;
      // Service::take($forTaked)->get()->dd();
      foreach (Service::take($forTaked)->get() as $object) :
        $collection->push($object);
      endforeach;
    }
    $collection->dd();
  });
});

Route::name('service.')->group(function () {
  Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('show');
});

Route::name('user.')->prefix('user')->group(function () {
  Route::get('/auth/register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
  Route::get('/auth/login', [AuthController::class, 'login_user_page'])->name('auth.login');
  Route::post('/auth/login', [AuthController::class, 'login_user'])->name('auth.login');
  Route::get('/auth/login-admin', [AuthController::class, 'login_admin_page'])->name('auth.login-admin');
  Route::post('/auth/login-admin', [AuthController::class, 'login_admin'])->name('auth.login-admin');
  Route::get('/auth/lost-password', [HomeController::class, 'auth'])->name('auth.lost-password');
  Route::get('/test', function () {
    return Auth::user()->hasRole('Admin') ? 'True' : 'False';
  });
  Route::group(['middleware' => ['role:User']], function () {

    Route::name('galery.')->prefix('galery')->group(function () {
      Route::get('/', [GalleryController::class, 'index'])->name('index');
    });

    Route::name('camera.')->prefix('camera')->group(function () {
      Route::get('/', [CameraController::class, 'index'])->name('index');
      Route::get('/order', [CameraController::class, 'order'])->name('order');
      Route::post('/order', [CameraController::class, 'postOrder'])->name('order.store');
      Route::post('/order/return', [CameraController::class, 'postReturn'])->name('order.return');
    });

    Route::name('service.')->prefix('service')->group(function () {
      Route::get('/', [ServiceController::class, 'index'])->name('index');
      Route::get('/order', [ServiceController::class, 'orderService'])->name('order');
      Route::post('/order', [OrderController::class, 'store'])->name('order.store');
      Route::get('/order/delete/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
      Route::get('/create', [ServiceController::class, 'create'])->name('create');
      Route::post('/store', [ServiceController::class, 'store'])->name('store');
      Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
      Route::put('/{id}/update', [ServiceController::class, 'update'])->name('update');
      Route::delete('/{id}/destroy', [ServiceController::class, 'destroy'])->name('destroy');
    });

    Route::name('contact.')->prefix('contact')->group(function () {
      Route::get('/', [ContactController::class, 'index'])->name('index');
    });
  });
});

Route::get('/helper/{category}', function ($category) {
  $url = 'https://api.unsplash.com/photos/random?page=1&per_page=1&query=' . $category . '&client_id=' . env('UNSPLASH_ACCESS_KEY');
  $object = Http::get($url)->object();
  return $object;
});

Route::group(['prefix' => 'check', 'middleware' => ['role:Admin|User']], function () {
  Route::get('/create', [CheckController::class, 'create']);
  Route::get('/', [CheckController::class, 'index']);
  Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Home
Route::get('/', [GuestController::class, 'index'])->name('base');
Route::get('/#comment', [GuestController::class, 'index'])->name('baseC');

// Contact
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');

// Comment
Route::post('/comment', [GuestController::class, 'comment'])->name('commentGuest');

Route::group(['prefix' => 'admin', 'middleware' => ['role:Admin']], function () {
  // Dashboard
  Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

  // User
  Route::get('user', [AdminController::class, 'user'])->name('user');
  // Delete User
  Route::post('user/{id}', [AdminController::class, 'rmUser'])->name('removeUser');

  // Gallery
  Route::get('gallery', [AdminController::class, 'gallery'])->name('gallery');
  // Create Gallery
  Route::get('gallery/create', [AdminController::class, 'galleryCreate'])->name('gallery.create');
  Route::post('createGallery', [AdminController::class, 'galleryStore'])->name('createGallery');
  // Update Gallery
  Route::get('gallery/update/{id}', [AdminController::class, 'galleryUpdate'])->name('gallery.update');
  Route::put('updateGallery', [AdminController::class, 'galleryUpdateStore'])->name('updateGallery');
  // Delete Gallery
  Route::post('gallery/{id}', [AdminController::class, 'rmGallery'])->name('removeGallery');

  // Category Gallery
  Route::get('catgallery', [CatGalleryController::class, 'index'])->name('catgallery');
  // Create Category Gallery
  Route::post('catgallery', [CatGalleryController::class, 'store'])->name('catgallery.store');
  // Update Category Gallery
  Route::get('catgallery/update/{id}', [CatGalleryController::class, 'edit'])->name('catgallery.edit');
  Route::put('updateCatGallery', [CatGalleryController::class, 'update'])->name('catgallery.update');
  // Delete Category Gallery
  Route::delete('catgallery/{id}', [CatGalleryController::class, 'destroy'])->name('catgallery.destroy');

  // Camera
  Route::get('camera', [AdminController::class, 'camera'])->name('camera');
  // Create Camera
  Route::get('camera/create', [AdminController::class, 'cameraCreate'])->name('camera.create');
  Route::post('createCamera', [AdminController::class, 'cameraStore'])->name('createCamera');
  // Update Camera
  Route::get('camera/update/{id}', [AdminController::class, 'cameraUpdate'])->name('camera.update');
  Route::put('updateCamera', [AdminController::class, 'cameraUpdateStore'])->name('updateCamera');
  // Delete Camera
  Route::post('camera/{id}', [AdminController::class, 'rmCamera'])->name('removeCamera');

  // Service
  Route::get('service', [AdminController::class, 'service'])->name('service');
  // Create Service
  Route::get('service/create', [AdminController::class, 'serviceCreate'])->name('service.create');
  Route::post('createService', [AdminController::class, 'serviceStore'])->name('createService');
  // Update Service
  Route::get('service/update/{id}', [AdminController::class, 'serviceUpdate'])->name('service.update');
  Route::put('updateService', [AdminController::class, 'serviceUpdateStore'])->name('updateService');
  // Delete Service
  Route::post('service/{id}', [AdminController::class, 'rmService'])->name('removeService');

  // Order
  Route::get('order', [AdminController::class, 'order'])->name('order');

  // Comment
  Route::get('comment', [AdminController::class, 'comment'])->name('comment');
  // Delete Comment
  Route::post('comment/{id}', [AdminController::class, 'rmComment'])->name('removeComment');

  // Export Excel
  Route::get('export/excel', [AdminController::class, 'exportExcel'])->name('export.excel');

  // Export PDF
  Route::get('export/pdf', [AdminController::class, 'exportPdf'])->name('export.pdf');

  // Decline Order Camera
  Route::get('order/decline/{id}', [AdminController::class, 'declineOrder'])->name('declineOrder');

  // Accept Order Camera
  Route::get('order/accept/{id}', [AdminController::class, 'acceptOrder'])->name('acceptOrder');

  // Decline Return Camera
  Route::get('return/decline/{id}', [AdminController::class, 'declineReturn'])->name('declineReturn');

  // Accept Return Camera
  Route::get('return/accept/{id}', [AdminController::class, 'acceptReturn'])->name('acceptReturn');
});
