<?php

Route::get('/auth/logout', ['as' =>'auth.logout', function(){
  Auth::logout();
  return redirect()->route('login');
}]);

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






Route::group(['middleware' => 'auth'], function(){
  Route::get('/usuario/perfil', ['as' => 'usuario.perfil', 'uses' => "HomeController@perfilAvatar"]);
  Route::post('/usuario/perfil', ['as' => 'usuario.perfil.post', 'uses' => "HomeController@trocaAvatar"]);

  Route::post('/lancamento', ['as'=>'lancamento.store', 'uses'=>'LancamentoProjetoController@store']);
  Route::post('/lancamento/funcionario', ['as'=>'lancamento.lancaFuncionario', 'uses'=>'LancamentoProjetoController@lancaFuncionario']);
  Route::get('/lancamento/{id}', ['as'=>'lancamento.create', 'uses'=>'LancamentoProjetoController@create']);
  Route::get('/lancamento/{id}/remove-funcionario/{funcionario_id}', ['as'=>'lancamento.removefuncionario', 'uses'=>'LancamentoProjetoController@removeFuncionario']);
  Route::get('/lancamento/{id}/remove-item/{item_id}', ['as'=>'lancamento.removeItem', 'uses'=>'LancamentoProjetoController@removeItem']);


  Route::get('/', 'ClienteController@index');

  Route::group(['prefix'=>'cliente'], function(){
    Route::get('', ['as'=>'cliente.listagem', 'uses'=>'ClienteController@clientes']);
    Route::get('novo', ['as'=>'cliente.novo', 'uses'=>'ClienteController@create']);
    Route::post('novo', ['as'=>'cliente.store', 'uses'=>'ClienteController@store']);
    Route::get('edit/{id}', ['as'=>'cliente.edit', 'uses'=>'ClienteController@edit']);
    Route::put('edit/{id}', ['as'=>'cliente.update', 'uses'=>'ClienteController@update']);
    Route::get('delete/{id}', ['as'=>'cliente.destroy', 'uses'=>'ClienteController@destroy']);
  });

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


  Route::group(['prefix'=>'pdf', 'middleware' => 'auth'], function()
  {
    Route::get('cliente', 'PdfClienteController@index')->name('pdf.cliente');
    Route::get('cargo', 'PdfCargoController@index')->name('pdf.cargos');
    Route::get('categoria', 'PdfCategoriaController@index')->name('pdf.categorias');
    Route::get('fornecedor', 'PdfFornecedorController@index')->name('pdf.fornecedores');
    Route::get('funcionario', 'PdfFuncionarioController@index')->name('pdf.funcionarios');
    Route::get('produto', 'PdfProdutoController@index')->name('pdf.produtos');
    Route::get('projeto', 'PdfProjetoController@index')->name('pdf.projetos');

  });

  Route::group(['as'=>'cargo.', 'prefix'=>'cargo'], function ()
  {

    Route::get('', ['as'=>'listagem', 'uses'=>'CargoController@index']);

    Route::get('novo', ['as'=>'create', 'uses'=>'CargoController@create']);

    Route::post('novo', ['as'=>'storeDinamico', 'uses'=>'CargoController@storeDinamico']);
    Route::post('novo/dinamico', ['as'=>'store', 'uses'=>'CargoController@store']);
    Route::get('ajax', ['as'=>'ajax', 'uses'=>'CargoController@cargosJson']);


    Route::get('edit/{id}', ['as' => 'edit', 'uses'=>'CargoController@edit']);

    Route::put('edit/{id}', ['as'=>'update', 'uses'=>'CargoController@update']);

    Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'CargoController@destroy']);

  });
  Route::group(['as'=>'fornecedor.', 'prefix'=>'fornecedor'], function ()
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
  // Route::auth();
  Route::get('/funcionario', ['as'=>'funcionario.listagem', 'uses'=>'FuncionarioController@index']);

  Route::get('/funcionario/edit/{id}', ['as'=>'funcionario.edit', 'uses'=>'FuncionarioController@edit']);

  Route::put('/funcionario/edit/{id}', ['as'=>'funcionario.update', 'uses'=>'FuncionarioController@update']);

  Route::get('/funcionario/view/{id}', ['as'=>'funcionario.detalhe', 'uses'=>'FuncionarioController@view']);

  Route::get('/funcionario/delete/{id}', ['as'=>'funcionario.destroy', 'uses'=>'FuncionarioController@destroy']);

  Route::get('/funcionario/novo', ['as'=>'funcionario.create', 'uses'=>'FuncionarioController@create']);

  Route::post('/funcionario/novo', ['as'=>'funcionario.store', 'uses'=>'FuncionarioController@store']);

  Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
});

Auth::routes();



// Route::get('/home', 'HomeController@index');
