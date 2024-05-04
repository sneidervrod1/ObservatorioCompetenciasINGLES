<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>S.M.C.I</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        @vite('resources/css/app.css')
        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            {{-- CODIGO DE MENU DE NAVEGACION--}}
            

            <div class="sm:fixed sm:top-0 sm:left- p-6 text-left z-10">
                <a href="{{ url('/') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" >Inicio </a>
                <a href=" " class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Modelo </a>
                <a href="#acercadelproyecto" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Validación </a>
                <a href=" #" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Contribuidores </a>
            </div>

           
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex justify-center">
                            <table>
                                @foreach ($catLevel as $catenivel)
                                    {{-- <tr>
                                            <td rowspan="" class=" px-6 py-4 whitespace-no-wrap font-bold text-center text-lg">{{ $catenivel->level->name }}{{ $catenivel->level->count() }} </td> 
                                            
                                            <td  class="px-6 py-4 whitespace-no-wrap font-bold text-center text-lg">{{ $catenivel->category->name }} </td>

                                        @foreach ($catenivel->subcategories as $sub)
                                        
                                            <td  rowspan="" class="pl-7 font-bold text-center" colspan="2"> <span class="text-base"> {{ $sub->description }}  </span> </td>
                                            
                                    </tr>
                                        @endforeach --}}
                                        {{ $catenivel}}
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</html>
