<x-layout>
    <div class="p-6">
        <div class="bg-white shadow-lg shadow-gray-500/40 rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Editar Veículo</h1>

            <form action="{{ route('veiculos.modify', ['id' => $veiculo->id]) }}" method="POST" class="flex-col space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="placa" class="block text-sm font-medium text-gray-700">Placa:</label>
                    <input type="text" id="placa" name="placa" value="{{ old('placa', $veiculo->placa) }}" required
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                </div>

                <div>
                    <label for="renavam" class="block text-sm font-medium text-gray-700">Renavam:</label>
                    <input type="text" id="renavam" name="renavam" value="{{ old('renavam', $veiculo->renavam) }}" required
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                </div>

                <div>
                    <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo:</label>
                    <input type="text" id="modelo" name="modelo" value="{{ old('modelo', $veiculo->modelo) }}" required
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                </div>

                <div>
                    <label for="ano" class="block text-sm font-medium text-gray-700">Ano:</label>
                    <input type="number" id="ano" name="ano" value="{{ old('ano', $veiculo->ano) }}" required
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                </div>

                <div>
                    <label for="data_aquisicao" class="block text-sm font-medium text-gray-700">Data de Aquisição:</label>
                    <input type="date" id="data_aquisicao" name="data_aquisicao" value="{{ old('data_aquisicao', $veiculo->data_aquisicao) }}" required
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                </div>

                <div>
                    <label for="km_aquisicao" class="block text-sm font-medium text-gray-700">KM Rodados na Aquisição:</label>
                    <input type="number" id="km_aquisicao" name="km_aquisicao" value="{{ old('km_aquisicao', $veiculo->km_aquisicao) }}" required
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                </div>





                <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Atualizar Veículo
                </button>
            </form>

            @if ($errors->any())
            <ul class="px-4 py-2 mt-4 bg-red-100">
                @foreach ($errors->all() as $error)
                <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <a href="{{ route('veiculos.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Voltar para a lista de veículos</a>
        </div>
    </div>
</x-layout>