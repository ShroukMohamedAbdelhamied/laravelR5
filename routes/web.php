<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('test20',[MyController::class,'my_data']);

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

Route::post('recform1', function() {
    return 'Data received';
})->name('receiveform1');
//Route::fallback(function() {
      // return 'The required is not found';
      //return redirect('/');
//});
