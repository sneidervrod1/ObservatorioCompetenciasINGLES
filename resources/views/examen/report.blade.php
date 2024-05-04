<x-app-layout>
    <x-slot name="header">   
        <h2 class="font-mono font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
           REPORTES 
        </h2>
        
    
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 dark:bg-gradient-to-t overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-mono">
                   
                    {{-- <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400 mt-4">Escoja el nivel que desea ser calificado (A1, A2, B1, B2, C1, C2)  </p>
                    <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Para medir sus conocimientos en el nivel se calificaran 3 categorias (READING, SPEAKING, LISTENING)</p>
                    <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem doloribus ullam at aliquid veniam sint sunt recusandae, eveniet porro quod fugiat dolores mollitia id ad, eaque vero! Placeat, velit veniam.</p> --}}
            <div class=" flex justify-around">
                    <button type="button" class="mt-3 px-3 py-2 text-sm font-medium text-center text-yellow-500 hover:text-white bg-yellow-500 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-transparent dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 border border-yellow-500">
                        <a href="{{ route('report.pdf', ['report' => $report->id]) }}">Guardar Reporte (PDF)</a>
                    </button>
                    <button type="button" class="mt-3 px-3 py-2 text-sm font-medium text-center text-yellow-500 hover:text-white bg-yellow-500 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-transparent dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 border border-yellow-500">
                        <a href="{{ route('report.index') }}">Volver a lista de enunciados</a>
                    </button>
                </div>

      

                <h3 class="text-xl text-center font-extrabold dark:text-white mt-8"> REPORTE DE EXAMEN PRESENTADO {{ $report->created_at}}</h3> 

                <table class="w-full text-gray-800 dark:text-gray-400 my-10">
                  
                        <tr>
                            <th class="text-center text-white">
                                <h2 class="font-bold text-center text-4xl"> TOTAL </h2>
                            </th>
                        </tr>    
                        <tr>         
                            <th class="flex justify-center" > 
                                <div class="relative w-40 h-40 text-white">
                                    <svg class="w-full h-full" viewBox="0 0 100 100">
                                      <!-- Background circle -->
                                      <circle
                                        class="text-gray-200 stroke-current" stroke-width="10" cx="50" cy="50" r="40" fill="transparent"></circle>
                                      <!-- Progress circle -->
                                      <circle
                                        class="text-indigo-500  progress-ring__circle stroke-current" stroke-width="10" stroke-linecap="round" cx="50" cy="50" r="40" fill="transparent" stroke-dasharray="251.2"  stroke-dashoffset="calc(251.2 - (251.2 * ({{$report->total}} ) ) / 100)"
                                      ></circle>
                                      
                                      <!-- Center text -->
                                      <text  x="50" y="50" font-family="Verdana" fill="white" font-size="12"  text-anchor="middle" alignment-baseline="middle"> {{$report->total}} %</text>
                                    </svg>
                                  </div>
                            </th>
                        </tr>
                        
                    </table>
                   
                    <div class="flex">
                        <!-- Primer elemento -->
                        <div class="w-1/3 ">
                            <!-- Contenido del primer elemento -->
                            <p class="text-orange-600">READING</p>
                            <div class="relative w-40 h-40 text-white">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <!-- Background circle -->
                                    <circle class="text-gray-200 stroke-current" stroke-width="10" cx="50" cy="50" r="40" fill="transparent"></circle>
                                    <!-- Progress circle -->
                                    <circle class="text-orange-600 progress-ring__circle stroke-current" stroke-width="10" stroke-linecap="round" cx="50" cy="50" r="40" fill="transparent" stroke-dasharray="251.2" stroke-dashoffset="calc(251.2 - (251.2 * ({{$report->total}} ) ) / 100)"></circle>
                                    <!-- Center text -->
                                    <text x="50" y="50" font-family="Verdana" fill="white" font-size="12" text-anchor="middle" alignment-baseline="middle">{{$report->reading}}%</text>
                                </svg>
                            </div>
                        </div>
                    
                        <!-- Segundo elemento -->
                        <div class="w-1/3">
                            <p class="text-green-500">LISTENING</p>
                            <div class="relative w-40 h-40 text-white">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <!-- Background circle -->
                                    <circle class="text-gray-200 stroke-current" stroke-width="10" cx="50" cy="50" r="40" fill="transparent"></circle>
                                    <!-- Progress circle -->
                                    <circle class="text-green-500 progress-ring__circle stroke-current" stroke-width="10" stroke-linecap="round" cx="50" cy="50" r="40" fill="transparent" stroke-dasharray="251.2" stroke-dashoffset="calc(251.2 - (251.2 * ({{$report->listening}} ) ) / 100)"></circle>
                                    <!-- Center text -->
                                    <text x="50" y="50" font-family="Verdana" fill="white" font-size="12" text-anchor="middle" alignment-baseline="middle">{{$report->listening}}%</text>
                                </svg>
                            </div>
                        </div>
                    
                        <!-- Tercer elemento -->
                        <div class="w-1/3">
                            <p class="text-teal-500">WRITTING</p>
                            <div class="relative w-40 h-40 text-white">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <!-- Background circle -->
                                    <circle class="text-gray-200 stroke-current" stroke-width="10" cx="50" cy="50" r="40" fill="transparent"></circle>
                                    <!-- Progress circle -->
                                    <circle class="text-teal-500 progress-ring__circle stroke-current" stroke-width="10" stroke-linecap="round" cx="50" cy="50" r="40" fill="transparent" stroke-dasharray="251.2" stroke-dashoffset="calc(251.2 - (251.2 * ({{$report->writting}} ) ) / 100)"></circle>
                                    <!-- Center text -->
                                    <text x="50" y="50" font-family="Verdana" fill="white" font-size="12" text-anchor="middle" alignment-baseline="middle">{{$report->writting}}%</text>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="m-10 p-10">
                        <h3 class="text-center text-xl mb-5"> Competencias a mejorar en el nivel</h3>
                            <ul class="list-disc">
                                @forelse($subcategorias as $subcategoria)
                                <li class="mb-5"> {{ $subcategoria->description}}</li>
                                @empty
                                <li> Ninguna sus competencias en el nivel son muy buenas</li>
                                @endforelse
                          </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
