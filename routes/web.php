<?php

use App\District;
use App\Governorate;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGiftController;
use App\Http\Controllers\Admin\AdminjoinUsController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminSituationController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Responsible;
use Illuminate\Support\Facades\DB;
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
    Route::get('/about', function () {
        // return  phpinfo();
        return view('about');
    })->name('about');

    Route::get('/', function () {
        $responsibles = DB::table('responsibles')->get();
        $governorates = DB::table('governorates')->get();

        return view('index', [
            'governorates' => $governorates,
            'responsibles' => $responsibles,
        ]);
    })->name('home');

    Auth::routes(['verify' => true]);


    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/achievments', [AdminController::class, 'achievments'])->name('achievments');

        Route::resource('/users', 'AdminUserController');

        Route::resource('/branch', 'AdminBranchController');
        Route::resource('/project', 'AdminProjectController');

        Route::get('/gift', [AdminGiftController::class, 'index'])->name('gift.index');
        Route::delete('/gift/{gift}', [AdminGiftController::class, 'destroy'])->name('gift.destroy');

        Route::resource('responsible', 'AdminResponsibleController');

        Route::post('/situation/{situation}/addGift', [AdminSituationController::class, 'addGift'])->name('situation.addGift');
        Route::get('/situation/waiting', [AdminSituationController::class, 'waitingForApproval'])->name('situation.waiting');
        Route::put('/situation/{situation}/agree', [AdminSituationController::class, 'agree'])->name('situation.agree');
        Route::resource('/situation', 'AdminSituationController');

        // لتعديل صور لقطة منجزات
        Route::put('/achievements', [AdminController::class, 'editImage']);

        Route::get('/message', [AdminMessageController::class, 'index'])->name('message.index');
        Route::delete('/message/{message}', [AdminMessageController::class, 'destroy']);

        Route::get('/joinus', [AdminjoinUsController::class, 'index'])->name('joinus.index');
        Route::delete('/joinus/{joinus}', [AdminjoinUsController::class, 'destroy']);

        Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications.show');
        Route::get('/notifications/{message}/message', [AdminController::class, 'showMessageNotifications'])->name('notifications.message.show');
        Route::get('/notifications/{joinUs}/joinUs', [AdminController::class, 'showJoinUsNotifications'])->name('notifications.joinUs.show');
        Route::get('/notifications/{gift}/gift', [AdminController::class, 'showGiftNotifications'])->name('notifications.gift.show');
    });


    // تسجيل الدخول خلال الفيس والكوكل
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login-test');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');



    Route::get('/profile/{user:slug}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user:slug}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user:slug}/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/{user:slug}/edit-image', [ProfileController::class, 'editImage'])->name('edit-image');

    // Route::put('/password/{user:slug}/update', [ProfileController::class, 'passUpdate'])->name('password.update2');
    // Route::get('change-password', 'ChangePasswordController@index');
    Route::put('change-password', 'ChangePasswordController@store')->name('change.password');



    Route::get('/gift/{situation:slug}/gift', 'GiftController@create2')->name('gift.create2');
    Route::resource('/gift', 'GiftController');


    Route::resource('/situation', 'SituationController')->only(['index', 'create', 'store']);
    Route::get('situation/{situation:slug}', 'SituationController@show')->name('situation.show');


    Route::post('/join-us', [JoinUsController::class, 'store'])->name('join-us');
    Route::post('/message', [MessageController::class, 'store'])->name('message.store');
    Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements');
    // Route::get('/achievements/all-projects', [AchievementController::class, 'allProjects'])->name('all-projects');
});








// اكمال البروفايل
Route::get('profile/{profile}/completed', [ProfileController::class, 'complete'])->name('profile-completed');
Route::put('profile/{profile}/completed-store', [ProfileController::class, 'storeComplete'])->name('profile-store-completed');
// لجلب المدن التابعة لمحافظة ما؟
Route::post('district/{id}/get', function ($id) {
    $district = District::where('governorate_id', $id)->pluck('name', 'id');
    return json_encode($district);
});
