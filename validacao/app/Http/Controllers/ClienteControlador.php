<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $regras = [
        //     'nome' => 'required|min:3|max:10|unique:Clientes'(nome da tabela) - usa-se  o pipe msm para separar. Unique para nao ter mais de um registro com o mesmo nome
        //     'idade'=> 'required',
        //     'endereco' => 'required|min:5',
        //     'email' => 'required|email'
        // ];
        // $mensagens = [ 
        //     'nome.required' => 'O nome é requerido',
        //     'idade.required' => 'A idade é requerida',
        //     'endereco.required' => 'O endereço é requerido',
        //     'email.required' => 'O Email é requerido'
        // ];
        // $request->validate($regras, $mensagens);

//outra forma é feita acima.. a forma abaixo é mais utilizada 

    $request->validate([//para o campo ser requirido.. se nao for preenchido não será salvo
        //'nome' é relativo ao name do formulario
        'nome' => 'required|unique:clientes',
        'idade'=> 'required',
        'endereco' => 'required|min:5',
        'email' => 'required|email'
    ],  $mensagens = [ 
        /*apenas um required para qlq campo (é um required genérico)
            'required' => 'O campo :attribute não pode estar em branco', (:attribute se refere ao atributo em branco)*/
            'nome.required' => 'Digite um nome',
            'nome.unique' => 'O nome do usuário já existe',
            'idade.required' => 'Digite a idade',
            'endereco.required' => 'Digite um endereço',
            'endereco.min' => 'É necessário pelo menos 5 caracteres',
            'email.required' => 'Digite um endereço de email',
            'email.email' => 'Digite um endereço de email válido',
    ]);



        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->idade = $request->input('idade');
        $cliente->endereco = $request->input('endereco');
        $cliente->email = $request->input('email');
        $cliente->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
