<?php

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
Route::get('/', 'ContentsController@home')->name('home');
Route::get('/signup', 'AuthController@getSignUpPage')->name('signup');
Route::post('/signup', 'AuthController@postSignUp')->name('signup');
Route::get('/signin', 'AuthController@getSignInPage')->name('signin');
Route::post('/signin', 'AuthController@postSignIn')->name('signin');
Route::get('/logout', 'AuthController@getLogout')->name('logout');
Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');
Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');
Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom')->name('book_room');
//new
//Route::get('/{client_id?}', 'UserController@profile')->name('profile');


Route::group(['middleware' => 'roles'], function () {

    Route::group(['prefix' => 'clients','roles' => ['User']], function()
    {
        Route::get('/', 'UserController@index')->name('clients');
        Route::get('/new', 'UserController@newClient')->name('new_client');
        Route::post('/new', 'UserController@newClient')->name('create_client');
        Route::get('/{client_id}', 'UserController@show')->name('show_client');
        Route::post('/{client_id}', 'UserController@modify')->name('update_client');
        Route::get('/delete/{id?}', 'ReservationsController@DeleteReservation')->name('delete_reservation');
        Route::get('/profile/{client_id?}', 'UserController@profile')->name('profile');
        Route::get('/client_reservation/{client_id?}', 'ReservationsController@clientReservations')->name('show_reservations');
    });

    Route::group(['prefix' => 'admin','roles' => ['Admin']], function()
    {
        Route::get('/', 'UserController@dashboard')->name('dashboard');
        Route::get('/clients', 'UserController@viewUsers')->name('view_clients');
        Route::get('/reservations', 'ReservationsController@reservations')->name('reservations');
        Route::get('/rooms', 'RoomsController@viewRooms')->name('rooms');
        Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
        Route::get('/client_reservation/{client_id?}', 'ReservationsController@clientReservations')->name('show_client_reservation');
        Route::get('/delete/{room_id}',  'RoomsController@DeleteRoom')->name('delete_room');
        Route::get('/new', 'RoomsController@newRoom')->name('new_room');
        Route::post('/new', 'RoomsController@newRoom')->name('create_room');
        Route::post('/{room_id}', 'RoomsController@modifyRoom')->name('update_room');
        Route::get('/room/{room_id}', 'RoomsController@show')->name('show_room');
    });

});
 
//fanacy stuff
//Route::get('export', 'UserController@export');
//Route::get('/upload', 'ContentsController@upload')->name('upload');
//Route::post('/upload', 'ContentsController@upload')->name('upload');