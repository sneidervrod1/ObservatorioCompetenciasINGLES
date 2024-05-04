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
                                <th class="px-4 py-2 text-center">Correo</th>
                                <th class="px-4 py-2 text-center">Percepción usabilidad</th>
                                <th class="px-4 py-2 text-center">Percepción del modelo</th>
                                <th class="px-4 py-2 text-center">Percepción de utilidad</th>
                                <th class="px-4 py-2 text-center">Satisfacción general de la aplicación</th>
                                <th class="px-4 py-2 text-center">Total Aceptación</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($validations as $validation)
                            
                                <tr class="border-b">
                                    <td class="px-4 py-2 text-center">{{ $validation->name }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->email }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->percepUsabilidad }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->modeloCompIngles }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->percepUtilidad }}</td>
                                    <td class="px-4 py-2 text-center">{{ $validation->satisfaccionApp }}</td>
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
