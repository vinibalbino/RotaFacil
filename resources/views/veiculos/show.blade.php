<x-layout>
    <div class="p-6">
        <div class="bg-white shadow-lg shadow-gray-500/40 rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Detalhes do Veículo</h1>
            <div class="mb-4">
                <h2 class="text-lg font-semibold">Placa:</h2>
                <p class="text-gray-700">{{ $veiculo->placa }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold">Renavam:</h2>
                <p class="text-gray-700">{{ $veiculo->renavam }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold">Modelo:</h2>
                <p class="text-gray-700">{{ $veiculo->modelo }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold">Ano:</h2>
                <p class="text-gray-700">{{ $veiculo->ano }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold">Data de Aquisição:</h2>
                <p class="text-gray-700">{{ date('d/m/Y', strtotime($veiculo['data_aquisicao']))}}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold">KM Rodados na Aquisição:</h2>
                <p class="text-gray-700">{{ $veiculo->km_aquisicao }}</p>
            </div>

            <div class="flex flex-col space-y-4">
                <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="w-full">
                    <button type="button" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Editar Veículo
                    </button>
                </a>

                <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" class="w-full">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Deseja realmente excluir este veículo?')" type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Excluir Veículo
                    </button>
                </form>
            </div>

            <a href="{{ route('veiculos.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Voltar para a lista de veículos</a>
        </div>
    </div>
</x-layout>