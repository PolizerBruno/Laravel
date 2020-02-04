<?php

namespace App\Http\Controllers;

use App\Equipe;
use App\Prioridades;
use App\Tarefas;
use App\Tipo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipos = Tipo::all();
        $prioridades = Prioridades::all();
        $equipes = Equipe::all();
        return view('home',['tipos'=>$tipos,'prioridades'=>$prioridades,'equipes'=>$equipes]);
    }
    public function store(Request $request){

    }
}
