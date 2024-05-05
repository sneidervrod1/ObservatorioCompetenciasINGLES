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
        <div class=" p-6 text-center ">
            <h1 class=" text-slate-300 font-bold text-3xl"> MODELO </h1>
        </div>
        <div class=" sm:px-32 text-left ">
            <div class="sm:px-28">
                <p class=" text-slate-300 font-bold text-2xl text-left"> Basados en el Modelo ALTE </p>
                <div class="mt-5">
                    <p class="text-slate-300 font-semibold text-xl mb-5">En esta sección, te proporcionaremos detalles sobre el método utilizando para evaluar tus conocimientos y habilidades.</p>
  
                    <p class="text-slate-300 font-semibold text-xl">Association of Language Testers in Europe (ALTE) es una asociación multilingüe de instituciones desarrolladoras de exámenes de lenguaje y certificados de competencias en diferentes idiomas, que ha
                        desarrollado un esquema universal para medir LANGUAGE QUALIFICATIONS con el fin de entregar un estándar universal para evaluar el idioma.</p>
                               </div>
                <div class="mt-5 flex justify-between">
                    <button type="button" class=" px-4 py-3 text-sm font-medium text-center text-blue-500 hover:text-white bg-blue-500 rounded-md hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-transparent dark:hover:bg-blue-500 dark:focus:ring-blue-600 border border-blue-500">
                     <a target="_blank" href="https://www.cambridgeenglish.org/es/exams-and-tests/cefr/">PARA CONOCER MAS ACERCA DEL MODELO ALTE</a>

                    </button>

                    <button type="butn" class=" px-4 py-3 text-sm font-medium text-center text-green-500 hover:text-white bg-green-500 rounded-md hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-transparent dark:hover:bg-green-500 dark:focus:ring-green-600 border border-green-500">
                        <a href=" {{ url('/') }} ">VOLVER</a>
                       </button>
                </div>
                
            </div>
            
        </div>
        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-100 dark:text-gray-400 bg-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 ">
                            <th class="px-4 py-2 text-white text-center">
                                <span class="font-bold text-center"> NIVEL </span>
                            </th>
                            <th class="px-4 py-2 text-white text-center">
                                <span class="font-bold text-center"> CATEGORIAS</span>
                            </th>
                            <th class="px-4 py-2 text-white text-center">
                                <span class="font-bold text-center"> PESO</span>
                            </th>
                            <th class="px-4 py-2 text-white text-center">
                                <span class="font-bold text-center "> SUBCATEGORIA</span>
                            </th>
                            <th class="px-4 py-2 text-white text-center">
                                <span class="font-bold text-center"> PESO</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($catLevel as $cat)
                            @foreach ($cat->subcategories as $sub)
                            
                            @endforeach
                            <tr>
                                <th rowspan="" class="text-center"> {{ $cat->level->name }}</th>

                                <th class="text-center text-lg">{{ $cat->category->name }}  </th>
                                <th class="text-center">{{ $cat->weight_category}}</th>
                                <th class="text-left text-lg mx-5">{{ $sub->description }} </th>
                                <th class="text-center">{{ $sub->weight_subcategory}}</th>
                            </tr>
                          
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </body>

</html>
