<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    public function listar(){
        $produtos = [
            "notebook Asus i7 16GB",
            "Mouse e teclado Microsoft USB",
            "Monitor 21 - Samsung",
            "Disco SSD 512GB"
        ];
        return view('produto', compact('produtos'));
    }
}
