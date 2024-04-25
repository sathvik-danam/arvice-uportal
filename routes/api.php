<?php

//use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\SubcategoryController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProfessController;
use App\Http\Controllers\API\ProfessionalController;
use App\Http\Controllers\API\EnquiryController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\GuestEmailController;
use App\Http\Controllers\API\GuestPhoneController;
use App\Http\Controllers\API\GuestListController;
use App\Http\Controllers\API\InvitationController;

use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 
Route::middleware('auth:api')->get('/professional', function (Request $request) {
    return $request->user();
}); 
Route::middleware('auth:api')->get('/city', function (Request $request) {
    return $request->user();
}); 
Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->user();
}); 
Route::middleware('auth:api')->get('/subcategory', function (Request $request) {
    return $request->user();
}); 
Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->user();
}); 

Route::apiResources([
    'user' => UserController::class,
    'professional' => ProfessionalController::class,
    'profess' => ProfessController::class,
    'city' => CityController::class,
    'guestemail' => GuestEmailController::class,
    'guestphone' => GuestPhoneController::class,
    'guestlist' => GuestListController::class,
    'enquiry' => EnquiryController::class,
    'category' => CategoryController::class,
    'subcategory' => SubcategoryController::class,
    'post' => PostController::class,
    'postinvitation' => InvitationController::class
]);

Route::get('profile', [UserController::class, 'profile']); 

// Route for getting user posts
Route::get('mypost', [PostController::class, 'mypost']);

// Route for getting user's subcategories
Route::get('mysubcategory', [SubcategoryController::class, 'mysubcategory']);

// Route for updating user profile
Route::put('profile', [UserController::class, 'updateProfile']);

// Route for finding a user
Route::get('findUser', [UserController::class, 'search']);

// Route for finding posts
Route::get('findPost', [PostController::class, 'search']);

// Route for finding categories
Route::get('findCategory', [CategoryController::class, 'search']);

// Route for finding subcategories
Route::get('findSubcategory', [SubcategoryController::class, 'search']);

// Route for finding partners
Route::get('findPartner', [ProfessionalController::class, 'search']);

// Route for finding enquiries
Route::get('findEnquiry', [EnquiryController::class, 'search']);

// Route for getting professional information
Route::get('mypofession', [ProfessionalController::class, 'mypofession']);

// Route for getting city data
Route::get('citydata', [CityController::class, 'citydata']);

// Route for showing category
Route::get('findShowcategory', [PostController::class, 'showme']);
