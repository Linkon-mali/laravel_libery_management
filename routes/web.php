<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Frontend Route


Route::group(['middleware' => ['auth']], function () {
    Route::get('/all_student', 'Frontend\StudentController@allStudent');
    Route::get('/student_delte', 'Frontend\StudentController@deleteStudent');
    Route::get('/student_profile', 'Frontend\StudentController@studentProfile');
    Route::get('/student_update', 'Frontend\StudentController@studentEdit');
    Route::post('/update_student', 'Frontend\StudentController@updateStudent');

    Route::get('/all_book', 'Frontend\BookController@allBook');
    Route::get('/issue_book/{book_id}/{admin_id}', 'Frontend\BookController@issueBook');
    Route::get('/browed_book', 'Frontend\BookController@borwedBook');
    Route::get('/return_book/{id}', 'Frontend\BookController@returnBook');
    Route::get('/return_book', 'Frontend\BookController@returnBookList');
});

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');

// Backend Route
Route::group(
    ['middleware' => ['AdminLogin']],
    function () {
        Route::get('/admin', 'Backend\AdminController@adminDashboard')->name('admin');
        Route::post('/admin/logout', 'Backend\AdminController@adminLogout')->name('admin_logout');
        Route::get('/admin/all_admin', 'Backend\AdminController@allAdmin')->name('all_admin');
        Route::get('/admin/admin_profile', 'Backend\AdminController@adminProfile')->name('admin_profile');
        Route::get('/admin/admin_update', 'Backend\AdminController@adminUpdateForm')->name('admin_update');
        Route::post('/admin/admin_update', 'Backend\AdminController@adminUpdate')->name('admin_update');
        Route::get('/admin/admin_delete', 'Backend\AdminController@loginAdminDelete')->name('loginAdmin_delete');
        Route::get('/admin/admin_delete/{id}', 'Backend\AdminController@adminDelete')->name('admin_delete');

        Route::get('/admin/add_book', 'Backend\BookController@addBook')->name('add_book');
        Route::post('/admin/create_book', 'Backend\BookController@createBook')->name('create_book');
        Route::get('/admin/all_book', 'Backend\BookController@allBook')->name('all_book');
        Route::get('/admin/edit_book/{id}', 'Backend\BookController@editBookForm')->name('edit_book');
        Route::post('/admin/edit_book', 'Backend\BookController@editBook')->name('update_book');
        Route::get('/admin/delete_book/{id}', 'Backend\BookController@deleteBook')->name('delete_book');
        Route::get('/admin/browed_book', 'Backend\BookController@browedBook')->name('browed_book');
        Route::get('/admin/browed_book/{id}', 'Backend\BookController@returnBookMsg')->name('return_book_msg');
        Route::get('/admin/return_book', 'Backend\BookController@returnBookList')->name('return_book_list');

        Route::get('/admin/all_student', 'Backend\StudentController@allUsers')->name('all_student');
        Route::get('/admin/delete_student/{id}', 'Backend\StudentController@deleteUser')->name('delete_student');
        Route::get('/admin/deleted_student', 'Backend\StudentController@deletedUser')->name('deleted_student');
    }
);
Route::get('/admin/admin_add', 'Backend\AdminController@adminAdd')->name('admin_add');
Route::post('/admin/register', 'Backend\AdminController@adminRegister')->name('admin_register');
Route::get('/admin/login', 'Backend\AdminController@showLoginForm')->name('admin_login_form');
Route::post('/admin/login', 'Backend\AdminController@adminLogin')->name('admin_login');
