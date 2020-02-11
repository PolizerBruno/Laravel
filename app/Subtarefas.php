<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtarefas extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','status_id','tarefa_id','user_id'];

    public function estado()
    {
        return $this->belongsTo(Estado::class,'status_id');
    }
    public function tarefas()
    {
        return $this->belongsTo(Tarefas::class,'tarefa_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'tarefa_id');
    }

}
