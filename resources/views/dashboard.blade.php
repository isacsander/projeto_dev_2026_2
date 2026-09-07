<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Comando - Missão Espacial</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <nav class="navbar">
        <div style="display: flex; align-items: center; gap: 30px;">
            <a href="{{ route('dashboard') }}" style="color: #60a5fa; text-decoration: none; font-weight: bold;">Recrutas</a>
            <a href="{{ route('cargos.index') }}" style="color: #cbd5e1; text-decoration: none; transition: 0.3s;">Gerenciar Vagas</a>
        </div>
        <h2>Centro de Comando</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-sair">Sair do Sistema</button>
        </form>
    </nav>

    <div class="container">
        
        @if(session('sucesso'))
            <div class="alerta-sucesso">
                {{ session('sucesso') }}
            </div>
        @endif

        <div class="card card-filtro">
            <form action="{{ route('dashboard') }}" method="GET" class="form-filtro">
                <input type="text" name="busca" placeholder="Buscar por nome ou e-mail..." value="{{ request('busca') }}" class="input-filtro input-busca">
                
                <select name="status" class="input-filtro select-status">
                    <option value="">Todos os Status</option>
                    <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="confirmado" {{ request('status') == 'confirmado' ? 'selected' : '' }}>Confirmado</option>
                    <option value="cancelado" {{ request('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
                
                <button type="submit" class="btn btn-aprovar">Filtrar</button>
                <a href="{{ route('dashboard') }}" class="link-limpar">Limpar</a>
            </form>
        </div>
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Recruta</th>
                        <th>Cargo Pretendido</th>
                        <th>Data do Teste</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidatos as $candidato)
                    <tr>
                        <td>
                            <p class="recruta-nome">{{ $candidato->nome }}</p>
                            <p class="recruta-detalhe">{{ $candidato->email }}</p>
                            <p class="recruta-detalhe">CPF: {{ $candidato->cpf }}</p>
                        </td>
                        
                        <td>{{ $candidato->cargo->cargo }}</td>

                        <td>{{ \Carbon\Carbon::parse($candidato->data_teste_aptidao)->format('d/m/Y') }}</td>
                        
                        <td style="text-align: center;">
                            <span class="badge badge-{{ $candidato->status }}">
                                {{ $candidato->status }}
                            </span>
                        </td>
                        
                        <td style="text-align: center;">
                            @if($candidato->status == 'pendente')
                                <div class="acoes">
                                    <form action="{{ route('candidato.status', $candidato->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="confirmado">
                                        <button type="submit" class="btn btn-aprovar">Aprovar</button>
                                    </form>
                                    
                                    <form action="{{ route('candidato.status', $candidato->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="cancelado">
                                        <button type="submit" class="btn btn-reprovar">Reprovar</button>
                                    </form>
                                </div>
                            @else
                                <span class="analisado">Analisado</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px;">
            {{ $candidatos->links() }}
        </div>

    </div>

</body>
</html>