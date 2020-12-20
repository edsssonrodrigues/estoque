<?php

Route::prefix('produtos')->group(function () {
    Route::get('', 'ProdutoController@index')->name('lista_produtos');
    Route::get('/create', 'ProdutoController@create')->name('form_cria_produto');
    Route::get('/{id}', 'ProdutoController@show')->name('exibe_produto');
    Route::post('', 'ProdutoController@store')->name('cria_produto');
    Route::get('/{id}/edit', 'ProdutoController@edit')->name('form_edita_produto');
    Route::put('/{id}', 'ProdutoController@update')->name('edita_produto');
    Route::delete('/{id}', 'ProdutoController@destroy')->name('remove_produto');
});

Route::prefix('categorias')->group(function () {
    Route::get('', 'CategoriaController@index')->name('lista_categorias');
    Route::get('/create', 'CategoriaController@create')->name('form_cria_categoria');
    Route::post('', 'CategoriaController@store')->name('cria_categoria');
    Route::get('/{id}/edit', 'CategoriaController@edit')->name('form_edita_categoria');
    Route::patch('/{id}', 'CategoriaController@update')->name('edita_categoria');
    Route::delete('/{id}', 'CategoriaController@destroy')->name('remove_categoria');
});
