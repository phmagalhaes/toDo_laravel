<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = "tarefas";

    protected $fillable = [
        "usuario_id",
        "descricao",
        "setor",
        "prioridade"
    ];
}
