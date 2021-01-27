<?php

use App\District;
use App\Governorate;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AddCasesController;
use App\Http\Controllers\Admin\AdminController;
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

    Route::get('/admin/users','Admin\UserController@index')->name('admin.users.index');






    // تسجيل الدخول خلال الفيس والكوكل
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login-test');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');



    Route::get('/profile', [ProfileController::class,'showe'])->name('profile');
    Route::get('/profile/{user}/edit', [ProfileController::class,'edit'])->name('edit-profile');
    Route::put('/profile/{user}/edit', [ProfileController::class,'update'])->name('edit-profile');
    Route::put('/profile/{user}/edit-image', [ProfileController::class,'editImage'])->name('edit-image');

    // Route::get('test', function () {
    //     return view('auth.registerProfile', ['governorates' =>Governorate::all()]);
    // });


    Route::resource('/cases', 'SituationController');
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
