<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StudentController;

Route::post('insertStudent',[StudentController::class,'store'])->name('insertStudent');
Route::get('addStudent', [StudentController::class,'create']);

Route::get('test20', [MyController::class,'my_data']);

Route::get('insertClient', [ClientController::class,'store']);

Route::get('/', function () {
    return view('welcome');
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

Route::get('formdisplay',[ClientController::class,'create'])->name('receiveform2');
Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');



