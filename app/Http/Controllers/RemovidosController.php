<?php

namespace App\Http\Controllers;

use App\Tarefas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RemovidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin){
            $tarefas = Tarefas::with('tipos','prioridades','equipes')->onlyTrashed()->get();
        }else{
            $tarefas = Tarefas::where('equipe_id',Auth::user()->equipe_id,)->onlyTrashed()->with('tipos','prioridades')->get();
        }
        return view('tarefas.removidas',['tarefas' =>$tarefas]);
    }
    public function restore($id)
    {
        Tarefas::withTrashed()->find($id)->restore();
        $tarefas = Tarefas::where('equipe_id',Auth::user()->equpe_id,)->onlyTrashed()->with('tipos','prioridades')->get();
        return view('tarefas.removidas',['tarefas' =>$tarefas]);
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
        Tarefas::withTrashed()->find($id)->forceDelete();
        $tarefas = Tarefas::where('equipe_id',Auth::user()->equipe_id)->onlyTrashed()->with('tipos','prioridades')->get();
        return view('tarefas.removidas',['tarefas' =>$tarefas]);
    }
}
