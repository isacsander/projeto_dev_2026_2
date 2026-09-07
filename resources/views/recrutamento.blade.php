<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missão Espacial - Recrutamento</title>
    <link rel="stylesheet" href="{{ asset('css/recrutamento.css') }}">
</head>
<body>

    <div class="container">
        <div class="cabecalho">
            <h1>Projeto Missão Espacial</h1>
            <p>Voluntarie-se para a maior jornada da humanidade.</p>
        </div>

        @if(session('sucesso'))
            <div class="mensagem-sucesso">
                {{ session('sucesso') }}
            </div>
        @endif

        <form action="{{ route('candidato.store') }}" method="POST">
            @csrf
            
            <div class="grupo-input" style="margin-bottom: 15px;">
                <label>Nome Completo</label>
                <input type="text" name="nome" required>
                @error('nome') <span class="erro-validacao">{{ $message }}</span> @enderror
            </div>
            
            <div class="grupo-input" style="margin-bottom: 15px;">
                <label>E-mail</label>
                <input type="email" name="email" required>
                @error('email') <span class="erro-validacao">{{ $message }}</span> @enderror
            </div>
            
            <div class="linha-formulario">
                <div class="grupo-input">
                    <label>CPF</label>
                    <input type="text" name="cpf" required>
                    @error('cpf') <span class="erro-validacao">{{ $message }}</span> @enderror
                </div>
                <div class="grupo-input">
                    <label>Telefone</label>
                    <input type="text" name="telefone" required>
                    @error('telefone') <span class="erro-validacao">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="linha-formulario">
                <div class="grupo-input">
                    <label>Cargo Pretendido</label>
                    <select name="cargo_id" required>
                        <option value="">Selecione uma opção...</option>
                        @foreach($cargos as $cargo)
                            <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grupo-input">
                    <label>Data do Teste de Aptidão</label>
                    <input type="date" name="data_teste_aptidao" required>
                </div>
            </div>

            <button type="submit">Quero me Voluntariar</button>
        </form>
    </div>

</body>
</html>