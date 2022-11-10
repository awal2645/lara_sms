<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
// admin route start
Route::get('home',[HomeController::class,'homeViewPage'])->name('home.view.page');
Route::get('setting',[SettingController::class,'settingViewPage'])->name('setting.view.page');
Route::get('subject',[SubjectController::class,'subjectViewPage'])->name('subject.view.page');
Route::post('subject/add',[SubjectController::class,'addSubject'])->name('add.subject');
Route::post('subject/update',[SubjectController::class,'updateSubject'])->name('update.subject');
Route::post('subject/delete',[SubjectController::class,'deleteSubject'])->name('delete.subject');
Route::get('class',[ClassController::class,'classViewpage'])->name('class.view.page');
Route::post('class/add',[ClassController::class,'addClass'])->name('add.class');
Route::post('class/update',[ClassController::class,'updateClass'])->name('update.class');
Route::post('class/delete',[ClassController::class,'deleteClass'])->name('delete.class');
Route::get('class/trash',[ClassController::class,'trash'])->name('trash.class');
Route::get('class/restore',[ClassController::class,'restore'])->name('restore.class');
Route::get('section', [SectionController::class,'sectionViewPage'])->name('section.view.page');
Route::post('section/add', [SectionController::class,'addSection'])->name('add.section');
Route::post('section/update', [SectionController::class,'updateSection'])->name('update.section');
Route::post('section/delete', [SectionController::class,'deleteSection'])->name('delete.section');
Route::get('student', [StudentController::class,'studentViewPage'])->name('student.view.page');
Route::post('student/add', [StudentController::class,'addStudent'])->name('add.student');
Route::post('student/update', [StudentController::class,'upateStudent'])->name('update.student');
Route::post('student/delete', [StudentController::class,'deleteStudent'])->name('delete.student');
Route::get('payment',[PaymentController::class,'paymentViewPage'])->name('payment.view.page');
Route::post('fees-search',[PaymentController::class,'searchFeesByClass'])->name('search.fees');
Route::post('student-search',[PaymentController::class,'searchStudentByClass'])->name('search.student');
// PDF
Route::get('pdf',[PdfController::class,'generate_pdf']);
Route::get('/download-pdf',[PdfController::class,'download_pdf']);

// admin route end
require __DIR__.'/auth.php';
