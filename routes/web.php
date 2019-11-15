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

Route::get('/', function () {
    return redirect('login');
});

    //route::view('/login', "auth.login")->name('login');
    Route::get('/login', 'Auth\LoginController@isLogged')->name('login');
    Route::post('/authentication', 'Auth\LoginController@authentication')->name('authentication');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    //HOME
    Route::view('/home', 'home')->name('home'); 
    Route::get('/home', ['uses'=>'HomeController@index', 'as' => 'home']);  


    //calendar
    Route::get('event/add','ScheduleController@createEvent');
    Route::get('/event/add/client','ScheduleController@createEventCliente');
    Route::post('event/add','ScheduleController@store');
    Route::post('event/client','ScheduleController@storeClient');
    Route::get('event','ScheduleController@calender');


Route::group( [ 'middleware' => 'auth'], function()
{


    Route::group( [ 'middleware' => 'auth'], function() 
    {

    //Perfil do cliente (crair middleware client) https://blog.especializati.com.br/middleware-no-laravel-filtros/
    Route::view('/Profile', 'profile')->name('profile')->middleware('auth'); 
    Route::get('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    Route::post('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    //Route::view('/ExamesPaciente', 'paciente')->name('paciente')->middleware('auth'); 
    Route::get('/ExamesPaciente', ['uses'=>'ExamController@indexPaciente', 'as' => 'paciente']);
    Route::post('/Profile/update/{id}', ['uses'=>'UserController@updateProfile', 'as' => 'User.updateProfile']);
    Route::post('/perfil', ['uses'=>'UserController@perfilAtualiza','as'=>'User.perfilAtualiza']);
    Route::get('/diagnotico/user', ['uses'=>'ExamController@indexDiagnostic', 'as' => 'Exam.ViewExamUser']);

});

    //Routes user
    Route::get('/User', ['uses'=>'UserController@index', 'as' => 'User.index']);
    Route::get('/User/add', ['uses'=>'UserController@add', 'as' => 'User.add']);
    Route::post('/User/save', ['uses'=>'UserController@save', 'as' => 'User.save']);
    Route::get('/User/edit/{id}', ['uses'=>'UserController@edit', 'as' => 'User.edit']);
    Route::get('/User/updateProfile', ['uses'=>'UserController@profileUpdate', 'as' => 'User.profileUpdate']);
    Route::get('/User/load/{id}', ['uses'=>'UserController@load', 'as' => 'User.load']);
    Route::get('/User/delete/{id}', ['uses'=>'UserController@delete', 'as' => 'User.delete']);

    //Routes Imagens de exames
    //Route::post('/ExamImage/uploadImages', ['uses'=>'ExamImageController@uploadImages', 'as' => 'Exam.uploadImages']);
    //Route::get('/ExamImage/images/{id}', ['uses'=>'ExamImageController@images', 'as' => 'Exam.images']);
    //Route::post('/ExamImage/images', ['uses'=>'ExamImageController@UparImagens', 'as' => 'Examimage.UparImagens']);
    
    //Routes visualizar imagens
    //Route::get('/ViewExam', ['uses'=>'ExamController@ViewExam', 'as' => 'Exam.ViewExam']);
    //Route::get('/ViewExam/{id}', ['uses'=>'ExamController@visualizar', 'as' => 'Exam.visualizar']);
    
//Routes Plates
Route::get('/plates', ['uses'=>'PlateController@index', 'as' => 'plates.index']);
Route::get('/plates/add', ['uses'=>'PlateController@add', 'as' => 'plates.add']);
Route::post('/plates/save', ['uses'=>'PlateController@save', 'as' => 'plates.save']);
Route::get('/plates/edit/{id}', ['uses'=>'PlateController@edit', 'as' => 'plates.edit']);
Route::put('/plates/update/{id}', ['uses'=>'PlateController@update', 'as' => 'plates.update']);
Route::get('/plates/delete/{id}', ['uses'=>'PlateController@delete', 'as' => 'plates.delete']);


//Usuários
Route::Post('/people/add/user', ['uses'=>'UserController@save', 'as' => 'user.save']);

//Routes people
Route::get('/people', ['uses'=>'PeopleController@index', 'as' => 'people.index']);
Route::get('/people/add', ['uses'=>'PeopleController@add', 'as' => 'people.add']);
Route::post('/people/save', ['uses'=>'PeopleController@save', 'as' => 'people.save']);
Route::get('/people/edit/{id}', ['uses'=>'PeopleController@edit', 'as' => 'people.edit']);
Route::put('/people/update/{id}', ['uses'=>'PeopleController@update', 'as' => 'people.update']);
Route::get('/people/delete/{id}', ['uses'=>'PeopleController@delete', 'as' => 'people.delete']);

Route::post('/people/save', ['uses'=>'PeopleController@save', 'as' => 'people.save']);
    
Route::get('/people/detail/{id}', ['uses'=>'PeopleController@detail', 'as' => 'people.detail']);
Route::get('/telefone/add/{id}', ['uses'=>'TelefoneController@add', 'as' => 'telefone.add']);
Route::post('/telefone/save/{id}', ['uses'=>'TelefoneController@save', 'as' => 'telefone.save']);
//Routes plate
Route::get('/plate', '...@index')->name('plate.save');
//Route::get('/plates', 'EventController@index')->name('events.agenda');

});