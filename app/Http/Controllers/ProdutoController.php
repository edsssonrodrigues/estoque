<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function lista()
    {
        $html = '<h1>Listagem de proutos</h1>';

        $produtos = DB::select('SELECT * FROM produtos');


        foreach ($produtos as $produto) {
            $html .=    '<b>Nome:</b> ' . $produto->nome . '<br>' .
                        '<b>Valor:</b> ' . $produto->valor . '<br>' .
                        '<b>Descrição:</b> ' . $produto->descricao . '<br>' .
                        '<b>Quantidade:</b> ' . $produto->quantidade . '<hr>';
        }

        return $html;
    }
}
