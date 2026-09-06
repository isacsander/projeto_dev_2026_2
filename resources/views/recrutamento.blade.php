<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missão Espacial - Recrutamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen flex flex-col items-center justify-center bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop')] bg-cover bg-center bg-no-repeat bg-blend-overlay bg-black/60">

    <div class="max-w-2xl w-full bg-slate-800/80 backdrop-blur-md p-8 rounded-xl shadow-2xl border border-slate-700 mt-10 mb-10">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-blue-400 mb-2">Projeto Missão Espacial</h1>
            <p class="text-gray-300">Voluntarie-se para a maior jornada da humanidade.</p>
        </div>
        @if(session('sucesso'))
            <div class="mb-4 bg-green-500/20 border border-green-500 text-green-400 p-4 rounded-md text-center font-bold">
                {{ session('sucesso') }}
            </div>
        @endif

        <form action="/candidatos" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-300">Nome Completo</label>
                <input type="text" name="nome" required class="mt-1 block w-full rounded-md bg-slate-700 border-slate-600 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-300">E-mail</label>
                <input type="email" name="email" required class="mt-1 block w-full rounded-md bg-slate-700 border-slate-600 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2">
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300">CPF</label>
                    <input type="text" name="cpf" required class="mt-1 block w-full rounded-md bg-slate-700 border-slate-600 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300">Telefone</label>
                    <input type="text" name="telefone" required class="mt-1 block w-full rounded-md bg-slate-700 border-slate-600 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2">
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300">Cargo Pretendido</label>
                    <select name="cargo_id" required class="mt-1 block w-full rounded-md bg-slate-700 border-slate-600 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2">
                        <option value="">Selecione uma opção...</option>
                        @foreach($cargos as $cargo)
                            <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300">Data do Teste de Aptidão</label>
                    <input type="date" name="data_teste_aptidao" required class="mt-1 block w-full rounded-md bg-slate-700 border-slate-600 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2 [color-scheme:dark]">
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-slate-900 transition-colors">
                    Quero me Voluntariar
                </button>
            </div>
        </form>
    </div>
</body>
</html>