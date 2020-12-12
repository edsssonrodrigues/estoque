<?php

Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/create', 'ProdutoController@create');
Route::get('/produtos/{id}', 'ProdutoController@show');
Route::post('/produtos', 'ProdutoController@store');
Route::get('/produtos/{id}/edit', 'ProdutoController@edit');
Route::put('/produtos/{id}', 'ProdutoController@update');
Route::delete('/produtos/{id}', 'ProdutoController@destroy');
