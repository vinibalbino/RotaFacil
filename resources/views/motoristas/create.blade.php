<x-layout>
    <div class="flex mb-12 text-2xl font-bold">
        <h1>Adicionar - Motorista</h1>
    </div>

    <div class="flex justify-center items-center w-full flex-wrap">
        <form action="{{route('motoristas.store')}}" method="POST" class="flex-col space-y-6  w-full">

            @csrf

            <label for="nome">Nome Completo:</label>
            <input
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 "
                type="text"
                id="nome"
                name="nome"
                value="{{ old('nome') }}"
                required>


            <label for="numero_cnh">Número da CNH:</label>
            <input
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 " type="number"
                id="numero_cnh"
                name="numero_cnh"
                value="{{ old('nome') }}"
                required />
            <label for="data_nascimento">Data de Nascimento:</label>
            <input
                type="date"
                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 " type="number"
                id="data_nascimento"
                name="data_nascimento"
                value="{{ old('nome') }}"
                required />
            <!-- 
                <label for="dojo_id">Dojo:</label>
                <select id="dojo_id" name="dojo_id" required>
                    <option value="" disabled selected>Select a dojo</option>
                    
                </select>
            -->

            <button type="submit" class="w-full mt-4 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Adicionar Motorista</button>

            <!-- validation errors -->
            @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach($errors->all() as $error)
                <li class="my-2 text-red-500">{{ $error}}</li>
                @endforeach
            </ul>
            @endif
        </form>
    </div>


</x-layout>