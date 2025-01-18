<div class="flex-auto m-5 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg shadow-gray-500/50 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-4 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
        {{ $attributes->get('header-card') }}
    </h5>

    {{ $slot }}

    <div class="flex flex-col space-y-4 mt-4">
        @if ($attributes->get('details'))
        <a href="{{ $attributes->get('href') }}" class="w-full">
            <button type="button" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Veja Detalhes
            </button>
        </a>
        @endif

        <a href="{{ $attributes->get('href') }}/editar" class="w-full">
            <button type="button" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Editar
            </button>
        </a>

        <form class="w-full" action="{{ route($attributes->get('routeDelete'), $attributes->get('id')) }}" method="POST">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Deseja realmente excluir?')" type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Deletar
            </button>
        </form>
    </div>
</div>