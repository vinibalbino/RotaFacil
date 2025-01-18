<x-layout>
    <div class="p-6">
        <div class="bg-white shadow-lg shadow-gray-500/40 rounded-lg p-6">
            <div class="flex mb-12 text-2xl font-bold">
                <h1>Adicionar - Motorista</h1>
            </div>

            <div class="flex justify-center items-center w-full flex-wrap">
                <form action="{{ route('motoristas.store') }}" method="POST" class="flex-col space-y-6 w-full">
                    @csrf

                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome Completo:</label>
                        <input
                            class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                            type="text"
                            id="nome"
                            name="nome"
                            value="{{ old('nome') }}"
                            required />
                    </div>


                    <div>
                        <label for="numero_cnh" class="block text-sm font-medium text-gray-700">Número da CNH:</label>
                        <input
                            class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                            type="number"
                            id="numero_cnh"
                            name="numero_cnh"
                            value="{{ old('numero_cnh') }}"
                            required />
                    </div>

                    <div>
                        <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento:</label>
                        <input
                            class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                            type="date"
                            id="data_nascimento"
                            name="data_nascimento"
                            value="{{ old('data_nascimento') }}"
                            required />
                    </div>

                    <button type="submit" class="w-full mt-4 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Adicionar Motorista
                    </button>

                    @if ($errors->any())
                    <ul class="px-4 py-2 mt-4 bg-red-100">
                        @foreach($errors->all() as $error)
                        <li class="my-2 text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </form>
            </div>
        </div>
    </div>

</x-layout>