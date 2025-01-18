<x-layout>
    <div class="flex mb-12 text-2xl font-bold">
        <h1>Veiculos</h1>
    </div>
    <div class="flex mb-6  font-bold">
        <a href="/veiculos/adicionar" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <button type="button">Adicionar Veiculo</button>
        </a>

    </div>
    <ul class="flex flex-wrap flex-gap">
        @foreach($veiculos as $veiculo)
        <x-card details href="/veiculos/{{$veiculo['id']}}"
            routeDelete="veiculos.destroy"
            id="{{ $veiculo['id'] }}"
            header-card="{{ $veiculo['placa'] }}">

            <div class="text-white mb-8 mt-8">
                <p> RENAVAM: {{ $veiculo['renavam'] }} </p>
            </div>
        </x-card>
        @endforeach
    </ul>
</x-layout>