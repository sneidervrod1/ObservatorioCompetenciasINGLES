<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            BANCO DE PREGUNTAS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
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
                    <table class="table-auto w-full bg-gray-800 text-white border border-5 border-gray-700">
                        <colgroup span="5" width="100"></colgroup>
                        <tr>
                            <td colspan="1" class=" mx-5 ">  
                                <div class="mx-6 mb-4 mt-5 text-center">
                                    <button class="bg-transparent hover:bg-yellow-500 text-yellow-600 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                        <a href="{{ route('statements.index') }}">VOLVER A LA LISTA DE ENUNCIADOS</a>
                                    </button>
                                </div>                                    
                            </td>
                        </tr>
                       
                            <tr class="mt-3 text-center">
                                
                                <td colspan="5" class="text-center mt-5 ">  
                                    <div class="mt-4">
                                        <p class="font-bold backdrop-saturate-60"> ENUNCIADO </p>
                                    </div>                                    
                                </td>
                             
                            </tr>
                            <tr>
                                <td colspan="5"> 
                                    @if ($statement->statement)
                                    <div class=" flex justify-center">
                                        {!! $statement->statement !!}

                                    </div>
                                    @endif

                                    <div class="flex justify-center mb-3">
                                        @if ($statement->statementImage)
                                        <div class="flex justify-center mb-3 mx-6 my-2">
                                            <img class="h-full w-auto place-content-center rounded" src="{{ Storage::disk('s3')->url( $statement->statementImage )}}" >
                                        </div>
                                    @endif
                                    </div>
                                    
                                    
                                </td>
                            </tr>
                            <tr class="mt-3 text-lg">
                                <td colspan="3" class="text-center mt-5">  
                                    <div class="text-center mt-4">
                                        <p class="font-bold backdrop-saturate-60"> PREGUNTAS </p>
                                    </div>                                    
                                </td>
                                <td colspan="1" class="text-center mt-5">  
                                    <div class="mx-6 mb-4 mt-5 text-center">
                                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-600 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                            <a href=" {{ route('questions.peso', ['statement' => $statement->id]) }}"> MODIFICAR PESOS</a>
                                        </button>
                                    </div>                                   
                                </td>
                                <td colspan="1" class="text-center mt-5">  
                                    <div class="mx-6 mb-4 mt-5 text-center">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            <a href=" {{ route('questions.create', ['statement' => $statement->id]) }}"> CREAR PREGUNTAS</a>
                                        </button>
                                    </div>                                   
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center mt-5">  
                                    <div class="mt-4">
                                        <p class="font-bold backdrop-saturate-60"> PREGUNTA </p>
                                    </div>                                    
                                </td>
                                <td colspan="1" class="text-center mt-5">  
                                    <div class="mt-4">
                                        <p class="font-bold backdrop-saturate-60"> INFORMACION PREGUNTA </p>
                                    </div>                                    
                                </td>
                                <td colspan="1" class="text-center mt-5">  
                                    <div class="mt-4">
                                        <p class="font-bold backdrop-saturate-60"> OPCIONES PREGUNTA </p>
                                    </div>                                    
                                </td>
                            </tr>
                            @forelse ($statement->questions as $question)
                            <tr>
                                <td colspan="3" class="text-center mt-5">  
                                    @if ($question->questionImage)
                                    <div class="flex justify-center mb-3 mx-2 my-2">
                                        <img class=" w-full h-auto place-content-center" src="{{ Storage::disk('s3')->url( $question->questionImage )}}" >
                                    </div>
                                    @else
                                        <p class="text-3xl"> {{ $question->question }} </p>
                                    @endif                                
                                </td>
                                <td colspan="1" class="pl-10">  
                                    <div class="">
                                        <p class="font-bold backdrop-saturate-60">Peso pregunta: <span class="font-bold"> {{ $question->weightQuestions}} </span> </p>
                                    </div>
                                    
                                    <div class="mt-2">
                                        <p class="font-bold backdrop-saturate-60">Respuesta Correcta: {{ $question->correctAnswer}} </p>
                                    </div>

                                    <div class="mt-2">
                                        <p class="font-bold backdrop-saturate-60"> Cantidad respuestas: {{ $question->quantityOptions}} </p>
                                    </div>                                
                                </td>
                                <td colspan="1" class="text-center mt-5">  
                                    <div class="mx-6 mb-4 mt-5 text-center">
                                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-600 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                            <a href=" {{ route('questions.editar', ['question' => $question->id]) }}">MODIFICAR</a>
                                        </button>
                                    </div>    
                                    <div class="mx-6 mb-4 mt-5 text-center">
                                 
                                        <form action="{{ route('questions.delete', ['question' => $question->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mx-6 mb-4 mt-5 text-center">
                                                <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"> 
                                                    <input type="submit" value="ELIMINAR">  
                                                </button>
                                            </div>
                                        </form>
                                            
                                        
                                    </div>                                       
                                </td>
                            </tr>
                            @empty
                            <tr class="mt-3">
                                <td colspan="5" class="text-center mt-5 ">  
                                    <div class="mt-4 mb-10">
                                        <p class="font-bold backdrop-saturate-60"> NO HAY DATOS DE PREGUNTAS REGISTRADOS OPRIMA EL BOTON <span class="font-extraboldbold from-neutral-950"> "CREAR PREGUNTAS" </span>   </p>
                                    </div>                                    
                                </td>
                            </tr>
                            @endforelse
                            
                    </table>
                    
                 </div>
            </div>  
        </div>
        
    </div>
    
</x-app-layout>
  
