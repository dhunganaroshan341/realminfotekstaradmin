<?php

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



// User

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/admin/user/latest-order', [UserController::class, 'latestOrder'])->name('admin.user.latest-order');
    Route::post('/admin/user/reset-password/{id}', [UserController::class, 'passwordReset'])->name('admin.user.reset-password');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.store');
    Route::get('/admin/user/detail/{id}', [UserController::class, 'userDetail'])->name('admin.detail');
    Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.update');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'destory'])->name('admin.destory');

    // Home Slide
    Route::get('/admin/home-slide', [HomeSliderController::class, 'index'])->name('admin.homeslide');
    Route::post('/admin/home-slide/store', [HomeSliderController::class, 'store'])->name('admin.homeslide.store');
    Route::get('/admin/home-slide/detail/{id}', [HomeSliderController::class, 'getHomeSliderDetail'])->name('admin.homeslide.detail');
    Route::post('/admin/home-slide/update/{id}', [HomeSliderController::class, 'update'])->name('admin.homeslide.update');
    Route::get('/admin/home-slide/delete/{id}', [HomeSliderController::class, 'destory'])->name('admin.homeslide.destory');
    Route::get('/admin/home-slide/status/{id}', [HomeSliderController::class, 'statusToggle'])->name('admin.homeslide.status');


    // FrontEnd
    Route::get('/admin/front-end', [AdminFrontendController::class, 'index'])->name('admin.frontend');
    Route::post('/admin/front-end', [AdminFrontendController::class, 'update'])->name('admin.frontend.update');

    // Site Datas
    Route::get('/admin/site-data', [AdminFrontendController::class, 'siteData'])->name('admin.siteData');
    Route::post('/admin/site-data', [AdminFrontendController::class, 'updateSiteData'])->name('admin.updateSiteData');


    // Setting
    Route::get('/admin/setting', [SettingController::class, 'index'])->name('admin.setting');
    Route::post('/admin/setting', [SettingController::class, 'store'])->name('admin.store.setting');
    Route::get('/admin/setting/working/{id}', [SettingController::class, 'destroyWorking']);
    Route::post('/admin/setting/working', [SettingController::class, 'addWorking']);
    // Route::resource('users',UserController::class);

    // Testimonial
    Route::get('/admin/testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial');
    Route::post('/admin/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
    Route::get('/admin/testimonial/detail/{id}', [TestimonialController::class, 'showDetail'])->name('admin.testimonial.detail');
    Route::post('/admin/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
    Route::get('/admin/testimonial/delete/{id}', [TestimonialController::class, 'destory'])->name('admin.testimonial.destory');
    Route::get('/admin/testimonial/status/{id}', [TestimonialController::class, 'statusToggle'])->name('admin.testimonial.status');


    // Category
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/detail/{id}', [CategoryController::class, 'detailCategory'])->name('admin.category.detail');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destory');
    Route::get('/admin/category/status/{id}', [CategoryController::class, 'statusToggle'])->name('admin.category.status');


    // Post
    Route::get('/admin/post', [PostController::class, 'index'])->name('admin.post');
    Route::get('/admin/post/get-data', [PostController::class, 'getPostData'])->name('admin.post.data');
    Route::post('/admin/post/store', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/post/detail/{id}', [PostController::class, 'getDetail'])->name('admin.post.detail');
    Route::post('/admin/post/edit/{id}', [PostController::class, 'update'])->name('admin.post.update');
    Route::get('/admin/post/delete/{id}', [PostController::class, 'destroy']);
    Route::get('/admin/post/image/delete', [PostController::class, 'destoryImage']);
    Route::get('/admin/post/status/{id}', [PostController::class, 'statusToggle'])->name('admin.post.status');
    Route::get('/admin/post/comment/detail/{id}', [PostController::class, 'postComment'])->name('admin.post.comment');

    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');
    Route::get('/admin/contact/get-data', [ContactController::class, 'getContact'])->name('admin.contact.get-data');
    Route::get('/admin/contact/detail/{id}', [ContactController::class, 'showDetail'])->name('admin.contact.detail');
    Route::get('/admin/contact/delete/{id}', [ContactController::class, 'destroy'])->name('admin.contact.delete');

Route::get('/admin/service-query', [ServiceQueryController::class, 'index'])->name('admin.service-query');
Route::get('/admin/service-query/get-data', [ServiceQueryController::class, 'getServiceQuery'])->name('admin.service-query.get-data');
Route::get('/admin/service-query/detail/{id}', [ServiceQueryController::class, 'showDetail'])->name('admin.service-query.detail');
Route::get('/admin/service-query/delete/{id}', [ServiceQueryController::class, 'destroy'])->name('admin.service-query.delete');

    Route::resource('/admin/notice', NoticeController::class);
    Route::get('/admin/notice/status/{id}', [NoticeController::class, 'toggleStatus']);

    Route::resource('admin/service', ServiceController::class);
    Route::get('/admin/service/status/{id}', [ServiceController::class, 'toggleStatus']);
// gallery albums and media
// Route::get('gallery-album',[GalleryAlbumController::class,'index'])->name('gallery-album.index');
// Route::post('gallery-album/store',[GalleryAlbumController::class,'store'])->name('gallery-album.store');
// Route::put('gallery-album/update/{id}',[GalleryAlbumController::class,'update'])->name('gallery-album.update');
// Route::delete('gallery-album/delete/{id}',[GalleryAlbumController::class,'destroy'])->name('gallery-album.delete');
Route::prefix('admin')->name('admin.')->group(function () {
// callto action
Route::resource('call-to-action',CallToActionController::class);
Route::post('call-to-action/image/delete',[CallToActionController::class,'destroyImage'])->name('call-to-action.destroyImage');
Route::put('/call-to-action/{id}/status', [CallToActionController::class, 'statusToggle'])->name('call-to-action.status');
Route::get('/get-call-to-action-data', [CallToActionController::class, 'all'])->name('call-to-action.all');
// end of cta
    // Gallery Album Resource Routes
    Route::get('/gallery-albums', [GalleryAlbumController::class, 'index'])->name('gallery-albums.index');
    Route::get('/gallery-albums/data', [GalleryAlbumController::class, 'getData'])->name('gallery-albums.data');
    Route::post('/gallery-albums/{id}/upload', [GalleryAlbumController::class, 'upload'])->name('gallery-albums.upload');
    Route::post('/gallery-albums', [GalleryAlbumController::class, 'store'])->name('gallery-albums.store');
    Route::get('/gallery-albums/{id}/detail', [GalleryAlbumController::class, 'detailGalleryAlbum'])->name('gallery-albums.detail');
    Route::put('/gallery-albums/{id}', [GalleryAlbumController::class, 'update'])->name('gallery-albums.update');
    Route::delete('/gallery-albums/{id}', [GalleryAlbumController::class, 'destroy'])->name('gallery-albums.destroy');
    Route::get('/gallery-albums/image/delete', [GalleryAlbumController::class, 'destroyGalleryImage'])->name('gallery-albums.gallery-image.destroy');;
    Route::put('/gallery-albums/{id}/status', [GalleryAlbumController::class, 'statusToggle'])->name('gallery-albums.status');

// page Banner
    Route::resource('page-banner', PageBannerController::class);
    Route::put('/page-banner/{id}/status', [PageBannerController::class, 'statusToggle'])->name('page-banner.status');

    Route::get('/user/latest-order', [UserController::class, 'latestOrder'])->name('user.latest-order');
Route::get('/client/latest-order', [ClientController::class, 'latestOrder'])->name('client.latest-order');
Route::get('/service/latest-order', [ServiceController::class, 'latestOrder'])->name('service.latest-order');
Route::get('/testimonial/latest-order', [TestimonialController::class, 'latestOrder'])->name('testimonial.latest-order');

});
Route::prefix('/admin/gallery-media')->name('admin.gallery-media.')->group(function () {
    Route::get('/', [GalleryMediaController::class, 'index'])->name('index');
    Route::get('/data', [GalleryMediaController::class, 'getGalleryData'])->name('data');
    Route::post('/store', [GalleryMediaController::class, 'store'])->name('store');
    Route::get('/detail/{id}', [GalleryMediaController::class, 'getDetail'])->name('detail');
    Route::get('edit/{id}', [GalleryMediaController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [GalleryMediaController::class, 'update'])->name('update');
    Route::post('/toggle-status/{id}', [GalleryMediaController::class, 'statusToggle'])->name('toggleStatus');
    Route::post('/upload/{id?}', [GalleryMediaController::class, 'upload'])->name('gallery-media.upload');
    Route::get('/image/delete', [GalleryMediaController::class, 'destoryImage']);

    Route::delete('/delete/{id}', [GalleryMediaController::class, 'destroy'])->name('delete');
});


Route::resource('/admin/demo', UserController::class);

    Route::get('/admin/post/detail/{id}', [PostController::class, 'getDetail'])->name('admin.post.detail');

    Route::get('/admin/post/delete/{id}', [PostController::class, 'destroy']);
    Route::get('/admin/post/image/delete', [PostController::class, 'destoryImage']);
    Route::get('/admin/post/status/{id}', [PostController::class, 'statusToggle'])->name('admin.post.status');
    Route::get('/admin/post/comment/detail/{id}', [PostController::class, 'postComment'])->name('admin.post.comment');

// end of gallery media
    Route::resource('admin/client', ClientController::class);
    Route::get('/admin/client/status/{id}', [ClientController::class, 'toggleStatus']);

    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
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
