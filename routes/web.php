<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StudentController;

Route::post('insertStudent',[StudentController::class,'store'])->name('insertStudent');
Route::get('addStudent', [StudentController::class,'create'])->name('addStudent');
Route::get('Students', [StudentController::class,'index'])->name('Students');
Route::get('editStudents/{id}', [StudentController::class,'edit'])->name('editStudents');
Route::put('updateStudents/{id}', [StudentController::class,'update'])->name('updateStudents');
Route::get('showStudent/{id}',[StudentController::class,'show'])->name('showStudent');
Route::delete('delStudent', [StudentController::class,'destroy'])->name('delStudent');
Route::delete('forceDeleteStudent',[StudentController::class,'forceDelete'])->name('forceDeleteStudent');
Route::get('trashStudent',[StudentController::class,'trash'])->name('trashStudent');
Route::post('restoreStudent',[StudentController::class,'restore'])->name('restoreStudent');
//Route::get('restoreStudent/{id}',[StudentController::class,'restore'])->name('restoreStudent');

Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');
Route::get('addClient', [ClientController::class,'create'])->name('addClient');
Route::get('Clients', [ClientController::class,'index'])->name('Clients');
Route::get('editClients/{id}', [ClientController::class,'edit'])->name('editClients');
Route::put('updateClients/{id}', [ClientController::class,'update'])->name('updateClients');
Route::get('showClient/{id}',[ClientController::class,'show'])->name('showClient');
Route::delete('delClient',[ClientController::class,'destroy'])->name('delClient');
Route::delete('forceDeleteClient',[ClientController::class,'forceDelete'])->name('forceDeleteClient');
Route::get('trashClient',[ClientController::class,'trash'])->name('trashClient');
Route::get('restoreClient/{id}',[ClientController::class,'restore'])->name('restoreClient');

Route::get('test20', [MyController::class,'my_data']);

Route::get('insertClient', [ClientController::class,'store']);

Route::get('/', function () {
    return view('stacked');
});

Route::get('shrouk/{id?}', function ($id = 0) {
    return 'welcome to my first web site ' . $id;
})->whereNumber('id');

Route::get('course/{name}', function ($name) {
    return 'My name is: ' . $name;
})->whereIn('name',['Shams', 'Mohamed', 'Abdelhamied']);

Route:: prefix('cars')->group(function() {
    Route::get('bmw', function() {
        return 'Category is BMW';
    });

    Route::get('mercedes', function() {
        return 'Category is Mercedes';
    });
});

Route::get('form1', function() {
    return view('form1');
});

Route::post('recform1', [MyController::class, 'receiveData'])->name('receiveform1');

//Route::post('recform1', function (Illuminate\Http\Request $request) {
   // $firstName = $request->input('fname');
   // $lastName = $request->input('lname');

   // return "First Name: " . $firstName . "<br>" .
  //         "Last Name: " . $lastName;
//})->name('receiveform1');

//Route::post('recform1', function() {
   // return 'Data received';
//})->name('receiveform1');

//Route::fallback(function() {
      // return 'The required is not found';
      //return redirect('/');
//});

//Route::get('addClient',[ClientController::class,'create'])->name('receiveform2');
//Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');



