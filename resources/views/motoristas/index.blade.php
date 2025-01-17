<x-layout>
    <div class="flex mb-12 text-2xl font-bold">
        <h1>Motoristas</h1>
    </div>
    <div class="flex mb-6  font-bold">
        <a href="/motoristas/adicionar" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <button type="button">Adicionar Motorista</button>
        </a>

    </div>
    <ul class="flex flex-wrap flex-gap">
        @foreach($motoristas as $motorista)
        <x-card href="/motoristas/{{$motorista['id']}}" routeDelete="motoristas.destroy" id="{{ $motorista['id'] }}" heeader-card="{{ $motorista['nome'] }}">
            <div class="text-white mb-8 mt-8">
                <p>Número da CNH: {{$motorista['numero_cnh']}}</p>
                <p>Data de Nascimento: {{ date('d/m/Y', strtotime($motorista['data_nascimento'])) }}</p>
            </div>
        </x-card>
        @endforeach
    </ul>
</x-layout>