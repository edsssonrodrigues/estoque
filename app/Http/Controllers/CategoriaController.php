<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categories.index', compact('categorias'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoriaRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        $categoria->save();
        $request->session()->flash('mensagem', "Categoria {$categoria->nome} adicionada com sucesso!");
        return redirect(route('lista_categorias'));
    }
}
