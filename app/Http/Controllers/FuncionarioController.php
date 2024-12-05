<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.funcionario',['funcionario'=>Funcionario::orderBy('nomeCompleto','ASC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valor=null;
        if(isset($request->id)){
            $valor= Funcionario::find($request->id);
        }else{

            $valor= new Funcionario();
            if($request->cargo == "Atendente"){
                $user  = User::cadastrar($request);
                $valor->user_id=$user->id;
            }
        }
        $valor->nomeCompleto=$request->nomeCompleto;
        $valor->cargo=$request->cargo;
        $valor->genero=$request->genero;
        $valor->telefone=$request->telefone;
        $valor->email=$request->email;
        $valor->data_nascimento=$request->data_nascimento;
        $valor->save();
        return redirect()->back()->with("Sucesso","FUNCIONARIO CADASTRADO");
    }

    /**
     * Display the specified resource.
     */
    public function show($funcionario)
    {
        $funcionario = Funcionario::find($funcionario)->delete();;
        return redirect()->back()->with("Sucesso","FUNCIONARIO CADASTRADO");

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }
}
