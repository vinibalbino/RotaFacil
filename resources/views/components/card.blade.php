<div class="flex-auto m-5 max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $attributes->get('heeader-card') }}</h5>
    {{ $slot }}
    <div class="flex flex-wrap p-0 ">
        @if ($attributes->get('details'))
        <a href="{{ $attributes->get('href') }}" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <button type="button">
                Veja Detalhes
            </button>
        </a>

        @endif
        <a href="{{ $attributes->get('href') }}/editar" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <button type="button">Editar</button>
        </a>
        <form class="flex flex-wrap p-0 w-full" action=" {{ route($attributes->get('routeDelete'), $attributes->get('id')) }}" method="POST">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('Deseja Realmente excluir?')" class="w-full focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit">
                Deletar
            </button>
        </form>
    </div>
</div>