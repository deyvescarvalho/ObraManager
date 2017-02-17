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



// Route::get('/auth', function()
// {
//   if (Auth::attempt(['email'=>'deyvescarvalho@gmail.com', 'password'=>'secret'])) {
//     # code...
//     return "oi";
//   }
//   return "Falhou";
//   // $user = \App\User::find(1);
//   // Auth::login($user);
//   //
//   // if (Auth::check()) {
//   //   return "oi";
//   // }
//
// });

// Route::get('/auth/logout', function(){
//   Auth::logout();
// });

// Route::get('/auth/login', function(){
//   Auth::logout();
// });

// Route::get('/auth/login', 'Auth\AuthController@getLogin');

Route::group(['prefix'=>'aula'], function(){
  Route::get('/home', ['as' => 'aula.index', 'uses' => 'AulaController@index']);
  Route::get('/cadastrar', ['as' => 'aula.create', 'uses' => 'AulaController@create']);
  Route::post('/cadastrar', ['as' => 'aula.store', 'uses' => 'AulaController@store']);
});

Route::get('/', ['middleware'=>'auth', 'PostsController@index']);
Route::get('/test', 'TestController@index');
Route::get('/notas', 'TestController@notas');

Route::group(['prefix'=>'blog', 'middleware'=>'auth'], function()
{
  Route::post('/', ['as' => 'blog.store', 'uses' =>'PostsController@store']);
  Route::get('/', ['as' => 'blog.index', 'uses' => 'PostsController@index']);
  Route::put('edit/{id}', ['as' => 'blog.update', 'uses' =>'PostsController@update']);
  Route::get('edit/{id}', ['as' => 'blog.edit', 'uses' =>'PostsController@edit']);
  Route::get('delete/{id}', ['as' => 'blog.destroy', 'uses' =>'PostsController@destroy']);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
