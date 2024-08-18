<x-app-layout>
    <x-slot name="header">
        <h2 class="font-mono font-semibold text-2xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            VER BANCO DE INSTRUCCIONES
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                    <div class="mx-3 text-center mt-3 px-4 font-mono hover:">
                        <span>  {{ $categoryLevel->onEachSide(1)->appends(request()->query())->links() }} </span>
                    </div>
                </div>
                <!--Contenedor Botón-->
                
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

                <table class="mt-3 table-auto w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-400 ">

                    <colgroup span="6" width="100"></colgroup>
                    <tbody>
                        <tr class="text-white">
                            <td class="px-6 py-4 whitespace-no-wrap font-bold text-center text-xl">NIVEL</td>
                            <td class="px-6 py-4 whitespace-no-wrap font-bold text-center text-xl">CATEGORIA</td>
                            <td colspan="3" class="px-6 py-4 whitespace-no-wrap font-bold text-center text-xl">SUBCATEGORIA</td>
                            <td  class="px-6 py-4 whitespace-no-wrap font-bold text-center text-xl">AGREGAR</td>
                        </tr>

                            @foreach ($categoryLevel as $catenivel)
                                
                                
                                @forelse ($catenivel->subcategories as $sub)
                                    <tr>
                                        <td class=" px-6 py-4 whitespace-no-wrap font-bold text-center text-lg">{{ $catenivel->level->name }} </td> {{--ACCEDO A LEVEL DESDE CAT_LEV--}}
                                        <td class="px-6 py-4 whitespace-no-wrap font-bold text-center text-lg">{{ $catenivel->category->name }} </td>{{--ACCEDO A CAT DESDE CAT_LEV--}}
                                        <td class="pl-7 font-bold" colspan="3"> <span class="text-base"> {{ $sub->description }}  </span> </td>
                                        <td>
                                            <div class="mx-6 mb-4 mt-5 text-center">
                                                <button
                                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                    <a href=" {{ route('statements.create', ['subcategory' => $sub->id]) }}"> CREAR ENUNCIADOS</a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                <tr class="">
                                    <td colspan="3"  class=" px-6 py-4 whitespace-no-wrap font-extrabold text-center">ENUNCIADOS </td> {{--ACCEDO A LEVEL DESDE CAT_LEV--}}
                                    <td  class=" px-6 py-4 whitespace-no-wrap font-extrabold text-center">EDITAR ENUNCIADO</td> {{--ACCEDO A LEVEL DESDE CAT_LEV--}}
                                    <td  class="px-6 py-4 whitespace-no-wrap font-extrabold text-center"> ELIMINAR ENUNCIADO </td>{{--ACCEDO A CAT DESDE CAT_LEV--}} 
                                    <td  class="px-6 py-4 whitespace-no-wrap font-extrabold text-center"> AGREGAR PREGUNTA </td>{{--ACCEDO A CAT DESDE CAT_LEV--}} 

                                </tr>

                                @forelse($sub->statements as $statements)
                                <tr class="">
                                    <td colspan="3" class="text-center mx-2 my-2">

                                        @if ($statements->statement)
                                        <div class=" flex justify-center">
                                            {!! $statements->statement !!}

                                        </div>
                                            
                                        @endif
                                        
                                        @if ($statements->statementImage)
                                        <div class="flex justify-center mb-3 mx-6 my-2">
                                            <img class="h-full w-auto place-content-center rounded" src="{{ Storage::disk('s3')->url( $statements->statementImage )}}" >
                                        </div>
                                        @endif
                                       
                                        
                                       
                                    </td>
                                    <td colspan="1" class="text-center" >
                                        <div class="mx-6 mb-4 mt-5 text-center">
                                            <button
                                                class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                                <a href=" {{ route('statements.editar', ['statement' => $statements]) }}"> EDITAR ENUNCIADO</a>
                                            </button>
                                        </div>
                                    </td>
                                    <td colspan="1" class="text-center" >
                                        <form action="{{ route('statements.delete', ['statement' => $statements]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="mx-6 mb-4 mt-5 text-center">
                                            <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"> 
                                                <input type="submit" value="ELIMINAR">  
                                            </button>
                                        </div>
                                        </form>
                                    </td>
                                    <td colspan="1" class="text-center" >
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            <a href=" {{ route('questions.index', ['statement' => $statements]) }}">  AGREGAR Y VER PREGUNTAS</a>
                                        </button>
                                    </td>
                                </tr>
                                @empty     
                                <tr class="border-y-2 border-red-500" >
                                    <td colspan="6" class="text-center text-lg">
                                        <div class="mb-0.5 mt-0.5">
                                            <p class="text-shado"> * NO HAY DATOS REGISTRADOS DE ENUNCIADOS CREELOS CON * - "CREAR ENUNCIADOS"</p>

                                        </div>
                                    </td>
                                    
                                </tr>
                                @endforelse
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-lg">
                                    <div class="my-5">
                                        <p>*  NO HAY DATOS REGISTRADOS DE SUBCATEOGRIAS CREELOS AQUI *
                                            <button class="mx-3 bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                <a class="" href="{{ route('encuesta.listaSub') }}"> CREAR SUBCATEGORIAS</a>
                                            </button>
                                        </p>
                                    </div>
                                    
                                </td>
                                
                            </tr>
                            @endforelse
                                                     
                        @endforeach    
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
