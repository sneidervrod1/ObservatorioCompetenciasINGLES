<x-app-layout>
    <x-slot name="header">
        <h2 class="font-mono font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            MODIFICAR PESOS CATEGORIAS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400">
                            @if (session('success'))   
                                <div class="bg-transparent text-left py-4 lg:px-4">
                                    <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                                        <span class="font-semibold mr-2 text-left flex-auto"> {{ session('success') }} </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                                        </svg>
                                    </div>
                                </div>
                                <meta http-equiv="refresh" content="5">
                            @endif
                            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 ">
                                <th class="px-4 py-2 text-white text-center">
                                    <span  class="font-bold text-center"> NIVEL </span> </th>
                                <th class="px-4 py-2 text-white text-center">
                                    <span class="font-bold text-center"> CATEGORIAS</span>
                                </th>
                                <th class="px-4 py-2 text-white text-center">
                                    <span class="font-bold text-center"> OPCIONES</span>
                                </th>
                            </tr>
                            @foreach ($niveles as $item)
                                
                                <tr>
                                    <th class="text-center text-lg">{{ $item->name }}</th>
                                    <th class="text-center" id="nested">
                                        @foreach ($item->categories as $cat)
                                            <span class="text-center text-lg inline-block bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-2 py-1">
                                                {{ $cat->name }}: {{ $cat->pivot->weight_category }} 
                                            </span>
                                        @endforeach
                                    </th>
                                    <th class="px-4 py-2 text-center text-red-600"> 
                                        <button type="button" class="mt-3 px-3 py-2 text-sm font-medium text-center text-yellow-500 hover:text-white bg-yellow-500 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-transparent dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 border border-yellow-500">
                                            <a href="{{ route('encuesta.pesoCategoria', ['nivel' => $item->id]) }}">EDITAR</a>
                                        </button>
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
