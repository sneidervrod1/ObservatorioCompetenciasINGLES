<x-app-layout>
    <x-slot name="header">
        <h2 class="font-mono font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
           REPORTE 
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100  font-mono">
                    <h3 class="text-xl font-extrabold dark:text-white"> REPORTS DE EXAMENES</h3> 
                    <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400 mt-4">Escoja el nivel que desea ser calificado (A1, A2, B1, B2, C1, C2)  </p>
                    <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Para medir sus conocimientos en el nivel se calificaran 3 categorias (READING, SPEAKING, LISTENING)</p>
                    <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem doloribus ullam at aliquid veniam sint sunt recusandae, eveniet porro quod fugiat dolores mollitia id ad, eaque vero! Placeat, velit veniam.</p>
                    
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
                                <span  class="font-bold text-center"> ID DEL REPORTE </span> 
                            </th>
                            <th class="px-4 py-2 text-white text-center">
                                <span  class="font-bold text-center"> REPORTES </span> 
                            </th>
                            <th class="px-4 py-2 text-white text-center">
                                <span class="font-bold text-center"> FECHA DEL EXAMEN </span>
                            </th>
                            <th class="px-4 py-2 text-white text-center">
                                <span class="font-bold text-center"> VER ESTADISTICAS DEL REPORTE </span>
                            </th>
                        </tr>
                        @forelse ($reports as $report)       
                            <tr>
                                <th class="text-center">
                                    <p class="text-xl"> {{ $report->id }}</p>
                                </th>
                                @switch($report->level)
                                    @case(1)
                                        <th class="text-center text-lg"> A1</th>
                                        @break
                                    @case(2)
                                        <th class="text-center text-lg"> A2</th>
                                        @break
                                    @case(3)
                                        <th class="text-center text-lg"> B1</th>
                                        @break
                                    @case(4)
                                        <th class="text-center text-lg"> B2</th>
                                        @break
                                    @case(5)
                                        <th class="text-center text-lg"> C1</th>
                                        @break
                                    @case(6)
                                        <th class="text-center text-lg"> C2</th>
                                        @break
                                    @default
                                    <th class="text-center text-lg"> NO DATA</th>
                                @endswitch

                                <th class="text-center" id="nested">
                                    <span class="text-center text-lg inline-block bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-2 py-1"> {{ $report->created_at }} </span>    
                                </th>
                                <th class="px-4 py-2 text-center text-red-600" > 
                                    <button type="button" class="mt-3 px-3 py-2 text-sm font-medium text-center text-yellow-500 hover:text-white bg-yellow-500 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-transparent dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 border border-yellow-500">
                                        <a href="{{ route('report.detalle', ['report' => $report->id]) }}">VER DETALLE DEL REPORTE</a>
                                    </button>
                                </th>
                            </tr>
                        @empty
                        <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 ">
                            <th class="px-4 py-2 text-white text-center">
                                <span  class="font-bold text-center"> NO HAY REPORTES PARA MOSTRAR, REALIZE EXAMENES DE CALIFICACION PARA TENER REPORTES</span> 
                            </th>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
