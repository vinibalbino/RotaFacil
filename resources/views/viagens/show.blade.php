<x-layout>
    <div class="flex mb-12 text-2xl font-bold">
        <h1>Detalhes da Viagem</h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h3 class="text-xl font-semibold">Informações da Viagem</h3>
        <p><strong>PLACA:</strong> {{ $viagem->veiculo->placa ?? 'Não disponível' }}</p>
        <p><strong>RENAVAM:</strong> {{ $viagem->veiculo->renavam ?? 'Não disponível' }}</p>
        <p><strong>KM Inicial:</strong> {{ $viagem->km_inicial }}</p>
        <p><strong>KM Final:</strong> {{ $viagem->km_final }}</p>
        <p><strong>Status:</strong> {{ $viagem->finished ? 'Finalizada' : 'Em andamento' }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-semibold mb-4">Motoristas da Viagem</h3>
        <ul>
            @foreach($viagem->motoristas as $motorista)
            <li class="mb-2">
                <p><strong>Nome:</strong> {{ $motorista->nome }}</p>
                <p><strong>CNH:</strong> {{ $motorista->numero_cnh }}</p>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="flex flex-col space-y-4">

        <a href="{{ route('viagens.edit', $viagem->id) }}" class="w-full">
            <button type="button" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Editar Viagem
            </button>
        </a>

        <form action="{{ route('viagens.destroy', $viagem->id) }}" method="POST" class="w-full">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Deseja realmente excluir esta viagem?')" type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Excluir Viagem
            </button>
        </form>
    </div>

</x-layout>