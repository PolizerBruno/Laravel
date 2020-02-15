<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Prioridades;
use App\subTarefas;
use App\Tarefas;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MinhasTarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin){
            $tarefas = Tarefas::with('tipos','prioridades','equipes')->orderBy('prioridade_id','desc')->get();
        }else{
            $tarefas = Tarefas::where('equipe_id',Auth::user()->equipe_id)->with('tipos','prioridades','equipes')->orderBy('prioridade_id','desc')->get();
        }
        $subtarefas = subTarefas::with('tarefas','estado','user:id,name')->get();
        $array[] = "";
        foreach($tarefas as $tarefa){
            $dividendo = 0;
            $contador = 0;
            foreach($subtarefas as $subtarefa){
                if($subtarefa->estado->id == 4 && $subtarefa->tarefa_id == $tarefa->id){
                    $contador++;
                }
                if($subtarefa->tarefa_id == $tarefa->id){
                    $dividendo++;
                }
            }
            $array[$tarefa->id] = $contador/$dividendo*100;
        }
        $estados = Estado::all();
        return view('tarefas.index',['tarefas' =>$tarefas,'subtarefas'=>$subtarefas,'estados'=>$estados,'porcentagem'=>$array]);
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
        $request->validate([
            'tarefaName' => 'required|min:3',
            'tarefaDescreve' => 'required',
            'tarefaPrioridade' => 'required',
            'tarefaTipo' => 'required',
            'tarefaEquipe'=>'required',
            'subTarefas' =>'required',
            'deadLine' => 'required|date_format:Y-m-d|after:today'
        ]);
        $tarefa = Tarefas::create(['name'=>trim($request->tarefaName),'text'=>trim($request->tarefaDescreve),'tipo_id'=>$request->tarefaTipo,'prioridade_id'=>$request->tarefaPrioridade,'equipe_id'=>$request->tarefaEquipe,'deadLine'=>$request->deadLine]);
        foreach($request->subTarefas as $etapa){
            subTarefas::create(['name' =>$etapa,'tarefa_id'=>$tarefa->id,'status_id'=>2,'user_id'=>null]);
        }
        return redirect()->action(
            'MinhasTarefasController@index'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->ordernar == 'name'){
            $tarefas = Tarefas::where('equipe_id',Auth::user()->equipe_id)->with('tipos','prioridades')->orderBy('name')->get();
        }
        if($request->ordernar == 'prioridade cresc'){
            $tarefas = Tarefas::where('equipe_id',Auth::user()->equipe_id)->with('tipos','prioridades')->orderBy('prioridade_id','asc')->get();
        }
        if($request->ordernar == 'prioridade decr'){
            $tarefas = Tarefas::where('equipe_id',Auth::user()->equipe_id)->with('tipos','prioridades')->orderBy('prioridade_id','desc')->get();
        }if($request->ordernar == NULL){
             $tarefas = Tarefas::where('equipe_id',Auth::user()->equipe_id)->with('tipos','prioridades')->orderBy('id')->get();
        }
        $subtarefas = subTarefas::with('tarefas','estado')->get();
        $array[] = "";
        foreach($tarefas as $tarefa){
            $dividendo = 0;
            $contador = 0;
            foreach($subtarefas as $subtarefa){
                if($subtarefa->estado->id == 4 && $subtarefa->tarefa_id == $tarefa->id){
                    $contador++;
                }
                if($subtarefa->tarefa_id == $tarefa->id){
                    $dividendo++;
                }
            }
            $array[$tarefa->id] = $contador/$dividendo*100;
        }
        $estados = Estado::all();
        return view('tarefas.index',['tarefas' =>$tarefas,'subtarefas'=>$subtarefas,'estados'=>$estados,'porcentagem'=>$array]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefas = Tarefas::where('id',$id)->with('tipos','prioridades')->first();
        $subtarefas = subTarefas::where('tarefa_id',$id)->get();
        $tipos = Tipo::all();
        $estado = Estado::all();
        $prioridades = Prioridades::all();
        return view('tarefas.edit',['tarefas' =>$tarefas,'tipos'=>$tipos,'prioridades'=>$prioridades,'subtarefas'=>$subtarefas,'estados'=>$estado]);
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
        Tarefas::find($id)->update(['name'=>$request->tarefaName,'text'=>$request->tarefaDescreve,'tipo_id'=>$request->tarefaTipo,'prioridade_id'=>$request->tarefaPrioridade]);
        subTarefas::where('tarefa_id',$id)->delete();
        $i = 0;
        foreach ($request->subTarefas as $subtarefa) {
          subTarefas::create(['name'=>$subtarefa,'tarefa_id'=>$id,'status_id'=>$request->estado[$i],'user_id'=>auth()->user()->id]);
          $i++;
        }
        return redirect()->action(
            'MinhasTarefasController@index'
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarefas::find($id)->delete();
        return redirect()->action(
            'MinhasTarefasController@index'
        );
    }
}
