<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TarefaController extends Controller
{
    public function index()
    {
        $fazer = Tarefa::where('status', 'a fazer')->get();
        $fazendo = Tarefa::where('status', 'fazendo')->get();
        $pronto = Tarefa::where('status', 'pronto')->get();
        return view('tarefas.index', ['fazer' => $fazer, 'fazendo' => $fazendo, 'pronto' => $pronto]);
    }

    public function create()
    {
        $usuarios = Usuario::all();

        return view('tarefas.create', ['usuarios' => $usuarios]);
    }

    public function store(Request $request)
    {
        $tarefa = new Tarefa();
        $tarefa->descricao = $request->descricao;
        $tarefa->id_usuario = $request->usuario;
        $tarefa->setor = $request->setor;
        $tarefa->prioridade = $request->prioridade;
        $tarefa->save();

        return redirect(route('tarefas.create'))->with('msg', 'Tarefa criada com sucesso');
    }

    public function delete($id)
    {
        Tarefa::findOrFail($id)->delete();
        return redirect(route('tarefas.index'))->with('msg', 'Tarefa deletada com sucesso');
    }

    public function status($id, Request $request)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->status = $request->status;
        $tarefa->update();
        return redirect(route('tarefas.index'))->with('msg', 'Tarefa alterada com sucesso');
    }

    public function edit($id, Request $request)
    {
        $tarefa = Tarefa::findOrFail($id);

        $prioridades = ['baixa', 'media', 'alta'];
        $index = array_search($tarefa->prioridade, $prioridades);
        if ($index !== false) {
            unset($prioridades[$index]);
        }
        $prioridades = array_values($prioridades);

        $usuarios = Usuario::pluck('nome')->toArray();
        $usuario = Usuario::where('id', $tarefa->id_usuario)->first();
        $index = array_search($usuario->nome, $usuarios);
        if ($index !== false) {
            unset($usuarios[$index]);
        }
        $usuarios = array_values($usuarios);

        return view('tarefas.edit', ["tarefa" => $tarefa, 'prioridades' => $prioridades, 'usuarios' => $usuarios]);
    }
}
