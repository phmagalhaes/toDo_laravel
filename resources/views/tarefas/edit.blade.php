<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciamento de Tarefas</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/criarUsuario.css') }}">
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
        <form action="{{ route('tarefas.store') }}" method="POST">
            @csrf
            @method('POST')
            <label for="descricao">Descrição:</label>
            <input type="text" placeholder="descricao" value="{{ $tarefa->descricao }}" name="descricao" required>

            <br>

            <label for="setor">Setor:</label>
            <input type="text" name="setor" value="{{ $tarefa->setor }}" required placeholder="setor">

            <br>

            <label for="usuario">Usuário:</label>
            <select name="usuario" id="">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                @endforeach
            </select>

            <br>

            <label for="prioridade">Prioridade:</label>
            <select name="prioridade" id="">
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>
            
            <br>

            <button type="submit">Alterar Tarefa</button>
        </form>
        <br>
        @if (session('msg'))
            <p>{{ session('msg') }}</p>
        @endif
    </main>
</body>

</html>