<x-app-layout>
    <x-slot name="header">
        <h2 class="font-mono font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
           EXAMEN
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100  font-mono">
                    <h3 class="text-xl font-extrabold dark:text-white text-center"> INFORMACION DEL EXAMEN</h3> 
                    <p class="mb-2 text-lg font-normal text-gray-500 dark:text-gray-400 mt-4">Para presentar un examen usted debera escojer el  nivel en el que desea ser calificado (A1, A2, B1, B2, C1, C2).</p>
                    <p class="mb-2 text-lg font-normal text-gray-500 dark:text-gray-400">Para medir sus conocimientos el examen calificara 3 categorias (READING, SPEAKING, LISTENING).</p>
                    <p class="mb-2 text-lg font-normal text-gray-500 dark:text-gray-400">Dentro de estas 3 categorias se calificaran diferentes capacidades que usted debe tener para considerarse dentro del nivel.</p>
                    
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <p class=" mx-5 text-base font-normal text-gray-500 dark:text-gray-400">Contara con un tiempo limite de una hora y media para responder la totalidad del examen.</p>
                    </div>


                    <h3 class="text-xl font-extrabold dark:text-white text-center mt-10 mb-4"> RECOMENDACIONES</h3> 
                    
                      
                    <div class="flex items-center">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 5a7 7 0 0 0-7 7v1.17c.313-.11.65-.17 1-.17h2a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H6a3 3 0 0 1-3-3v-6a9 9 0 0 1 18 0v6a3 3 0 0 1-3 3h-2a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h2c.35 0 .687.06 1 .17V12a7 7 0 0 0-7-7Z" clip-rule="evenodd"/>
                        </svg>
                        <p class="mx-5 mb-2 text-lg font-normal text-gray-500 dark:text-gray-400 mt-4">Para mejorar la experiencia se debe contar con unos buenos auriculares. </p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z" />
                        </svg>
                        <p class="mx-5 mb-2 text-lg font-normal text-gray-500 dark:text-gray-400 mt-4">Para mejorar la experiencia cebe contar con una red estable.</p>
                    </div>
                    <p class=" mb-2 text-lg font-normal text-gray-500 dark:text-gray-400 mt-4">Al enviar el examen podra conocer sus resultados en el area de Reportes.</p>

                    <h3 class="text-xl font-extrabold dark:text-white text-center mt-10 mb-4">Si desea prensentar un examen escoja el nivel y oprima el boton.</h3> 
                    
                    <form action="{{ route('examen.realizar')}}" method="POST">
                    @csrf
                    
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nivel">

                        @foreach ($nivel as $item)
                        <option class="block mb-2 text-base font-medium text-gray-900 dark:text-white " value="{{ $item->name }}" > {{ $item->name }}</option>
                        @endforeach
                    </select>
                
                    <div class="mt-3">
                        <button
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                            <input type="submit" value="INICIAR EXAMEN">
                        </button>
                    </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
