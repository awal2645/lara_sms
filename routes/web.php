<?php

use App\Http\Controllers\ClassController;
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
Route::get('subject/add',[SubjectController::class,'viewSubjectPage'])->name('add.subject.page');
Route::post('admin/subject/add',[SubjectController::class,'addSubject'])->name('add.subject');
Route::post('admin/subject/update',[SubjectController::class,'updateSubject'])->name('update.subject');
Route::post('admin/subject/delete',[SubjectController::class,'deleteSubject'])->name('delete.subject');
Route::get('class',[ClassController::class,'classViewpage'])->name('class.view.page');
Route::post('class/add',[ClassController::class,'addClass'])->name('add.class');
Route::post('class/update',[ClassController::class,'updateClass'])->name('update.class');
Route::post('class/delete',[ClassController::class,'deleteClass'])->name('delete.class');
// admin route end
require __DIR__.'/auth.php';
