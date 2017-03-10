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
  Route::get('/clientes', ['as' => 'aula.listagem_clientes', 'uses' => 'AulaController@clientes']);
  Route::get('/cadastrar', ['as' => 'aula.create', 'uses' => 'AulaController@create']);
  Route::put('/cliente/edit/{id}', ['as' => 'aula.update', 'uses' => 'AulaController@update']);
  Route::get('/cliente/edit/{id}', ['as' => 'aula.edit', 'uses' => 'AulaController@edit']);
  Route::get('/cliente/delete/{id}', ['as' => 'aula.destroy', 'uses' => 'AulaController@destroy']);
  Route::post('/cadastrar', ['as' => 'aula.store', 'uses' => 'AulaController@store']);
});

// Route::get('/', ['middleware'=>'auth', 'PostsController@index']);
// Route::get('/test', 'TestController@index');
// Route::get('/notas', 'TestController@notas');

Route::get('/', 'ClienteController@index');
Route::get('/cliente', ['as'=>'cliente.listagem', 'uses'=>'ClienteController@clientes']);
Route::get('/cliente/novo', ['as'=>'cliente.novo', 'uses'=>'ClienteController@create']);
Route::post('/cliente/novo', ['as'=>'cliente.store', 'uses'=>'ClienteController@store']);
Route::get('/cliente/edit/{id}', ['as'=>'cliente.edit', 'uses'=>'ClienteController@edit']);
Route::put('/cliente/edit/{id}', ['as'=>'cliente.update', 'uses'=>'ClienteController@update']);
Route::get('/cliente/delete/{id}', ['as'=>'cliente.destroy', 'uses'=>'ClienteController@destroy']);

Route::group(['prefix'=>'blog', 'middleware'=>'auth'], function()
{
  Route::post('/', ['as' => 'blog.store', 'uses' =>'PostsController@store']);
  Route::get('/', ['as' => 'blog.index', 'uses' => 'PostsController@index']);
  Route::put('edit/{id}', ['as' => 'blog.update', 'uses' =>'PostsController@update']);
  Route::get('edit/{id}', ['as' => 'blog.edit', 'uses' =>'PostsController@edit']);
  Route::get('delete/{id}', ['as' => 'blog.destroy', 'uses' =>'PostsController@destroy']);
});

Auth::routes();

Route::get('/api/cliente', 'ClienteController@index');
Route::post('/api/cliente', 'ClienteController@store');
Route::get('/api/cliente/{id}', 'ClienteController@show');
Route::delete('/api/cliente/{id}', 'ClienteController@destroy');

Route::get('/funcionario', ['as'=>'funcionario.listagem', 'uses'=>'FuncionarioController@index']);

Route::get('/funcionario/edit/{id}', ['as'=>'funcionario.edit', 'uses'=>'FuncionarioController@edit']);

Route::put('/funcionario/edit/{id}', ['as'=>'funcionario.update', 'uses'=>'FuncionarioController@update']);

Route::get('/funcionario/delete/{id}', ['as'=>'funcionario.destroy', 'uses'=>'FuncionarioController@destroy']);

Route::get('/funcionario/novo', ['as'=>'funcionario.create', 'uses'=>'FuncionarioController@create']);

Route::post('/funcionario/novo', ['as'=>'funcionario.store', 'uses'=>'FuncionarioController@store']);


Route::group(['prefix'=>'projeto'], function ()
{

  Route::get('', ['as'=>'projeto.listagem', 'uses'=>'ProjetoController@index']);

  Route::get('novo', ['as'=>'projeto.create', 'uses'=>'ProjetoController@create']);

  Route::post('novo', ['as'=>'projeto.store', 'uses'=>'ProjetoController@store']);

  Route::put('edit/{id}', ['as'=>'projeto.edit', 'uses'=>'ProjetoController@edit']);

  Route::get('edit/{id}', ['as'=>'projeto.destroy', 'uses'=>'ProjetoController@destroy']);
});



Route::get('/home', 'HomeController@index');
