<?php

Route::prefix('/produtos')->group(function () {
    Route::get('', 'ProdutoController@index')->name('lista_produtos');
    Route::get('/create', 'ProdutoController@create')->name('form_cria_produto');
    Route::get('/{id}', 'ProdutoController@show')->name('exibe_produto');
    Route::post('', 'ProdutoController@store')->name('cria_produto');
});

// Route::get('/produtos', 'ProdutoController@index')->name('lista_produtos');
// Route::get('/produtos/create', 'ProdutoController@create')->name('form_cria_produto');
// Route::get('/produtos/{id}', 'ProdutoController@show')->name('exibe_produto');
// Route::post('/produtos', 'ProdutoController@store')->name('cria_produto');
Route::get('/produtos/{id}/edit', 'ProdutoController@edit')->name('form_edita_produto');
Route::put('/produtos/{id}', 'ProdutoController@update')->name('edita_produto');
Route::delete('/produtos/{id}', 'ProdutoController@destroy')->name('remove_produto');

Route::get('/categorias', 'CategoriaController@index')->name('lista_categorias');
Route::get('/categorias/create', 'CategoriaController@create')->name('form_cria_categoria');
Route::post('/categorias', 'CategoriaController@store')->name('cria_categoria');
Route::get('/categorias/{id}/edit', 'CategoriaController@edit')->name('form_edita_categoria');
Route::patch('/categorias/{id}', 'CategoriaController@update')->name('edita_categoria');
