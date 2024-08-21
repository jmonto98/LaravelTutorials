<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');

Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('/about', function () {
    $data1 = 'About us - Online Store';
    $data2 = 'About us';
    $description = 'This page was developed as a class project for the subject Special Topics in Systems Engineering at EAFIT University.';
    $author = 'Developed by: John Montoya';

    return view('home.about')->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('description', $description)
        ->with('author', $author);
})->name('home.about');

Route::get('/contact', function () {
    $data1 = 'Contact us - Online Store';
    $data2 = 'Contact us';
    $email = 'fxmail@fakestore.com';
    $address = 'Springfield';
    $phone = '604 5521245';

    return view('home.contact')->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('email', $email)
        ->with('address', $address)
        ->with('phone', $phone);
})->name('home.contact');
