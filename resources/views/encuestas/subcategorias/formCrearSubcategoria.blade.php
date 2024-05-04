<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            CRUD SUBCATEGORIAS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('encuesta.guardarNewSub')}}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="category_level_id">Seleccionar Categoria y Nivel:</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="category_level_id" name="category_level_id" required>
                                <option class="block mb-2 text-base font-medium text-gray-900 dark:text-white " value="">Seleccionar</option>
                                @foreach ($categoriaNivel as $llave)
                                    <option class="block mb-2 text-base font-medium text-gray-900 dark:text-white "
                                        value="{{ $llave->id }}">NIVEL: {{ $llave->level->name }}, CATEGORIA:
                                        {{ $llave->category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="first_name"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción subcategoria: </label>
                            <input type="text" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>

                        <div class="">
                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                <input type="submit" value="ENVIAR">
                            </button>
                        </div>
                    </form>
                </div>
                <div class="mx-6 mb-4">
                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        <a href=" {{ route('encuesta.listaSub') }}">VOLVER A LA LISTA</a>
                    </button>
                </div>
            </div>
        </div>
</x-app-layout>
