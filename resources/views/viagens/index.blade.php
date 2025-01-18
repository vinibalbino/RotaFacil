<x-layout>
    <div class="flex mb-12 text-2xl font-bold">
        <h1>Viagens</h1>
    </div>
    <div class="flex mb-6  font-bold">
        <a href="/viagens/adicionar" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <button type="button">Adicionar Viagem</button>
        </a>

    </div>
    <ul class="flex flex-wrap gap-3">
        @foreach($viagens as $viagem)
        <x-card details href="/viagens/{{$viagem['id']}}"
            routeDelete="viagens.destroy"
            id="{{ $viagem['id'] }}"
            header-card="Quantidade de motoristas: {{ count($viagem->motoristas) }}">

            <div class="text-white mb-8 mt-8">
                <p>Placa do veículo: {{ $viagem->veiculo->placa }}</p>
                <p>RENAVAM: {{ $viagem->veiculo->renavam }}</p>
                <p>KM Inicial: {{ $viagem->km_inicial }}</p>
                <p>KM Final: {{ $viagem->km_final }}</p>

                <div class="mt-4">
                    <p class="font-semibold">Motoristas:</p>
                    <ul>
                        @foreach($viagem->motoristas as $motorista)
                        <li>
                            Número da CNH: {{ $motorista->numero_cnh }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </x-card>
        @endforeach
    </ul>
</x-layout>