<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Estilos para el cuerpo del documento */
       
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
        
        }

        /* Estilos para los encabezados */
        h1, h2, h3 {
            color: darkblue;
        }

        /* Estilos para los párrafos */
        p {
            margin-bottom: 10px;
        }

        /* Estilos para las tablas */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Otros estilos */
        .container {
            width: 80%;
            margin: 0 auto;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body class="boby">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 dark:bg-gradient-to-t overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-mono">
                   
                

                <h3 class="title"> REPORTE DE EXAMEN PRESENTADO {{ $report->created_at}}</h3> 

                <table class="tabla">
                  
                        <tr>
                            <th class="total">
                                <h2 class="font-bold text-center text-4xl"> TOTAL </h2>
                            </th>
                        </tr>    
                        <tr>         
                            <th class="flex justify-center" > 
                                <div class="relative w-40 h-40 text-white">
                                  
                                      <text > {{$report->total}} %</text>
                               
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
                               
                                    <text>{{$report->reading}}%</text>
                              
                            </div>
                        </div>
                    
                        <!-- Segundo elemento -->
                        <div class="w-1/3">
                            <p class="text-green-500">LISTENING</p>
                            <div class="relative w-40 h-40 text-white">
                             
                                    <text>{{$report->listening}}%</text>
                            </div>
                        </div>
                    
                        <!-- Tercer elemento -->
                        <div class="w-1/3">
                            <p class="text-teal-500">WRITTING</p>
                            <div class="relative w-40 h-40 text-white">
                              
                                    <text>{{$report->writting}}%</text>
                        
                            </div>
                        </div>
                    </div>
                    <div class="m-10 p-10">
                        <h3 class=""> Competencias a mejorar en el nivel</h3>
                            <ul class="ul">
                                @forelse($subcategorias as $subcategoria)
                                <li class="li"> {{ $subcategoria->description}}</li>
                                @empty
                                <li> Ninguna sus competencias en el nivel son muy buenas</li>
                                @endforelse
                          </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>