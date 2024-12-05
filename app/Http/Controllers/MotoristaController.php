<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('pages.motorista',['motorista'=>Motorista::orderBy('nomeCompleto','ASC')->get()]);
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
            $valor= Motorista::find($request->id);
        }else{

            $valor= new Motorista();
        }
        $valor->nomeCompleto=$request->nomeCompleto;
        $valor->genero=$request->genero;
        $valor->telefone=$request->telefone;
        $valor->email=$request->email;
        $valor->save();
        return redirect()->back()->with("Sucesso","Motorista CADASTRADO");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Motorista::find($id)->delete();
        return redirect()->back()->with("Sucesso","Motorista Eliminado");

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motorista $motorista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motorista $motorista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motorista $motorista)
    {
        //
    }
}
