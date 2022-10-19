<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
// admin route start
Route::get('home',[HomeController::class,'homePage'])->name('home.page');
Route::get('setting',[SettingController::class,'settingPage'])->name('setting.page');
Route::get('subject/add',[SubjectController::class,'addSubjectPage'])->name('add.subject.page');
Route::post('admin/subject/add',[SubjectController::class,'addSubject'])->name('add.subject');
Route::post('admin/subject/update',[SubjectController::class,'updateSubject'])->name('update.subject');
Route::post('admin/subject/delete',[SubjectController::class,'deleteSubject'])->name('delete.subject');
Route::get('/course',[CourseController::class,'courseViewpage'])->name('course.view.page');
Route::post('/course/add',[CourseController::class,'addCourse'])->name('add.course');
Route::post('/course/update',[CourseController::class,'updateCourse'])->name('update.course');
Route::post('/course/delete',[CourseController::class,'deleteCourse'])->name('delete.course');
// admin route end
require __DIR__.'/auth.php';
