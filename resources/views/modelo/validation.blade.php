<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>S.M.C.I</title>
        @vite('resources/css/app.css')
    </head>

    <body class="dark:bg-gray-900 mt-10">
        
        <div class=" p-6 text-center flex">
            <div class="flex-1">
                <button type="button" class="px-4 py-3 text-sm font-medium text-center text-green-500 hover:text-white bg-green-500 rounded-md hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-transparent dark:hover:bg-green-500 dark:focus:ring-green-600 border border-green-500">
                    <span style="display: inline-block; vertical-align: middle;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                    </span>
                    <a href="{{ url('/') }}" style="display: inline-block; vertical-align: middle; margin-left: 0.5rem;">VOLVER</a>
                </button>
                
                
                
            </div>
            <div class="flex-1">
                <h1 class=" text-slate-300 font-bold text-3xl"> VALIDACIÓN </h1>
            </div>
            
            <div class="flex-1">
               
            </div>
        </div>
        
        <div class=" sm:px-32 text-left ">
            
            <div class="sm:px-28">
                <p class=" text-slate-300 font-bold text-2xl text-left"> Basados en el Modelo TAM </p>
                <div class="mt-5">
                    <p class="text-slate-300 font-semibold text-xl mb-5">En esta sección, proporcionaremos detalles sobre la percepcion de los estudaintes hacia la aplicación</p>
  
                    <p class="mb-2 text-slate-300 font-semibold text-xl"> <span class="font-extrabold"> Percepción de Utilidad (PU):</span> Se refiere a qué tan beneficioso percibe un usuario que será el uso de la tecnología para mejorar su desempeño laboral o personal. En otras palabras, si un usuario cree que una tecnología específica mejorará su eficiencia, será más propenso a adoptarla.</p>
                    <p class="mb-2 text-slate-300 font-semibold text-xl"><span class="font-extrabold">  Percepción de Facilidad de Uso (PEOU):</span> Se refiere a qué tan fácil de usar percibe un usuario que es la tecnología. Si una tecnología es percibida como complicada o difícil de utilizar, es menos probable que sea aceptada, independientemente de los beneficios que pueda ofrecer.</p>
                    <p class="mb-2 text-slate-300 font-semibold text-xl"> <span class="font-extrabold">Actitud hacia el Uso (AU):</span>  Esta variable se refiere a los sentimientos positivos o negativos de un usuario hacia el uso de la tecnología. La actitud hacia el uso es influenciada directamente por la percepción de utilidad (PU) y la percepción de facilidad de uso (PEOU)</p>
                    <p class="mb-2 text-slate-300 font-semibold text-xl"><span class="font-extrabold"> Intención de Uso (IU):</span> Esta variable se refiere a la disposición del usuario a emplear la tecnología en el futuro. La intención de uso está influenciada por la actitud hacia el uso y, en algunos casos, directamente por la percepción de utilidad.</p>
                </div>
                <div class="mt-5 flex justify-between">
                      
                </div>
                
            </div>
            
        </div>
        <div class="py-12 ">
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

    </body>

</html>
