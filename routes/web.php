<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});



Route::get('/admin/home' , [HomeController::class,'homePage'])->name('home.page');
Route::get('admin/setting' ,[SettingController::class,'settingPage'])->name('setting.page');
Route::get('admin/add/subject',[SubjectController::class,'addSubjectPage'])->name('add.subject.page');
Route::post('admin/add/subject',[SubjectController::class,'addSubject'])->name('add.subject');



require __DIR__.'/auth.php';
