<x-layout>
    <div class="flex mb-12 text-2xl font-bold">
        <h1>Editar Viagem</h1>
    </div>

    <div class="flex justify-center items-center w-full flex-wrap">
        <form action="{{ route('viagens.modify', ['id' => $viagem->id]) }}" method="POST" class="flex-col space-y-6 w-full">
            @csrf
            @method('PUT')

            <label for="veiculo_id">Selecione o Veículo:</label>
            <select
                id="veiculo_id"
                name="veiculo_id"
                required
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                <option value="" disabled>Selecione um veículo</option>
                @foreach ($veiculosDisponiveis as $veiculo)
                <option value="{{ $veiculo->id }}" {{ $veiculo->id == $viagem->veiculo_id ? 'selected' : '' }}>
                    {{ $veiculo->placa }} - {{ $veiculo->modelo }}
                </option>
                @endforeach
            </select>

            <label for="motoristas">Selecione os Motoristas:</label>
            <select
                id="motoristas"
                name="motoristas[]"
                multiple
                required
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                @foreach ($motoristasDisponiveis as $motorista)
                <option value="{{ $motorista->id }}" {{ in_array($motorista->id, $viagem->motoristas->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $motorista->nome }} - CNH: {{ $motorista->numero_cnh }}
                </option>
                @endforeach
            </select>

            <label for="km_inicial">KM Inicial:</label>
            <input
                type="number"
                id="km_inicial"
                name="km_inicial"
                value="{{ old('km_inicial', $viagem->km_inicial) }}"
                required
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />

            <label for="km_final">KM Final:</label>
            <input
                type="number"
                id="km_final"
                name="km_final"
                value="{{ old('km_final', $viagem->km_final) }}"
                required
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />




            <button
                type="submit"
                class="w-full mt-4 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Atualizar Viagem
            </button>
        </form>
    </div>
</x-layout>