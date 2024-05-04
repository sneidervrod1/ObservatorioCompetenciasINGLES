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
                    <form action="{{ route('encuesta.guardarActualizarSub', $subcategoria->id )}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-4">
                            <label for="first_name"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción subcategoria: </label>
                            <input type="text" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required  placeholder="{{ $subcategoria->description }}"/>
                        </div>

                        <div class="">
                            <button
                                class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                <input type="submit" value="ACTUALIZAR">
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
