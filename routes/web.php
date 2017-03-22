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

Route::get('/auth/logout', ['as' =>'auth.logout', function(){
  Auth::logout();
  return redirect()->route('home');
}]);

// Route::get('/auth/login', function(){
//   Auth::logout();
// });

Route::get('/auth/login', 'Auth\AuthController@getLogin');

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

Route::post('/lancamento', ['as'=>'lancamento.store', 'uses'=>'LancamentoProjetoController@store']);
Route::post('/lancamento/funcionario', ['as'=>'lancamento.lancaFuncionario', 'uses'=>'LancamentoProjetoController@lancaFuncionario']);
Route::get('/lancamento/{id}', ['as'=>'lancamento.create', 'uses'=>'LancamentoProjetoController@create']);


Route::group(['as'=>'projeto.', 'prefix'=>'projeto'], function ()
{

  Route::get('', ['as'=>'listagem', 'uses'=>'ProjetoController@index']);

  Route::get('view/{id}', ['as'=>'view', 'uses'=>'ProjetoController@view']);

  Route::get('novo', ['as'=>'create', 'uses'=>'ProjetoController@create']);

  Route::post('novo', ['as'=>'store', 'uses'=>'ProjetoController@store']);


  Route::get('edit/{id}', ['as' => 'edit', 'uses'=>'ProjetoController@edit']);

  Route::put('edit/{id}', ['as'=>'update', 'uses'=>'ProjetoController@update']);

  Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'ProjetoController@destroy']);

});

Route::group(['as'=>'cargo.', 'prefix'=>'cargo'], function ()
{

  Route::get('', ['as'=>'listagem', 'uses'=>'CargoController@index']);

  Route::get('novo', ['as'=>'create', 'uses'=>'CargoController@create']);

  Route::post('novo', ['as'=>'store', 'uses'=>'CargoController@store']);


  Route::get('edit/{id}', ['as' => 'edit', 'uses'=>'CargoController@edit']);

  Route::put('edit/{id}', ['as'=>'update', 'uses'=>'CargoController@update']);

  Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'CargoController@destroy']);

});



Route::group(['as'=>'fornecedor.', 'prefix'=>'fornecedor', 'middleware' => 'auth'], function ()
{

  Route::get('', ['as'=>'listagem', 'uses'=>'FornecedorController@index']);

  Route::get('novo', ['as'=>'create', 'uses'=>'FornecedorController@create']);

  Route::post('novo', ['as'=>'store', 'uses'=>'FornecedorController@store']);


  Route::get('edit/{id}', ['as' => 'edit', 'uses'=>'FornecedorController@edit']);

  Route::put('edit/{id}', ['as'=>'update', 'uses'=>'FornecedorController@update']);

  Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'FornecedorController@destroy']);

});

Route::group(['as'=>'produto.', 'prefix'=>'produto'], function ()
{

  Route::get('', ['as'=>'listagem', 'uses'=>'ProdutoController@index']);

  Route::get('novo', ['as'=>'create', 'uses'=>'ProdutoController@create']);

  Route::post('novo', ['as'=>'store', 'uses'=>'ProdutoController@store']);


  Route::get('edit/{id}', ['as' => 'edit', 'uses'=>'ProdutoController@edit']);

  Route::put('edit/{id}', ['as'=>'update', 'uses'=>'ProdutoController@update']);

  Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'ProdutoController@destroy']);

});


Route::group(['as'=>'categoria.', 'prefix'=>'categoria'], function ()
{

  Route::get('', ['as'=>'listagem', 'uses'=>'CategoriaController@index']);

  Route::get('novo', ['as'=>'create', 'uses'=>'CategoriaController@create']);

  Route::post('novo', ['as'=>'store', 'uses'=>'CategoriaController@store']);


  Route::get('edit/{id}', ['as' => 'edit', 'uses'=>'CategoriaController@edit']);

  Route::put('edit/{id}', ['as'=>'update', 'uses'=>'CategoriaController@update']);

  Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'CategoriaController@destroy']);

});




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

Route::get('/funcionario/view/{id}', ['as'=>'funcionario.detalhe', 'uses'=>'FuncionarioController@view']);

Route::get('/funcionario/delete/{id}', ['as'=>'funcionario.destroy', 'uses'=>'FuncionarioController@destroy']);

Route::get('/funcionario/novo', ['as'=>'funcionario.create', 'uses'=>'FuncionarioController@create']);

Route::post('/funcionario/novo', ['as'=>'funcionario.store', 'uses'=>'FuncionarioController@store']);







Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
