<?php

use App\Http\Admin\Controllers\BannerSliderVideoController;
use App\Http\Controllers\Admin\CallToActionController;
use App\Http\Controllers\Admin\ServiceQueryController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\UserFrontendController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Admin\GalleryAlbumController;
use App\Http\Controllers\Admin\GalleryMediaController;
use App\Http\Controllers\Admin\PageBannerController;
use App\Http\Controllers\FrontGalleryController;

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
//     return view('home');
// });

Route::middleware('isLogin')->group(function () {

    Route::get('/register', [AuthController::class, 'index'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
    Route::get('/realm-admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/store', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::get('/auth/google/redirect', function () {
        return Socialite::driver("google")->redirect();
    })->name('google.redirect');
    Route::get('/auth/google/callback', function (Request $request) {
        $userdata = Socialite::driver("google")->user();
        $user = User::updateOrCreate(
            ['google_id' => $userdata->id,],
            [
                'full_name' => $userdata->name,
                'email' => $userdata->email,
                'role' => 'User',
                'image' => $userdata->avatar,
            ]
        );
        Auth::login($user);
        return redirect()->route('first.index');
    });
});
Route::get('/home',function(){
    return view('frontend.home');
});
Route::get('/', [UserFrontendController::class, 'home'])->name('first.index');
Route::get('/contact-us', [UserFrontendController::class, 'contactUs'])->name('contact-us');
Route::post('/contact-us', [UserFrontendController::class, 'storeContactUs'])->name('store.contact-us');
Route::post('/service-query', [ServiceController::class, 'storeServiceQuery'])->name('store.service-query');
Route::get('/about-us', [UserFrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/service', [UserFrontendController::class, 'service'])->name('service');
Route::get('/service/detail/{id}', [UserFrontendController::class, 'servicedetail'])->name('service-detail');
Route::get('/blog/detail/{id}', [UserFrontendController::class, 'blogdetail'])->name('blog-detail');
Route::get('/blog', [UserFrontendController::class, 'blog'])->name('blog');
Route::get('/blog/category/{category_id}', [UserFrontendController::class, 'blogsByCategory'])->name('blogsByCategory');
Route::get('/search-posts', [UserFrontendController::class, 'searchBlogs'])->name('search.posts');
Route::get('/terms-and-conditions', [UserFrontendController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [UserFrontendController::class, 'privacyPolicy'])->name('privacyPolicy');

// Route::get('/post', [UserFrontendController::class, 'post'])->name('post');
// Route::get('/post/{id}', [UserFrontendController::class, 'singlePost'])->name('single.post');

// Comment

Route::get('/portfolio', [FrontGalleryController  ::class, 'gallery'])->name('gallery');
// Route::get('/gallery', [FrontGalleryController::class, 'gallery'])->name('galleryType');


Route::get('gallery-album/{id}', [FrontGalleryController::class, 'show'])->name('gallery-album.singleJson');
Route::get('gallery-album/client/{id}', [FrontGalleryController::class, 'showClient'])->name('gallery-album.singleJsonclient');

Route::get('gallery-album/get-all-data', [FrontGalleryController::class, 'getAllData'])->name('gallery-album.allJson');

Route::post('/comment/store', [CommentController::class, 'store'])->name('store.comment');
Route::prefix('admins')->name('admin.')->group( function () {
    Route::post('/comment/store', [CommentController::class, 'store'])->name('store.comment');
Route::get('/comment/post/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('/comment/post/update/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/post/delete/{id}', [CommentController::class, 'destroy'])->name('comment.destory');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

});

Route::get('gallery2',function(){
    return view('frontend.gallery2');
});

Route::get('frontend-tailwind/{page}',function($page){
    return view('frontend-tailwind.'.$page);
})->name('tailwind');
