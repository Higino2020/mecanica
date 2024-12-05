<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.manutencoes',['manutencao'=>Manutencao::all()]);
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
        $manu = null;
        if(isset($request->id)){
            $manu = Manutencao::find($request->id);
        }else{
            $manu = new Manutencao();
        }
        $manu->tipo = $request->tipo;
        $manu->preco = $request->preco;
        $manu->descricao = $request->descricao;
        $manu->save();
        return redirect()->back()->with('Sucesso','Tipo de Manutenção cadastrada com exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Manutencao::find($id)->delete();
        return redirect()->back()->with('Sucesso','Tipo de Manutenção Eliminada com exito');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manutencao $manutencao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manutencao $manutencao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manutencao $manutencao)
    {
        //
    }
}
