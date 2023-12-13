<?php

use App\Http\Controllers\admin\AdminCommentController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminManageUserController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\admin\AdminViewController;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\user\auth\UserLoginController;
use App\Http\Controllers\user\auth\UserRegisterController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\PostController;
use App\Http\Controllers\user\UserViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\auth\GmailVerifyController;
use App\Http\Controllers\user\auth\GoogleEmailVerifyController;

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


// Route::get('admin-login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
// Route::post('admin-login', 'Admin\Auth\LoginController@login');


Route::controller(AdminViewController::class)->group(function() {

    Route::get('/admin-login','loginForm')->name('admin.login');

    Route::middleware(['adminAuth'])->group(function () {

        Route::get('/admin-post','adminPostView')->name('admin.post');
        Route::get('/admin-comment','adminCommentView')->name('admin.comment');
        Route::get('/admin-category','adminCategoryView')->name('admin.category');
        Route::get('/admin-addcategory','adminAddCategory')->name('admin.addcategory');
        Route::get('/admin-user', 'adminUserView')->name('admin.user');
        Route::get('/admin-dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/admin-password', 'adminPassword')->name('admin.password');
    });

});

Route::post('/admin-login-data', [AdminLoginController::class, 'loginData'])->name('login.data');
Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
Route::post('/admin-change-password', [AdminLoginController::class, 'changePassword'])->name('change.password');

Route::post('/category-data-insert', [AdminController::class, 'categoryDataInsert'])->name('category.data');
Route::get('category/{id}', [AdminController::class, 'categoryDataDelete']);
Route::post('category-search', [AdminController::class, 'categorySearch'])->name('search.category');

Route::get('user/{id}', [AdminManageUserController::class, 'userDataDelete']);
Route::post('user-search', [AdminManageUserController::class, 'userSearch'])->name('search.user');

Route::get('post/{id}', [AdminPostController::class, 'postDataDelete']);
Route::post('post-search', [AdminPostController::class, 'postSearch'])->name('search.post');

Route::get('comment/{id}', [AdminCommentController::class, 'commentDataDelete']);



// user section

Route::controller(UserViewController::class)->group(function() {

    Route::get('/','loginForm')->name('user.login');
    Route::get('/register','registerForm')->name('user.register');

    Route::middleware(['userAuth'])->group(function () {

        Route::get('/home', 'homePage')->name('user.home');
        Route::get('/blog', 'blogPage')->name('user.blog');
        // Route::get('/blog-popup', 'blogPopupPage')->name('blog.popup');
        Route::get('categoryid/{id}', 'singleCategoryShow');
        Route::get('/category-page', 'categoryPage');
        Route::get('postid/{id}', 'postIdDataShow');
        Route::get('/post', 'postPage')->name('user.post');
        Route::get('/aboutus', 'aboutPage')->name('about');
        Route::get('/contact', 'contactPage')->name('user.contact');
        Route::get('/profile', 'profilePage')->name('user.profile');
    });

});


Route::post('/post-data', [PostController::class, 'postData'])->name('post.data');
Route::get('delete-post/{id}', [PostController::class, 'singlePostDelete']);
Route::post('/contact-data', [ContactController::class, 'contactData'])->name('contact.data');


Route::controller(UserLoginController::class)->group(function() {

    Route::post('/login-data', 'loginData')->name('userlogin.data');
    Route::get('/logout-user', 'logout')->name('logout.user');

});


Route::post('/register-data',[UserRegisterController::class,'registerData'] )->name('register.data');
Route::get('otp/verify/{user}', [GmailVerifyController::class, 'show'])->name('otp.verify');
Route::post('otp-verify/{user}', [GmailVerifyController::class, 'verify']);
Route::get('/otp-resend/{user}', [GmailVerifyController::class, 'resendOtp'])->name('otp.resend');

Route::view('/otp', 'user.otp');


Route::get('/google',function(){

    Return view('googleAuth');
    
    });
    
    Route::get('auth/google', [GoogleEmailVerifyController::class, 'redirectToGoogle']);
    
    Route::get('auth/google/callback', [GoogleEmailVerifyController::class, 'handleGoogleCallback']);
