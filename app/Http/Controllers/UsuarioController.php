<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $user = new Usuario();
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->save();

        return redirect(route('usuarios.create'))->with('msg', 'Usuário criado com sucesso');
    }
}
