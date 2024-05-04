<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                   {{----}}
                   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @can('reporte')
                    <div class="w-full bg-gradient-to-b from-gray-950 to-gray-600 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                        <div class="px-6 py-4 flex justify-center ">    
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round"  stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <p class="text-xl text-white font-bold mb-2">Reportes</p>
                            <p class=" text-base text-white font-normal">Accede fácilmente a todos tus reportes de exámenes presentados con solo un clic. Y obten toda la información relevante sobre tus evaluaciones</p>
                        </div>
                        <div class="mt-5">
                            <button class=" bg-transparent hover:bg-blue-500 text-blue-400 font-bold hover:text-white py-2 px-4 border-2 border-blue-500 hover:border-transparent rounded">
                                <a href=" {{ route('report.index') }}"> REPORTES </a>
                            </button>
                        </div>
                    </div>
                    @endcan
                        

                        <div class="w-full bg-gradient-to-b from-gray-950 to-gray-600  rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                            <div class="px-6 py-4 flex justify-center">    
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </div>
                            <div class="text-center">
                               
                                <p class="text-xl text-white font-bold mb-2">Perfil</p>
                                <p class="mb-3 text-base text-white font-normal">Desde aquí tu {{ Auth::user()->name }}, puedes gestionar tu perfil y actualizar tu información personal </p>                        
                            </div>
                            <div class="mt-5">
                                <button class=" bg-transparent hover:bg-blue-500 text-blue-400 font-bold hover:text-white py-2 px-4 border-2 border-blue-500 hover:border-transparent rounded">
                                    <a href=" {{ route('profile.edit') }}"> PERFIL </a>
                                </button>
                            </div>
                        </div>
                    @can('validation.examen')
                    <div class="w-full bg-gradient-to-b from-gray-950 to-gray-600 b rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                        <div class="px-6 py-4 flex justify-center">    
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>  
                        </div>
                        <div class="text-center">
                            <p class="text-xl text-white font-bold mb-2">Validacion</p>
                            <p class="text-base text-white font-normal">Comparte tu experiencia y ayuda a mejorar nuestra aplicación calificándola. Tu opinión es fundamental para nosotros.</p>
                        </div>
                        <div class="mt-5">
                            <button class=" bg-transparent hover:bg-blue-500 text-blue-400 font-bold hover:text-white py-2 px-4 border-2 border-blue-500 hover:border-transparent rounded">
                                <a href=" {{ route('validation.mostrar') }}"> VALIDACION </a>
                            </button>
                        </div>
                    @endcan
                        
                        
                        </div>
               
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
