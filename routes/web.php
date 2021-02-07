<?php

use App\District;
use App\Governorate;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AddCasesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGiftController;
use App\Http\Controllers\Admin\AdminjoinUsController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminSituationController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\User;
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


// Route::get('login', function () {
//     return route('home');
// });


Route::group(['middleware' => ['profileCompleted']], function () {

    Route::get('/', function () {
        $governorates = Governorate::all();
        return view('welcome',['governorates'=>$governorates]);
    })->name('home');

    Auth::routes();


    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/achievments', [AdminController::class,'achievments'])->name('achievments');

    Route::resource('/admin/achievments/branch', 'Admin\BranchController');
    Route::resource('/admin/achievments/project', 'Admin\ProjectController');

    // Route::get('/admin/users','Admin\UserController@index')->name('admin.users.index');
    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
        // Route::resource('users','UserController');
        Route::resource('/users', 'AdminUserController');


        Route::get('/gift', [AdminGiftController::class,'index'])->name('gift.index');
        Route::delete('/gift/{gift}', [AdminGiftController::class,'destroy'])->name('gift.destroy');

    });


    Route::post('/admin/admin-situation/{situation}', [AdminSituationController::class,'addGift'])->name('admin-situation.addGift');
    Route::get('/admin/admin-situation/waiting', [AdminSituationController::class,'waitingForApproval'])->name('admin-situation.waiting');
    Route::put('/admin/admin-situation/{situation}/agree', [AdminSituationController::class,'agree'])->name('admin-situation.agree');
    Route::resource('/admin/admin-situation', 'Admin\AdminSituationController');

    Route::get('/admin/admin-message', [AdminMessageController::class,'index'])->name('admin-message.index');
    Route::delete('/admin/admin-message/{message}', [AdminMessageController::class,'destroy']);

    Route::get('/admin/admin-joinus', [AdminjoinUsController::class,'index'])->name('admin-joinus.index');
    Route::delete('/admin/admin-joinus/{joinus}', [AdminjoinUsController::class,'destroy']);

    // تسجيل الدخول خلال الفيس والكوكل
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login-test');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

    Route::get('/profile', [ProfileController::class,'showe'])->name('profile');
    Route::get('/profile/{user}/edit', [ProfileController::class,'edit'])->name('edit-profile');
    Route::put('/profile/{user}/edit', [ProfileController::class,'update'])->name('edit-profile');
    Route::put('/profile/{user}/edit-image', [ProfileController::class,'editImage'])->name('edit-image');

    Route::get('/gift/{situation}/gift', 'GiftController@create2')->name('gift.create2');
    Route::resource('/gift', 'GiftController');

    Route::resource('/situation', 'SituationController');

    Route::post('/join-us', [JoinUsController::class, 'store'])->name('join-us');
    Route::post('/message', [MessageController::class, 'store'])->name('message');


    Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements');
});








// اكمال البروفايل
Route::get('profile/{profile}/completed',[ProfileController::class,'complete'])->name('profile-completed');
Route::put('profile/{profile}/completed-store',[ProfileController::class,'storeComplete'])->name('profile-store-completed');
// لجلب المدن التابعة لمحافظة ما؟
Route::post('district/{id}/get', function ($id) {
    $district = District::where('governorate_id', $id)->pluck('name', 'id');
    return json_encode($district);
});
