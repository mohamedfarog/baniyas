<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


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


Route::get('/login',function(){
    return view("login");
})->name('login');
Route::post('/login', [AdminController::class, "authentication"]);


Route::middleware('auth:web')->group(function () {
Route::get('/', [AdminController::class, 'login'])->name('/');
Route::get('news', [AdminController::class, 'viewNews'])->name('news');

Route::get('add_news', [AdminController::class, 'addNews'])->name('add_news');
Route::get('update_news/{newsid}', [AdminController::class, 'updateNews'])->name('update_news');
Route::post('submit_news_data', [AdminController::class, 'AddNewsRecord'])->name('submit_news_data');
Route::post('update_news_data/{newsid}', [AdminController::class, 'updateNewsRecord'])->name('update_news_data');
Route::post('delete_news/{newsid}', [AdminController::class, 'deleteNews'])->name('delete_news');
Route::get('you_sure/{newsid}', [AdminController::class, 'areYouSure'])->name('you_sure');

//gallery 
Route::get('gallery', [AdminController::class, 'viewGallery'])->name('gallery');
Route::post('submit_gallery_data', [AdminController::class, 'AddGallery'])->name('submit_gallery_data');
Route::post('update_gallery_data', [AdminController::class, 'updateGallery'])->name('update_gallery_data');
Route::post('delete_gallery/{galleryid}', [AdminController::class, 'deleteGallery'])->name('delete_gallery');

// gallery images
Route::get('gallery_images', [AdminController::class, 'viewGalleryImages'])->name('gallery_images');
Route::post('submit_gallery_images/{gid}', [AdminController::class, 'addGalleryImages'])->name('submit_gallery_images');
Route::post('delete_gallery_images/{imgid}', [AdminController::class, 'deleteGalleryImages'])->name('delete_gallery_images');
Route::post('update_gallery_image', [AdminController::class, 'updateGalleryImage'])->name('update_gallery_image');

    
// Route::get('/', [AdminController::class, "login"]);


});

