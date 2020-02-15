<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopularTabelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tipos')->insert(array('tipo'=>'Digitalização'));
        DB::table('tipos')->insert(array('tipo'=>'Processamento'));
        DB::table('tipos')->insert(array('tipo'=>'Preparação'));
        DB::table('equipes')->insert(array('name'=>'Digitalização'));
        DB::table('equipes')->insert(array('name'=>'Atendimento ao Cliente'));
        DB::table('equipes')->insert(array('name'=>'Contabilidade'));
        DB::table('funcoes')->insert(array('name'=>'Digitalizador'));
        DB::table('funcoes')->insert(array('name'=>'Preparador'));
        DB::table('funcoes')->insert(array('name'=>'Auxiliar serviços gerais'));
        DB::table('prioridades')->insert(array('prioridade'=>'Baixa'));
        DB::table('prioridades')->insert(array('prioridade'=>'Média'));
        DB::table('prioridades')->insert(array('prioridade'=>'Alta'));
        DB::table('prioridades')->insert(array('prioridade'=>'Urgente'));
        DB::table('estados')->insert(array('name'=>'Pendente - Problemas'));
        DB::table('estados')->insert(array('name'=>'Em progresso'));
        DB::table('estados')->insert(array('name'=>'Incompleta'));
        DB::table('estados')->insert(array('name'=>'Completada'));
        DB::table('users')->insert(array('name'=>'Bruno Henrique Polizer', 'password'=>'$2y$10$w/0GRrtqpVY2j6.FqW2t4e.7abuS/qLgSVRvz2vRrqiaLB6YNIfrm','email'=>'polizerbruno@gmail.com','admin'=>true,'funcao_id'=>1,'equipe_id'=>1));
        DB::table('users')->insert(array('name'=>'Pedro Henrique Polizer', 'password'=>'$2y$10$w/0GRrtqpVY2j6.FqW2t4e.7abuS/qLgSVRvz2vRrqiaLB6YNIfrm','email'=>'polizerpedro@gmail.com','admin'=>false,'funcao_id'=>1,'equipe_id'=>1));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
