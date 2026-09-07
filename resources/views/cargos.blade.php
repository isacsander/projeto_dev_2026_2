<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas - Missão Espacial</title>
    <link rel="stylesheet" href="{{ asset('css/cargos.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-links">
            <h2>Centro de Comando</h2>
            <a href="{{ route('dashboard') }}" class="nav-link">Recrutas</a>
            <a href="{{ route('cargos.index') }}" class="nav-link active">Gerenciar Vagas</a>
        </div>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-sair">Sair do Sistema</button>
        </form>
    </nav>

    <div class="container">
        
        @if(session('sucesso'))
            <div class="alerta alerta-sucesso">
                {{ session('sucesso') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alerta alerta-erro">
                Essa vaga já existe ou o campo está vazio!
            </div>
        @endif

        <div class="card">
            <h3>Abrir Nova Vaga</h3>
            <form action="{{ route('cargos.store') }}" method="POST" class="form-vaga">
                @csrf
                <input type="text" name="cargo" placeholder="Ex: Engenheiro Quântico" required class="input-vaga">
                <button type="submit" class="btn btn-cadastrar">Cadastrar Vaga</button>
            </form>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Título do Cargo</th>
                        <th class="text-center">Status Atual</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cargos as $cargo)
                    <tr>
                        <td><strong>{{ $cargo->cargo }}</strong></td>
                        
                        <td class="text-center">
                            <span class="badge {{ $cargo->ativo ? 'badge-ativo' : 'badge-inativo' }}">
                                {{ $cargo->ativo ? 'Ativo' : 'Desativado' }}
                            </span>
                        </td>
                        
                        <td class="text-center">
                            <form action="{{ route('cargos.toggle', $cargo->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if($cargo->ativo)
                                    <button type="submit" class="btn btn-desativar">Desativar</button>
                                @else
                                    <button type="submit" class="btn btn-reativar">Reativar</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>