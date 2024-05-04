<x-app-layout>
    <x-slot name="header">
        <h2 class="font-mono font-semibold text-2xl text-center text-gray-800 dark:text-gray-200">
            CRUD SUBCATEGORIAS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <div class="mx-3 text-center mt-3 px-4 font-mono hover:">
                            <span>  {{ $catelevel->onEachSide(1)->links() }} </span>
                        </div>
                    </div>
                    <div class="mx-6 mb-4"> 
                        <button  class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href= "{{ route('encuesta.createSub') }}"> CREAR SUBCATEGORIAS </a>
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
                    <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400">
                        <colgroup span="6" width="100"></colgroup>
                        <tbody>
                            <tr>
                                <td colspan="2" class="px-6 py-4 whitespace-no-wrap font-bold"> NIVEL</td>
                                <td class="px-6 py-4 whitespace-no-wrap font-bold"> CATEGORIA </td>
                                <td class="px-6 py-4 font-bold whitespace-pre-line"> PESOS SUBCATEGORIAS  </td>
                                <td  class="px-6 py-4 font-bold whitespace-pre-line"> MODIFICACIÓN  </td>
                                <td class="px-6 py-4 font-bold whitespace-normal "> ELIMINACIÓN  </td>
                            </tr>
                            {{-- DESDE TABLE CATEGORY_LEVEL LLAMO LOS REGISTROS--}}
                            @foreach ($catelevel as $catenivel)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                    <td colspan="2" class=" px-6 py-4 whitespace-no-wrap font-bold">{{ $catenivel->level->name }} </td> {{--ACCEDO A LEVEL DESDE CAT_LEV--}}
                                    <td class="px-6 py-4 whitespace-no-wrap font-bold">{{ $catenivel->category->name }} </td>{{--ACCEDO A CAT DESDE CAT_LEV--}}
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <button type="button" class="mt-3 px-3 py-2 text-sm font-medium text-center text-yellow-500 hover:text-white bg-yellow-500 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-transparent dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 border border-yellow-500">
                                            <a class="" href="{{ route('encuesta.pesoSubcategoria', ['cateNivel' => $catenivel->id]) }}">EDITAR PESOS </a> 
                                        </button>
                                    </td>
                                </tr>
                                @forelse ($catenivel->subcategories as $sub) {{--ACCEDO A SUBCATEGORY DESDE CAT_LEV --}}
                                    <tr>                                          
                                        <td colspan="3" class="pl-7 font-thin " colspan="2"> <span class="text-base"> - {{ $sub->description }}  </span> </td>
                                        <td class="pl-7  " colspan="1">   <span class="text-base">{{ $sub->weight_subcategory }}  </span> </td>
                                        <td class="lg:pl-10 font-thin mt-2"> 
                                            <button type="button" class="mt-3 px-3 py-2 text-sm font-medium text-center text-yellow-500 hover:text-white bg-yellow-500 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-transparent dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 border border-yellow-500">
                                                <a href="{{ route('encuesta.actualizarSubcategoria', ['subcategoria' => $sub->id]) }}" >EDITAR </a> 
                                            </button> 
                                        </td>
                                        <td class="lg:pl-5 font-thin"> 
                                            <form method="POST" action="{{ route('encuesta.eliminarSub', ['subcategoria' => $sub->id]) }}">
                                                @method('DELETE')
                                                @csrf
    
                                                <button type="button" class="mt-3 px-3 py-2 text-sm font-medium text-center text-red-500 hover:text-white bg-red-500 rounded-lg hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-transparent dark:hover:bg-red-500 dark:focus:ring-red-600 border border-red-500">
                                                    <input type="submit" value="DELETE">
                                                </button>
                                            
                                            </form>
                                            
                                        </td>

                                    </tr>
                                @empty {{--SI NO HAY REGISTROS --}}
                                    <tr>
                                        <span class="text-base">

                                            <td class="px-7" colspan="5"> NO SE ENCONTRARON REGISTROS DE SUBCATEGORIAS</td>

                                        </span>

                                    </tr>
                                @endforelse                       
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                   
                </div>
            </div>
        </div>
</x-app-layout>
