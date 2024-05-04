<x-app-layout>
    <x-slot name="header">
        <h2 class="font-mono font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            Confirmación de Examen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100  font-mono">
                    <p class="text-3xl">Examen guardado correctamente.</p>
                    <p  class="text-xl">Gracias por participar.</p>
                    <div class="mt-8">
                        <p  class="text-xl mT-8">Para ver su calificacion dirigase al apartado de reportes.</p>

                    </div>

                    <div class="mt-3 text-xl">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                           <a href=" {{ route('report.index') }}"> REPORTES</a>
                        </button>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</x-app-layout>
