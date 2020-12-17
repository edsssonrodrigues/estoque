<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::orderBy('id', 'DESC')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('categories.index', compact('categorias', 'mensagem'));
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

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categories.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, $id) {
        $categoria = Categoria::find($id);
        $categoria->nome = $request->nome;
        $categoria->save();
        $request->session()->flash('mensagem', "Categoria {$categoria->nome} editada com sucesso!");
        return redirect(route('lista_categorias'));
    }
}
