<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MyGuestController;
use App\Http\Controllers\API\InvitationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EnquiryController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;


Route::get('sitemap', [FrontEndController::class, function () {
    SitemapGenerator::create('https://arvices.com/')->writeToFile('sitemap.xml');
    return 'sitemap created'; 
}])->name('');



Route::post('autocomplete/fetch', [FrontEndController::class, 'fetch'])->name('autocomplete.fetch');

Route::get('/', [FrontEndController::class, 'index'])->name('welcome');



Route::get('/result', [FrontEndController::class, 'result'])->name('result');

Route::get('2020/{slug}', [FrontEndController::class, 'singlepost'])->name('post.single');


Route::get('/discussion/delete{id}', [MyGuestController::class, 'destroy'])->name('discussion.delete');

Route::get('/discussion/{slug}', [MyGuestController::class, 'watch'])->name('discussion.store');

Route::get('/cancellation/{slug}', [InvitationController::class, 'cancel'])->name('discussion.cancel');




Route::get('/myevents', [MyGuestController::class, 'myevent'])->name('myevent');

Route::get('/guest/store', [MyGuestController::class, 'store'])->name('guest.store');

Route::get('/privacy', [FrontEndController::class, 'privacy'])->name('privacy');


Route::get('/about', [FrontEndController::class, 'about'])->name('about');

Route::get('/my-profile', [FrontEndController::class, 'profile'])->name('uprofile');

Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');



Route::get('/disclaimer', [FrontEndController::class, 'disclaimer'])->name('disclaimer');

Route::get('auth/{provider}', [LoginController::class, 'redirectToProvider']);

Route::get('auth/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/become-professional', [FrontEndController::class, 'becomeprofessional'])->name('partner');

Route::get('/create-invitation', [FrontEndController::class, 'invitation'])->name('invitation');


Route::get('/forgot-password', [FrontEndController::class, 'forgot'])->name('forgot');





Route::post('/reset-password', [FrontEndController::class, 'password'])->name('forgotpassword');

Route::post('/post/thanks', [EnquiryController::class, 'store'])->name('post.store');



Route::get('/logout', [FrontEndController::class, function() {
auth()->logout();
return redirect()->back();
}]);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('{path}', [FrontEndController::class, 'nofound'])->where('path', '([A-Za-z\d/_.-]+)?' );

