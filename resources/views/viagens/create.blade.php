<x-layout>
    <div class="flex mb-12 text-2xl font-bold">
        <h1>Adicionar Viagem</h1>
    </div>

    <div class="flex justify-center items-center w-full flex-wrap">
        <form action="{{ route('viagens.store') }}" method="POST" class="flex-col space-y-6 w-full">
            @csrf

            <!-- Campo de seleção de Veículo -->
            <label for="veiculo_id">Selecione o Veículo:</label>
            <select
                id="veiculo_id"
                name="veiculo_id"
                required
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                <option value="" disabled selected>Selecione um veículo</option>
                @foreach ($veiculosDisponiveis as $veiculo)
                <option value="{{ $veiculo->id }}" {{ old('veiculo_id') == $veiculo->id ? 'selected' : '' }}>
                    {{ $veiculo->placa }} - {{ $veiculo->modelo }}
                </option>
                @endforeach
            </select>

            <!-- Campo de seleção de Motoristas -->
            <label for="motoristas">Selecione os Motoristas:</label>
            <select
                id="motoristas"
                name="motoristas[]"
                multiple
                required
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                @foreach ($motoristasDisponiveis as $motorista)
                <option value="{{ $motorista->id }}" {{ in_array($motorista->id, old('motoristas', [])) ? 'selected' : '' }}>
                    {{ $motorista->nome }} - CNH: {{ $motorista->numero_cnh }}
                </option>
                @endforeach
            </select>

            <!-- Campo de KM Inicial -->
            <label for="km_inicial">KM Inicial:</label>
            <input
                type="number"
                id="km_inicial"
                name="km_inicial"
                value="{{ old('km_inicial') }}"
                required
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />

            <!-- Campo de KM Final -->
            <label for="km_final">KM Final:</label>
            <input
                type="number"
                id="km_final"
                name="km_final"
                value="{{ old('km_final') }}"
                required
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />

            <!-- Botão para adicionar a viagem -->
            <button
                type="submit"
                class="w-full mt-4 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Adicionar Viagem
            </button>
        </form>
    </div>
</x-layout>