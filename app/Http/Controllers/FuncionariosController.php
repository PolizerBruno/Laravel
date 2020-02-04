<?php

namespace App\Http\Controllers;

use App\Equipe;
use App\Funcoes;
use App\User;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = User::select('id','name')->get();
        return view('funcionarios.index',['funcionarios'=>$funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $funcionario = User::where('id',$id)->with('equipes','funcoes')->first();
        $funcoes = Funcoes::all();
        $equipes = Equipe::all();
        return view('funcionarios.edit',['funcionario'=>$funcionario,'funcoes'=>$funcoes,'equipes'=>$equipes]);
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
        $request->validate([
            'name'=>'required',
            'funcao' =>'required',
            'equipe' => 'required',
        ]);
        if(isset($request->admin)){
            User::find($id)->update(['name'=>$request->name,'funcao_id'=>$request->funcao,'equipe_id'=>$request->equipe,'admin'=>1]);
        }else{
            User::find($id)->update(['name'=>$request->name,'funcao_id'=>$request->funcao,'equipe_id'=>$request->equipe,'admin'=>0]);
        }
        return redirect(route('funcionarios.index'));
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
