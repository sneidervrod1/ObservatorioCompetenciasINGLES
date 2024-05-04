<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            CRUD PREGUNTAS VALIDACION
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('validation.guardarQuestion')}}" method="post">       
                        @csrf    
                        <div class="">
                            <p clas>Se va a crear una pregunta de validacion para la categoria:   <span class="font-semibold text-xl underline">  {{ $validationCategory->description}}</span> </p>
                          
                        </div>           
                     
                        <div class="mb-4 mt-4 text-base">
                            
                            <input type="hidden" name="catID" id="catID" value="{{$validationCategory->id}}" > 

                            <label for="first_name"class="block mb-2 font-medium text-gray-900 dark:text-white text-xl">Descripción pregunta: </label>
                            <input type="text" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>

                        <div class="">
                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                <input type="submit" value="ENVIAR">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
