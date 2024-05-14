<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            CRUD VALIDACIONES CATEGORIAS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mx-6 mb-4 flex justify-around">
                        <button
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href= "{{ route('validation.crear') }}"> CREAR CATEGORIA VALIDACIÓN </a>
                        </button>
                        <button
                            class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                            <a href= "{{ route('validation.mostrarpesoValidacionCat') }}"> MODIFICAR PESOS CATEFORIAS </a>
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="bg-transparent text-left py-4 lg:px-4">
                            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                                role="alert">
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
                    <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 ">
                        <colgroup span="5" width="100"></colgroup>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap font-bold w-2/3 text-xl">CATEGORIA</td>
                                <td class="px-6 py-4 font-bold whitespace-pre-line  text-lg">PESOS </td>
                                <td class="px-6 py-4 font-bold whitespace-pre-line  text-lg">AGREGAR </td>
                                <td class="px-6 py-4 whitespace-no-wrap font-bold  text-lg"> MODIFICAR</td>
                                <td class="px-6 py-4 whitespace-no-wrap font-bold  text-lg">ELIMINAR</td>
                            </tr>
                            {{-- DESDE TABLE CATEGORY_LEVEL LLAMO LOS REGISTROS --}}
                            @forelse ($catValidation as $item) {{-- ACCEDO A SUBCATEGORY DESDE CAT_LEV --}}
                                <tr>
                                    <td class=" text-3xl font-semibold">
                                        {{ $item->description }}
                                    </td>
                                    <td class="text-center text-2xl font-semibold">
                                        {{ $item->weight_validation_category }}
                                    </td>
                                   
                                    <td class="text-center ">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-md">
                                            <a href= "{{ route('validation.crearQuestion', ['validationCategory' => $item->id]) }}">AGREGAR </a>
                                        </button>
                                    </td>

                                    <td class="text-center ">
                                        {{-- <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded-md">
                                            <a href= "{{ route('validation.actualizarValidacionCate', ['valCate' => $item->id]) }}">MODIFICAR </a>
                                        </button> --}}
                                    </td>

                                    <td class="lg:pl-5 "> 
                                        {{-- <form method="POST" action=" {{ route('validation.eliminarCatValidation', ['catValidation' => $item->id]) }}" >
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class=" px-3 py-2 text-sm font-medium text-center text-red-500 hover:text-white bg-red-500 rounded-md hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-transparent dark:hover:bg-red-500 dark:focus:ring-red-600 border border-red-500">
                                                <input type="submit" value="ELIMINAR">
                                            </button>
                                        </form> --}}
                                    </td>

                                </tr>
                                <tr class="mt-20 text-center border-spacing-2	" >
                                 
                                        <th class="border-spacing-2	">PREGUNTAS</th>

                                  <td class="text-center ">
                                            <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-1 px-2 border border-yellow-500 hover:border-transparent rounded-md">
                                                <a href= " {{ route('validation.mostrarPesoQuestVal', ['catVal' => $item->id]) }}">PESOS</a>
                                            </button>
                                        </td>
    
                                </tr>
                                
                            @forelse ($item->validationQuestions as $a)
                                <tr>
                                        <td class="text-base">
                                            
                                            <p> *   {{ $a->description }}</p>        
                                        </td>   
                                        <td class="text-center">
                                            {{ $a->weight_validation_question }}
                                        </td>  
                                        <td class="text-center ">
                                        </td>

                                        <td class="text-center ">
                                            <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-1 px-2 border border-yellow-500 hover:border-transparent rounded-md">
                                                <a href= "{{ route('validation.actualizarValidacionQuest', ['quest' => $a->id]) }}">MODIFICAR</a>
                                            </button>
                                        </td>
    
                                        <td class="text-center"> 
                                            <form method="POST" action=" {{ route('validation.eliminarQuestValidation', ['quest' => $a->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class=" px-2 py-1 text-sm font-medium text-center text-red-500 hover:text-white bg-red-500 rounded-md hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-transparent dark:hover:bg-red-500 dark:focus:ring-red-600 border border-red-500">
                                                    <input type="submit" value="ELIMINAR">
                                                </button>
                                            </form>
                                        </td>
                                    
                                    @empty
                                        <td class="px-5 text-sm font-normal ">NO DATA PREGUNTAS VALIDACION</td>                                        
                                    @endforelse
                                
                                </tr>
                               

                            @empty {{-- SI NO HAY REGISTROS --}}
                                <tr>
                                    <td class="px-7" colspan="5">
                                        <span class="text-base">NO SE ENCONTRARON REGISTROS DE VALIDACIONES
                                            CATEGORIAS</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
</x-app-layout>
