<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.veiculo',['veiculo'=>Veiculo::orderBy('matricula','ASC')->get()]);
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
            $valor= Veiculo::find($request->id);
        }else{

            $valor= new Veiculo();
        }
        $valor->matricula=$request->matricula;
        $valor->tipo=$request->tipo;
        $valor->cilindrada=$request->cilindrada;
        $valor->peso=$request->peso;
        $valor->lotacao=$request->lotacao;
        $valor->numero_chaci=$request->numero_chaci;
        $valor->motorista_id=$request->motorista_id;
        $valor->save();
        return redirect()->back()->with("Sucesso","Veiculo CADASTRADO");
    }

    /**
     * Display the specified resource.
     */
    public function show( $veiculo)
    {
        Veiculo::find($veiculo)->delete();
        return redirect()->back()->with("Sucesso","Veiculo Eliminado");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veiculo $veiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        //
    }
}
