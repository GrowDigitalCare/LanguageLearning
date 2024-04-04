<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Test\QuestionController;
use App\Http\Controllers\Backend\SigninController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\MediaCenterController;
use App\Http\Controllers\Backend\Course\CourseController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\Course\CourseQuizController;
use App\Http\Controllers\Backend\Course\CourseTestController;
use App\Http\Controllers\Backend\Course\CourseDetailController;
use App\Http\Controllers\Backend\Course\CourseLectureController;
use App\Http\Controllers\Backend\Course\CourseLanguageController;
use App\Http\Controllers\Backend\Course\CourseInstructorController;









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

Route::get('/', function () {
    return view('welcome');
});


//Admin Login Routes
Route::controller(SigninController::class)->group(function () {
    Route::get('/admin/login', 'view')->name('adminlogin.form');
    Route::post('/admin/login', 'adminAuthenticate')->name('admin.login');
});
Route::controller(SigninController::class)->group(function () {
    Route::get('/admin/logout', 'adminlogout')->name('admin.logout');
});

Route::middleware(['auth', 'redirect.only.admins'])->group(function () {
Route::prefix('admin')->as('admin-')->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('/changepassword', 'view')->name('change.form');
        Route::post('/changepassword', 'changepassword')->name('change.password');
        Route::get('useres', 'allUseres')->name('useres');
        Route::get('deleteuser/{id}', 'deleteUser')->name('deleteuser');
        Route::get('messages', 'shoMessages')->name('messages');
        Route::get('delete/{id}', 'delete')->name('delete');
    });
});
Route::post('/update-status/{id}', [AdminDashboardController::class, 'updateStatus'])->name('update.status');


//Media Center Routes
Route::prefix('mediacenter')->as('mediacenter-')->group(function () {
    Route::controller(MediaCenterController::class)->group(function () {
        Route::get('/create', 'view')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'show')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
    });
});
//Media Center Routes


//course instructor routes
Route::prefix('instructor')->as('instructor-')->group(function () {
    Route::controller(CourseInstructorController::class)->group(function () {
        Route::get('/create', 'view')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'show')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});

//end CourseIns Routes

//course instructor routes
Route::prefix('language')->as('language-')->group(function () {
    Route::controller(CourseLanguageController::class)->group(function () {
        Route::get('/create', 'view')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'show')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});

//end CourseIns Routes

//course instructor routes
Route::prefix('course')->as('course-')->group(function () {
    Route::controller(CourseController::class)->group(function () {
        Route::get('/create', 'view')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'show')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});

//end CourseIns Routes

//course detail routes
Route::prefix('coursedetail')->as('coursedetail-')->group(function () {
    Route::controller(CourseDetailController::class)->group(function () {
        Route::get('/create', 'view')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'show')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});

//end course detail route
//course instructor routes
Route::prefix('lecture')->as('lecture-')->group(function () {
    Route::controller(CourseLectureController::class)->group(function () {
        Route::get('/create', 'view')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'show')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});

//end course Lectures routes

//Test Routes

Route::prefix('test')->as('test-')->group(function () {
    Route::controller(CourseTestController::class)->group(function () {
        Route::get('/create', 'view')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'show')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});


Route::get('/getlecture/{courseId}', [CourseTestController::class, 'getlecture']);

//end test controller

Route::prefix('coursequiz')->as('coursequiz-')->group(function () {
    Route::controller(CourseQuizController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'list')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});



Route::prefix('test')->as('test-')->group(function () {
    Route::controller(TestController::class)->group(function () {
        Route::get('/create', 'view')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'show')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});

// Route::get('/get-subjects/{departmentId}', [TestController::class, 'getSubjects']);
//Questions Routes
Route::prefix('question')->as('question-')->group(function () {
    Route::controller(QuestionController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'list')->name('list');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
    });
});


});




//Forget Password Routes
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'view')->name('register.form');
    Route::post('/register', 'store')->name('register.process');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'view')->name('login.form');
    Route::post('/login', 'userAuthenticate')->name('login.process');
});
Route::controller(LogoutController::class)->group(function () {
    Route::get('/student/logout', 'userLogout')->name('student.logout');
});
//Cache Clear Routes

Route::get('/clear-cache', function () {
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('cache:clear');

    return "Cache cleared successfully.";
});
Route::get('/test', function () {
    return view('frontend.pages.test');
});

Route::get('/login', function () {
    return view('frontend.pages.auth.login');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    // Route::get('home', 'index')->name('home');

    Route::get('about', 'about')->name('about');


    Route::get('contact', 'contact')->name('contact');
    Route::post('/contactuspost',"contactuspost");

    Route::get('/mediacenter', "mediacenter")->name('mediacenter');
    Route::get('/mediacenterdetail/{slug}', "mediacenterdetail")->name('mediacenterdetail');
    Route::get('/course', "course")->name('course');
    Route::get('/coursedetail/{slug}', "courseDetails")->name('course_detail');

    Route::get('/lesson/{slug}/video', "showVideo")->name('lesson.video');
    Route::get('instructordetail/{name}/{id}', 'instructordetail')->name('instructordetail');

    Route::get('language_test/{slug}', 'showTest')->name('language_test');
    Route::post('/language/{languageId}/test/submit', 'submitTest')->name('test.submit');
    Route::get('testresult', 'testresult')->name('testresult');


});
// Route::get('/quiz', [HomeController::class, 'showQuiz'])->name('quiz');
