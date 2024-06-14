<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\AgreeController;
use App\Http\Controllers\DisagreeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FAQCategoryController;
use App\Http\Controllers\FAQQuestionController;




use Illuminate\Support\Facades\Auth;




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
//     return view('welcome');
// });


Route::get('/', [PostController::class, 'index'])->name('index');

Auth::routes();

Route::resource('posts', PostController::class);

Route::post('/store', [ProfileController::class, 'store'])->name('store');


Route::get('like/{postid}', [LikeController::class, 'like'])->name('like');

Route::get('user/{username}', [UserController::class, 'profile'])->name('profile');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/register', [RegisterController::class, 'show']);

// Route::post('/register', [RegisterController::class, 'register']);

// Route::get('/login', [LoginController::class, 'show']);

// Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route::post('user/updatephoto', [UserController::class, 'updatephoto'])->name('updatephoto');


Route::get('/terms', function () {
    return view('auth/terms');});

Route::get('/about', function () {
    return view('about/about');});


// Route::get('/logout', [LogoutController::class, 'logout']);

// Route::get('/profile', [ProfileController::class, 'show']);

// Route::post('/birthday', [BirthdayController::class, 'update']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/change_password', 'ProfileController@change_password')->name('password.change');

Route::get('/change_password', [ProfileController::class, 'change_password'])->name('change_password');

Route::post('/update_password', [ProfileController::class, 'update_password'])->name('update_password');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');

Route::post('/contact.submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/edit_profile', [ProfileController::class, 'editProfile'])->name('editProfile');

Route::put('/update_profile/{userid}', [ProfileController::class, 'updateProfile'])->name('updateProfile');

Route::resource('questions', QuestionController::class);

// Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

Route::resource('opinions', OpinionController::class);

Route::get('/opinions/{opinion}/edit', [OpinionController::class, 'edit'])->name('opinions.edit');

// Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');

Route::put('/opinions/{opinion}', [OpinionController::class, 'update'])->name('opinions.update');

Route::post('/opinions/{opinion}/destroy', [OpinionController::class, 'destroy'])->name('opinions.destroy');

// Route::get('/adminpage', function () {
//     return view('administrator/adminpage');});

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin-panel', [AdminController::class, 'adminPanel'])->name('admin.panel');
    Route::put('/admin/{user}', [AdminController::class, 'update'])->name('admin.update');
});

// Route::get('/admin-panel', [AdminController::class, 'adminPanel'])->name('admin.panel');
//     Route::put('/admin/{user}', [AdminController::class, 'update'])->name('admin.update');

// Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/opinions/add/{question_id}', [OpinionController::class, 'create'])->name('opinions.create');

Route::delete('/opinions/{opinion}', [OpinionController::class, 'destroy'])->name('opinions.destroy');

Route::delete('/opinions/{opinion}/destroy', [OpinionController::class, 'destroy'])->name('opinions.destroy');

Route::get('agree/{postid}', [AgreeController::class, 'agree'])->name('agree');

Route::get('disagree/{postid}', [DisagreeController::class, 'disagree'])->name('disagree');

Route::resource('f_a_q_categories', FAQCategoryController::class);

Route::resource('f_a_q_questions', FAQQuestionController::class);


Route::post('/f_a_q_questions/{f_a_q_question}/destroy', [FAQQuestionController::class, 'destroy'])->name('f_a_q_questions.destroy');

Route::get('/f_a_q_questions/create/{f_a_q_categorie_id}', [FAQQuestionController::class, 'create'])->name('f_a_q_questions.create');

Route::get('/f_a_q_questions/{f_a_q_question}/edit', [FAQQuestionController::class, 'edit'])->name('f_a_q_questions.edit');

Route::put('/f_a_q_questions/{f_a_q_question}', [FAQQuestionController::class, 'update'])->name('f_a_q_questions.update');

Route::post('/f_a_q_questions/{f_a_q_question}', [FAQQuestionController::class, 'destroy'])->name('f_a_q_questions.destroy');
