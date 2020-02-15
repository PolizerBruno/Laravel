<?php

namespace App;

use Faker\Calculator\Ean;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefas extends Model
{

    use SoftDeletes;

    protected $fillable = ['name','text','tipo_id','prioridade_id','equipe_id','tarefa_id','deadLine'];

    public function tipos()
    {
        return $this->belongsTo(Tipo::class,'tipo_id');
    }
    public function prioridades()
    {
        return $this->belongsTo(Prioridades::class,'prioridade_id');
    }
    public function equipes()
    {
        return $this->belongsTo(Equipe::class,'equipe_id');
    }

}
