<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciamento de Tarefas</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body>
    <header>
        <p>Gerenciamento de Tarefas</p>
        <nav>
            <a href="{{ route('tarefas.index') }}">Ver tarefas</a>
            <a href="{{ route('tarefas.create') }}">Criar tarefas</a>
            <a href="{{ route('usuarios.create') }}">Adicionar usuário</a>
        </nav>
    </header>
    <main>
        <article>
            <p class="article_title">A fazer</p>
            <div class="tarefas">
                @foreach ($fazer as $tarefa_fazer)
                    <div class="tarefa">
                        <p>{{ $tarefa_fazer->descricao }}</p>
                        @php
                            $user = App\Models\Usuario::where('id', $tarefa_fazer->id_usuario)->first();
                            
                        @endphp
                        <p><strong>Usuário:</strong> {{ $user->nome }}</p>
                        <p><strong>Setor:</strong> {{ $tarefa_fazer->setor }}</p>
                        <p><strong>Prioridade:</strong> {{ $tarefa_fazer->prioridade }}</p>
                        <form class="alterar" method="POST" action="{{ route('tarefas.status', ['id' => $tarefa_fazer->id])}}">
                            @csrf
                            @method('PUT')
                            <select name="status" id="">
                                <option value="a fazer">A fazer</option>
                                <option value="fazendo">Fazendo</option>
                                <option value="pronto">Pronto</option>
                            </select>
                            <button>Alterar</button>
                        </form>
                        <div class="buttons">
                            <a href="">Editar</a>
                            <a href="{{ route('tarefas.delete', ['id' => $tarefa_fazer->id])}}">Excluir</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
        <article>
            <p class="article_title">Fazendo</p>
            <div class="tarefas">
                @foreach ($fazendo as $tarefa_fazendo)
                    <div class="tarefa">
                        <p>{{ $tarefa_fazendo->descricao }}</p>
                        @php
                            $user = App\Models\Usuario::where('id', $tarefa_fazendo->id_usuario)->first();
                        @endphp
                        <p><strong>Usuário:</strong> {{ $user->nome }}</p>
                        <p><strong>Setor:</strong> {{ $tarefa_fazendo->setor }}</p>
                        <p><strong>Prioridade:</strong> {{ $tarefa_fazendo->prioridade }}</p>
                        <form class="alterar" method="POST" action="{{ route('tarefas.status', ['id' => $tarefa_fazendo->id])}}">
                            @csrf
                            @method('PUT')
                            <select name="status" id="">
                                <option value="fazendo">Fazendo</option>
                                <option value="a fazer">A fazer</option>
                                <option value="pronto">Pronto</option>
                            </select>
                            <button>Alterar</button>
                        </form>
                        <div class="buttons">
                            <a href="">Editar</a>
                            <a href="{{ route('tarefas.delete', ['id' => $tarefa_fazendo->id])}}">Excluir</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
        <article>
            <p class="article_title">Pronto</p>
            <div class="tarefas">
                @foreach ($pronto as $tarefa_pronto)
                    <div class="tarefa">
                        <p>{{ $tarefa_pronto->descricao }}</p>
                        @php
                            $user = App\Models\Usuario::where('id', $tarefa_pronto->id_usuario)->first();
                        @endphp
                        <p><strong>Usuário:</strong> {{ $user->nome }}</p>
                        <p><strong>Setor:</strong> {{ $tarefa_pronto->setor }}</p>
                        <p><strong>Prioridade:</strong> {{ $tarefa_pronto->prioridade }}</p>
                        <form class="alterar" method="POST" action="{{ route('tarefas.status', ['id' => $tarefa_pronto->id])}}">
                            @csrf
                            @method('PUT')
                            <select name="status" id="">
                                <option value="pronto">Pronto</option>
                                <option value="a fazer">A fazer</option>
                                <option value="fazendo">Fazendo</option>
                            </select>
                            <button>Alterar</button>
                        </form>
                        <div class="buttons">
                            <a href="">Editar</a>
                            <a href="{{ route('tarefas.delete', ['id' => $tarefa_pronto->id])}}">Excluir</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </main>
</body>

</html>