<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            Formulario de Validación TAM
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">        
                        
                    <p class="font-bold backdrop-saturate-60">  ENCUESTAS DE VALIDACIÓN REALIZADAS</p>
                    </br>
                    <p class="font-fold backdrop-saturate-60">
                        N° Encuestados : {{ $personasencuesta }}
                    </p>
                    </div>
                 <div  class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            
                    @if (isset($validations) && count($validations) > 0)

                    <table class="table-auto w-full bg-gray-800 text-white border-2 border-gray-700">
                    <table class="table-auto w-full bg-gray-800 text-white border border-5 border-gray-700">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-center">Nombre</th>
                                <th class="px-4 py-2 text-center">Curso</th>
                                <th class="px-4 py-2 text-center">Codigo</th>
                                <th class="px-4 py-2 text-center">Utilidad Percibida</th>
                                <th class="px-4 py-2 text-center">Facilidad De Uso Percibida</th>
                                <th class="px-4 py-2 text-center">Actitud Por El Uso</th>
                                <th class="px-4 py-2 text-center">Intencion De Uso</th>
                                <th class="px-4 py-2 text-center">Total Aceptación</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($validations as $validation)
                            
                                <tr class="border-b">
                                    <td class="px-4 py-2 text-center">{{ $validation->nombre }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->curso }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->codigo }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->UtilidadPercibida }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->modeloCFacilidadDeUsoPercibida }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->ActitudPorElUso }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->IntencionDeUso }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->totalAceptacion }}</td>
                                </tr>
                               
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    @endif
                 </div>
            </div>  
        </div>
    </div>
</x-app-layout>
