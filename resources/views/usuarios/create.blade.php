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
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            @method('POST')
            <label for="name">Nome:</label>
            <input type="text" placeholder="nome" name="nome" required>

            <br>

            <label for="name">Email:</label>
            <input type="email" name="email" placeholder="email" required>
            
            <br>

            <button type="submit">Criar usuário</button>
        </form>
        <br>
        @if (session('msg'))
            <p>{{ session('msg') }}</p>
        @endif
    </main>
</body>

</html>